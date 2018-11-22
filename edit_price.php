<?php

//設定等読み込み
require_once 'function.php';

//関数群
function update_price($db, $id, $date, $price) {
  $sql = "UPDATE `price` SET `date` = '" . $date . "', `price` = '" . $price . "' WHERE `ID` = " . $id;
  var_dump($sql);
  $query = $db->prepare($sql);
  $result = $query->execute();
  return $result;
}

function update_price_meta($db, $id, $category, $method, $comment) {
  $sql = "UPDATE `price_meta` SET `category` = '" . $category . "', `method` = '" . $method . "', `comment` = '" . $comment . "' WHERE `price_meta`.`price_id` = " . $id;
  $query = $db->prepare($sql);
  $result = $query->execute();
  return $result;
}

if ($_POST['confirm'] == 'edit' && !empty($_POST['confirm'])) {
  //バリデーション
  $id = $_POST['id'];
  $year = $_POST['year'];
  $month = $_POST['month'];
  $day = $_POST['day'];
  $hour = $_POST['hour'];
  $minute = $_POST['minute'];
  $method = $_POST['method'];
  $category = $_POST['category'];
  $comment = $_POST['comment'];
  $price = $_POST['price'];

  //収支の追加処理
  $date = date('Y-m-d H:i:00', mktime($hour, $minute, 0, $month, $day, $year));

  if (!update_price($db, $id, $date, $price)) {

  }

  if (!update_price_meta($db, $id, $category, $method, $comment)) {

  }

  header('Location: index.php');

}
