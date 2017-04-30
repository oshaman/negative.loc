<?php

use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert(
            [
                ['name'=>'ADMIN_USERS'],
                ['name'=>'CONFIRMATION_DATA'],
                ['name'=>'VIEW_ADMIN'],
                //  events
                ['name'=>'ADD_EVENTS'],
                ['name'=>'UPDATE_EVENTS'],
                ['name'=>'DELETE_EVENTS'],
                //  articles
                ['name'=>'ADD_ARTICLES'],
                ['name'=>'UPDATE_ARTICLES'],
                ['name'=>'DELETE_ARTICLES'],
            ]
        );
    }
}
