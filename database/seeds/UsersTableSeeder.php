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
        DB::table('users')->insert(
            [
                ['name'=>'user1', 'email'=>'user1@mail.com', 'password'=>bcrypt('111222')],
                ['name'=>'user2', 'email'=>'user2@mail.com', 'password'=>bcrypt('111222')],
            ]
        );
    }
}
