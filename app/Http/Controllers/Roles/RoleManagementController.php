<?php

namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AssignRoles;
use App\Exceptions\UnableToAssignRoleException;
use App\Modules\Roles\RoleManagementActivator;
use App\Modules\Roles\RoleActivator;
use App\Exceptions\FetchRolesException;

class RoleManagementController extends Controller
{
    function __construct() 
    {
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', 
        ['only' => ['index']]);
        $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    public function getAssignRole($id) {
        dd($id);
        try {
            $userActivator = new UserActivator();
            $user = $userActivator->returnUser($id);
            $roleActivator = new RoleActivator();
            $roles = $roleActivator->returnAllRoles();

            return view('roles.assign', ['user'=>$user, 'roles'=>$roles]);
        } catch (ModelNotFoundException $e) {
            abort();
        } catch (FetchRolesException $e) {
            return redirect()
                ->route('users.index')
                ->with('assign-role-failed', 'Unable to assign role to user');
        }
    }

    public function assignRole(AssignRoles $request) {
        try {
            $roleManagementActivator = new RoleManagementActivator($request->user_id);
            $roleManagementActivator->assignRole($request->roles);
            return redirect()
                ->route('users.show', 
                    ['id'=>$request->user_id])
                ->with('assign-role-success', 'Assigned role successfully');
        } catch (ModelNotFoundException $e) {
            abort();
        } catch (UnableToAssignRoleException $e) {
            return redirect()
                ->route('users.show', 
                    ['id'=>$request->user_id])
                ->with('assign-role-failed', 'Unable to assign role to user');
        }
    }
}
