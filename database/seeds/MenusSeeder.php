<?php

use Illuminate\Database\Seeder;

class MenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert(
            [
                ['title'=>'home', 'path'=>'http://negative.loc'],
                ['title'=>'articles', 'path'=>'http://negative.loc/articles'],
                ['title'=>'history', 'path'=>'http://negative.loc/history'],
                ['title'=>'contacts', 'path'=>'http://negative.loc/contacts'],
                ['title'=>'world', 'path'=>'http://negative.loc/articles/category/world'],
                ['title'=>'incidents', 'path'=>'http://negative.loc/articles/category/incidents'],
                ['title'=>'economy', 'path'=>'http://negative.loc/articles/category/economy'],
                ['title'=>'sport', 'path'=>'http://negative.loc/articles/category/sport'],
                ['title'=>'politics', 'path'=>'http://negative.loc/articles/category/politics']
            ]
        );
    }
}
