# 王手.com

将棋のニュースサイト（ポートフォリオ用）

![サイトの画像](./readme_image.jpg)

## 概要

将棋のニュースを手軽にチェックしてもっと将棋を楽しもう！

## 機能

-ニュース一覧からニュースをクリックするとニュースの記事、コメントが見れる。<br>
-ニュースに関連する棋士、大会が表にまとめられそれをクリックするとその棋士、大会詳細ページに飛べる。<br>
-棋士一覧から棋士をクリックするとその棋士の詳細ページに飛べる。<br>
-棋士詳細ページではその棋士に関連するニュース一覧が見れる。
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
-コードの部品化<br>
-admin用ページの追加<br>

## 設定

1. .envファイル作成（env.exampleに例を記述しておきました。）<br>
2. composer install<br>
3. npm install<br>
4. php artisan storage:link<br>
5. データベース作成（MySQL以外のデータベースではmigrationが通らない可能性があります。）<br>
6. php artisan migrate<br>
7. php artisan db:seed<br>
8. npm run dev
9. php artisan serve