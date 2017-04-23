<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(MenusSeeder::class);
        $this->call(PermissionsSeeder::class);
        $this->call(EventsSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(ArticlesSeeder::class);
    }
}
