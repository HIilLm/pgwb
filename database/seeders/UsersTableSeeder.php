<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'Roger',
                'email' => 'serigala@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$Jl39Pz5hswIzx9meIWUhyOMV3LAuzDRJ0lrTETMIP4eZIVBb54g32',
                'remember_token' => NULL,
                'created_at' => '2022-10-10 01:29:21',
                'updated_at' => '2022-10-10 01:29:21',
            ),
        ));
        
        
    }
}