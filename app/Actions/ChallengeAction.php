<?php

namespace App\Actions;

use App\Models\ChallengeCategory;
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
}