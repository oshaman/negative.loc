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
                ['title'=>'Event1', 'text'=>'TEST_E1', 'description'=>'event1_description',
                'alias'=>'event1-alias', 'img'=>'pic1.jpg', 'keywords'=>'event1_key',
                'meta_desc'=>'event1_meta', 'user_id'=>'2'
                ],
                ['title'=>'Event2', 'text'=>'TEST_E2', 'description'=>'event2_description',
                'alias'=>'event2-alias', 'img'=>'pic2.jpg', 'keywords'=>'event2_key',
                'meta_desc'=>'event2_meta', 'user_id'=>'2'
                ],
                ['title'=>'Event3', 'text'=>'TEST_E3', 'description'=>'event3_description',
                'alias'=>'event3-alias', 'img'=>'pic3.jpg', 'keywords'=>'event3_key',
                'meta_desc'=>'event3_meta', 'user_id'=>'1'
                ],
                ['title'=>'Event4', 'text'=>'TEST_E4', 'description'=>'event4_description',
                'alias'=>'event4-alias', 'img'=>'pic4.jpg', 'keywords'=>'event4_key',
                'meta_desc'=>'event4_meta', 'user_id'=>'2'
                ],
                ['title'=>'Event5', 'text'=>'TEST_E5', 'description'=>'event5_description',
                'alias'=>'event5-alias', 'img'=>'pic5.jpg', 'keywords'=>'event5_key',
                'meta_desc'=>'event5_meta', 'user_id'=>'1'
                ],
                ['title'=>'Event6', 'text'=>'TEST_E6', 'description'=>'event6_description',
                'alias'=>'event6-alias', 'img'=>'pic6.jpg', 'keywords'=>'event6_key',
                'meta_desc'=>'event6_meta', 'user_id'=>'1'
                ],
                ['title'=>'Event7', 'text'=>'TEST_E7', 'description'=>'event7_description',
                'alias'=>'event7-alias', 'img'=>'pic1.jpg', 'keywords'=>'event7_key',
                'meta_desc'=>'event7_meta', 'user_id'=>'2'
                ],
                ['title'=>'Event8', 'text'=>'TEST_E8', 'description'=>'event8_description',
                'alias'=>'event8-alias', 'img'=>'pic2.jpg', 'keywords'=>'event8_key',
                'meta_desc'=>'event8_meta', 'user_id'=>'1'
                ],
                ['title'=>'Event9', 'text'=>'TEST_E9', 'description'=>'event9_description',
                'alias'=>'event9-alias', 'img'=>'pic3.jpg', 'keywords'=>'event9_key',
                'meta_desc'=>'event9_meta', 'user_id'=>'2'
                ],
                ['title'=>'Event10', 'text'=>'TEST_E10', 'description'=>'event10_description',
                'alias'=>'event10-alias', 'img'=>'pic4.jpg', 'keywords'=>'event10_key',
                'meta_desc'=>'event10_meta', 'user_id'=>'1'
                ],
                ['title'=>'Event11', 'text'=>'TEST_E11', 'description'=>'event11_description',
                'alias'=>'event11-alias', 'img'=>'pic5.jpg', 'keywords'=>'event11_key',
                'meta_desc'=>'event11_meta', 'user_id'=>'2'
                ],
                ['title'=>'Event12', 'text'=>'TEST_E12', 'description'=>'event12_description',
                'alias'=>'event12-alias', 'img'=>'pic6.jpg', 'keywords'=>'event12_key',
                'meta_desc'=>'event12_meta', 'user_id'=>'2'
                ],
            ]
        );
    }
}
