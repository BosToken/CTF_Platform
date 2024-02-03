<?php

namespace App\Actions;

use App\Models\ChallengeCategory;
use App\Models\Challenge;
use App\Models\Solver;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChallengeAction
{
    /**
     * @param \Illuminate\Http\Request
     * @return false|string $token
     */

    public function getChallenge()
    {
        return DB::table('challenge_categories')->join('challenges', 'challenge_categories.id', '=', 'challenges.challenge_categories_id')->select('challenges.*', 'challenge_categories.name as category')->get();
    }

    public function getSolveChallenge()
    {
        $user_id = Auth::user()->id;
        $solve = Solver::with('challenge.category')->where("solvers.user_id", "=", $user_id)->get();
        return $solve;
    }

    public function getUnsolveChallenge()
    {
        $user_id = Auth::user()->id;
        $solvedChallengeIds = Solver::where('user_id', $user_id)->pluck('challenge_id');
        $unsolve = Challenge::with('solvers', 'category')
            ->whereNotIn('id', $solvedChallengeIds)
            ->orWhereDoesntHave('solvers')
            ->get();

        return $unsolve;
    }

    public function getChallenges()
    {
        return Challenge::all();
    }

    public function isFlagTrue($id, $flag)
    {
        $chall = Challenge::find($id);
        if ($chall->flag === $flag) {
            return 1;
        } else {
            return 0;
        }
    }

    public function updateScore($challenge_id)
    {
        $challenge = Challenge::with('solvers')->find($challenge_id);
        $solveCount = count($challenge->solvers);
        $score = $challenge->value - (4 * $solveCount);
        if ($score <= 100) {
            $score = 100;
        }
        $challenge->value = $score;
        
        $challenge->save();
    }
}
