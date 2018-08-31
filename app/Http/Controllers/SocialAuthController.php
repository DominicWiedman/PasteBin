<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use NunoMaduro\Collision\Provider;

class SocialAuthController extends Controller
{
    /** Ответ сервиса на запрос */
    public function callback($provider)
    {
        $user = $this->createOrGetUser(Socialite::driver($provider));
        auth()->login($user);
        return redirect()->to('/');
    }

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /** запись данных пользователя в базу */
    private function createOrGetUser(Provider $provider)
    {
        $providerUser = $provider->user();
        $providerName = class_basename($provider);
        $user = User::whereProvider($providerName)
            ->whereProviderId($providerUser->getId())
            ->first();
        if (!$user) {
            $user = User::create([
                'email' => $providerUser->getEmail(),
                'name' => $providerName->getName(),
                'provider_id' => $providerUser->getId(),
                'provider' => $providerName
            ]);
        }

        return $user;
    }

    /** завершение сессии авторизованного юзера */
    public function logout(Request $request)
    {
        \Auth::logout();
        return redirect('/');
    }
}
