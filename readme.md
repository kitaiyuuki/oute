# 王手.com

将棋のニュースサイト（ポートフォリオ用）

![サイトの画像1](./readme_image/readme_image1.jpg)
<br>
![サイトの画像2](./readme_image/readme_image2.jpg)
![サイトの画像3](./readme_image/readme_image3.jpg)

## 概要

将棋のニュースを手軽にチェックしてもっと将棋を楽しもう！

## 機能

-ニュース一覧からニュースをクリックするとニュースの記事、コメントを閲覧できる。<br>
-ニュースに関連する棋士、大会が表にまとめられそれをクリックするとその棋士、大会詳細ページに進める。<br>
-棋士一覧から棋士をクリックするとその棋士の詳細ページに進める。<br>
-棋士詳細ページではその棋士に関連するニュース一覧が見られる。<br>
-大会も棋士と同様。<br>

### アカウントを作成すると...

-各ニュースでコメントができるようになる。<br>
-コメントにいいねが付けられるようになる。<br>
-棋士、大会をお気に入り登録できるようになる。<br>
-履歴を確認できるようになる。<br>

## 使用フレームワーク

Laravel、Vue.js、bootstrap

## 開発予定

-コメント返信機能<br>
-ユーザーのプロフィール画像機能<br>
-対局日程機能<br>
-admin用ページの追加<br>

## git clone後の設定

1. .envファイル作成<br>
2. composer install<br>
3. npm install<br>
4. php artisan storage:link<br>
5. データベース作成（MySQL以外のデータベースではmigrationが通らない可能性があります。）<br>
6. php artisan migrate<br>
7. php artisan db:seed<br>
8. npm run dev
9. php artisan serve