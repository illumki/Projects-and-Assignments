<?php
//error reports
ini_set('display_errors', 'On');
error_reporting(E_ALL);
//connection
$executionStartTime = microtime(true);
$conn = mysqli_connect("db.luddy.indiana.edu","i494f20_team16", "my+sql=i494f20_team16", "i494f20_team16");

if (mysqli_connect_errno()) {

$output['status']['code'] = "300";
$output['status']['name'] = "failure";
$output['status']['description'] = "database unavailable";
$output['status']['returnedIn'] = (microtime(true) - $executionStartTime) / 1000 . " ms";
$output['data'] = [];

mysqli_close($conn);

echo json_encode($output);

exit;
}
//select query
$query = 'SELECT * FROM covidData WHERE CovidID = 5';

$result = $conn->query($query);

if (!$result) {
//protect output json
$output['status']['code'] = "400";
$output['status']['name'] = "executed";
$output['status']['description'] = "query failed";
$output['data'] = [];

mysqli_close($conn);

echo json_encode($output);

exit;

}
//data push
$data = [];

while ($row = mysqli_fetch_assoc($result)) {

array_push($data, $row);

}

$output['status']['code'] = "200";
$output['status']['name'] = "ok";
$output['status']['description'] = "success";
$output['status']['returnedIn'] = (microtime(true) - $executionStartTime) / 1000 . " ms";
$output['data'] = $data;

header('Content-Type: application/json; charset=UTF-8');

mysqli_close($conn);

echo json_encode($output);

?>
