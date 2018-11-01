<?php

namespace App\Http\Controllers;

use App\Poll;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $polls = Poll::all();
        $hasValidPoll = false;
        foreach ($polls as $poll) {
            if ($poll->questions) {
                foreach ($poll->questions as $question) {
                    if ($question->answer) {
                        foreach ($question->answer as $answer) {
                            if (count($answer->answerScores) > 0) {
                                $hasValidPoll = true;
                                break 3;
                            }
                        }
                    }
                }
            }
        }
        return view('welcome', ['hasValidPoll' => $hasValidPoll]);
    }

    public function logicInfo()
    {
        return view('logic');
    }
}
