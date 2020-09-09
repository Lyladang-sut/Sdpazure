<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [ 
                'username'  => 'Lim Socheat', 
                'email'     => 'limsocheat111@gmail.com',
                'password'  => Hash::make( 'password' ),
            ]
        ]);
    }
}
