<?php

use Illuminate\Database\Seeder;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert(
            [
                ['title'=>'Event1', 'text'=>'TEST_E1', 'desc'=>'event1_desc',
                'alias'=>'event1_alias', 'img'=>'pic1.jpg', 'keywords'=>'event1_key',
                'meta_desc'=>'event1_meta', 'user_id'=>'2'
                ],
                ['title'=>'Event2', 'text'=>'TEST_E2', 'desc'=>'event2_desc',
                'alias'=>'event2_alias', 'img'=>'pic2.jpg', 'keywords'=>'event2_key',
                'meta_desc'=>'event2_meta', 'user_id'=>'2'
                ],
                ['title'=>'Event3', 'text'=>'TEST_E3', 'desc'=>'event3_desc',
                'alias'=>'event3_alias', 'img'=>'pic3.jpg', 'keywords'=>'event3_key',
                'meta_desc'=>'event3_meta', 'user_id'=>'1'
                ],
                ['title'=>'Event4', 'text'=>'TEST_E4', 'desc'=>'event4_desc',
                'alias'=>'event4_alias', 'img'=>'pic4.jpg', 'keywords'=>'event4_key',
                'meta_desc'=>'event4_meta', 'user_id'=>'2'
                ],
                ['title'=>'Event5', 'text'=>'TEST_E5', 'desc'=>'event5_desc',
                'alias'=>'event5_alias', 'img'=>'pic5.jpg', 'keywords'=>'event5_key',
                'meta_desc'=>'event5_meta', 'user_id'=>'1'
                ],
                ['title'=>'Event6', 'text'=>'TEST_E6', 'desc'=>'event6_desc',
                'alias'=>'event6_alias', 'img'=>'pic6.jpg', 'keywords'=>'event6_key',
                'meta_desc'=>'event6_meta', 'user_id'=>'1'
                ],
            ]
        );
    }
}
