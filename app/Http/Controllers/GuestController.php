<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Actions\SolverAction;
use App\Actions\UserAction;
use App\Actions\AuthAction;
use Illuminate\Routing\Controller as BaseController;

class GuestController extends BaseController
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

    public function login(UserRequest $userRequest, AuthAction $action)
    {
        $login = $action->loginUser($userRequest);

        if ($login) {
            return redirect()->route('challenges');
        }
        return back();
    }

    public function login_view() {
        return view('login');
    }

    public function landing(){
        return view('welcome');
    }
    
    public function scoreboard(SolverAction $solverAction)
    {
        $users = $solverAction->score();
        return view('page.user.scoreboard', compact('users'));
    }
}
