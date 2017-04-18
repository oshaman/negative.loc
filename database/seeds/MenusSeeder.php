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
                ['title'=>'home', 'path'=>'http://negative.loc', 'ico'=>'icon-home'],
                ['title'=>'articles', 'path'=>'http://negative.loc/articles/category', 'ico'=>'icon-file'],
                ['title'=>'history', 'path'=>'http://negative.loc/history', 'ico'=>'icon-calendar'],
                ['title'=>'contacts', 'path'=>'http://negative.loc/contacts', 'ico'=>'icon-edit'],
                ['title'=>'world', 'path'=>'http://negative.loc/articles/category/world', 'ico'=>'icon-picture'],
                ['title'=>'incidents', 'path'=>'http://negative.loc/articles/category/incidents', 'ico'=>'icon-screenshot'],
                ['title'=>'economy', 'path'=>'http://negative.loc/articles/category/economy'],
                ['title'=>'sport', 'path'=>'http://negative.loc/articles/category/sport'],
                ['title'=>'politics', 'path'=>'http://negative.loc/articles/category/politics']
            ]
        );
    }
}
