<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Skill;
use App\Http\Requests\AboutDesc;
use App\Http\Requests\AboutSkill;

class AboutController extends Controller
{
    //
    public function index()
    {
        $user = User::first();
        $skill =  Skill::all();

        return ['user' => $user, 'skill' => $skill];
    }

    public function updateDesc(AboutDesc $request)
    {
        $input = $request->all();
        $user = User::first();
        $user->fill($input)->save();

        return $user;
    }

    public function registerSkill(AboutSkill $request)
    {
        $input = $request->all();
        $skill = new Skill();
        $skill->create($input);
        return Skill::all();
    }

    public function updateSkill(AboutSkill $request, $id)
    {
        $input = $request->all();
        $skill = Skill::find($id);
        $skill->fill($input)->save();

        return Skill::all();
    }

    public function deleteSkill($id)
    {
        $skill = Skill::find($id);
        $skill->delete();
        return Skill::all();
    }
}
