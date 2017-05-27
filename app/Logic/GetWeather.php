<?php

namespace Oshaman\Publication\Logic;

class GetWeather
{
    public $weather;
    
    public function __construct()
    {
        $w_key = config('settings.wheather_key');
        $id = '703448,689559,4192205';
        // $url = 'http://api.apixu.com/v1/current.json?key=f9cd5d5af9c244499a0133506172705&q=kiev';
        // $url = 'http://api.wunderground.com/api/5def9f45ef8f27e1/conditions/lang:ua/q/Ukraine/kiev.json';
        $url = 'http://api.openweathermap.org/data/2.5/group?id=524901,' . $id. '&units=metric&lang=ua' . '&APPID=' . $w_key;
        // dd($url);
        $res = file_get_contents($url);
        $this->weather = json_decode($res);
        // $this->weather = $res;
    }
}