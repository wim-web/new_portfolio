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
}
