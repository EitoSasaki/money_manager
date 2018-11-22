<?php
//機能を読み込み
require 'function.php';

//検索してきたとき
if (isset($_GET['category']) && $_GET['category'] != '') {
  $data = get_price($db, null, $_GET['category']);
} else {
  //一覧用データを取得
  $data = get_price($db);
}

//収支データ表示用の値を作成
$price_list = get_price_list($data);

//ページタイトルとページ見出し
$title = 'TOPページ';
$header = 'Income and Expenditure';

?>

<!-- ヘッダーの読み込み -->
<?php require 'header.php'; ?>

<!-- ここからメイン -->

<!-- 一覧を表示 -->

<form method="get" action="index.php">
  <select name="category" required>
    <?= display_cat_form() ?>
  </select>
  <input type="submit" value="検索">
</form>

<?= $price_list ?>

<!-- ここまでメイン -->

<!-- フッターの読み込み -->
<?php require 'footer.php'; ?>
