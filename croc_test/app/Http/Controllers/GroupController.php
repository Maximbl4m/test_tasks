<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\GroupSaveRequest;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function form(Group $group = null)
    {
        return view('group.form', ['group' => $group]);
    }

    public function save(GroupSaveRequest $request)
    {
        $group = new Group($request->all());
        $group->save();
        return redirect()->route('groupsList');
    }

    public function index()
    {
        $groups = Group::all();
        return view('group.list', ['groups' => $groups]);
    }
}
