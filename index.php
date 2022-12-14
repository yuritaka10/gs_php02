<?php
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


//3.データ表示

if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //elseの中はSQL実行が成功した場合
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
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
    
        <h1>騎乗記録記入画面</h1>
    </header> 

    <main>

    <div class="count_all">
    <?php 
    echo "これまで乗った回数は" . $count . "回です！"; 
    ?>

</div>


    <form action="insert.php" method="post">
    <div class="jumbotron">
            <fieldset>
        <div class="bold">日付</div>
         <input type="text" name="ride_day">
        <div class="bold">インストラクター名</div>
             <input type="text" name="instructor">
        <p class="bold">馬名</p>
            <input type="text" name="horse">

        <p class="bold">レッスン構成</p>
         
        <div> 
            <label><input type="radio" name="activity" value="fw">フラットワーク</label>
            <label><input type="radio" name="activity" value="ju">障害飛越</label>
            <label><input type="radio" name="activity" value="dr">馬場馬術</label>
            <label><input type="radio" name="activity" value="cc">クロスカントリー</label>
        </div>  
        <div class="bold">今日の自分に点数をつけるなら</div>
            <label><input type="radio" name="rating" value="1">1</label>
            <label><input type="radio" name="rating" value="2">2</label>
            <label><input type="radio" name="rating" value="3">3</label>
            <label><input type="radio" name="rating" value="4">4</label>
            <label><input type="radio" name="rating" value="5">5</label>
        
        <div class="bold">コメント</div>
        <label><textArea name="comment" rows="4" cols="40"></textArea></label><br>

        <div><input type="submit" value="送信"></div>
        </fieldset>
        </div>

    </form>
    <div style="margin-top: 20px;">
        <a href="select.php"><button>レッスン記録を見る</button></a>
    </div>
</body>
</html>
