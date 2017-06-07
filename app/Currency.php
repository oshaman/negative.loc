<?php

namespace Oshaman\Publication;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $fillable = [
        'cc', 'rate', 'exchangedate', 'flag',
    ];
    
    public $timestamps = false;
    
    public function getRates()
    {
        $url = 'https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?json';
        return json_decode(file_get_contents($url));
    }
    
    public function updateRates()
    {
        $rates = $this->getRates();
        if (!is_array($rates)) {
            \Log::info('Currency error - '. date("d-m-Y") . '   Error - ' . json_last_error_msg());
            die;
        }
        
        $old_rates = self::all();
        foreach($rates as $rate) {
            foreach($old_rates as $old) {
                
                if ($old->cc !== $rate->cc) continue;
                
                $exdate = date('Y-m-d', strtotime(str_replace('-', '/.', $rate->exchangedate)));
                if ($old->exchangedate == $exdate) continue;
                
                $data = [];
                $data['rate'] = floatval($rate->rate);
                $data['exchangedate'] = $exdate;
                if ($data['rate'] > $old->rate) {
                    $data['flag'] = 1;    
                } elseif ($data['rate'] < $old->rate) {
                    $data['flag'] = 2;
                } else {
                    $data['flag'] = 3;
                }
                if($this->updateOrCreate(['cc'=>$old->cc],$data)) {
                    \Log::info('Currency ' . $old->cc . ' updated - '. date("d-m-Y H:i:s"));
                } else {
                    \Log::info('Currency ' . $old->cc . ' error - '. date("d-m-Y H:i:s"));
                }
            }
        }
    }
}
