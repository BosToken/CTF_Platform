<?php

namespace App\Actions;

use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;

class UserRoleAction
{
    public function storeUserRole($user_id){
        $role_id = Role::where('name', 'User')->first()->id;

        $user_role = new UserRole();
        $user_role->user_id = $user_id;
        $user_role->role_id = $role_id;
        $user_role->save();
    }

    public function updateRole($id, $role_id){
        $user_role = UserRole::find($id);
        $user_role->role_id = $role_id;
        $user_role->save();
    }
}
