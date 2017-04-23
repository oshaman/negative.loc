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
                ['title'=>'home', 'path'=>'http://drop-stat.in.ua', 'ico'=>'icon-home'],
                ['title'=>'articles', 'path'=>'http://drop-stat.in.ua/articles/category', 'ico'=>'icon-file'],
                ['title'=>'history', 'path'=>'http://drop-stat.in.ua/history', 'ico'=>'icon-calendar'],
                ['title'=>'contacts', 'path'=>'http://drop-stat.in.ua/contacts', 'ico'=>'icon-edit'],
                ['title'=>'world', 'path'=>'http://drop-stat.in.ua/articles/category/world', 'ico'=>'icon-picture'],
                ['title'=>'incidents', 'path'=>'http://drop-stat.in.ua/articles/category/incidents', 'ico'=>'icon-screenshot'],
                ['title'=>'economy', 'path'=>'http://drop-stat.in.ua/articles/category/economy', 'ico'=>'icon-trash'],
                ['title'=>'sport', 'path'=>'http://drop-stat.in.ua/articles/category/sport', 'ico'=>'icon-th'],
                ['title'=>'politics', 'path'=>'http://drop-stat.in.ua/articles/category/politics',  'ico'=>'icon-flag']
            ]
        );
    }
}
