# アプリケーション名 ：　　 Atte（アット） 　概要説明：勤怠管理システム</br>
　勤務開始時刻・勤務終了時刻・休憩時間・勤務時間を表示するシステム</br>
　トップ画面</br>
<img width="860" alt="トップ画面" src="https://github.com/k-ike2525/Atte/assets/137484536/10645ec3-1a66-488e-90e7-0c1698e6f9e4">

## 作成した目的
人事評価のため</br>
　　 Laravel・php・html・css などの開発言語を使用した</br>
　　アプリケーション作成の学習</br>

## アプリケーション URL ローカル環境による開発のため　なし
参照：</br>
　　 DB : http://localhost:8080/ </br>
トップ：http://localhost/" </br>

・注意事項</br>
　　　勤怠記録は１日 1 度のみ、（勤務開始ボタンと勤務終了ボタンは一日一度のみ） </br>
　　　休憩ボタンは何度でも入力可能　（休憩開始ボタンは、勤務開始ボタンを押してから　入力可能）</br>
　　　日を跨ぐ前に一度　勤務終了ボタンを押すこと。</br>

## 他のリポジトリ
　　バックエンド：docker </br>
　　フロントエンド：src" </br>

## 機能一覧
・会員登録機能 </br>
・ログイン、ログアウト機能 </br>
・勤怠登録機能  </br>
　　　勤務開始時刻の表示 </br>
　　　勤務終了時刻の表示 </br>
　　　休憩時間（休憩時間のトータル）の表示 </br>
　　　勤務時間（勤務時間のトータル）の表示 </br>

## 使用技術(実行環境)
・Laravel Framework 5.8.38 </br>
・php 　 html 　 css など </br>

## テーブル設計の画像
<img width="578" alt="テーブル設計" src="https://github.com/k-ike2525/Atte/assets/137484536/a4707db7-633b-4c0a-a569-9ae08f4a4557">

## ER 図
<img width="929" alt="ER図" src="https://github.com/k-ike2525/Atte/assets/137484536/ba4a2195-736a-46d3-8c46-6c353fb30738">


## 環境構築
開発環境を GitHub からクローン　 </br>
$ cd XXX 　 </br>
$ git clone git@github.com:k-ike2525/Atte.git  </br>　 
$ mv Atte XXX 　 </br>
「XXX」　は任意のディレクトリ名 </br>

docker 構築 </br>
$ docker-compose up -d --build </br>
$ code . </br>
$ docker-compose exec php bash </br>

laravel パッケージをインストール </br>
$ composer install" </br>

## 他に記載することがあれば記述する
開発時の.env ファイル　参照 </br>

DB_CONNECTION=mysql 　 </br>
DB_HOST=mysql </br>
DB_PORT=3306 </br>
DB_DATABASE=laravel_db </br>
DB_USERNAME=laravel_user </br>
DB_PASSWORD=laravel_pass </br>
以上 </br>
