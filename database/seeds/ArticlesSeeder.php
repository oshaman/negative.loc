<?php

use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert(
            [
                ['title'=>'Дипломат КНДР предупредил ООН', 'text'=>'test1', 'source'=>'source_test', 'alias'=>'Diplomat-KNDR-predupredil OON', 'img'=>'pic1.jpg', 'keywords'=>'article_1', 'meta_desc'=>'meta_1'],
                ['title'=>'Title2', 'text'=>'test2', 'source'=>'source_test_2', 'alias'=>'Test_2', 'img'=>'pic2.jpg', 'keywords'=>'article_2', 'meta_desc_2'=>'meta_2'],
                ['title'=>'Title3', 'text'=>'test3', 'source'=>'source_test_3', 'alias'=>'Test_3', 'img'=>'pic3.jpg', 'keywords'=>'article_3', 'meta_desc_3'=>'meta_3'],
                ['title'=>'Title4', 'text'=>'test4', 'source'=>'source_test_4', 'alias'=>'Test_4', 'img'=>'pic4.jpg', 'keywords'=>'article_4', 'meta_desc_4'=>'meta_4'],
                ['title'=>'Title5', 'text'=>'test5', 'source'=>'source_test_5', 'alias'=>'Test_5', 'img'=>'pic5.jpg', 'keywords'=>'article_5', 'meta_desc_5'=>'meta_5'],
                ['title'=>'Title6', 'text'=>'test6', 'source'=>'source_test_6', 'alias'=>'Test_6', 'img'=>'pic6.jpg', 'keywords'=>'article_6', 'meta_desc_6'=>'meta_6'],
                ['title'=>'Title7', 'text'=>'test7', 'source'=>'source_test_7', 'alias'=>'Test_7', 'img'=>'pic7.jpg', 'keywords'=>'article_7', 'meta_desc_7'=>'meta_7'],
                ['title'=>'Title8', 'text'=>'test8', 'source'=>'source_test_8', 'alias'=>'Test_8', 'img'=>'pic8.jpg', 'keywords'=>'article_8', 'meta_desc_8'=>'meta_8'],
                ['title'=>'Title9', 'text'=>'test9', 'source'=>'source_test_9', 'alias'=>'Test_9', 'img'=>'pic9.jpg', 'keywords'=>'article_9', 'meta_desc_9'=>'meta_9'],
                ['title'=>'Title10', 'text'=>'test10', 'source'=>'source_test_10', 'alias'=>'Test_10', 'img'=>'pic10.jpg', 'keywords'=>'article_10', 'meta_desc_10'=>'meta_10'],
                ['title'=>'Title11', 'text'=>'test11', 'source'=>'source_test_11', 'alias'=>'Test_11', 'img'=>'pic11.jpg', 'keywords'=>'article_11', 'meta_desc_11'=>'meta_11'],
                ['title'=>'Title12', 'text'=>'test12', 'source'=>'source_test_12', 'alias'=>'Test_12', 'img'=>'pic12.jpg', 'keywords'=>'article_12', 'meta_desc_12'=>'meta_12'],
                ['title'=>'Title13', 'text'=>'test13', 'source'=>'source_test_13', 'alias'=>'Test_13', 'img'=>'pic13.jpg', 'keywords'=>'article_13', 'meta_desc_13'=>'meta_13'],
                ['title'=>'Title14', 'text'=>'test14', 'source'=>'source_test_14', 'alias'=>'Test_14', 'img'=>'pic14.jpg', 'keywords'=>'article_14', 'meta_desc_14'=>'meta_14'],
            ]
        );
    }
}
