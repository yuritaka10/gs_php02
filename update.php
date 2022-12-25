<?php

 ini_set('display_errors', 'On');  // ここ：エラーを表示させるようにしてください
error_reporting(E_ALL);           //ここ：全てのレベルのエラーを表示してください


//PHP:コード記述/修正の流れ
//1. insert.phpの処理をマルっとコピー。
//2. $id = $_POST["id"]を追加
//3. SQL修正
//   "UPDATE テーブル名 SET 変更したいカラムを並べる WHERE 条件"
//   bindValueにも「id」の項目を追加
//4. header関数"Location"を「select.php」に変更



//1. POSTデータ取得
$ride_day = $_POST['ride_day'];
$activity = $_POST['activity'];

$instructor = $_POST['instructor'];
$advice = $_POST['advice'];

$horse = $_POST['horse'];
$horse_habit = $_POST['horse_habit'];

$rating = $_POST['rating'];
$good = $_POST['good'];
$improvements = $_POST['improvements'];
$id = $_POST['id'];

//2.DB接続
require_once('funcs.php');
$pdo = db_conn();


//３．データ登録SQL作成
$stmt = $pdo->prepare(
                    'UPDATE
                        gs_bm_table set
                                    ride_day = :ride_day,
                                    activity = :activity,
                                    instructor = :instructor,
                                    advice = :advice,
                                    horse = :horse,
                                    horse_habit = :horse_habit,
                                    rating = :rating,
                                    good = :good,
                                    improvements = :improvements,
                                    date = sysdate()
                    WHERE id = :id;');            
                        

// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':ride_day', $ride_day, PDO::PARAM_STR);
$stmt->bindValue(':horse', $horse, PDO::PARAM_STR);
$stmt->bindValue(':horse_habit', $horse_habit, PDO::PARAM_STR);
$stmt->bindValue(':instructor', $instructor, PDO::PARAM_STR);
$stmt->bindValue(':advice', $advice, PDO::PARAM_STR);
$stmt->bindValue(':activity', $activity, PDO::PARAM_STR);
$stmt->bindValue(':rating', $rating, PDO::PARAM_STR);
$stmt->bindValue(':good', $good, PDO::PARAM_STR);
$stmt->bindValue(':improvements', $improvements, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT); //PARAM_INTなので注意

$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    //*** function化する！******\
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    //*** function化する！*****************
    header('Location: select.php');
    exit();
}
