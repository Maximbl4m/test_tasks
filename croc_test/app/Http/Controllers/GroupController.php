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

    public function save(GroupSaveRequest $request, Group $group = null)
    {
        if (!$group) {
            $group = new Group($request->all());
        } else {
            $group->fill($request->all());
        }
        $group->save();
        return redirect()->route('groupsList');
    }

    public function index()
    {
        $groups = Group::all();
        return view('group.list', ['groups' => $groups]);
    }

    public function remove(Group $group)
    {
        $group->delete();
        return redirect()->route('groupsList');
    }
}
