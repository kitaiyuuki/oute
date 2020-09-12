<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            NewsTableSeeder::class,
            PlayersTableSeeder::class,
            CompetitionsTableSeeder::class,
            NewsPlayersTableSeeder::class,
            NewsCompetitionsTableSeeder::class,
            CommentsTableSeeder::class,
            FavoritePlayersTableSeeder::class,
            FavoriteCompetitionsTableSeeder::class,
            HistoriesTableSeeder::class,
            FavoriteCommentsTableSeeder::class
        ]);
    }
}
