<?php

namespace App\View\Components\navbar;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     */
    public $user, $isAdmin = 0;
    public function __construct()
    {
        if (Auth::check()) {
            $checkRole = User::with('role.role')->find(Auth::user()->id);
            if ($checkRole->role->role->name === "Admin") {
                $this->isAdmin = 1;
            } else {
                $this->isAdmin = 0;
            }
            $this->user = Auth::user();
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar.navbar');
    }
}
