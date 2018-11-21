<?php
//設定等読み込み
require_once 'function.php';

//関数群
function delete_price($db, $id) {
  $sql = "DELETE FROM `price` WHERE `price`.`ID` = " . $id;
  $query = $db->prepare($sql);
  $result = $query->execute();
  return $result;
}

function delete_price_meta($db, $id) {
  $sql = "DELETE FROM `price_meta` WHERE `price_meta`.`price_id` = " . $id;
  $query = $db->prepare($sql);
  $result = $query->execute();
  return $result;
}

if (!delete_price($db, $_GET['id'])) {
  
}

if (!delete_price_meta($db, $_GET['id'])) {
  
}
  
header('Location: index.php');