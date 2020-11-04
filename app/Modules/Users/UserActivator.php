<?php
namespace App\Modules\Users;

use App\Models\UserRepository;

class UserActivator {

    public $userRepository; 

    public function __construct() {
        $this->userRepository = new UserRepository();
    }

    public function returnUser($id) {
        return $this->userRepository->fetchUser($id);
    }

    public function revokeUserPermission($user, $role) {
        return $user->removeRole($role);
    }

    public function returnAllOtherUsers() {
        return $this->userRepository->fetchAllOtherUsers();
    }
}
?>