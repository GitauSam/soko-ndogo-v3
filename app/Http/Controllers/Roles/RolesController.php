<?php

namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\UpdateRole;
use App\Http\Requests\CreateRole;
use App\Modules\Roles\RoleActivator;
use App\Exception;
use App\Exceptions\CreateRoleException;
use App\Exceptions\RoleNotFoundException;
use App\Exceptions\RoleUpdateUnsuccessfulException;
use DB;

class RolesController extends Controller
{

    function __construct() 
    {
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', 
        ['only' => ['index']]);
        $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $roles = Role::orderBy('id','DESC')
                    ->paginate(5);
        
        $header = "Roles";

        // dump($roles);
        
        return view('roles.index',['roles' => $roles, 'header' => $header])
                    ->with('i', ($request->input('page', 1) - 1) * 5);
        // return \View::make('roles.index')->nest('header', 'layouts.app')
        //             ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $permission = Permission::get();
        
        return view('roles.create',compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRole $request)
    {

        try {
            $roleActivator = new RoleActivator();
            $roleActivator->addRole($request);

            return redirect()
                    ->route('roles.index')
                    ->with('success','Role created successfully');
        } catch (CreateRoleException $e) {
            return redirect()->route('roles.index')
                ->with('unsuccessful','Role was not created successfully');
        } catch (Exception $e) {
            return redirect()->route('roles.index')
                ->with('unsuccessful','Role was not created successfully');
        }
        
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
        $role = Role::find($id);
        $rolePermissions = Permission
                            ::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
                            ->where("role_has_permissions.role_id",$id)
                            ->get();
                            
        return view('roles.show',compact('role','rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $role = Role::find($id);
        return view('roles.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRole $request, $id)
    {
        
        try {
            $roleActivator = new RoleActivator();
            $roleActivator->editRole($request, $id);

            return redirect()->route('roles.index')
                ->with('success','Role updated successfully');
        } catch (RoleNotFoundException $e) {
            return redirect()->route('roles.index')
                ->with('unsuccessful','Role was not found');
        } catch (RoleUpdateUnsuccessfulException $e) {
            return redirect()->route('roles.edit', $role->id)
                ->with('unsuccessful','Role was not updated successfully');
        } catch (Exception $e) {
            return redirect()->route('roles.edit', $role->id)
                ->with('unsuccessful','Role was not updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        DB::table("roles")
            ->where('id',$id)
            ->delete();
        
        return redirect()
                    ->route('roles.index')
                    ->with('success','Role deleted successfully');
    }
}
