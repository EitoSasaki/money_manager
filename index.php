<?php
//機能を読み込み
include 'function.php';

//一覧用データを取得
$data = get_price($db);

//収支データ表示用の値を作成
$price_list = get_price_list($data);
?>

<html>
  <head>
    <meta charset="utf-8">
    <title>TOPページ</title>
  </head>	
  <body>
    <h1>Income and Expenditure</h1>
    <!-- 一覧を表示 -->
    <?= $price_list ?>

  </body>
</html>