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
                ['name'=>'VIEW_DATA'],
                ['name'=>'EDIT_DATA'],
                ['name'=>'VIEW_ADMIN_ARTICLES'],
                ['name'=>'VIEW_ADMIN_EVENTS'],
            ]
        );
    }
}
