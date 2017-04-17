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
                ['title'=>'Події', 'alias'=>'incidents'],
                ['title'=>'Економіка', 'alias'=>'economy'],
                ['title'=>'Спорт', 'alias'=>'sport'],
                ['title'=>'Політика', 'alias'=>'politics'],
                ['title'=>'У світі', 'alias'=>'world'],
            ]
        );
    }
}
