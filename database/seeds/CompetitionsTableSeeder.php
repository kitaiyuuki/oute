<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompetitionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('competitions')->insert([
            'name' => '名人戦'
        ]);

        DB::table('competitions')->insert([
            'name' => '竜王戦'
        ]);

        DB::table('competitions')->insert([
            'name' => '叡王戦'
        ]);

        DB::table('competitions')->insert([
            'name' => '王位戦'
        ]);

        DB::table('competitions')->insert([
            'name' => '王座戦'
        ]);

        DB::table('competitions')->insert([
            'name' => '棋王戦'
        ]);

        DB::table('competitions')->insert([
            'name' => '王将戦'
        ]);

        DB::table('competitions')->insert([
            'name' => '棋聖戦'
        ]);

        DB::table('competitions')->insert([
            'name' => 'JT杯'
        ]);

        DB::table('competitions')->insert([
            'name' => 'NHK杯トーナメント'
        ]);
    }
}
