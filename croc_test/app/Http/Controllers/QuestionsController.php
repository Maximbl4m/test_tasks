<?php

namespace App\Http\Controllers;

use App\Answer;
use App\AnswerScore;
use App\Http\Requests\SaveQuestionRequest;
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

    public function save(SaveQuestionRequest $request, Poll $poll, Question $question = null)
    {
        if (!$question) {
            $question = new Question($request->only('text'));
            $question->poll_id = $poll->id;
            $question->save();
        } else {
            $question->update($request->only('text'));
            $question->answer()->delete();
            $question->save();
        }

        $answers = $request->only('answer')['answer'];
        $answerScores = $request->only('answer_score')['answer_score'];
        foreach ($answers as $answerId => $answerText) {
            $currentAnswerScore = $answerScores[$answerId];
            $answer = $question->answer()->create(['text' => $answerText]);
            foreach ($currentAnswerScore as $group_id => $score) {
                $answer->answerScores()->create(['group_id' => $group_id, 'score' => $score]);
            }
        }
        return redirect()->route('questionsList', ['poll' => $poll->id]);
    }

    public function remove(Poll $poll, Question $question)
    {
        $question->answer()->delete();
        $question->delete();
        return redirect()->route('questionsList', ['poll' => $poll->id]);
    }
}
