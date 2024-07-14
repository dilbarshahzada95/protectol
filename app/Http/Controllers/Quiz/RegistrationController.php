<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use App\Models\Quiz\Entroll;
use App\Models\Quiz\Questions;
use App\Models\Quiz\RegisterdUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Symfony\Component\Console\Question\Question;

class RegistrationController extends Controller
{

    public function index()
    {
        return view('quiz.registration');
    }
    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'company_name' => 'required',
            'email' => 'required|email|unique:registerd_users,email',
            'country' => 'required',
            'phone' => 'required',
            'comments' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()], 422);
        }

        DB::beginTransaction();
        try {
            $data = $request->all();
            $uuid = Str::uuid();
            $hashedUuid = hash('sha256', $data['email'] . $data['name'] . $uuid);
            $data['uuid'] = $hashedUuid;
            $save = RegisterdUsers::create($data);
            if ($save) {
                Entroll::create([
                    'uuid' => $data['uuid'],
                    'status' => 'pending'
                ]);
                $insertToResult = Questions::all()->map(function ($question) use ($data) {
                    return [
                        'uuid' => $data['uuid'],
                        'question_id' => $question->id,
                        'answer' => '',
                        'score' => 0
                    ];
                });
                DB::table('result')->insert($insertToResult->toArray());
                DB::commit();
                return response()->json(['message' => 'Registration Has been done', 'status' => true, 'url' => '/questionnaire/' . Crypt::encrypt($data['uuid']) . '/start'], 200);
            } else {
                DB::rollBack();
                return response()->json(['message' => 'Data not saved', 'status' => false], 500);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Data not saved', 'error' => $e->getMessage(), 'status' => false], 500);
        }
    }
}
