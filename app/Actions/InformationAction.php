<?php

namespace App\Actions;

use App\Models\Information;

class InformationAction
{
    public function getInformation()
    {
        return Information::with('challenges.solvers.user')->get();
    }
}
