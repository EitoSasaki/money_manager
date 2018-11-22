<?php
//ページタイトルとページ見出し
$title = '収支追加';
$header = '収支追加';

date_default_timezone_set('Asia/Tokyo');

$year_option = '';
$year = date('Y');
for($i = 2000; $i <= $year; $i++){
  if($i == $year){
    $year_option .= '<option value="' . $i . '" selected>' . $i . '</option>';
  } else {
    $year_option .= '<option value="' . $i . '">' . $i . '</option>';
  }
}

$month_option = '';
$month = date('m');
for($i = 1; $i <= 12; $i++){
  if($i == $month){
    $month_option .= '<option value="' . $i . '" selected>' . $i . '</option>';
  } else {
    $month_option .= '<option value="' . $i . '">' . $i . '</option>';
  }
}

$day_option = '';
$day = date('d');
for($i = 1; $i <= 31; $i++){
  if($i == $day){
    $day_option .= '<option value="' . $i . '" selected>' . $i . '</option>';
  } else {
    $day_option .= '<option value="' . $i . '">' . $i . '</option>';
  }
}

$hour_option = '';
$hour = date('G');
for($i = 0; $i <= 23; $i++){
  if($i == $hour){
    $hour_option .= '<option value="' . $i . '" selected>' . $i . '</option>';
  } else {
    $hour_option .= '<option value="' . $i . '">' . $i . '</option>';
  }
}

$minute_option = '';
$minute = date('i');
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

?>

<!-- ヘッダーの読み込み -->
<?php require 'header.php'; ?>

<!-- ここからメイン -->
<form method="post" action="add_price.php">

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
    <input type="radio" name="method" value="0" required>
    <span>支出</span>
    <input type="radio" name="method" value="1" required checked>
  </div>

  <div class="">
    <label>カテゴリー</label>
    <select name="category" required>
      <option value="1">食費</option>
      <option value="2">交通費</option>
      <option value="3">旅費</option>
    </select>
  </div>

  <div class="">
    <label>コメント</label>
    <input type="text" name="comment">
  </div>

  <div class="">
    <label>金額</label>
    <input type="text" name="price" required>
  </div>

  <div class="">
    <input type="hidden" name="confirm" value="add">
    <input type="submit" name="submit" value="登録">
  </div>

</form>

<!-- ここまでメイン -->

<!-- フッターの読み込み -->
<?php require 'footer.php'; ?>
