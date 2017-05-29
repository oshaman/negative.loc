<?php

use Illuminate\Database\Seeder;

use Oshaman\Publication\Currency;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->insert(
            [
                [
                    'cc'=>'EUR',
                    'rate'=>29.496274,
                    'exchangedate'=>'2017-05-29',
                    'flag'=>1
                ],
                [
                    'cc'=>'USD',
                    'rate'=>26.345368,
                    'exchangedate'=>'2017-05-29',
                    'flag'=>1
                ],
                [
                    'cc'=>'GBP',
                    'rate'=>33.829882,
                    'exchangedate'=>'2017-05-29',
                    'flag'=>1
                ],
                                [
                    'cc'=>'BYN',
                    'rate'=>14.1657,
                    'exchangedate'=>'2017-05-29',
                    'flag'=>1
                ],
                [
                    'cc'=>'RUB',
                    'rate'=>0.46419,
                    'exchangedate'=>'2017-05-29',
                    'flag'=>1
                ]
            ]
        );    
    }
}
