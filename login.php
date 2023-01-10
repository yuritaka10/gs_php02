<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Saddle</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <title>ログイン</title>
</head>

<body>
<header class="header">
        <h1 class="app_name">SADDLE</h1>
        <nav>
                <div><a class="nav" href="index.php">データ登録</a></div>
                <!-- <div><a class="nav" href="login.php">ログイン</a></div>
                <div><a class="nav" href="logout.php">ログアウト</a></div> -->
        <!-- </nav> -->
        <!-- <nav class="navbar navbar-default">
            <div class="container-fluid"> -->
                <!-- <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
            </div> -->
        <!-- </nav> -->
    </header> 


    <!-- <header>
        <nav class="navbar navbar-default">LOGIN</nav>
    </header>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">データ登録</a>
                </div>
            </div>
        </nav>
    </header> -->
    <!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
    <main>
    <form name="form1" action="login_act.php" method="post">
        ID:<input type="text" name="lid" />
        PW:<input type="password" name="lpw" />
        <input type="submit" value="LOGIN" />
    </form>
    </main>

</body>

</html>
