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
        DB::table('weathers')->insert([
            ['city'=>'Kiev', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>750,
            'humidity'=>45, 'temp_min'=>25, 'temp_max'=>25, 'clouds'=>45, 'wind_speed'=>5, 'wind_deg'=>254],
            ['city'=>'Lutsk', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>750,
            'humidity'=>45, 'temp_min'=>25, 'temp_max'=>25, 'clouds'=>45, 'wind_speed'=>5, 'wind_deg'=>254],
            ['city'=>'Dnipropetrovsk', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>750,
            'humidity'=>45, 'temp_min'=>25, 'temp_max'=>25, 'clouds'=>45, 'wind_speed'=>5, 'wind_deg'=>254],
            ['city'=>'Zhytomyr', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>750,
            'humidity'=>45, 'temp_min'=>25, 'temp_max'=>25, 'clouds'=>45, 'wind_speed'=>5, 'wind_deg'=>254],
            ['city'=>'Uzhhgorod', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>750,
            'humidity'=>45, 'temp_min'=>25, 'temp_max'=>25, 'clouds'=>45, 'wind_speed'=>5, 'wind_deg'=>254],
            ['city'=>'Zaporizhzhya', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>750,
            'humidity'=>45, 'temp_min'=>25, 'temp_max'=>25, 'clouds'=>45, 'wind_speed'=>5, 'wind_deg'=>254],
            ['city'=>'Ivano-frankivsk', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>750,
            'humidity'=>45, 'temp_min'=>25, 'temp_max'=>25, 'clouds'=>45, 'wind_speed'=>5, 'wind_deg'=>254],
            ['city'=>'Kirovohrad', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>750,
            'humidity'=>45, 'temp_min'=>25, 'temp_max'=>25, 'clouds'=>45, 'wind_speed'=>5, 'wind_deg'=>254],
            ['city'=>'Lviv', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>750,
            'humidity'=>45, 'temp_min'=>25, 'temp_max'=>25, 'clouds'=>45, 'wind_speed'=>5, 'wind_deg'=>254],
            ['city'=>'Mykolayiv', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>750,
            'humidity'=>45, 'temp_min'=>25, 'temp_max'=>25, 'clouds'=>45, 'wind_speed'=>5, 'wind_deg'=>254],
            ['city'=>'Odessa', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>750,
            'humidity'=>45, 'temp_min'=>25, 'temp_max'=>25, 'clouds'=>45, 'wind_speed'=>5, 'wind_deg'=>254],
            ['city'=>'Poltava', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>750,
            'humidity'=>45, 'temp_min'=>25, 'temp_max'=>25, 'clouds'=>45, 'wind_speed'=>5, 'wind_deg'=>254],
            ['city'=>'Rivne', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>750,
            'humidity'=>45, 'temp_min'=>25, 'temp_max'=>25, 'clouds'=>45, 'wind_speed'=>5, 'wind_deg'=>254],
            ['city'=>'Sumy', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>750,
            'humidity'=>45, 'temp_min'=>25, 'temp_max'=>25, 'clouds'=>45, 'wind_speed'=>5, 'wind_deg'=>254],
            ['city'=>'Ternopil', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>750,
            'humidity'=>45, 'temp_min'=>25, 'temp_max'=>25, 'clouds'=>45, 'wind_speed'=>5, 'wind_deg'=>254],
            ['city'=>'Kharkiv', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>750,
            'humidity'=>45, 'temp_min'=>25, 'temp_max'=>25, 'clouds'=>45, 'wind_speed'=>5, 'wind_deg'=>254],
            ['city'=>'Kherson', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>750,
            'humidity'=>45, 'temp_min'=>25, 'temp_max'=>25, 'clouds'=>45, 'wind_speed'=>5, 'wind_deg'=>254],
            ['city'=>'Khmelnytskyy', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>750,
            'humidity'=>45, 'temp_min'=>25, 'temp_max'=>25, 'clouds'=>45, 'wind_speed'=>5, 'wind_deg'=>254],
            ['city'=>'Cherkasy', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>750,
            'humidity'=>45, 'temp_min'=>25, 'temp_max'=>25, 'clouds'=>45, 'wind_speed'=>5, 'wind_deg'=>254],
            ['city'=>'Chernihiv', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>750,
            'humidity'=>45, 'temp_min'=>25, 'temp_max'=>25, 'clouds'=>45, 'wind_speed'=>5, 'wind_deg'=>254],
        ]);
    }
}
