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
            ['city'=>'Kiev', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>888,
            'humidity'=>45, 'temp_curr'=>1, 'temp_min'=>77, 'temp_max'=>77, 'clouds'=>45, 'wind_speed'=>5, 'wind_deg'=>774],
            ['city'=>'Lutsk', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>888,
            'humidity'=>45, 'temp_curr'=>1, 'temp_min'=>77, 'temp_max'=>77, 'clouds'=>45, 'wind_speed'=>5, 'wind_deg'=>774],
            ['city'=>'Dnipropetrovsk', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>888,
            'humidity'=>45, 'temp_curr'=>1, 'temp_min'=>77, 'temp_max'=>77, 'clouds'=>45, 'wind_speed'=>5, 'wind_deg'=>774],
            ['city'=>'Zhytomyr', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>888,
            'humidity'=>45, 'temp_curr'=>1, 'temp_min'=>77, 'temp_max'=>77, 'clouds'=>45, 'wind_speed'=>5, 'wind_deg'=>774],
            ['city'=>'Uzhhorod', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>888,
            'humidity'=>45, 'temp_curr'=>1, 'temp_min'=>77, 'temp_max'=>77, 'clouds'=>45, 'wind_speed'=>5, 'wind_deg'=>774],
            ['city'=>'Zaporizhzhya', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>888,
            'humidity'=>45, 'temp_curr'=>1, 'temp_min'=>77, 'temp_max'=>77, 'clouds'=>45, 'wind_speed'=>5, 'wind_deg'=>774],
            ['city'=>'Ivano-Frankivsk', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>888,
            'humidity'=>45, 'temp_curr'=>1, 'temp_min'=>77, 'temp_max'=>77, 'clouds'=>45, 'wind_speed'=>5, 'wind_deg'=>774],
            ['city'=>'Kirovohrad', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>888,
            'humidity'=>45, 'temp_curr'=>1, 'temp_min'=>77, 'temp_max'=>77, 'clouds'=>45, 'wind_speed'=>5, 'wind_deg'=>774],
            ['city'=>'Lviv', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>888,
            'humidity'=>45, 'temp_curr'=>1, 'temp_min'=>77, 'temp_max'=>77, 'clouds'=>45, 'wind_speed'=>5, 'wind_deg'=>774],
            ['city'=>'Mykolayiv', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>888,
            'humidity'=>45, 'temp_curr'=>1, 'temp_min'=>77, 'temp_max'=>77, 'clouds'=>45, 'wind_speed'=>5, 'wind_deg'=>774],
            ['city'=>'Odessa', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>888,
            'humidity'=>45, 'temp_curr'=>1, 'temp_min'=>77, 'temp_max'=>77, 'clouds'=>45, 'wind_speed'=>5, 'wind_deg'=>774],
            ['city'=>'Poltava', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>888,
            'humidity'=>45, 'temp_curr'=>1, 'temp_min'=>77, 'temp_max'=>77, 'clouds'=>45, 'wind_speed'=>5, 'wind_deg'=>774],
            ['city'=>'Rivne', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>888,
            'humidity'=>45, 'temp_curr'=>1, 'temp_min'=>77, 'temp_max'=>77, 'clouds'=>45, 'wind_speed'=>5, 'wind_deg'=>774],
            ['city'=>'Sumy', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>888,
            'humidity'=>45, 'temp_curr'=>1, 'temp_min'=>77, 'temp_max'=>77, 'clouds'=>45, 'wind_speed'=>5, 'wind_deg'=>774],
            ['city'=>'Ternopil', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>888,
            'humidity'=>45, 'temp_curr'=>1, 'temp_min'=>77, 'temp_max'=>77, 'clouds'=>45, 'wind_speed'=>5, 'wind_deg'=>774],
            ['city'=>'Kharkiv', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>888,
            'humidity'=>45, 'temp_curr'=>1, 'temp_min'=>77, 'temp_max'=>77, 'clouds'=>45, 'wind_speed'=>5, 'wind_deg'=>774],
            ['city'=>'Kherson', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>888,
            'humidity'=>45, 'temp_curr'=>1, 'temp_min'=>77, 'temp_max'=>77, 'clouds'=>45, 'wind_speed'=>5, 'wind_deg'=>774],
            ['city'=>'Khmelnytskyy', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>888,
            'humidity'=>45, 'temp_curr'=>1, 'temp_min'=>77, 'temp_max'=>77, 'clouds'=>45, 'wind_speed'=>5, 'wind_deg'=>774],
            ['city'=>'Cherkasy', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>888,
            'humidity'=>45, 'temp_curr'=>1, 'temp_min'=>77, 'temp_max'=>77, 'clouds'=>45, 'wind_speed'=>5, 'wind_deg'=>774],
            ['city'=>'Chernihiv', 'sunrise'=>'03:06:16', 'sunset'=>'18:56:16', 'icon'=>'n4d', 'pressure'=>888,
            'humidity'=>45, 'temp_curr'=>1, 'temp_min'=>77, 'temp_max'=>77, 'clouds'=>45, 'wind_speed'=>5, 'wind_deg'=>774],
        ]);
    }
}
