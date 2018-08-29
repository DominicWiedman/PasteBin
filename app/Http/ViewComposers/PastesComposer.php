<?php

namespace App\Http\ViewComposers;


use App\Paste;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;


class PastesComposer
{
    public function compose(View $view)
    {
        $pastes = Paste::whereDate('available_at', '>=', Carbon::now())
            ->whereHas('visibility', function ($visibility) {
                $visibility->where('name', 'public');
            })->get();
        $view->with('pastes', $pastes);
    }
}