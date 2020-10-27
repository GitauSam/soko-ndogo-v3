<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateSellerUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::create(
            [
                'name' => 'Soko Seller',
                'email' => 'sokoseller@sokondogo.com',
                'password' => bcrypt('sokoseller1234')
            ]
        );
    }
}
