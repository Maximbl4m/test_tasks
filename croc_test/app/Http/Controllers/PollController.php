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
        return view('poll.index', ['polls' => $polls]);
    }

    /**
     * @param SavePollRequest $request
     */
    public function save(SavePollRequest $request)
    {

    }

    public function create()
    {
        $groups = Group::all();
        return view('poll.form', ['groups' => $groups]);
    }
}
