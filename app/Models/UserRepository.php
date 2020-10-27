<?php
namespace App\Models;

use App\Models\User;
use App\Exception;
use App\Exceptions\UserNotFoundException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserRepository {

    public function fetchUser($id) {
        try {
            return User::firstOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new UserNotFoundException($e);
        } 
    }
}
?>