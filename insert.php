<?php
ini_set('display_errors', 'On');  // ここ：エラーを表示させるようにしてください
error_reporting(E_ALL);           //ここ：全てのレベルのエラーを表示してください

//入力チェック
if(
    !isset($_POST['ride_day']) || $_POST['ride_day']=="" ||
    !isset($_POST['activity']) || $_POST['activity']=="" ||
    !isset($_POST['instructor']) || $_POST['instructor']=="" ||
    !isset($_POST['advice']) || $_POST['advice']=="" ||
    !isset($_POST['horse']) || $_POST['horse']=="" ||
    !isset($_POST['horse_habit']) || $_POST['horse_habit']=="" ||
    !isset($_POST['rating']) || $_POST['rating']=="" ||
    !isset($_POST['good']) || $_POST['good']=="" ||
    !isset($_POST['improvements']) || $_POST['improvements']=="" 
){
    exit('ParamError');
}

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



//2. DB接続します
require_once('funcs.php');
$pdo = db_conn();

//３．データ登録SQL作成

// 1. SQL文を用意
$stmt = $pdo->prepare("INSERT INTO
                        gs_bm_table(id, ride_day, horse, horse_habit, instructor, advice, activity, rating, good, improvements, date)
                        VALUES(NULL, :ride_day, :horse, :horse_habit, :instructor, :advice, :activity, :rating, :good, :improvements, sysdate() )");

//  2. バインド変数を用意
// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR
$stmt->bindValue(':ride_day', $ride_day, PDO::PARAM_STR);
$stmt->bindValue(':horse', $horse, PDO::PARAM_STR);
$stmt->bindValue(':horse_habit', $horse_habit, PDO::PARAM_STR);
$stmt->bindValue(':instructor', $instructor, PDO::PARAM_STR);
$stmt->bindValue(':advice', $advice, PDO::PARAM_STR);
$stmt->bindValue(':activity', $activity, PDO::PARAM_STR);
$stmt->bindValue(':rating', $rating, PDO::PARAM_STR);
$stmt->bindValue(':good', $good, PDO::PARAM_STR);
$stmt->bindValue(':improvements', $improvements, PDO::PARAM_STR);

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