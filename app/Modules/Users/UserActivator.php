<?php
namespace App\Modules\Users;

use App\Models\UserRepository;

class UserActivator {

    public function returnUser($id) {
        return UserRepository::fetchUser($userId);
    }
}
?>