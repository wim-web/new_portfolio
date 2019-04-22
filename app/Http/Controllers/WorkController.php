<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkController extends Controller
{
    //
    public function index()
    {
        $works = \App\Work::all();
        return $works;
    }
}
