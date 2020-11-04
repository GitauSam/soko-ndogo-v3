<?php

namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AssignRoles;
use App\Exceptions\UnableToAssignRoleException;
use App\Modules\Roles\RoleManagementActivator;
use App\Modules\Roles\RoleActivator;
use App\Exceptions\FetchRolesException;
use App\Modules\Users\UserActivator;
use Spatie\Permission\Models\Role;

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

    public function getAssignRoles($id) {
        try {
            $userActivator = new UserActivator();
            $user = $userActivator->returnUser($id);
            $roleActivator = new RoleActivator();
            $roles = $roleActivator->returnAllRoles();
            $userRoles = $user->getRoleNames();

            return view('roles.assign', ['user'=>$user, 'roles'=>$roles, 'userRoles'=>$userRoles]);
        } catch (ModelNotFoundException $e) {
            abort();
        } catch (FetchRolesException $e) {
            return redirect()
                ->route('users.index')
                ->with('assign-role-failed', 'Unable to assign role to user');
        }
    }

    public function assignRoles(AssignRoles $request) {

        try {
            if ($request->roles){
                $roleManagementActivator = new RoleManagementActivator();
                $roleManagementActivator->assignRole($request->user_id, $request->roles);
                return redirect()
                    ->route('users.show', $request->user_id)
                    ->with('assign-role-success', 'Assigned role successfully');
            } else {
                throw new UnableToAssignRoleException("No roles to assign");
            }
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
