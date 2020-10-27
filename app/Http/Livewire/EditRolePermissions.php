<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class EditRolePermissions extends Component
{

    public $roleId; 
    public $permission;
    public $rolePermissions;

    public function mount($roleId) {
        $this->roleId = $roleId;
    }

    public function removePermission($id) {
        $permissionToRevoke = Permission::find($id);
        Role::find($this->roleId)->revokePermissionTo($permissionToRevoke->name);
        session()->flash('permission-revoked', 'Permission revoked successfully.');
    }

    public function render()
    {

        $this->permission = Permission::get();
        $this->rolePermissions = DB::table("role_has_permissions")
                            ->where("role_has_permissions.role_id",$this->roleId)
                            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
                            ->all();
        
        return view('livewire.edit-role-permissions');
    }
}
