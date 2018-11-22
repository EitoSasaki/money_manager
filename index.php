<?php
//機能を読み込み
require 'function.php';

//一覧用データを取得
$data = get_price($db);

//収支データ表示用の値を作成
$price_list = get_price_list($data);

//ページタイトルとページ見出し
$title = 'TOPページ';
$header = 'Income and Expenditure';
?>

<!-- ヘッダーの読み込み -->
<?php require 'header.php'; ?>

<!-- ここからメイン -->

<a href="add.php">収支追加</a>

<!-- 一覧を表示 -->
<?= $price_list ?>

<!-- ここまでメイン -->

<!-- フッターの読み込み -->
<?php require 'footer.php'; ?>
