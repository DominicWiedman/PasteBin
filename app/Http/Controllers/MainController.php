<?php

namespace App\Http\Controllers;


use App\Visibility;

class MainController extends Controller
{
    public function index()
    {
        return view('index', [
            'visibilities' => \Auth::check() ? Visibility::all() : Visibility::where('name', '<>', 'private')->get()
        ]);
    }
}




