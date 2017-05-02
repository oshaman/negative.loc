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
                ['title'=>'articles', 'path'=>'http://drop-stat.in.ua/news/category', 'ico'=>'icon-file'],
                ['title'=>'contacts', 'path'=>'http://drop-stat.in.ua/contacts', 'ico'=>'icon-edit'],
                ['title'=>'history', 'path'=>'http://drop-stat.in.ua/history', 'ico'=>'icon-calendar'],
                ['title'=>'world', 'path'=>'http://drop-stat.in.ua/news/category/world', 'ico'=>'icon-picture', 'parent'=>2],
                ['title'=>'incidents', 'path'=>'http://drop-stat.in.ua/news/category/incidents', 'ico'=>'icon-screenshot', 'parent'=>2],
                ['title'=>'economy', 'path'=>'http://drop-stat.in.ua/news/category/economy', 'ico'=>'icon-trash', 'parent'=>2],
                ['title'=>'sport', 'path'=>'http://drop-stat.in.ua/news/category/sport', 'ico'=>'icon-th', 'parent'=>2],
                ['title'=>'politics', 'path'=>'http://drop-stat.in.ua/news/category/politics',  'ico'=>'icon-flag', 'parent'=>2]
            ]
        );
    }
}
