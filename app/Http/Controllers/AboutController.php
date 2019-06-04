<?php

namespace App\Http\Controllers;

use App\User;
use App\Skill;
use App\Http\Requests\AboutDesc;
use App\Http\Requests\AboutSkill;

class AboutController extends Controller
{

    private $user;
    private $skill;

    public function __construct(User $user, Skill $skill)
    {
        $this->user = $user;
        $this->skill = $skill;
    }

    public function index()
    {
        $me = $this->user->first();
        $mySkills =  $this->skill->all();

        return ['user' => $me, 'skill' => $mySkills];
    }

    public function updateDesc(AboutDesc $request)
    {
        $input = $request->all();
        $user = $this->user->first();
        $user->fill($input)->save();

        return $user;
    }

    public function registerSkill(AboutSkill $request)
    {
        $input = $request->all();
        $this->skill->fill($input)->save();

        return $this->skill->all();
    }

    public function updateSkill(AboutSkill $request, Skill $skill)
    {
        $input = $request->all();
        $skill->fill($input)->save();

        return $this->skill->all();
    }

    public function deleteSkill(Skill $skill)
    {
        $skill->delete();

        return $this->skill->all();
    }
}
