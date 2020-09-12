<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('players')->insert([
            'name' => '藤井聡太'
        ]);

        DB::table('players')->insert([
            'name' => '永瀬拓矢'
        ]);

        DB::table('players')->insert([
            'name' => '渡辺明'
        ]);

        DB::table('players')->insert([
            'name' => '豊島将之'
        ]);

        DB::table('players')->insert([
            'name' => '千田翔太'
        ]);

        DB::table('players')->insert([
            'name' => '羽生善治'
        ]);

        DB::table('players')->insert([
            'name' => '丸山忠久'
        ]);

        DB::table('players')->insert([
            'name' => '久保利明'
        ]);

        DB::table('players')->insert([
            'name' => '星野良生'
        ]);

        DB::table('players')->insert([
            'name' => '斎藤慎太郎'
        ]);

        DB::table('players')->insert([
            'name' => '菅井竜也'
        ]);

        DB::table('players')->insert([
            'name' => '佐藤天彦'
        ]);

        DB::table('players')->insert([
            'name' => '青嶋未来'
        ]);

        DB::table('players')->insert([
            'name' => '今泉健司'
        ]);

        DB::table('players')->insert([
            'name' => '木村一基'
        ]);
    }
}
