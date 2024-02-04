<?php

namespace App\Actions;

use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAction
{
    public function getuser()
    {
        return User::get();
    }

    public function getByUsername($username){
        $user = User::with('solvers.challenge.category')->where('users.username', $username)->get();
        return $user; 
    }
}
