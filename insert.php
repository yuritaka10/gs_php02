<?php
ini_set('display_errors', 'On');  // ここ：エラーを表示させるようにしてください
error_reporting(E_ALL);           //ここ：全てのレベルのエラーを表示してください
/**
 * 1. index.phpのフォームの部分がおかしいので、ここを書き換えて、
 * insert.phpにPOSTでデータが飛ぶようにしてください。
 * 2. insert.phpで値を受け取ってください。
 * 3. 受け取ったデータをバインド変数に与えてください。
 * 4. index.phpフォームに書き込み、送信を行ってみて、実際にPhpMyAdminを確認してみてください！
 */

//1. POSTデータ取得
$ride_day = $_POST['ride_day'];
$horse = $_POST['horse'];
$instructor = $_POST['instructor'];
$activity = $_POST['activity'];
$rating = $_POST['rating'];
$comment = $_POST['comment'];


//2. DB接続します
try {
    //ID:'root', Password: xamppは 空白 ''
    $pdo = new PDO('mysql:dbname=gs_bm_table;charset=utf8;host=localhost', 'root', '');
} catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
}

//３．データ登録SQL作成

// 1. SQL文を用意
$stmt = $pdo->prepare("INSERT INTO
                        gs_bm_table(id, ride_day, horse, instructor, activity, rating, comment, date)
                        VALUES(NULL, :ride_day, :horse, :instructor, :activity, :rating, :comment, sysdate() )");

//  2. バインド変数を用意
// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR
$stmt->bindValue(':ride_day', $ride_day, PDO::PARAM_STR);
$stmt->bindValue(':horse', $horse, PDO::PARAM_STR);
$stmt->bindValue(':instructor', $instructor, PDO::PARAM_STR);
$stmt->bindValue(':activity', $activity, PDO::PARAM_STR);
$stmt->bindValue(':rating', $rating, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);

//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if ($status === false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit('ErrorMessage:'.$error[2]);
} else {
    //５．index.phpへリダイレクト
    header('Location: index.php');
}

?>