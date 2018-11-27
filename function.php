<?php

//設定等読み込み
require 'DBconnect.php';
require 'config.php';

//DB接続確認
if (!$db = dbConnect(DB_HOST, DB_NAME, DB_USER, DB_PASS)) {
  redirect_500();
}

//一覧
require 'price_list.php';

//サーバー上の例外は500番エラー
function redirect_500() {
  header('HTTP', true, 500);
  exit();
}

function get_categories(){
  $categories = array('食費', '交通費', '旅費', '学費');
  return $categories;
}