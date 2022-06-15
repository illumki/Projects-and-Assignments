<?php

// example use from browser
// http://localhost/companydirectory/libs/php/getPersonnel.php?id=1

// remove next two lines for production

ini_set('display_errors', 'On');
error_reporting(E_ALL);

$executionStartTime = microtime(true);


header('Content-Type: application/json; charset=UTF-8');

$con = mysqli_connect("db.luddy.indiana.edu","i494f20_team16", "my+sql=i494f20_team16", "i494f20_team16");

if (mysqli_connect_errno()) {

    $output['status']['code'] = "300";
    $output['status']['name'] = "failure";
    $output['status']['description'] = "database unavailable";
    $output['status']['returnedIn'] = (microtime(true) - $executionStartTime) / 1000 . " ms";
    $output['data'] = [];

    mysqli_close($con);

    echo json_encode($output);

    exit;
}

// first query
$email = $_REQUEST['email'];

$query = 'SELECT * from user WHERE email="'.$email.'"';
$result = $con->query($query);


$user = [];

while ($row = mysqli_fetch_assoc($result)) {

    array_push($user, $row);
}


$output['status']['code'] = "200";
$output['status']['name'] = "ok";
$output['status']['description'] = "success";
$output['status']['returnedIn'] = (microtime(true) - $executionStartTime) / 1000 . " ms";
$output['data']['user'] = $user;

mysqli_close($con);

echo json_encode($output);

?>
