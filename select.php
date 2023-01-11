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
      <h1 class="app_name">騎乗記録確認画面</h1>
      <nav>
                <div><a class="nav" href="index.php">データ入力</a></div>
                <div><a class="nav" href="login.php">ログイン</a></div>
                <div><a class="nav" href="logout.php">ログアウト</a></div>
        </nav>

 </header> 

<main>

  <div class="count_all">
      <?php 
        echo "これまで乗った回数は" . $count . "鞍です！"; 
      ?>
  </div>

      <div><?= $view ?></div>


<canvas id="activity_chart"></canvas>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
<div class="container jumbotron"></div>

</main>

</body>
</html>

  <?php require_once('./activity_chart.php'); ?>
  <script>
  var ctx = document.getElementById('activity_chart');
  var myChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ['フラットワーク', '障害飛越', '馬場馬術','クロスカントリー'],
    datasets: [{
      data: [<?php echo $fw; ?>,<?php echo $ju; ?>,<?php echo $dr; ?>,<?php echo $cc; ?>],
      backgroundColor: ['#1995AD', '#A1D6E2', '#BCBABE','#F1F1F2'],
      weight: 100,
    }],
    options: {
      responsive: true,
      }},
});

</script>

