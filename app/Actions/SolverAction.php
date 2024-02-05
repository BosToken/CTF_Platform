<?php

namespace App\Actions;

use App\Models\Solver;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SolverAction
{
    /**
     * @param \Illuminate\Http\Request
     * @return false|string $token
     */

    public function getSolver()
    {
        return Solver::with('challenge', 'user')->get();
    }

    public function isSolve($challenge_id)
    {
        $user_id = Auth::user()->id;
        $isSolve = Solver::where("solvers.challenge_id", $challenge_id)->where('solvers.user_id', $user_id)->get();

        if (count($isSolve) === 0) {
            $user_id = Auth::user()->id;
            $solve = new Solver();
            $solve->user_id = $user_id;
            $solve->challenge_id = $challenge_id;
            $solve->save();
            return 1;
        }
        return 0;
    }

    public function score()
    {
        return User::with('solvers.challenge')
            ->get()
            ->map(function ($user) {
                if ($user->solvers->isEmpty()) {
                    return null;
                }

                $score = $user->solvers->sum(function ($solve) {
                    return $solve->challenge->value;
                });

                return [
                    "username" => $user->username,
                    "score" => $score
                ];
            })
            ->filter()
            ->sortByDesc('score')
            ->values()
            ->all();
    }
}
