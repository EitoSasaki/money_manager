<?php
require_once('function.php');

//ページタイトルとページ見出し
$title = '収支編集';
$header = '収支編集';

//収支を取得
if (empty($_GET['id'])) {
  header('Location: index.php');
}

$data = get_price($db, $_GET['id']);

date_default_timezone_set('Asia/Tokyo');

$year_option = '';
$year = substr($data[0]['date'], 0, 4);
for($i = 2000; $i <= $year; $i++){
  if($i == $year){
    $year_option .= '<option value="' . $i . '" selected>' . $i . '</option>';
  } else {
    $year_option .= '<option value="' . $i . '">' . $i . '</option>';
  }
}

$month_option = '';
$month = substr($data[0]['date'], 5, 2);
for($i = 1; $i <= 12; $i++){
  if($i == $month){
    $month_option .= '<option value="' . $i . '" selected>' . $i . '</option>';
  } else {
    $month_option .= '<option value="' . $i . '">' . $i . '</option>';
  }
}

$day_option = '';
$day = substr($data[0]['date'], 8, 2);
for($i = 1; $i <= 31; $i++){
  if($i == $day){
    $day_option .= '<option value="' . $i . '" selected>' . $i . '</option>';
  } else {
    $day_option .= '<option value="' . $i . '">' . $i . '</option>';
  }
}

$hour_option = '';
$hour = substr($data[0]['date'], 11, 2);
for($i = 0; $i <= 23; $i++){
  if($i == $hour){
    $hour_option .= '<option value="' . $i . '" selected>' . $i . '</option>';
  } else {
    $hour_option .= '<option value="' . $i . '">' . $i . '</option>';
  }
}

$minute_option = '';
$minute = substr($data[0]['date'], 14, 2);
if (substr($minute, 0, 1) == 0) {
  $minute = substr($minute, 1, 1);
}
for($i = 0; $i <= 59; $i++){
  if($i == $minute){
    $minute_option .= '<option value="' . $i . '" selected>' . $i . '</option>';
  } else {
    $minute_option .= '<option value="' . $i . '">' . $i . '</option>';
  }
}

$income = '';
$expend = '';
if ($data[0]['method'] == 0) {
  $income = 'checked';
} else {
  $expend = 'checked';
}

$category = array('食費', '交通費', '旅費');
$cat_option = '';
foreach ($category as $key => $cat) {
  if ($key == $data[0]['category']) {
    $cat_option .= '<option value="' . $key . '" selected>' . $cat . '</option>';
  } else {
    $cat_option .= '<option value="' . $key . '">' . $cat . '</option>';
  }
}

$comment = $data[0]['comment'];

$price = $data[0]['price'];

?>

<!-- ヘッダーの読み込み -->
<?php require 'header.php'; ?>

<!-- ここからメイン -->
<form method="post" action="edit_price.php">

  <div class="">
    <label>日付</label>
    <select name="year" required>
      <?= $year_option ?>
    </select>
    <span>年</span>
    <select name="month" required>
      <?= $month_option ?>
    </select>
    <span>月</span>
    <select name="day" required>
      <?= $day_option ?>
    </select>
    <span>日</span>
    <select name="hour" required>
      <?= $hour_option ?>
    </select>
    <span>時</span>
    <select name="minute" required>
      <?= $minute_option ?>
    </select>
    <span>分</span>
  </div>

  <div class="">
    <label>収支</label>
    <span>収入</span>
    <input type="radio" name="method" value="0" required <?= $income ?>>
    <span>支出</span>
    <input type="radio" name="method" value="1" required <?= $expend ?>>
  </div>

  <div class="">
    <label>カテゴリー</label>
    <select name="category" required>
      <?= $cat_option ?>
    </select>
  </div>

  <div class="">
    <label>コメント</label>
    <input type="text" name="comment" value="<?= $comment ?>">
  </div>

  <div class="">
    <label>金額</label>
    <input type="text" name="price" required  value="<?= $price ?>"">
  </div>

  <div class="">
    <input type="hidden" name="id" value="<?= $data[0]['ID'] ?>">
    <input type="hidden" name="confirm" value="edit">
    <input type="submit" name="submit" value="編集">
  </div>

</form>

<!-- ここまでメイン -->

<!-- フッターの読み込み -->
<?php require 'footer.php'; ?>
