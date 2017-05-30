<?php

use Illuminate\Database\Seeder;

class WeathersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Db::table('weathers')->insert([
            ['city'=>'kiev', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>750,
            'humidity'=>45, 'temp_min'=>25, 'temp_max'=>25, 'clouds'=>45, 'wind_speed'=>5, 'wind_speed'=>254],
            ['city'=>'lutsk', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>750,
            'humidity'=>45, 'temp_min'=>25, 'temp_max'=>25, 'clouds'=>45, 'wind_speed'=>5, 'wind_speed'=>254],
            ['city'=>'dnipropetrovsk', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>750,
            'humidity'=>45, 'temp_min'=>25, 'temp_max'=>25, 'clouds'=>45, 'wind_speed'=>5, 'wind_speed'=>254],
            ['city'=>'zhytomyr', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>750,
            'humidity'=>45, 'temp_min'=>25, 'temp_max'=>25, 'clouds'=>45, 'wind_speed'=>5, 'wind_speed'=>254],
            ['city'=>'uzhhgorod', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>750,
            'humidity'=>45, 'temp_min'=>25, 'temp_max'=>25, 'clouds'=>45, 'wind_speed'=>5, 'wind_speed'=>254],
            ['city'=>'zaporizhzhya', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>750,
            'humidity'=>45, 'temp_min'=>25, 'temp_max'=>25, 'clouds'=>45, 'wind_speed'=>5, 'wind_speed'=>254],
            ['city'=>'ivano-frankivsk', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>750,
            'humidity'=>45, 'temp_min'=>25, 'temp_max'=>25, 'clouds'=>45, 'wind_speed'=>5, 'wind_speed'=>254],
            ['city'=>'kirovohrad', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>750,
            'humidity'=>45, 'temp_min'=>25, 'temp_max'=>25, 'clouds'=>45, 'wind_speed'=>5, 'wind_speed'=>254],
            ['city'=>'lviv', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>750,
            'humidity'=>45, 'temp_min'=>25, 'temp_max'=>25, 'clouds'=>45, 'wind_speed'=>5, 'wind_speed'=>254],
            ['city'=>'mykolayiv', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>750,
            'humidity'=>45, 'temp_min'=>25, 'temp_max'=>25, 'clouds'=>45, 'wind_speed'=>5, 'wind_speed'=>254],
            ['city'=>'odessa', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>750,
            'humidity'=>45, 'temp_min'=>25, 'temp_max'=>25, 'clouds'=>45, 'wind_speed'=>5, 'wind_speed'=>254],
            ['city'=>'poltava', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>750,
            'humidity'=>45, 'temp_min'=>25, 'temp_max'=>25, 'clouds'=>45, 'wind_speed'=>5, 'wind_speed'=>254],
            ['city'=>'rivne', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>750,
            'humidity'=>45, 'temp_min'=>25, 'temp_max'=>25, 'clouds'=>45, 'wind_speed'=>5, 'wind_speed'=>254],
            ['city'=>'sumy', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>750,
            'humidity'=>45, 'temp_min'=>25, 'temp_max'=>25, 'clouds'=>45, 'wind_speed'=>5, 'wind_speed'=>254],
            ['city'=>'ternopil', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>750,
            'humidity'=>45, 'temp_min'=>25, 'temp_max'=>25, 'clouds'=>45, 'wind_speed'=>5, 'wind_speed'=>254],
            ['city'=>'kharkiv', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>750,
            'humidity'=>45, 'temp_min'=>25, 'temp_max'=>25, 'clouds'=>45, 'wind_speed'=>5, 'wind_speed'=>254],
            ['city'=>'kherson', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>750,
            'humidity'=>45, 'temp_min'=>25, 'temp_max'=>25, 'clouds'=>45, 'wind_speed'=>5, 'wind_speed'=>254],
            ['city'=>'khmelnytskyy', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>750,
            'humidity'=>45, 'temp_min'=>25, 'temp_max'=>25, 'clouds'=>45, 'wind_speed'=>5, 'wind_speed'=>254],
            ['city'=>'cherkasy', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>750,
            'humidity'=>45, 'temp_min'=>25, 'temp_max'=>25, 'clouds'=>45, 'wind_speed'=>5, 'wind_speed'=>254],
            ['city'=>'chernihiv', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>750,
            'humidity'=>45, 'temp_min'=>25, 'temp_max'=>25, 'clouds'=>45, 'wind_speed'=>5, 'wind_speed'=>254],
        ]);
    }
}
