<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // $user = User::create(
        //         [
        //             'name' => 'Soko Ndogo',
        //             'email' => 'admin@sokondogo.com',
        //             'password' => bcrypt('soko1234')
        //         ]
        //     );

        $user = User::find(8);
            
        // $role = Role::create(['name' => 'Admin']);
        $permissions = Permission::pluck('id','id')->all();
        // $role->syncPermissions($permissions);
        $user->assignRole(4);
    }
}
