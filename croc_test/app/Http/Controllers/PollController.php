<?php

namespace App\Http\Controllers;

use App\Group;
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
