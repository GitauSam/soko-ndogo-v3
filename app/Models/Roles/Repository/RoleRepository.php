<?php
namespace App\Models\Roles\Repository;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Exceptions\CreateRoleException;
use App\Exceptions\RoleNotFoundException;
use App\Exceptions\FetchRolesException;
use App\Exceptions\RoleUpdateUnsuccessfulException;
use Illuminate\Database\QueryException;

class RoleRepository {

    public function createRole($request) {
        try {
            $role = Role::create(['name' => $request->input('name'),
                                    'guard_name' => 'web']);        
            $role->syncPermissions($request->input('permission'));
        } catch(QueryException $e) {
            throw new CreateRoleException($e);
        }
    }
    
    public function updateRole($request, $id) {
        try {
            $role = Role::findOrFail($id);
            $role->name = $request->input('name');
            $role->save();

            if ($request->permission && count($request->permission) > 0) {
                foreach($request->permission as $p) {
                    $role->givePermissionTo($p);
                }
            }

        } catch (ModelNotFoundException $e) {
            throw new RoleNotFoundException($e);
        } catch (QueryException $e) {
            throw new RoleUpdateUnsuccessfulException($e);
        }
    }

    public function fetchAllRoles() {
        try {
            return Role::all();
        } catch (QueryException $e) {
            throw new FetchRolesException($e);
        }
    }

}
?>