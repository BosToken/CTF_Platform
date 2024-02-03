<?php

namespace App\Actions;

use App\Models\ChallengeCategory;
use Illuminate\Support\Facades\DB;

class CategoryAction
{
    /**
     * @param \Illuminate\Http\Request
     * @return false|string $token
     */

    public function getCategory()
    {
        return ChallengeCategory::get();
    }
}