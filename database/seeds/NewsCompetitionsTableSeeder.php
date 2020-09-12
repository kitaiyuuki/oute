<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsCompetitionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news_competitions')->insert([
            'news_id' => 1,
            'competition_id' => 8
        ]);

        DB::table('news_competitions')->insert([
            'news_id' => 2,
            'competition_id' => 8
        ]);

        DB::table('news_competitions')->insert([
            'news_id' => 3,
            'competition_id' => 1
        ]);

        DB::table('news_competitions')->insert([
            'news_id' => 6,
            'competition_id' => 1
        ]);

        DB::table('news_competitions')->insert([
            'news_id' => 7,
            'competition_id' => 3
        ]);

        DB::table('news_competitions')->insert([
            'news_id' => 8,
            'competition_id' => 1
        ]);

        DB::table('news_competitions')->insert([
            'news_id' => 9,
            'competition_id' => 4
        ]);

        DB::table('news_competitions')->insert([
            'news_id' => 10,
            'competition_id' => 3
        ]);

        DB::table('news_competitions')->insert([
            'news_id' => 11,
            'competition_id' => 8
        ]);

        DB::table('news_competitions')->insert([
            'news_id' => 12,
            'competition_id' => 4
        ]);

        DB::table('news_competitions')->insert([
            'news_id' => 13,
            'competition_id' => 3
        ]);

        DB::table('news_competitions')->insert([
            'news_id' => 14,
            'competition_id' => 3
        ]);

        DB::table('news_competitions')->insert([
            'news_id' => 15,
            'competition_id' => 1
        ]);

        DB::table('news_competitions')->insert([
            'news_id' => 16,
            'competition_id' => 3
        ]);

        DB::table('news_competitions')->insert([
            'news_id' => 17,
            'competition_id' => 4
        ]);

        DB::table('news_competitions')->insert([
            'news_id' => 18,
            'competition_id' => 1
        ]);

        DB::table('news_competitions')->insert([
            'news_id' => 19,
            'competition_id' => 3
        ]);

        DB::table('news_competitions')->insert([
            'news_id' => 21,
            'competition_id' => 4
        ]);

        DB::table('news_competitions')->insert([
            'news_id' => 22,
            'competition_id' => 8
        ]);

        DB::table('news_competitions')->insert([
            'news_id' => 22,
            'competition_id' => 4
        ]);

        DB::table('news_competitions')->insert([
            'news_id' => 23,
            'competition_id' => 5
        ]);

        DB::table('news_competitions')->insert([
            'news_id' => 24,
            'competition_id' => 2
        ]);

        DB::table('news_competitions')->insert([
            'news_id' => 25,
            'competition_id' => 9
        ]);
    }
}
