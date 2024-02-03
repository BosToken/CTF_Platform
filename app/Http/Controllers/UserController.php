<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Actions\AuthAction;
use App\Actions\ChallengeAction;
use App\Actions\CategoryAction;
use App\Actions\SolverAction;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(UserRequest $request, AuthAction $action)
    {

        $login = $action->loginUser($request);

        if ($login) {
            return redirect('profile');
        }
        return back();
    }

    public function profile(AuthAction $action)
    {
        $user = $action->getuser();
        return view('page.user.profile', compact('user'));
    }

    public function challenge(ChallengeAction $challengeAction, CategoryAction $categoryAction, AuthAction $userAction)
    {
        $unsolveChallenges = $challengeAction->getUnsolveChallenge();
        $solveChallenges = $challengeAction->getSolveChallenge();
        $categories = $categoryAction->getCategory();
        $user = $userAction->getuser();

        return view('page.user.challenge', compact('unsolveChallenges', 'solveChallenges', "categories", 'user'));
    }

    public function submitFlag(Request $request, $id, ChallengeAction $challengeAction, SolverAction $solverAction)
    {
        if ($challengeAction->isFlagTrue($id, $request['flag'])) {
            $solverAction->isSolve($id);
            $challengeAction->updateScore($id);
        } 
        return redirect('challenge');
    }


    public function logout(AuthAction $action)
    {
        $action->logout();
    }
}
