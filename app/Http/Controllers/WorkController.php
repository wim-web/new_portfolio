<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;

class WorkController extends Controller
{
    private $work;

    public function __construct(Work $work)
    {
        $this->work = $work;
    }

    public function index()
    {
        return $this->work->all();
    }

    public function show(Work $work)
    {
        $workWithSkills = $work->load('skills');

        return $workWithSkills;
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $this->work->fill($input)->save();
        $this->work->skills()->attach($input['checkedSkills']);
        return;
    }
    
    public function storeImage(Request $request)
    {
        $image = $request->image;
        $title = $request->title;
        $filename = $title . '.' . $image->extension();
        
        return storeImageToStorage($filename, $image) ? $filename : null;
    }

    public function storeImageToStorage(String $filename, String $image) :bool
    {
        if (!$image->isValid()) return false;
            
        $image->storeAs('works', $filename, 'public');
        return true;
    }

    public function delete(Work $work)
    {
        $work->delete();

        return $this->work->all();
    }

    public function update(Request $request, Work $work)
    {
        $input = $request->all();
        $work->fill($input)->save();
        $work->skills()->detach();
        $work->skills()->attach($input['checkedSkills']);
    }
}

