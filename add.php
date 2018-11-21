<?php
//ページタイトルとページ見出し
$title = '収支追加';
$header = '収支追加';
?>

<!-- ヘッダーの読み込み -->
<?php require 'header.php'; ?>

<!-- ここからメイン -->
<form method="post" action="add_price.php">
  
  <div class="">
    <label>日付</label>
    <select name="year" required>
      <option value="2018">2018</option>
      <option value="2017">2017</option>
      <option value="2016">2016</option>
    </select>
    <span>年</span>
    <select name="month" required>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
    </select>
    <span>月</span>
    <select name="day" required>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
    </select>
    <span>日</span>
    <select name="hour" required>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
    </select>
    <span>時</span>
    <select name="minute" required>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
    </select>
    <span>分</span>
  </div>
  
  <div class="">
    <label>収支</label>
    <span>収入</span>
    <input type="radio" name="method" value="0" required>
    <span>支出</span>
    <input type="radio" name="method" value="1" required>
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
