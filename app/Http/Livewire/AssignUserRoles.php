<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Modules\Users\UserActivator;

class AssignUserRoles extends Component
{

    public $user;
    public $roles;
    public $userRoles;

    public function mount($user, $roles, $userRoles) {
        $this->user = $user;
        $this->roles = $roles;
        $this->userRoles = $userRoles;
    }

    public function removeRole($role) {
        $this->user->removeRole($role);
        $this->userRoles = $this->user->getRoleNames();
        session()->flash('role-revoked', 'Role revoked successfully.');
    }

    public function render()
    {
        return view('livewire.assign-user-roles');
    }
}
