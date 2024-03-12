<?php

namespace App\Actions;

use App\Models\Solver;
use App\Models\User;
use App\Models\TeamManage;
use App\Models\UserRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserAction
{
    public function getuser()
    {
        return User::get();
    }

    public function getByUsername($username)
    {
        $user = User::with('solvers.challenge.category')->where('users.username', $username)->get();
        return $user;
    }

    public function getUserById($id)
    {
        $user = User::with('role.role')->find($id);
        return $user;
    }

    public function storeUser($request, UserRoleAction $roleAction)
    {
        $id = Str::uuid()->toString();
        $user = new User();

        $user->id = $id;
        $user->username = $request['username'];
        $user->name = $request['name'];
        $user->password = Hash::make($request['password']);
        $user->email = $request['email'];
        $user->save();

        $roleAction->storeUserRole($id);

        $content = [$request['name'], $request['username'], $request['password']];
        $this->mail($user->email, $content);
    }

    public function updateUser($request, $id)
    {
        $user = User::find($id);
        $user->username = $request['username'];
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->visible = $request['visible'];
        $user->save();
    }

    public function deleteUser($id)
    {
        if (!(Auth::user()->id === $id)) {
            Solver::where('solvers.user_id', $id)->delete();
            TeamManage::where('user_id', $id)->delete();
            UserRole::where('user_id', $id)->delete();
            User::find($id)->delete();
        }
    }

    public function mail($email, $content){
        Mail::send('page.user.mail', ['content' => $content], function ($message) use ($email) {
            $message->to($email);
            $message->subject('Legicomp Account');
        });
    }
}
