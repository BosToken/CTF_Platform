<?php

namespace App\Http\Controllers;

use App\Actions\InformationAction;
use Illuminate\Routing\Controller as BaseController;
use App\Actions\UserAction;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    public function users(UserAction $userAction)
    {
        $users = $userAction->getuser();
        return view('page.user.users', compact('users'));
    }

    public function getUser(UserAction $userAction, $username)
    {
        $users = $userAction->getByUsername($username);
        return view('profile', compact('users'));
    }

    public function debug(InformationAction $action)
    {
        return Auth::user()->role->role;
        // return Role::where('name', 'User')->get('id');
    }
}
