<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'user_id' => 8,
            'news_id' => 1,
            'content' => 'ついにタイトル挑戦か！'
        ]);

        DB::table('comments')->insert([
            'user_id' => 5,
            'news_id' => 1,
            'content' => '最近の成長ぶりがスゴイですね！'
        ]);

        DB::table('comments')->insert([
            'user_id' => 2,
            'news_id' => 1,
            'content' => '藤井君、すごいわー'
        ]);

        DB::table('comments')->insert([
            'user_id' => 3,
            'news_id' => 1,
            'content' => 'ついこないだまで中学生だったのにもう！？'
        ]);

        DB::table('comments')->insert([
            'user_id' => 7,
            'news_id' => 2,
            'content' => 'ついに渡辺明を倒したか、新しい世代の到来だな'
        ]);

        DB::table('comments')->insert([
            'user_id' => 3,
            'news_id' => 2,
            'content' => '最年少タイトル獲得になるかもしれん'
        ]);

        DB::table('comments')->insert([
            'user_id' => 5,
            'news_id' => 2,
            'content' => '藤井君勢いありますねー'
        ]);

        DB::table('comments')->insert([
            'user_id' => 9,
            'news_id' => 3,
            'content' => 'やっぱり渡辺明が勝ったのか'
        ]);

        DB::table('comments')->insert([
            'user_id' => 1,
            'news_id' => 3,
            'content' => '渡辺さんずっと活躍してるなー'
        ]);

        DB::table('comments')->insert([
            'user_id' => 8,
            'news_id' => 3,
            'content' => '豊島さん敗れたかー'
        ]);

        DB::table('comments')->insert([
            'user_id' => 4,
            'news_id' => 3,
            'content' => '豊島さん次はがんば！'
        ]);

        DB::table('comments')->insert([
            'user_id' => 3,
            'news_id' => 3,
            'content' => '豊島さん調子悪いのかな？'
        ]);

        DB::table('comments')->insert([
            'user_id' => 6,
            'news_id' => 3,
            'content' => '頂上決戦はおもしろいなー！'
        ]);

        DB::table('comments')->insert([
            'user_id' => 9,
            'news_id' => 5,
            'content' => '振り飛車党ファイト！'
        ]);

        DB::table('comments')->insert([
            'user_id' => 5,
            'news_id' => 5,
            'content' => 'アマチュア上がりの星！'
        ]);

        DB::table('comments')->insert([
            'user_id' => 1,
            'news_id' => 6,
            'content' => 'これで同点か！面白くなってきたぞ'
        ]);

        DB::table('comments')->insert([
            'user_id' => 3,
            'news_id' => 6,
            'content' => 'さすが豊島！'
        ]);

        DB::table('comments')->insert([
            'user_id' => 6,
            'news_id' => 6,
            'content' => 'まさに互角の戦い！'
        ]);

        DB::table('comments')->insert([
            'user_id' => 3,
            'news_id' => 7,
            'content' => '豊島さんまたタイトル取っちゃうのかな'
        ]);

        DB::table('comments')->insert([
            'user_id' => 5,
            'news_id' => 7,
            'content' => '豊島さんいいですねー'
        ]);

        DB::table('comments')->insert([
            'user_id' => 7,
            'news_id' => 7,
            'content' => 'いい勝負だった'
        ]);

        DB::table('comments')->insert([
            'user_id' => 8,
            'news_id' => 7,
            'content' => 'レベル高すぎー！'
        ]);

        DB::table('comments')->insert([
            'user_id' => 9,
            'news_id' => 7,
            'content' => '振り飛車党からしても面白い居飛車の戦いだった。'
        ]);

        DB::table('comments')->insert([
            'user_id' => 1,
            'news_id' => 7,
            'content' => '永瀬2冠惜しかったなー'
        ]);

        DB::table('comments')->insert([
            'user_id' => 4,
            'news_id' => 8,
            'content' => '豊島さん調子いいなー'
        ]);

        DB::table('comments')->insert([
            'user_id' => 2,
            'news_id' => 8,
            'content' => '豊島さん素敵すぎ！'
        ]);

        DB::table('comments')->insert([
            'user_id' => 8,
            'news_id' => 8,
            'content' => '豊島3冠なるか！'
        ]);

        DB::table('comments')->insert([
            'user_id' => 7,
            'news_id' => 8,
            'content' => 'この若さでこの強さ、あっぱれ！'
        ]);

        DB::table('comments')->insert([
            'user_id' => 3,
            'news_id' => 8,
            'content' => 'すごいの一言'
        ]);

        DB::table('comments')->insert([
            'user_id' => 9,
            'news_id' => 8,
            'content' => 'もはや死角なし！'
        ]);

        DB::table('comments')->insert([
            'user_id' => 2,
            'news_id' => 9,
            'content' => '藤井君かっこいい！'
        ]);

        DB::table('comments')->insert([
            'user_id' => 7,
            'news_id' => 9,
            'content' => '新世代の到来だ'
        ]);

        DB::table('comments')->insert([
            'user_id' => 6,
            'news_id' => 9,
            'content' => '藤井くんいけるぞ！'
        ]);

        DB::table('comments')->insert([
            'user_id' => 8,
            'news_id' => 9,
            'content' => '藤井2冠あり得るぞ！'
        ]);

        DB::table('comments')->insert([
            'user_id' => 5,
            'news_id' => 9,
            'content' => 'すごい子だ'
        ]);

        DB::table('comments')->insert([
            'user_id' => 4,
            'news_id' => 10,
            'content' => '持将棋かー'
        ]);

        DB::table('comments')->insert([
            'user_id' => 5,
            'news_id' => 10,
            'content' => '長期戦ですね'
        ]);

        DB::table('comments')->insert([
            'user_id' => 1,
            'news_id' => 10,
            'content' => 'お互い受けがうまいからなー'
        ]);

        DB::table('comments')->insert([
            'user_id' => 9,
            'news_id' => 10,
            'content' => 'かなり長かった。'
        ]);

        DB::table('comments')->insert([
            'user_id' => 8,
            'news_id' => 10,
            'content' => '鉄壁の防御vs鉄壁の防御'
        ]);

        DB::table('comments')->insert([
            'user_id' => 2,
            'news_id' => 10,
            'content' => 'お互いがんばって！'
        ]);

        DB::table('comments')->insert([
            'user_id' => 8,
            'news_id' => 11,
            'content' => '渡辺さん1勝返したか！'
        ]);

        DB::table('comments')->insert([
            'user_id' => 2,
            'news_id' => 11,
            'content' => '藤井君負けちゃったか…'
        ]);

        DB::table('comments')->insert([
            'user_id' => 3,
            'news_id' => 12,
            'content' => '藤井王位誕生なるか'
        ]);

        DB::table('comments')->insert([
            'user_id' => 2,
            'news_id' => 12,
            'content' => '藤井くんまた勝ったの！？'
        ]);

        DB::table('comments')->insert([
            'user_id' => 5,
            'news_id' => 12,
            'content' => '藤井2冠現実的になってきましたね'
        ]);

        DB::table('comments')->insert([
            'user_id' => 1,
            'news_id' => 12,
            'content' => 'ストレート勝ちありえるぞ！'
        ]);

        DB::table('comments')->insert([
            'user_id' => 2,
            'news_id' => 13,
            'content' => 'どっちもすてき！'
        ]);

        DB::table('comments')->insert([
            'user_id' => 3,
            'news_id' => 13,
            'content' => '持将棋多すぎ！'
        ]);

        DB::table('comments')->insert([
            'user_id' => 6,
            'news_id' => 13,
            'content' => 'どっちも堅いなー！'
        ]);

        DB::table('comments')->insert([
            'user_id' => 10,
            'news_id' => 14,
            'content' => '永瀬拓矢叡王は維持したままか'
        ]);

        DB::table('comments')->insert([
            'user_id' => 5,
            'news_id' => 14,
            'content' => '永瀬さんつよいなー'
        ]);

        DB::table('comments')->insert([
            'user_id' => 7,
            'news_id' => 14,
            'content' => '相変わらず固い！'
        ]);

        DB::table('comments')->insert([
            'user_id' => 4,
            'news_id' => 15,
            'content' => 'いい勝負だ！'
        ]);

        DB::table('comments')->insert([
            'user_id' => 5,
            'news_id' => 15,
            'content' => 'まさに互角の戦い!'
        ]);

        DB::table('comments')->insert([
            'user_id' => 1,
            'news_id' => 16,
            'content' => '白熱の戦い！'
        ]);

        DB::table('comments')->insert([
            'user_id' => 4,
            'news_id' => 16,
            'content' => '実力差なさすぎ！'
        ]);

        DB::table('comments')->insert([
            'user_id' => 5,
            'news_id' => 16,
            'content' => 'どっちがタイトル取ってもおかしくない'
        ]);

        DB::table('comments')->insert([
            'user_id' => 6,
            'news_id' => 17,
            'content' => '藤井くん弱点あるの？'
        ]);

        DB::table('comments')->insert([
            'user_id' => 7,
            'news_id' => 17,
            'content' => '完全に覚醒したな！'
        ]);

        DB::table('comments')->insert([
            'user_id' => 3,
            'news_id' => 18,
            'content' => '豊島名人調子悪いなー'
        ]);

        DB::table('comments')->insert([
            'user_id' => 7,
            'news_id' => 18,
            'content' => '渡辺名人誕生なるか！'
        ]);

        DB::table('comments')->insert([
            'user_id' => 5,
            'news_id' => 18,
            'content' => '渡辺さんずっと活躍してますね'
        ]);

        DB::table('comments')->insert([
            'user_id' => 9,
            'news_id' => 19,
            'content' => '豊島名人無冠あり得るな'
        ]);

        DB::table('comments')->insert([
            'user_id' => 7,
            'news_id' => 19,
            'content' => '永瀬2冠強すぎ！'
        ]);

        DB::table('comments')->insert([
            'user_id' => 5,
            'news_id' => 19,
            'content' => '豊島名人次こそがんばれ！'
        ]);

        DB::table('comments')->insert([
            'user_id' => 2,
            'news_id' => 21,
            'content' => 'さすが藤井君'
        ]);

        DB::table('comments')->insert([
            'user_id' => 8,
            'news_id' => 21,
            'content' => 'とうとう…'
        ]);

        DB::table('comments')->insert([
            'user_id' => 4,
            'news_id' => 22,
            'content' => 'もう！？'
        ]);

        DB::table('comments')->insert([
            'user_id' => 6,
            'news_id' => 22,
            'content' => '初心者のぼくでもすごいと分かる'
        ]);

        DB::table('comments')->insert([
            'user_id' => 3,
            'news_id' => 22,
            'content' => '圧倒的すぎる…'
        ]);

        DB::table('comments')->insert([
            'user_id' => 9,
            'news_id' => 22,
            'content' => 'まじか…'
        ]);

        DB::table('comments')->insert([
            'user_id' => 5,
            'news_id' => 22,
            'content' => '思ったより早かった'
        ]);

        DB::table('comments')->insert([
            'user_id' => 10,
            'news_id' => 22,
            'content' => 'なんなんだこの子は…'
        ]);

        DB::table('comments')->insert([
            'user_id' => 6,
            'news_id' => 23,
            'content' => 'この対戦は面白い！'
        ]);

        DB::table('comments')->insert([
            'user_id' => 9,
            'news_id' => 23,
            'content' => '久保さんタイトル取ってくれー！！！！'
        ]);

        DB::table('comments')->insert([
            'user_id' => 2,
            'news_id' => 24,
            'content' => '今回の負けはもったいなさすぎる'
        ]);

        DB::table('comments')->insert([
            'user_id' => 4,
            'news_id' => 24,
            'content' => '羽生さん負けちゃったか…'
        ]);

        DB::table('comments')->insert([
            'user_id' => 6,
            'news_id' => 25,
            'content' => '王座戦を占う1局になるな！'
        ]);

        DB::table('comments')->insert([
            'user_id' => 4,
            'news_id' => 25,
            'content' => '早く見たい！'
        ]);
    }
}
