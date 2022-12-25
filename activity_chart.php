


<?php
ini_set('display_errors', 'On');  // ここ：エラーを表示させるようにしてください
error_reporting(E_ALL);           //ここ：全てのレベルのエラーを表示してください


//1.  DB接続します
require_once('funcs.php');
$pdo = db_conn();

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT activity FROM gs_bm_table");
$status = $stmt->execute();


//３．データ表示
$activities ="";
$fw ="";
$jp ="";
$dr ="";
$cc ="";

if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //elseの中はSQL実行が成功した場合
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $activities .=
    $result['activity'];
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<div class="container jumbotron"><?= $activities ?></div>
</body>
</html>
<script>

// var ctx = document.getElementById('activity_chart');
// var myChart = new Chart(ctx, {
//   type: 'pie',
//   data: {
//     labels: ['フラットワーク', '障害飛越', '馬場馬術','クロスカントリー'],
//     datasets: [{
//       data: [10, 20, 30,5],
//       backgroundColor: ['#f88', '#484', '#48f','#'],
//       weight: 100,
//     }],
//   },
// });

</script>

