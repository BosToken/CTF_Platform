<?php

namespace App\Actions;

use App\Models\Challenge;
use App\Models\Information;
use App\Models\TeamManage;

class InformationAction
{
    public function getInformation()
    {
        return Information::get();
    }

    public function getAllInformation()
    {
        return Information::with('challenges.solvers.user', 'challenges.category', 'manages')->get();
    }

    public function storeInformation($requst)
    {
        $information = new Information();
        $information->information = $requst['information'];
        $information->description = $requst['description'];
        $information->save();
    }

    public function getInformationById($id)
    {
        $information = Information::find($id);
        return $information;
    }

    public function updateInformation($request, $id)
    {
        $information = Information::find($id);
        $information->information = $request['information'];
        $information->description = $request['description'];
        $information->save();
    }

    public function deleteInformation($id)
    {
        $challenges = Challenge::where('challenges.information_id', $id)->get();
        if (count($challenges) === 0) {
            TeamManage::where('information_id', $id)->delete();
            Information::find($id)->delete();
        }
    }
}
