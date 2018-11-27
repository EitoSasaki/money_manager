<?php
//設定等読み込み
require_once 'function.php';

function get_graph_data($db) {
  $sql = "SELECT SUM(price) AS total, category FROM price LEFT JOIN price_meta ON price.ID = price_meta.price_id GROUP BY price_meta.category ORDER BY price_meta.category ASC";

  $query = $db->prepare($sql);
  $result = $query->execute();

  if (!$result) {
    redirect_500();
  } else {
    $data = $query->fetchAll(PDO::FETCH_ASSOC);
    $category = array('食費', '交通費', '旅費');
    $total = 0;
    foreach ($data as $value) {
      $total += $value['total'];
    }
    foreach ($data as $value) {
      $percentage = round($value['total'] * 100 / $total);
      $graph_data[] = array(
        'name' => $category[$value['category']],
        'y'    => $percentage
      );
    }
    return $graph_data;
  }
}

$json = get_graph_data($db);

header('Content-type: application/json; charset=utf-8');
echo json_encode($json);
exit();