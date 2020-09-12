<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => '北井　悠貴',
            'email' => 'kitai@yuuki.com',
            'password' => Hash::make('kitaiyuuki'),
        ]);

        DB::table('users')->insert([
            'name' => '田中　薫',
            'email' => 'tanaka@kaoru.com',
            'password' => Hash::make('kitaiyuuki'),
        ]);

        DB::table('users')->insert([
            'name' => '佐藤　大輔',
            'email' => 'satou@daisuke.com',
            'password' => Hash::make('guest1234'),
        ]);

        DB::table('users')->insert([
            'name' => '羽生先生大好き君',
            'email' => 'habu@daisuki.com',
            'password' => Hash::make('guest1234'),
        ]);

        DB::table('users')->insert([
            'name' => 'Edward Johnson',
            'email' => 'edward@johnson.com',
            'password' => Hash::make('guest1234'),
        ]);

        DB::table('users')->insert([
            'name' => 'これから将棋がんばるぞ',
            'email' => 'korekara@shogi.com',
            'password' => Hash::make('guest1234'),
        ]);

        DB::table('users')->insert([
            'name' => '将棋歴29年のベテラン',
            'email' => 'shogi29@veteran.com',
            'password' => Hash::make('guest1234'),
        ]);

        DB::table('users')->insert([
            'name' => '飛車角金銀',
            'email' => 'hishakaku@kingin.com',
            'password' => Hash::make('guest1234'),
        ]);

        DB::table('users')->insert([
            'name' => 'おにぎり@振り飛車',
            'email' => 'onigiri@furibisha.com',
            'password' => Hash::make('guest1234'),
        ]);

        DB::table('users')->insert([
            'name' => 'レオ',
            'email' => 'reo@reo.com',
            'password' => Hash::make('guest1234'),
        ]);
    }
}
