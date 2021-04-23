<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller{

    public function register(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed'
        ]);

        $validatedData['password'] = bcrypt($request->password);

        $user = User::create($validatedData);

        $accessToken = $user->createToken('authToken')->accessToken;

        return response([ 'user' => $user, 'access_token' => $accessToken]);
    }

    public function login(Request $request){
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid Credentials']);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['user' => auth()->user(), 'access_token' => $accessToken]);

    }

    public function registerWithFacebook($user){

        $arr_user = [
            "name" => $user->getName(),
            "email" => $user->getEmail(),
            "password" => $user->getId()
        ];

        var_dump($arr_user);

        $arr_user['password'] = bcrypt($arr_user['password']);
        $user2 = User::create($arr_user);
        $accessToken = $user2->createToken('authToken')->accessToken;

        echo "<hr>";

        var_dump($accessToken);

        //return response([ 'user' => $json_user, 'access_token' => $accessToken]);

    }
    
}
