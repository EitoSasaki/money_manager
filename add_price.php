<?php

//設定等読み込み
require_once 'function.php';

//関数群
function get_new_id($db) {
  $sql = "SELECT coalesce(max(ID), 0) + 1 as new_id FROM price";
  $query = $db->prepare($sql);
  $result = $query->execute();
  if (!$result) {
    return $result;
  }
  $data = $query->fetchAll(PDO::FETCH_ASSOC);
  return $data[0]['new_id'];
}

function insert_price($db, $id, $date, $price) {
  $sql = "INSERT INTO `price` (`ID`, `date`, `price`) VALUES ( " . $id . ",'" . $date . "', '" . $price . "')";
  $query = $db->prepare($sql);
  $result = $query->execute();
  return $result;
}

function insert_price_meta($db, $id, $category, $method, $comment) {
  $sql = "INSERT INTO `price_meta` (`price_id`, `category`, `method`, `comment`) VALUES ('" . $id . "', '" . $category . "', '" . $method . "', '" . $comment . "');";
  $query = $db->prepare($sql);
  $result = $query->execute();
  return $result;
}

if ($_POST['confirm'] == 'add' && !empty($_POST['confirm'])) {
//バリデーション
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
  $new_id = get_new_id($db);

  if (!$new_id) {
    
  }

  if (!insert_price($db, $new_id, $date, $price)) {
    
  }

  if (!insert_price_meta($db, $new_id, $category, $method, $comment)) {
    
  }
  
  header('Location: index.php');
  
}