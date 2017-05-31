<?php
	return [
		'theme' => env('THEME','default'),
		'apixu_key' => env('APIXU_KEY', false),
        'maps_api' => '',
		'captcha_key' => '',
		'wheather_key' => env('OPENW_KEY', false),
		'paginate' => 6,
		'pressure_rate' => 0.75006375541921,
        
        
		'home_port_count' => 5,
		'home_articles_count' => 3,
		'recent_comments' => 3,
		'articles_img' => [
						'max' => ['width'=>500,'height'=>200],
						'mini' => ['width'=>215,'height'=>215],
						'micro' => ['width'=>90,'height'=>90]
						],
		
		'image' => [
					'width'=>1024,
					'height'=>768
				],				
		
        'events_img' => [
						'max' => ['width'=>700,'height'=>260],
						'mini' => ['width'=>310,'height'=>155],
						'micro' => ['width'=>90,'height'=>90]
						],
	
	
	];
?>