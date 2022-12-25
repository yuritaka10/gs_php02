<?php

//1.  DB接続します
require_once('funcs.php');
$pdo = db_conn();

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table;");
$status = $stmt->execute();


//３．データ表示
$view="";
$count="";

if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //elseの中はSQL実行が成功した場合
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<p>'; 
       $view .= '<a href="detail.php?id=' . h($result['id']) . '">';
       $view .= h($result['id'])
    . '/' . h($result['ride_day'])
    . '/' . h($result['horse'])
    . '/' . h($result['horse_habit'])
    . '/' . h($result['instructor'])
    . '/' . h($result['advice'])
    . '/' . h($result['activity'])
    . '/' . h($result['rating'])
    . '/' . h($result['good'])
    . '/' . h($result['improvements']);
    $view .= '</a>';
    $view .= '<a href="delete.php?id=' .h($result['id']). '">';
    $view .= '[削除]';
    $view .= '</a>';        
    $view .= '</p>';

    //回数カウント
    $count++;

    
  }
}


?>