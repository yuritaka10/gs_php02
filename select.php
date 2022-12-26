<?php ini_set('display_errors', 'On');  // ここ：エラーを表示させるようにしてください
error_reporting(E_ALL);           //ここ：全てのレベルのエラーを表示してください
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>記録確認
    </title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <?php require_once('./count.php'); ?>


</head>
<body>

    
 <header class="header">    
      <h1>騎乗記録確認画面</h1>
 </header> 

<main>

  <div class="count_all">
      <?php 
        echo "これまで乗った回数は" . $count . "鞍です！"; 
      ?>
  </div>

  <div>
      <div class="container jumbotron"><?= $view ?></div>
      
  </div>


  <div style="margin-top: 20px;">
        <a href="index.php"><button>レッスンを記録する</button></a>
   </div>

</main>

</body>
</html>