<?php

namespace App\Http\Controllers;

use App\Poll;
use App\Question;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function index(Poll $poll)
    {
        $questions = $poll->questions;
        return view('questions.list', ['questions' => $questions, 'poll' => $poll]);
    }

    public function form(Poll $poll, Question $question = null)
    {

        return view('questions.form', ['poll' => $poll, 'question' => $question]);
    }
}
