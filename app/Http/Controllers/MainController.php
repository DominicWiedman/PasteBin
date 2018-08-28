<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePasteRequest;
use App\Paste;
use App\Visibility;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class MainController extends Controller
{
    public function index()
    {
        return view('index', [
            'visibilities' => \Auth::check() ? Visibility::all() : Visibility::where('name', '<>', 'private')->get()
        ]);
    }

    /**
     * @param Request $request
     */

    public function store(StorePasteRequest $request)
    {
//        dd($request->get('available_at'));
        Paste::create([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'hash' => Str::random(8),
            'visibility_id' => $request->get('visibility_id'),
            'available_at' => $request->get('available_at') ? Carbon::now()->addMinutes($request->get('available_at')) : null,
            'user_id' => \Auth::id()
        ]);

//        $pastes = new Paste;
//        $pastes->title = $request->title;
//        $pastes->content = $request->content;
//        $pastes->hash = $request->hash;
//        $pastes->visibility_id = $request->visibility_id;
//        $pastes->save();



    }


    public function paste()
    {

    }
}




