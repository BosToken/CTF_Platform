<?php

namespace App\Http\Controllers;

use App\Actions\CategoryAction;
use App\Actions\ChallengeAction;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function challenges(ChallengeAction $challengeAction)
    {
        $challenges = $challengeAction->getChallenge();
        return view('page.admin.challenge', compact('challenges'));
    }

    public function categories(CategoryAction $categoryAction)
    {
        $categories = $categoryAction->getCategory();
        return view('page.admin.category', compact('categories'));
    }

    public function createChallenge(CategoryAction $categoryAction)
    {
        $categories = $categoryAction->getCategory();
        return view('page.admin.create-challenge', compact('categories'));
    }

    public function createCategory()
    {
        return view('page.admin.create-category');
    }

    public function storeChallenge(Request $request, ChallengeAction $challengeAction)
    {
        $challengeAction->storeChallenge($request);
        return redirect()->route('admin-challenges');
    }

    public function storeCategory(Request $requestd, CategoryAction $categoryAction)
    {
        $categoryAction->storeCategory($requestd);
        return redirect()->route('admin-categories');
    }

    public function detailChallenge($id, ChallengeAction $challengeAction, CategoryAction $categoryAction)
    {
        $challenge = $challengeAction->getChallengeById($id);
        $categories = $categoryAction->getCategory();
        $category = $categoryAction->getCategoryById($challenge->challenge_categories_id);
        return view('page.admin.detail-challenge', compact('challenge', 'category', 'categories'));
    }

    public function detailCategory($id, CategoryAction $categoryAction)
    {
        $category = $categoryAction->getCategoryById($id);
        return view('page.admin.detail-category', compact('category'));
    }

    public function updateChallenge(Request $request, $id, ChallengeAction $challengeAction)
    {
        $challengeAction->updateChallenge($request, $id);
        return back();
    }

    public function updateCategory(Request $request, $id, CategoryAction $categoryAction)
    {
        $categoryAction->updateCategory($request, $id);
        return back();
    }

    public function deleteChallenge($id, ChallengeAction $challengeAction)
    {
        $challengeAction->deleteChallenge($id);
        return redirect()->route('admin-challenges');
    }

    public function deleteCategory($id, CategoryAction $categoryAction)
    {
        $categoryAction->deleteCategory($id);
        return redirect()->route('admin-categories');
    }
}
