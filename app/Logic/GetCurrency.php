<?php

namespace Oshaman\Publication\Logic;

class GetCurrency
{
    public $curr;
    
    public function __construct()
    {
        $url = 'https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?json';
        $res = file_get_contents($url);
        $this->curr = json_decode($res);
        dd($this->curr);
        // $this->weather = $res;
    }
}