<?php

//収支の一覧取得
function get_price($db, $id = null, $cat = null) {
  $sql = "SELECT price.ID as ID, date, price, price_id, category, method, comment FROM price LEFT JOIN price_meta ON price.ID = price_meta.price_id";

  if ($id != null) {
    $sql .= ' WHERE price.ID = ' . $id;
  } elseif ($cat != null) {
    $sql .= ' WHERE price_meta.category = ' . $cat;
  }

  $sql .= ' ORDER BY date DESC';

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
            . '<td>' . get_category($value['category']) . '</td>'
            . '<td>' . $value['comment'] . '</td>'
            . '<td>' . $value['price'] . '</td>'
            . '<td><a href="edit.php?id=' . $value['ID'] . '">編集</a>/<a href="delete_price.php?id=' . $value['ID'] . '" onClick="confirm(\'本当に削除してもよろしいですか\')">削除</a></td>'
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

//収入か支出かの文字列を返す
function get_category($category) {
  $cats = get_categories();
  foreach ($cats as $key => $cat) {
    if ($key == $category) {
      return $cat;
    }
  }
  redirect_500();
}

//カテゴリー検索用のフォーム作成
function display_cat_form() {
  $category = array('食費', '交通費', '旅費');
  $cat_option = '';
  foreach ($category as $key => $cat) {
    $cat_option .= '<option value="' . $key . '">' . $cat . '</option>';
  }
  return $cat_option;
}
