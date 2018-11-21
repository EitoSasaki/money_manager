<?php

//設定等読み込み
include 'DBconnect.php';
include 'config.php';

//DB接続確認
if (!$db = dbConnect(DB_HOST, DB_NAME, DB_USER, DB_PASS)) {
  redirect_500();
}

//追加
//編集
//削除
//収支の一覧取得
function get_price($db) {
  $sql = "SELECT * FROM price LEFT JOIN price_meta ON price.ID = price_meta.price_id ORDER BY date DESC";

  $query = $db->prepare($sql);
  $result = $query->execute();

  if (!$result) {
    redirect_500();
  } else {
    $data = $query->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }
}

//収支データを表示できる形に整理
function get_price_list($data) {
  $list = '<table>'
          . '<tr>'
          . '<th>日付</th>'
          . '<th>収支</th>'
          . '<th>カテゴリー</th>'
          . '<th>内容</th>'
          . '<th>金額</th>'
          . '<th>編集</th>'
          . '</tr>';
  foreach ($data as $value) {
    $list .= '<tr>'
            . '<td>' . $value['date'] . '</td>'
            . '<td>' . get_method($value['method']) . '</td>'
            . '<td>' . $value['category'] . '</td>'
            . '<td>' . $value['comment'] . '</td>'
            . '<td>' . $value['price'] . '</td>'
            . '<td><a href="#">編集</a>/<a href="#">削除</a></td>'
            . '</tr>';
  }
  $list .= '</table>';
  return $list;
}

//収入か支出かの文字列を返す
function get_method($method) {
  switch ($method) {
    case 0:
      return '収入';
    case 1:
      return '支出';
    default :
      redirect_500();
  }
}

//検索
//バリデーション
//サーバー上の例外は500番エラー
function redirect_500() {
  header('HTTP', true, 500);
  exit();
}
