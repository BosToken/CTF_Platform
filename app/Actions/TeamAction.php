<?php

namespace App\Actions;

use App\Models\Team;
use App\Models\TeamManage;

class TeamAction
{
    public function getTeam()
    {
        return Team::get();
    }

    public function getTeamById($id)
    {
        return Team::find($id);
    }

    public function storeTeam($request)
    {
        $team = new Team();
        $team->name = $request['name'];
        $team->save();
    }

    public function updateTeam($request, $id){
        $team = Team::find($id);
        $team->name = $request['name'];
        $team->save();
    }

    public function deleteTeam($id){
        TeamManage::where('team_id', $id)->delete();
        Team::find($id)->delete();
    }
}
