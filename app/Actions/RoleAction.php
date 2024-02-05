<?php

namespace App\Actions;

use App\Models\Role;

class RoleAction
{
    public  function getRole(){
        return Role::get();
    }
    // public function storeUserRole($user_id){
    //     $role_id = Role::where('name', 'User')->first()->id;

    //     $user_role = new UserRole();
    //     $user_role->user_id = $user_id;
    //     $user_role->role_id = $role_id;
    //     $user_role->save();
    // }
}
