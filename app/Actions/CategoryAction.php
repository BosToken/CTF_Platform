<?php

namespace App\Actions;

use App\Models\Challenge;
use Illuminate\Support\Str;
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

    public function getCategoryById($id)
    {
        $category = ChallengeCategory::find($id);
        return $category;
    }

    public function storeCategory($request)
    {
        $category = new ChallengeCategory();
        $category->id = Str::uuid()->toString();
        $category->name = $request['name'];
        $category->description = $request['description'];
        $category->save();
    }

    public function updateCategory($request, $id)
    {
        $category = ChallengeCategory::find($id);
        $category->name = $request['name'];
        $category->description = $request['description'];
        $category->save();
    }

    public function deleteCategory($id)
    {
        $challenges = Challenge::where('challenges.challenge_categories_id', $id)->get();
        if (count($challenges) === 0) {
            ChallengeCategory::find($id)->delete();
        }
    }
}
