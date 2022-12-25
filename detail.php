<?php
/**
 * [ここでやりたいこと]
 * 1. クエリパラメータの確認 = GETで取得している内容を確認する
 * 2. select.phpのPHP<?php ?>の中身をコピー、貼り付け
 * 3. SQL部分にwhereを追加
 * 4. データ取得の箇所を修正。
 */



$id = $_GET['id'];

require_once('funcs.php');
$pdo = db_conn();


$stmt = $pdo->prepare('SELECT * FROM gs_bm_table WHERE id = :id;');
$stmt->bindValue(':id', $id, PDO::PARAM_INT); //PARAM_INTなので注意
$status = $stmt->execute();

$fw ="";
$jp ="";
$dr ="";
$cc ="";

//４．データ登録処理後
if ($status === false) {
    //*** function化する！******\
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    // データが取得できた場合の処理
    $result = $stmt->fetch();
}

//運動内容ラジオぼたんチェック
if( $result['activity' === 'fw']){
    $fw ="checked";
}elseif($result['activity' === 'jp']){
    $jp= "checked";
}elseif($result['activity' === 'dr']){
    $dr= "checked";
}elseif($result['activity' === 'cc']){
    $cc= "checked";
}

//点数
$rating = $result['rating']
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</head>

<body>
<header class="header">
    <h1>詳細画面</h1>
</header> 

    <!-- method, action, 各inputのnameを確認してください。  -->
    <main>
        <form action="update.php" method="post">
    <div class="jumbotron">
            <fieldset>
        <input type="hidden" name="id" value="<?= h($result['id'])?>">
        <div class="bold">日付</div>
        <input type="text" id="datepicker" name="ride_day" value="<?= h($result['ride_day'])?>">
            <script>$(function() {
                $('#datepicker').datepicker({
                  dateFormat: 'yy/mm/dd'
                });

            });
            </script>

        <div> 
        <p class="bold">レッスン構成</p>
            <label><input type="radio" name="activity" value="fw" checked= <?php $fw ?>>フラットワーク</label>
            <label><input type="radio" name="activity" value="ju" checked= <?php $ju ?>>障害飛越</label>
            <label><input type="radio" name="activity" value="dr" checked= <?php $dr ?>>馬場馬術</label>
            <label><input type="radio" name="activity" value="cc" checked= <?php $cc ?>>クロスカントリー</label>
        </div>  

        
      <div class="bold">インストラクター名</div>
             <input type="text" name="instructor" value="<?= h($result['instructor'])?>">

      <div class="bold">インストラクターからのアドバイス</div>
        <label><textArea name="advice" rows="4" cols="40"><?=h($result['advice'])?></textArea></label><br>

        <p class="bold">馬名</p>
        <input type="text" name="horse" value="<?= h($result['horse'])?>">

         <div class="bold">馬の癖・特徴</div>
        <label><textArea name="horse_habit" rows="4" cols="40"><?=h($result['horse_habit'])?></textArea></label><br>

        <div class="bold">今日の自分に点数をつけるなら</div>
            <label><input type="radio" name="rating" value="1" checked= <?php $rating ?>>1</label>
            <label><input type="radio" name="rating" value="2" checked= <?php $rating ?>>2</label>
            <label><input type="radio" name="rating" value="3" checked= <?php $rating ?>>3</label>
            <label><input type="radio" name="rating" value="4" checked= <?php $rating ?>>4</label>
            <label><input type="radio" name="rating" value="5" checked= <?php $rating ?>>5</label>
        
        <div class="bold">今回のレッスンでうまくできたこと</div>
        <label><textArea name="good" rows="4" cols="40"><?=h($result['good'])?></textArea></label><br>
        <div class="bold">今回のレッスンでうまくできなかったこと</div>
        <label><textArea name="improvements" rows="4" cols="40"><?=h($result['improvements'])?></textArea></label><br>
        <input type="hidden" name="id" value="<?= h($result['id'])?>">
        <div><input type="submit" value="送信"></div>
        </fieldset>
        </div>

    </form>
    <nav class="navbar navbar-default">











    
            <div style="margin-top: 20px;">
        <a href="select.php"><button>データ一覧</button></a>
    </div>
        </nav>
        </main>
</body>
</html>