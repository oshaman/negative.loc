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
                ['title'=>'home', 'path'=>'http://drop-stat.in.ua', 'ico'=>'icon-home', 'parent'=>0],
                ['title'=>'articles', 'path'=>'http://drop-stat.in.ua/news/category', 'ico'=>'icon-file', 'parent'=>0],
                ['title'=>'contacts', 'path'=>'http://drop-stat.in.ua/contacts', 'ico'=>'icon-edit', 'parent'=>0],
                ['title'=>'history', 'path'=>'http://drop-stat.in.ua/history', 'ico'=>'icon-calendar', 'parent'=>0],
                ['title'=>'world', 'path'=>'http://drop-stat.in.ua/news/category/world', 'ico'=>'icon-picture', 'parent'=>2],
                ['title'=>'incidents', 'path'=>'http://drop-stat.in.ua/news/category/incidents', 'ico'=>'icon-screenshot', 'parent'=>2],
                ['title'=>'economy', 'path'=>'http://drop-stat.in.ua/news/category/economy', 'ico'=>'icon-trash', 'parent'=>2],
                ['title'=>'sport', 'path'=>'http://drop-stat.in.ua/news/category/sport', 'ico'=>'icon-th', 'parent'=>2],
                ['title'=>'politics', 'path'=>'http://drop-stat.in.ua/news/category/politics',  'ico'=>'icon-flag', 'parent'=>2]
            ]
        );
    }
}
