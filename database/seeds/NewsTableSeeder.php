<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newsList = [
            [
                'title' => '藤井聡太七段、史上最年少でタイトル挑戦へ！',
                'watches' => 100
            ],
            [
                'title' => '藤井聡太七段が渡辺明棋聖に勝利！　ヒューリック杯棋聖戦五番勝負第1局',
                'watches' => 50
            ],
            [
                'title' => '渡辺明三冠が豊島将之名人を破り、開幕戦を制する！　第78期名人戦七番勝負第1局',
                'watches' => 10
            ],
            [
                'title' => '青嶋未来五段が六段に昇段！'
            ],
            [
                'title' => '今泉健司四段が五段に昇段！',
                'watches' => 2
            ],
            [
                'title' => '豊島将之名人が渡辺明三冠に勝ち1勝1敗のタイに！　第78期名人戦七番勝負第2局',
                'watches' => 15
            ],
            [
                'title' => '豊島将之竜王・名人が永瀬拓矢叡王を破り、開幕戦を制する！　第5期叡王戦七番勝負第1局',
                'watches' => 16
            ],
            [
                'title' => '豊島将之名人が渡辺明三冠に勝ち2勝1敗！　第78期名人戦七番勝負第3局',
                'watches' => 11
            ],
            [
                'title' => '藤井聡太七段が木村一基王位を破り、開幕戦を制する！　第61期王位戦七番勝負第1局',
                'watches' => 80
            ],
            [
                'title' => '永瀬拓矢叡王VS豊島将之竜王・名人は持将棋が成立　第5期叡王戦七番勝負第2局',
                'watches' => 39
            ],
            [
                'title' => '渡辺明棋聖が藤井聡太七段を破り、1勝を返す！　第91期ヒューリック杯棋聖戦五番勝負第3局',
                'watches' => 20
            ],
            [
                'title' => '藤井聡太七段が木村一基王位を破り、2連勝！　第61期王位戦七番勝負第2局',
                'watches' => 60
            ],
            [
                'title' => '第3局は持将棋が成立、第4局は永瀬拓矢叡王が勝利！　第5期叡王戦七番勝負第3・4局',
                'watches' => 8
            ],
            [
                'title' => '永瀬拓矢叡王が豊島将之竜王・名人に勝利！　第5期叡王戦七番勝負第5局',
                'watches' => 9
            ],
            [
                'title' => '渡辺明二冠が豊島将之名人に勝ち、2勝2敗のタイに戻す！　第78期名人戦七番勝負第4局',
                'watches' => 18
            ],
            [
                'title' => '豊島将之竜王・名人が永瀬拓矢叡王を破り、2勝目をあげる！　第5期叡王戦七番勝負第6局',
                'watches' => 25
            ],
            [
                'title' => '藤井聡太棋聖が木村一基王位を破り、3連勝！　第61期王位戦七番勝負第3局',
                'watches' => 40
            ],
            [
                'title' => '渡辺明二冠が豊島将之名人に勝ち奪取に王手！　第78期名人戦七番勝負第5局',
                'watches' => 25
            ],
            [
                'title' => '永瀬拓矢叡王が豊島将之竜王・名人に勝ち、防衛に王手！　第5期叡王戦七番勝負第7局',
                'watches' => 30
            ],
            [
                'title' => '星野良生四段が五段に昇段！',
                'watches' => 2
            ],
            [
                'title' => '藤井棋聖が木村王位に勝利！　第61期王位戦七番勝負第4局',
                'watches' => 120
            ],
            [
                'title' => '藤井聡太、史上最年少で二冠獲得・八段昇段！',
                'watches' => 200
            ],
            [
                'title' => '永瀬拓矢王座VS久保利明九段、勝負の行方は如何に！？　第68期王座戦五番勝負第1局',
                'watches' => 60
            ],
            [
                'title' => '羽生善治、丸山忠久に敗れる！　竜王戦挑戦者決定戦第1局',
                'watches' => 34
            ],
            [
                'title' => '久保利明VS永瀬拓矢、王座戦前の戦いの行方は！？　JT杯',
                'watches' => 55
            ],
        ];

        $create_at = Carbon::now()->subDays(count($newsList) - 1);

        foreach ($newsList as $news) {
            $propaty = array_merge($news, ['created_at' => $create_at]);

            DB::table('news')->insert($propaty);

            $create_at = $create_at->addDays(1);
        }

    }
}
