<?php

namespace App\Actions;

use App\Models\Solver;
use App\Models\Team;
use App\Models\TeamManage;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TeamManageAction
{
    public function getTeamManage()
    {
        return TeamManage::with('user', 'information', 'team')->get();
    }

    // public function getTeamById($id)
    // {
    //     return Team::find($id);
    // }

    public function storeManage($request)
    {
        $team = new TeamManage();
        $team->information_id = $request['information_id'];
        $team->team_id = $request['team_id'];
        $team->user_id = $request['user_id'];
        $team->save();
    }

    public function deleteManage($id){
        TeamManage::find($id)->delete();
    }

    // public function updateTeam($request, $id){
    //     $team = Team::find($id);
    //     $team->name = $request['name'];
    //     $team->save();
    // }
}
