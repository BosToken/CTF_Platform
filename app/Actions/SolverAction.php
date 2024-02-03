<?php

namespace App\Actions;

use App\Models\Solver;
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

    public function isSolve($challenge_id){
        $user_id = Auth::user()->id;
        $solve = new Solver();

        $solve->user_id = $user_id;
        $solve->challenge_id = $challenge_id;

        return $solve->save();
    }
}