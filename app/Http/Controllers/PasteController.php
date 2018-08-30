<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePasteRequest;
use App\Paste;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PasteController extends Controller
{
    /**
     * @param Request $request
     */

    public function store(StorePasteRequest $request)
    {
        $paste = Paste::create([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'hash' => Str::random(8),
            'visibility_id' => $request->get('visibility_id'),
            'available_at' => $request->get('available_at') ? Carbon::now()->addMinutes($request->get('available_at')) : null,
            'user_id' => \Auth::id()
        ]);
        return redirect()->route('paste.show', ['hash' => $paste->hash]);
    }

    public function show($hash)
    {
        $paste = Paste::where('hash', $hash)->firstOrFail();
        return view('paste', ['paste' => $paste]);
    }

    public function myPaste()
    {
        $pastes = Paste::paginate(10);
        return view('mypaste', ['pastes' => $pastes]);
    }


}
