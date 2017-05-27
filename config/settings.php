<?php
	return [
		'theme' => env('THEME','default'),
        'maps_api' => '',
		'captcha_key' => '',
		'wheather_key' => 'a58b1469c263b1d43f666468b1ed1757',
		'paginate' => 6,
        
        
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