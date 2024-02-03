<?php

namespace App\Actions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthAction
{
    /**
     * @param \Illuminate\Http\Request
     * @return false|string $token
     */
    public function loginUser(Request $request)
    {
        $credential = [
            'username' => $request['username'],
            'password' => $request['password'],
        ];

        if (Auth::attempt($credential)) {
            return Auth::user();
        }
        return false;

    }

    public function getuser()
    {
        return Auth::user();
    }

    public function logout(){
        Auth::logout();
        return view('login');
    }
}