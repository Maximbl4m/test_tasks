<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\PollResultsRequest;
use App\Http\Requests\SavePollRequest;
use App\Poll;
use Illuminate\Http\Request;

class PollController extends Controller
{
    public function index()
    {
        $polls = Poll::all();
        return view('poll.list', ['polls' => $polls]);
    }

    public function availablePolls()
    {
        $polls = Poll::with('questions')->has('questions')->get();
        return view('poll.available', ['polls' => $polls]);
    }

    public function proceed(Poll $poll)
    {
        return view('poll.proceed', ['poll' => $poll]);
    }

    public function results(PollResultsRequest $request, Poll $poll)
    {
        $pollAnswers = $request->get('answer');
        $results = [];
        foreach ($poll->groups as $group) {
            $results[$group->id] = 0;
        }
        foreach ($pollAnswers as $questionId => $answerId) {
            foreach ($poll->questions as $question) {
                if ($question->id == $questionId) {
                    foreach ($question->answer as $answer) {
                        if ($answer->id == $answerId) {
                            foreach ($answer->answerScores as $answerScore) {
                                $results[$answerScore->group_id] += $answerScore->score;
                            }
                        }
                    }
                }
            }
        }
        $pollSum = array_sum($results);
        $sortedGroups = array_keys($results);
        $userGroupId = end($sortedGroups);
        $resultScore = $results[$userGroupId];
        $percentage = intval(round(($resultScore / $pollSum) * 100));
        $groupInfo = '';
        foreach ($poll->groups as $group) {
            if ($group->id == $userGroupId) {
                $groupInfo = $group;
                break;
            }
        }

        return view('poll.results', ['groupInfo' => $groupInfo, 'percentage' => $percentage]);
    }

    /**
     * @param SavePollRequest $request
     * @param Poll|null $poll
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(SavePollRequest $request, Poll $poll = null)
    {
        if (!$poll) {
            $poll = new Poll($request->only(['title', 'description']));
        } else {
            $poll->fill($request->only(['title', 'description']));
        }

        $poll->save();
        $poll->groups()->detach();
        foreach ($request->only('groups') as $group_id) {
            $poll->groups()->attach($group_id);
        }
        $poll->save();
        return redirect()->route('pollsList');
    }

    /**
     * @param Poll|null $poll
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function form(Poll $poll = null)
    {
        $groups = Group::all();
        return view('poll.form', ['poll' => $poll, 'groups' => $groups]);
    }

    /**
     * @param Poll $poll
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(Poll $poll)
    {
        $poll->groups()->detach();
        $poll->delete();
        return redirect()->route('pollsList');
    }
}
