<?php

function h($str){
  return htmlspecialchars($str, ENT_QUOTES);
}

//1.  DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=gs_bm_table;charset=utf8;host=localhost', 'root', '');
} catch (PDOException $e) {
  exit('DBConnectError'.$e->getMessage());
}

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
    $view .= 
    '<p>' 
    . $result['id'] 
    . '/' . h($result['ride_day'])
    . '/' . h($result['horse'])
    . '/' . h($result['instructor'])
    . '/' . h($result['activity'])
    . '/' . h($result['rating'])
    . '/' . h($result['comment'])
    . '</p>';

    $count++;
  }
}


?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saddle</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

    
 <header class="header">    
      <h1>騎乗記録確認画面</h1>
 </header> 

<main>

  <div class="count_all">
      <?php 
        echo "これまで乗った回数は" . $count . "回です！"; 
      ?>
  </div>


  <div>
      <div class="container jumbotron"><?= $view ?></div>
  </div>

  <div style="margin-top: 20px;">
        <a href="index.php"><button>レッスンを記録する</button></a>
   </div>

</body>
</html>