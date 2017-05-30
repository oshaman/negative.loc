<?php

namespace Oshaman\Publication;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    protected $fillable = [
        'city', 'sunrise', 'sunset', 'icon', 'pressure',
        'humidity', 'temp_min', 'temp_max', 'clouds', 'wind_speed', 'wind_deg'
    ];
    
    public $timestamps = false;
    public $weather;
    
    public function renew()
    {
        
        
        
        $w_key = config('settings.wheather_key');
        $id = '703448';
        // $id = implode(',', config('cities'));
        
        $url = 'http://api.openweathermap.org/data/2.5/group?id=' . $id. '&units=metric&APPID=' . $w_key;
        
        
        $this->weather = json_decode(file_get_contents($url));
        // $this->weather = $url;
        
        if (!is_object($this->weather)) {
            \Log::info('Weather error - '. date("d-m-Y") . '   Error - ' . json_last_error_msg());
            die;
        }
        
        $trusted = $this->select('city')->get();
        foreach ($this->weather->list as $city) {
            foreach ($trusted as $name) {
                $data = [];
                if ($city->name == $name->city) {
                    $data['city'] = $name->city;
                    if (!empty($city->sys->sunrise)) $data['sunrise'] = date('H:i:s', $city->sys->sunrise);
                    if (!empty($city->sys->sunset)) $data['sunset'] = date('H:i:s', $city->sys->sunset);
                    if (!empty($city->weather[0]->icon)) {
                        $data['icon'] = preg_replace('#[^a-zA-z0-9-]+#', '', $city->weather[0]->icon);
                    }
                    if (!empty($city->main->pressure) && is_numeric($city->main->pressure)) {
                        $data['pressure'] = (int)round($city->main->pressure*0.75006375541921);
                    } 
                    if (!empty($city->main->humidity)) {
                        $data['humidity'] = filter_var($city->main->humidity, FILTER_SANITIZE_NUMBER_INT,
										["options" => ["max_range" => 99]]);
                    }
                    if (!empty($city->main->temp_min)) {
                        $data['temp_min'] = filter_var($city->main->temp_min, FILTER_SANITIZE_NUMBER_INT,
										["options" => ["max_range" => 99]]);
                    }
                    if (!empty($city->main->temp_max)) {
                        $data['temp_max'] = filter_var($city->main->temp_max, FILTER_SANITIZE_NUMBER_INT,
										["options" => ["max_range" => 99]]);
                    }
                    if (isset($city->clouds->all)) {
                        $data['clouds'] = filter_var($city->clouds->all, FILTER_SANITIZE_NUMBER_INT);
                    }
                    if (!empty($city->wind->speed)) {
                        $data['wind_speed'] = filter_var($city->wind->speed, FILTER_SANITIZE_NUMBER_INT);
                    }
                    if (!empty($city->wind->deg)) {
                        $data['wind_deg'] = filter_var($city->wind->deg, FILTER_SANITIZE_NUMBER_INT);
                    }
                    if($this->updateOrCreate(['city'=>$data['city']],$data)) {
                        \Log::info('Weather updated - '. date("d-m-Y H:i:s"));
                    } else {
                        \Log::info('Weather error - '. date("d-m-Y H:i:s"));
                    }
                }
            }
        }
        dd($this->weather);
        return $this->weather;
        
        
        
        
        
        
        // foreach ($weather->weather->list as $city) {
            // echo '<table border="1"><tr>
                    // <th>City</th><th>Sunrise\Sunset</th><th>Pic</th><th>Pressure</th>
                    // <th>humidity</th><th>temp min\max</th><th>Clouds %</th><th>Wind speed\deg</th>
                    // </tr>';
            // echo "<td>$city->name</td>
                // <td>" . date('H:i:s', $city->sys->sunrise) . ' / ' . date('H:i:s', $city->sys->sunrise) . '</td>
                // <td><img src="http://openweathermap.org/img/w/'  . $city->weather[0]->icon . '.png"></td>
                // <td> ' . $city->main->pressure*0.75006375541921 . '</td>
                // <td>' .$city->main->humidity .'</td>
                // <td>' . $city->main->temp_min . ' \ ' .$city->main->temp_max . '</td>
                // <td>' . $city->clouds->all . '</td>
                // <td>' . $city->wind->speed . ' \ ' . $city->wind->deg;
            // echo '</table>';
            // dump($city->sys->sunrise);
            // dump($city->sys->sunset);
            // dump($city->weather[0]->icon);
            // dump($city->main->pressure);
            // dump($city->main->humidity);
            // dump($city->main->temp_min);
            // dump($city->main->temp_max);
            // dump($city->clouds->all);
            // dump($city->wind->speed);
            // dump($city->wind->deg);
            // dump($city->name);
            
            // dump($city->clouds->all);
        // }
    }
}
