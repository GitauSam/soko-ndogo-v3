<?php

namespace App\Modules\Roles;

use App\Models\Roles\Repository\RoleRepository;

class RoleActivator {

    public function __construct() {
        $this->roleRepository = new RoleRepository();
    }

    public function addRole($request) {
        $this->roleRepository->createRole($request);
    }

    public function editRole($request, $id) {
        $this->roleRepository->updateRole($request, $id);
    }

    public function returnAllRoles() {
        $this->roleRepository->fetchAllRoles();
    }
}
?>