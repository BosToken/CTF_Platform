<?php

namespace App\Http\Controllers;

use App\Actions\AuthAction;
use App\Actions\ChallengeAction;
use App\Actions\SolverAction;
use App\Actions\CategoryAction;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class UserController extends BaseController
{

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
            if ($solverAction->isSolve($id)) {
                $challengeAction->updateScore($id);
            }
        }
        return redirect()->route('challenges');
    }

    public function logout(AuthAction $action)
    {
        $action->logout();
        return redirect()->route('welcome');
    }
}
