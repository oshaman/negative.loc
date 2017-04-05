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
                'alias'=>'event1-alias', 'img'=>'pic1.jpg', 'keywords'=>'event1_key',
                'meta_desc'=>'event1_meta', 'user_id'=>'2'
                ],
                ['title'=>'Event2', 'text'=>'TEST_E2', 'desc'=>'event2_desc',
                'alias'=>'event2-alias', 'img'=>'pic2.jpg', 'keywords'=>'event2_key',
                'meta_desc'=>'event2_meta', 'user_id'=>'2'
                ],
                ['title'=>'Event3', 'text'=>'TEST_E3', 'desc'=>'event3_desc',
                'alias'=>'event3-alias', 'img'=>'pic3.jpg', 'keywords'=>'event3_key',
                'meta_desc'=>'event3_meta', 'user_id'=>'1'
                ],
                ['title'=>'Event4', 'text'=>'TEST_E4', 'desc'=>'event4_desc',
                'alias'=>'event4-alias', 'img'=>'pic4.jpg', 'keywords'=>'event4_key',
                'meta_desc'=>'event4_meta', 'user_id'=>'2'
                ],
                ['title'=>'Event5', 'text'=>'TEST_E5', 'desc'=>'event5_desc',
                'alias'=>'event5-alias', 'img'=>'pic5.jpg', 'keywords'=>'event5_key',
                'meta_desc'=>'event5_meta', 'user_id'=>'1'
                ],
                ['title'=>'Event6', 'text'=>'TEST_E6', 'desc'=>'event6_desc',
                'alias'=>'event6-alias', 'img'=>'pic6.jpg', 'keywords'=>'event6_key',
                'meta_desc'=>'event6_meta', 'user_id'=>'1'
                ],
                ['title'=>'Event7', 'text'=>'TEST_E7', 'desc'=>'event7_desc',
                'alias'=>'event7-alias', 'img'=>'pic1.jpg', 'keywords'=>'event7_key',
                'meta_desc'=>'event7_meta', 'user_id'=>'2'
                ],
                ['title'=>'Event8', 'text'=>'TEST_E8', 'desc'=>'event8_desc',
                'alias'=>'event8-alias', 'img'=>'pic2.jpg', 'keywords'=>'event8_key',
                'meta_desc'=>'event8_meta', 'user_id'=>'1'
                ],
                ['title'=>'Event9', 'text'=>'TEST_E9', 'desc'=>'event9_desc',
                'alias'=>'event9-alias', 'img'=>'pic3.jpg', 'keywords'=>'event9_key',
                'meta_desc'=>'event9_meta', 'user_id'=>'2'
                ],
                ['title'=>'Event10', 'text'=>'TEST_E10', 'desc'=>'event10_desc',
                'alias'=>'event10-alias', 'img'=>'pic4.jpg', 'keywords'=>'event10_key',
                'meta_desc'=>'event10_meta', 'user_id'=>'1'
                ],
                ['title'=>'Event11', 'text'=>'TEST_E11', 'desc'=>'event11_desc',
                'alias'=>'event11-alias', 'img'=>'pic5.jpg', 'keywords'=>'event11_key',
                'meta_desc'=>'event11_meta', 'user_id'=>'2'
                ],
                ['title'=>'Event12', 'text'=>'TEST_E12', 'desc'=>'event12_desc',
                'alias'=>'event12-alias', 'img'=>'pic6.jpg', 'keywords'=>'event12_key',
                'meta_desc'=>'event12_meta', 'user_id'=>'2'
                ],
            ]
        );
    }
}
