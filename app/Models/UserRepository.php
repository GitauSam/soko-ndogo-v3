<?php
namespace App\Models;

use App\Models\User;
use App\Exception;
use App\Exceptions\UserNotFoundException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use App\Exceptions\FetchOtherUsersException;

class UserRepository {

    public function fetchUser($id) {
        try {
            return User::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new UserNotFoundException($e);
        } 
    }

    public function fetchAllOtherUsers() {
        try {
            return User::all()->except(auth()->user()->id);
        } catch (QueryException $e) {
            throw new FetchOtherUsersException($e);
        }
    }
}
?>