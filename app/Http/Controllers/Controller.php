<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Actions\SolverAction;
use App\Actions\AuthAction;
use App\Actions\ChallengeAction;
use App\Models\User;

class Controller extends BaseController
{
    public function debug(SolverAction $action){
        return User::with('solvers')->get();
        // return $action->getSolver();
    }
}
