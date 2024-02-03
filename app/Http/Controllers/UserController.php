<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Actions\AuthAction;
use App\Actions\ChallengeAction;
use App\Actions\CategoryAction;

class UserController extends Controller
{
    public function login(UserRequest $request, AuthAction $action){

        $login = $action->loginUser($request);

        if ($login) {
            // return view('page.user.dashboard', compact('login'));
            return redirect('profile');
        }
        return back();

    }

    public function profile(AuthAction $action){
        $user = $action->getuser();
        return view('page.user.profile', compact('user'));
    }

    public function challenge(ChallengeAction $challengeAction, CategoryAction $categoryAction){
        $challenges = $challengeAction->getChallenge();
        $categories = $categoryAction->getCategory();

        return view('page.user.challenge', compact('challenges', 'categories'));
    }

    public function logout(AuthAction $action){
        $action->logout();
    }
}
