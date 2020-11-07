<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateBuyerSeeder extends Seeder
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
                'name' => 'Soko Buyer',
                'email' => 'sokobuyer@sokondogo.com',
                'password' => bcrypt('sokobuyer1234') 
            ]
        );
    }
}
