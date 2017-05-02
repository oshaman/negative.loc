<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            [
                ['title'=>'main', 'parent_id'=>0],
                ['title'=>'incidents', 'parent_id'=>1],
                ['title'=>'economy', 'parent_id'=>1],
                ['title'=>'sport', 'parent_id'=>1],
                ['title'=>'politics', 'parent_id'=>1],
                ['title'=>'world', 'parent_id'=>1],
            ]
        );
    }
}
