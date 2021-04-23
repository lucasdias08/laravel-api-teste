<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

use App\Http\Controllers\Api\AuthController;

class SocialiteController extends Controller
{
    public function redirectToProvider(){
        return Socialite::driver('facebook')->stateless()->redirect();
    }

    public function handleProviderCallback(){
        $user = Socialite::driver('facebook')->stateless()->user();

        $authController = new AuthController();
        $authController->registerWithFacebook($user);
        //var_dump($user->getEmail());
    }
}
