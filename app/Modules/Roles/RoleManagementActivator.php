<?php
namespace App\Modules\Roles;

use App\Modules\Users\UserActivator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Exceptions\UnableToAssignRoleException;

class RoleManagementActivator {

    public function assignRole($user_id, $roles) {
        try {
            $userActivator = new UserActivator();
            $user = $userActivator->returnUser($user_id);
            $user->assignRole($roles);
        } catch (Exception $e) {
            throw new UnableToAssignRoleException($e);
        }
    }
}

?>