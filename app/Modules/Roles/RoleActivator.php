<?php

namespace App\Modules\Roles;

use App\Models\Roles\Repository\RoleRepository;

class RoleActivator {

    public function __construct() {
        return $this->roleRepository = new RoleRepository();
    }

    public function addRole($request) {
        return $this->roleRepository->createRole($request);
    }

    public function editRole($request, $id) {
        return $this->roleRepository->updateRole($request, $id);
    }

    public function returnAllRoles() {
        return $this->roleRepository->fetchAllRoles();
    }
}
?>