<?php

$api_url = "https://api.covidtracking.com/v2/states/in/daily/simple.json";

$data = file_get_contents($api_url);
$json = json_decode($data, true);
//var_dump($json);

$sum = [];

foreach ($json['data'] as $item) {
  $cases = $item['cases']['total'];
  $date = $item['date'];
  $deaths = $item['outcomes']['death']['total'];
  //echo "Date: $date; Cases $cases; Deaths: $deaths\n";

  $month = date('m', strtotime($date));

  if (!isset($sum[$month]))
    $sum[$month] = ['cases' => 0, 'deaths' => 0];

  $sum[$month]['cases'] += $cases;
  $sum[$month]['deaths'] += $deaths;
}

var_dump($sum);
