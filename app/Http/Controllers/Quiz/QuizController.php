<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use App\Jobs\SendSaveItLaterEmail;
use App\Models\Quiz\Entroll;
use App\Models\Quiz\Questions;
use App\Models\Quiz\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Quiz\RegisterdUsers;


class QuizController extends Controller
{
    public function index($encryptedUuid)
    {
        try {
            if (!$encryptedUuid) {
                return response()->json(['error' => 'Invalid access. UUID missing.'], 400);
            }

            $uuid = Crypt::decrypt(urldecode($encryptedUuid));
            $updatedQuestionIds = Result::where('uuid', $uuid)
                ->where('is_update', 1)
                ->pluck('question_id')
                ->toArray();
            $questions = Questions::with('options')->get();
            $totalQuestions = $questions->count();
            $remainingQuestions = $questions->whereNotIn('id', $updatedQuestionIds);
            $completedQuestions = $totalQuestions - $remainingQuestions->count();
            return view('quiz.quiz', compact('remainingQuestions', 'totalQuestions', 'completedQuestions'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while fetching the quiz questions.');
        }
    }

    public function updateQuiz(Request $request)
    {
        $request->validate([
            'question_id' => 'required|exists:questions,id',
            'uuid' => 'required',
        ]);

        try {
            $uuid = Crypt::decrypt(urldecode($request->uuid));
            $questionID = $request->question_id;
            $file = $request->file('file');
            $comments = $request->comments;
            $answer = null;

            switch ($request->type) {
                case 'upload':
                    if ($file) {
                        $fileName = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads'), $fileName);
                        $answer = serialize(['file' => $fileName, 'comments' => $comments]);
                    }
                    break;
                case 'radio':
                    $answer = serialize(['radio' => $request->radio]);
                    break;
                case 'textarea':
                    $answer = serialize(['comments' => $comments]);
                    break;
                default:
                    return response()->json(['status' => 'error', 'message' => 'Invalid question type']);
            }

            $result = Result::updateOrCreate(
                ['uuid' => $uuid, 'question_id' => $questionID],
                ['is_update' => 0]
            );

            $result->answer = $answer ? $answer : serialize(['comments' => '']);
            $result->is_update = 1;
            $result->save();

            $checkQuestionCompleted = Result::where('uuid', $uuid)->where('is_update', 0)->count();
            if ($checkQuestionCompleted == 0) {
                $update_entroll = Entroll::where('uuid', $uuid)->update(['status' => 'completed']);
                return response()->json(['status' => 'completed', 'message' => 'All questions completed successfully']);
            } else {
                return response()->json(['status' => 'success', 'message' => 'Answer saved successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'An error occurred while updating the answer.']);
        }
    }

    public function saveItLater(Request $request)
    {
        $request->validate([
            'uuid' => 'required',
        ]);

        try {
            $uuid = Crypt::decrypt(urldecode($request->uuid));
            $checkReg = RegisterdUsers::where('uuid', $uuid)->first();
            if (!$checkReg) {
                return response()->json(['status' => 'error', 'message' => 'Invalid access.']);
            }
            $email = $checkReg->email;
            $username = $checkReg->name ? $checkReg->name : 'User';
            $url = url('/questionnaire/' . urlencode(Crypt::encrypt($uuid)) . '/start');
            SendSaveItLaterEmail::dispatch($email, $username, $url)->delay(now()->addSecond(5));
            return response()->json(['status' => 'success', 'message' => 'Email sent successfully to save it for later | You can continue the quiz.']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'An error occurred while updating the answer.']);
        }
    }
}
