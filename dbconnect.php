<?php

//DBに接続
// MySQLのテンプレ
// $host = getenv("HOSTNAME"); //MySQLがインストールされてるコンピュータ
// $dbname = getenv("DBNAME"); //使用するDB
// $charset = "utf8"; //文字コード
// $user = getenv('USERNAME'); //MySQLにログインするユーザー名
// $password = getenv('PASSWORD'); //ユーザーのパスワード

$host = getenv("us-cdbr-iron-east-05.cleardb.net"); //MySQLがインストールされてるコンピュータ
$dbname = getenv("heroku_3654984a1f3de2b"); //使用するDB
$charset = "utf8"; //文字コード
$user = getenv('bbda35e6df46d8'); //MySQLにログインするユーザー名
$password = getenv('fd7cb580'); //ユーザーのパスワード

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //SQLでエラーが表示された場合、画面にエラーが出力される
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //DBから取得したデータを連想配列の形式で取得する
    PDO::ATTR_EMULATE_PREPARES   => false, //SQLインジェクション対策
];

//DBへの接続設定
$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
try {
    //DBへ接続
    $dbh = new PDO($dsn, $user, $password, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int) $e->getCode());
}
