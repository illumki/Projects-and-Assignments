<?php

// example use from browser
// http://localhost/companydirectory/libs/php/getAll.php

// remove next two lines for production

ini_set('display_errors', 'On');
error_reporting(E_ALL);

$executionStartTime = microtime(true);

// include("config.php");

header('Content-Type: application/json; charset=UTF-8');

$con = mysqli_connect("db.luddy.indiana.edu","i494f20_team16", "my+sql=i494f20_team16", "i494f20_team16");
if(mysqli_connect_errno())
{
echo json_encode("Error connecting to database");


}
else
{

$sql = "SELECT longitude, latitude FROM heatmap_data";


$result = mysqli_query($con, $sql);
// $row = mysqli_fetch_array($result);


$data = [];

while ($row = mysqli_fetch_array($result)) {

array_push($data, $row);

}


mysqli_close($con);

echo json_encode($data);

}



?>