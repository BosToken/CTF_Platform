<?php

namespace App\Http\Controllers;

use App\Actions\CategoryAction;
use App\Actions\ChallengeAction;
use App\Actions\InformationAction;
use App\Actions\TeamAction;
use App\Actions\TeamManageAction;
use App\Actions\UserAction;
use Barryvdh\DomPDF\Facade\Pdf;
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

    public function informations(InformationAction $informationAction)
    {
        $informations = $informationAction->getInformation();
        return view('page.admin.information', compact('informations'));
    }

    public function teams(TeamAction $teamAction)
    {
        $teams = $teamAction->getTeam();
        return view('page.admin.team', compact('teams'));
    }

    public function teamManage(TeamManageAction $teamManageAction)
    {
        $manages = $teamManageAction->getTeamManage();
        return view('page.admin.team-manage', compact('manages'));
    }

    public function report($id, InformationAction $informationAction){
        $information = $informationAction->getAllInformationById($id);
        return view('page.admin.report', compact('information'));
    }

    public function reportDownload($id, InformationAction $informationAction){
        $information = $informationAction->getAllInformationById($id);
        $title = $information->information;
        $data = [
            'information' => $information
        ];
        $pdf = Pdf::loadView('page.admin.report', $data);
        return $pdf->download('Training_Report-'.$title.'.pdf');
    }

    public function dashboard(InformationAction $informationAction)
    {
        $informations = $informationAction->getAllInformation();
        return view('page.admin.dashboard', compact('informations'));
    }

    public function users(UserAction $userAction)
    {
        $users = $userAction->getuser();
        return view('page.admin.user', compact('users'));
    }

    public function createChallenge(CategoryAction $categoryAction, InformationAction $informationAction)
    {
        $informations = $informationAction->getInformation();
        $categories = $categoryAction->getCategory();
        return view('page.admin.create-challenge', compact('categories', 'informations'));
    }

    public function createCategory()
    {
        return view('page.admin.create-category');
    }

    public function createInformation()
    {
        return view('page.admin.create-information');
    }

    public function createUser()
    {
        return view('page.admin.create-user');
    }

    public function createTeam()
    {
        return view('page.admin.create-team');
    }

    public function createManage(InformationAction $informationAction, TeamAction $teamAction, UserAction $userAction)
    {
        $informations = $informationAction->getInformation();
        $teams = $teamAction->getTeam();
        $users = $userAction->getuser();
        return view('page.admin.create-team-manage', compact('informations', 'teams', 'users'));
    }

    public function storeChallenge(Request $request, ChallengeAction $challengeAction)
    {
        $challengeAction->storeChallenge($request);;
        return redirect()->route('admin-challenges');
    }

    public function storeCategory(Request $requestd, CategoryAction $categoryAction)
    {
        $categoryAction->storeCategory($requestd);
        return redirect()->route('admin-categories');
    }

    public function storeInformation(Request $request, InformationAction $informationAction)
    {
        $informationAction->storeInformation($request);
        return redirect()->route('admin-informations');
    }

    public function storeUser(Request $request, UserAction $userAction)
    {
        $userAction->storeUser($request);
        return redirect()->route('admin-users');
    }

    public function storeTeam(Request $request, TeamAction $teamAction)
    {
        $teamAction->storeTeam($request);
        return redirect()->route('admin-teams');
    }

    public function storeManage(Request $request, TeamManageAction $teamManageAction)
    {
        $teamManageAction->storeManage($request);
        return redirect()->route('admin-team-manages');
    }

    public function detailChallenge($id, ChallengeAction $challengeAction, CategoryAction $categoryAction, InformationAction $informationAction)
    {
        $challenge = $challengeAction->getChallengeById($id);
        $categories = $categoryAction->getCategory();
        $category = $categoryAction->getCategoryById($challenge->challenge_categories_id);
        $informations = $informationAction->getInformation();
        $information = $informationAction->getInformationById($challenge->information_id);
        return view('page.admin.detail-challenge', compact('challenge', 'category', 'categories', 'informations', 'information'));
    }

    public function detailCategory($id, CategoryAction $categoryAction)
    {
        $category = $categoryAction->getCategoryById($id);
        return view('page.admin.detail-category', compact('category'));
    }

    public function detailInformation($id, InformationAction $informationAction)
    {
        $information = $informationAction->getInformationById($id);
        return view('page.admin.detail-information', compact('information'));
    }

    public function detailUser($id, UserAction $userAction)
    {
        $user = $userAction->getUserById($id);
        return view('page.admin.detail-user', compact('user'));
    }

    public function detailTeam($id, TeamAction $teamAction)
    {
        $team = $teamAction->getTeamById($id);
        return view('page.admin.detail-team', compact('team'));
    }

    public function updateChallenge(Request $request, $id, ChallengeAction $challengeAction)
    {
        $challengeAction->updateChallenge($request, $id);
        return redirect()->route('admin-challenges');
    }

    public function updateCategory(Request $request, $id, CategoryAction $categoryAction)
    {
        $categoryAction->updateCategory($request, $id);
        return redirect()->route('admin-categories');
    }

    public function updateInformation(Request $request, $id, InformationAction $informationAction)
    {
        $informationAction->updateInformation($request, $id);
        return redirect()->route('admin-informations');
    }

    public function updateTeam(Request $request, $id, TeamAction $teamAction)
    {
        $teamAction->updateTeam($request, $id);
        return redirect()->route('admin-teams');
    }

    public function updateUser(Request $request, $id, UserAction $userAction)
    {
        $userAction->updateUser($request, $id);
        return redirect()->route('admin-users');
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

    public function deleteInformation($id, InformationAction $informationAction)
    {
        $informationAction->deleteInformation($id);
        return redirect()->route('admin-informations');
    }

    public function deleteUser($id, UserAction $userAction)
    {
        $userAction->deleteUser($id);
        return redirect()->route('admin-users');
    }

    public function deleteTeam($id, TeamAction $teamAction)
    {
        $teamAction->deleteTeam($id);
        return redirect()->route('admin-teams');
    }

    public function deleteManage($id, TeamManageAction $teamManageAction)
    {
        $teamManageAction->deleteManage($id);
        return redirect()->route('admin-team-manages');
    }
}
