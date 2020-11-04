<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exceptions\FetchOtherUsersException;
use App\Exceptions\UserNotFoundException;
use App\Modules\Users\UserActivator;
use App\Models\User;

class UserController extends Controller
{

    function __construct() 
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', 
        ['only' => ['index']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try {
            $userActivator = new UserActivator();
            $users = $userActivator->returnAllOtherUsers();

            return view('users.index', ["users" => $users]);
        } catch (FetchOtherUsersException $e) {
            // put logic to handle exception here
        } catch (\Exception $e) {
            // put logic to handle exception here
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        try {
            $userActivator = new UserActivator();
            $user = $userActivator->returnUser($id);
            $userRoles = $user->getRoleNames();

            return view('users.show', 
                    [
                        "user" => $user,
                        "userRoles" => $userRoles
                    ]);
        } catch (UserNotFoundException $e) {
            // put logic to handle exception here
        } catch (\Exception $e) {
            // put logic to handle exception here
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
