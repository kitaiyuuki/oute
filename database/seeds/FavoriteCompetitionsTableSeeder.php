<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavoriteCompetitionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('favorite_competitions')->insert([
            'user_id' => 1,
            'competition_id' => 1
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 1,
            'competition_id' => 2
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 1,
            'competition_id' => 4
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 1,
            'competition_id' => 5
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 1,
            'competition_id' => 8
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 1,
            'competition_id' => 9
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 1,
            'competition_id' => 10
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 2,
            'competition_id' => 1
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 2,
            'competition_id' => 3
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 2,
            'competition_id' => 4
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 2,
            'competition_id' => 5
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 2,
            'competition_id' => 8
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 3,
            'competition_id' => 1
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 3,
            'competition_id' => 2
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 3,
            'competition_id' => 3
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 3,
            'competition_id' => 4
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 3,
            'competition_id' => 8
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 4,
            'competition_id' => 2
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 5,
            'competition_id' => 1
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 5,
            'competition_id' => 2
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 5,
            'competition_id' => 3
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 5,
            'competition_id' => 6
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 5,
            'competition_id' => 10
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 6,
            'competition_id' => 1
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 6,
            'competition_id' => 2
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 6,
            'competition_id' => 3
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 6,
            'competition_id' => 4
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 6,
            'competition_id' => 8
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 6,
            'competition_id' => 9
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 6,
            'competition_id' => 10
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 7,
            'competition_id' => 1
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 7,
            'competition_id' => 2
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 7,
            'competition_id' => 3
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 7,
            'competition_id' => 4
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 7,
            'competition_id' => 5
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 7,
            'competition_id' => 6
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 7,
            'competition_id' => 7
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 7,
            'competition_id' => 8
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 7,
            'competition_id' => 9
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 7,
            'competition_id' => 10
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 8,
            'competition_id' => 1
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 8,
            'competition_id' => 5
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 8,
            'competition_id' => 6
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 8,
            'competition_id' => 7
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 8,
            'competition_id' => 10
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 9,
            'competition_id' => 5
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 9,
            'competition_id' => 9
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 9,
            'competition_id' => 10
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 10,
            'competition_id' => 1
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 10,
            'competition_id' => 2
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 10,
            'competition_id' => 3
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 10,
            'competition_id' => 4
        ]);

        DB::table('favorite_competitions')->insert([
            'user_id' => 10,
            'competition_id' => 8
        ]);
    }
}
