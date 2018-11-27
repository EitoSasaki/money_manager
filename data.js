//HighChartsに渡すseriesのデータを取得し、グラフを更新する
function getData() {
  $.ajax({
    url: 'ajax.php',
    dataType: "json",
    type: 'POST',
    data: {
      kind: 1
    },
    // Ajaxリクエストが失敗した時発動
    error: function () {

    },
    // Ajaxリクエストが成功した時発動
    success: function (data) {
      console.log(data[0]["y"]);
      var percentage = data;
      json.series = [{
          type: 'pie',
          name: 'percentage',
          colorByPoint: true,
          data: percentage
        }];
      $('#container').highcharts(json);
    }
  });
}

var title = {
  text: '支出の割合'
};

var tooltip = {
  pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
};

var plotOptions = {
  pie: {
    allowPointSelect: true,
    cursor: 'pointer',
    dataLabels: {
      enabled: true,
      formatter: function () {
        return this.point.name + '<br>' + Highcharts.numberFormat(this.percentage, 0, '.', ',') + ' %';
      },
      distance: -70
    }
  }
};

var credits = {
  enabled: false
};

//初期ロード時getData()で最新データを取得し表示する
//timer.jsがgetData()を呼び出すときにseriesを更新する
var json = {};
json.title = title;
json.tooltip = tooltip;
json.plotOptions = plotOptions;
json.series;
json.credits = credits;

getData();