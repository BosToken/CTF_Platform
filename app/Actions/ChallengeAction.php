<?php

namespace App\Actions;

use Illuminate\Support\Str;
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

    public function getChallengeById($id){
        $challenge = Challenge::find($id);
        return $challenge;
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
        if ($challenge->challenge_type === 1) {

            $solveCount = count($challenge->solvers);
            $score = $challenge->value - (4 * $solveCount);
            if ($score <= 100) {
                $score = 100;
            }
            $challenge->value = $score;

            $challenge->save();
        }
    }

    public function storeChallenge($request)
    {
        $challenge = new Challenge();
        $challenge->id = Str::uuid()->toString();
        $challenge->name = $request['name'];
        $challenge->challenge_categories_id = $request['challenge_categories_id'];
        $challenge->message = $request['message'];
        $challenge->flag = $request['flag'];
        $challenge->value = $request['value'];
        $challenge->challenge_type = $request['challenge_type'];
        $challenge->save();
    }

    public function updateChallenge($request, $id){
        $challenge = Challenge::find($id);
        $challenge->name = $request['name'];
        $challenge->challenge_categories_id = $request['challenge_categories_id'];
        $challenge->message = $request['message'];
        $challenge->flag = $request['flag'];
        $challenge->value = $request['value'];
        $challenge->challenge_type = $request['challenge_type'];
        $challenge->save();
    }

    public function deleteChallenge($id){
        Solver::where("solvers.challenge_id", $id)->delete();
        Challenge::find($id)->delete();
    }
}
