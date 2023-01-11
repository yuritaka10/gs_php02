<?php
ini_set('display_errors', 'On');  // ここ：エラーを表示させるようにしてください
error_reporting(E_ALL);           //ここ：全てのレベルのエラーを表示してください


//1.  DB接続します
require_once('funcs.php');
$pdo = db_conn();

$fw = 0;
$ju = 0;
$dr = 0;
$cc = 0;


//２．データ取得SQL作成
//prepare("")の中にはmysqlのSQLで入力したINSERT文を入れて修正すれば良いイメージ
// https://www.sejuku.net/blog/72923
$stmt = $pdo->prepare("SELECT activity,
                      COUNT(activity) 
                      FROM gs_bm_table
                      GROUP BY activity");
$status = $stmt->execute();


//３．データ表示

if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //elseの中はSQL実行が成功した場合
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    // var_dump($result);
    // echo $result["COUNT(activity)"];
    if( $result['activity'] === "fw"){
      $fw =  $result["COUNT(activity)"];
      // echo "fw:" . $fw . "/";
    }

    if( $result['activity'] === "ju"){
      $ju =  $result["COUNT(activity)"];
      // echo "ju:" . $ju . "/";
    }

    if( $result['activity'] === "dr"){
      $dr =  $result["COUNT(activity)"];
      // echo "dr:" . $dr . "/";
    }

    if( $result['activity'] === "cc"){
      $cc =  $result["COUNT(activity)"];
      // echo "cc:" . $cc . "/";
    }
    }

    
}


?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<canvas id="activity_chart"></canvas>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
<div class="container jumbotron"></div>
</body>
</html>
<script>

var ctx = document.getElementById('activity_chart');
var myChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ['フラットワーク', '障害飛越', '馬場馬術','クロスカントリー'],
    datasets: [{
      data: [],
      backgroundColor: ['#1995AD', '#A1D6E2', '#BCBABE','#F1F1F2'],
      weight: 100,
    }],
    options: {
      responsive: true,
      }},
});

</script> -->

