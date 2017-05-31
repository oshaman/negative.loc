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
        $id = implode(',', config('cities.open'));
        
        $url = 'http://api.openweathermap.org/data/2.5/group?id=' . $id. '&units=metric&APPID=' . $w_key;
        
        $this->weather = json_decode(file_get_contents($url));
        
        if (!is_object($this->weather)) {
            \Log::info('Weather error - '. date("d-m-Y") . '   Error - ' . json_last_error_msg());
            return false;
        }
        $trusted = array_keys(config('cities.open'));

        foreach ($this->weather->list as $city) {
            foreach ($trusted as $name) {
                $data = $this->where('city', $name)->first();
                if ($city->name == $name) {
                    if (!empty($city->sys->sunrise)) $data['sunrise'] = date('H:i:s', $city->sys->sunrise);
                    if (!empty($city->sys->sunset)) $data['sunset'] = date('H:i:s', $city->sys->sunset);
                    if (!empty($city->weather[0]->icon)) {
                        $data['icon'] = preg_replace('#[^a-zA-z0-9-]+#', '', $city->weather[0]->icon);
                    }
                    if (!empty($city->main->pressure) && is_numeric($city->main->pressure)) {
                        $data['pressure'] = (int)round($city->main->pressure*config('settings.pressure_rate'));
                    } 
                    if (!empty($city->main->humidity)) {
                        $data['humidity'] = filter_var($city->main->humidity, FILTER_SANITIZE_NUMBER_INT);
                    }
                    if (!empty($city->main->temp)) {
                        $data['temp_curr'] = filter_var(round($city->main->temp), FILTER_SANITIZE_NUMBER_INT);
                    }
                    if (isset($city->clouds->all)) {
                        $data['clouds'] = filter_var($city->clouds->all, FILTER_SANITIZE_NUMBER_INT);
                    }
                    if (!empty($city->wind->speed)) {
                        $data['wind_speed'] = filter_var(round($city->wind->speed), FILTER_SANITIZE_NUMBER_INT);
                    }
                    if (!empty($city->wind->deg)) {
                        $data['wind_deg'] = filter_var(round($city->wind->deg), FILTER_SANITIZE_NUMBER_INT);
                    }
                    if($data->save()) {
                        \Log::info("Weather in $name updated - " . date("d-m-Y H:i:s"));
                    } else {
                        \Log::info("Weather in $name error - " . date("d-m-Y H:i:s"));
                    }
                }
            }
        }
        return true;
    }
    
    public function forecast()
    {
        $key = config('settings.apixu_key');
        $forcast_days='1';
        $cities = config('cities.apixu');

        foreach ($cities as $name=>$city) {
            $url ="http://api.apixu.com/v1/forecast.json?key=$key&q=$city&days=$forcast_days&=";
            
            $ch = curl_init();  
            curl_setopt($ch,CURLOPT_URL,$url);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
            
            $json_output=curl_exec($ch);
            $weather = json_decode($json_output);

            if (empty($weather) || (isset($weather->error) && count($weather->error) > 0)) {
                \Log::info("Temperature in $city error - $weather->error->message - ". date("d-m-Y H:i:s"));
                continue;
            }
            $data = $this->where('city', $name)->first();
            if (!empty($weather->forecast->forecastday[0]->day->mintemp_c)) {
                $data->temp_min = filter_var(round($weather->forecast->forecastday[0]->day->mintemp_c), 
                            FILTER_SANITIZE_NUMBER_INT);
            }
            if (!empty($weather->forecast->forecastday[0]->day->maxtemp_c)) {
                $data->temp_max = filter_var(round($weather->forecast->forecastday[0]->day->maxtemp_c),
                            FILTER_SANITIZE_NUMBER_INT);
            }
           
            if($data->save()) {
                \Log::info("Temperature in $city updated - " . date("d-m-Y H:i:s"));
            } else {
                \Log::info("Temperature in $city error - ". date("d-m-Y H:i:s"));
            }   
        }
        return true;
    }
}
