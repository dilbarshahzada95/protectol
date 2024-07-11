<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuizController extends Controller
{

    public function index()
    {
        return view('quiz.quiz');
    }
}
