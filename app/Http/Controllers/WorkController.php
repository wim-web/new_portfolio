<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;

class WorkController extends Controller
{
    //
    public function index()
    {
        $works = \App\Work::all();
        return $works;
    }

    public function show($id)
    {
        $work = Work::where('id', $id)->with(['skills'])->get();

        return $work;
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $work = new \App\Work();

        $work->fill($input)->save();
        $work->skills()->attach($input['checkedSkills']);

        return;
    }
    
    public function storeImage(Request $request)
    {
        $image = $request->image;
        $title = $request->title;
        $filename = $title . '.' . $image->extension();
        if ($image->isValid()) {
            $image->storeAs('works', $filename, 'public');
        }
        return $filename;
    }

    public function delete($id)
    {
        \App\Work::find($id)->delete();

        return Work::all();
    }

    public function update(Request $request, $id)
    {
        $work = \App\Work::find($id);
        $work->fill($request->all())->save();
        $work->skills()->detach();
        $work->skills()->attach($request->all()['checkedSkills']);
        // return \App\Work::all();
    }
}

