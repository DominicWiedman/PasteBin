<?php

namespace App\Http\Controllers\Auth;

use http\Exception;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Auth\LoginController;
//use Illuminate\Foundation\Auth\ThrottlesLogins;

class AuthController extends Controller
{
    use  ThrottlesLogins;


    protected $redirectTo = '/';


    public function __construct()

    {

        $this->middleware('guest', ['except' => 'logout']);

    }


    protected function validator(array $data)

    {

        return Validator::make($data, [

            'name' => 'required|max:255',

            'email' => 'required|email|max:255|unique:users',

            'password' => 'required|confirmed|min:6',

        ]);

    }


    protected function create(array $data)

    {

        return User::create([

            'name' => $data['name'],

            'email' => $data['email'],

            'password' => bcrypt($data['password']),

        ]);

    }


    public function redirectToGoogle()

    {

        return Socialite::driver('google')->redirect();

    }


    public function handleGoogleCallback()

    {

        try {
            $user = Socialite::driver('google')->user();
            $create['name'] = $user->getName();
            $create['email'] = $user->getEmail();
            $create['google_id'] = $user->getId();
            $userModel = new \App\User();
            $createdUser = $userModel->addNew($user);
            Auth::loginUsingId($createdUser->id);

            return redirect()->route('home');

        } catch (Exception $e) {

            return redirect('/auth/google');

        }

    }
}
