<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saddle</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <?php require_once('count.php');?>

</head>
<body>

    
    <header class="header">
        <h1 class="app_name">SADDLE</h1>
        <nav>
                <div><a class="nav" href="select.php">データ一覧</a></div>
                <div><a class="nav" href="login.php">ログイン</a></div>
                <div><a class="nav" href="logout.php">ログアウト</a></div>
        </nav>
        <!-- <nav class="navbar navbar-default">
            <div class="container-fluid"> -->
                <!-- <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
            </div> -->
        </nav>
    </header> 

    <main>

    <div class="count_all">
    <?php 
    echo "これまで乗った回数は" . $count . "鞍です！"; 
    ?>

</div>



    <form action="insert.php" method="post">
    <div class="jumbotron">
            <fieldset>
        <div class="bold">日付</div>
        <input type="date" id="datepicker" name="ride_day">
            <!-- <script>$(function() {
                $('#datepicker').datepicker({
                  dateFormat: 'yy/mm/dd'
                });

            });
            </script> -->

        <div> 
        <p class="bold">レッスン構成</p>
            <label><input type="radio" name="activity" value="fw">フラットワーク</label>
            <label><input type="radio" name="activity" value="ju">障害飛越</label>
            <label><input type="radio" name="activity" value="dr">馬場馬術</label>
            <label><input type="radio" name="activity" value="cc">クロスカントリー</label>
        </div>  

        
      <div class="bold">インストラクター名</div>
             <input type="text" name="instructor">

      <div class="bold">インストラクターからのアドバイス</div>
        <label><textArea name="advice" rows="4" cols="40"></textArea></label><br>

        <p class="bold">馬名</p>
        <input type="text" name="horse">

         <div class="bold">馬の癖・特徴</div>
        <label><textArea name="horse_habit" rows="4" cols="40"></textArea></label><br>

        <div class="bold">今日の自分に点数をつけるなら</div>
            <label><input type="radio" name="rating" value="1">1</label>
            <label><input type="radio" name="rating" value="2">2</label>
            <label><input type="radio" name="rating" value="3">3</label>
            <label><input type="radio" name="rating" value="4">4</label>
            <label><input type="radio" name="rating" value="5">5</label>
        
        <div class="bold">今回のレッスンでうまくできたこと</div>
        <label><textArea name="good" rows="4" cols="40"></textArea></label><br>
        <div class="bold">今回のレッスンでうまくできなかったこと</div>
        <label><textArea name="improvements" rows="4" cols="40"></textArea></label><br>

        <div><input type="submit" value="送信"></div>
        </fieldset>
        </div>

    </form>
    <div style="margin-top: 20px;">
        <a href="select.php"><button>レッスン記録を見る</button></a>
    </div>


</body>
</html>
