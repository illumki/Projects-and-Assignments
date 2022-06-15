<?php

// example use from browser
// http://localhost/companydirectory/libs/php/getAll.php

// remove next two lines for production

ini_set('display_errors', 'On');
error_reporting(E_ALL);

$executionStartTime = microtime(true);

// include("config.php");

header('Content-Type: application/json; charset=UTF-8');

$conn = mysqli_connect("db.luddy.indiana.edu", "i494f20_team16", "my+sql=i494f20_team16", "i494f20_team16");
if (mysqli_connect_errno()) {
    echo json_encode("Error connecting to database");
} else {


    $query = 'INSERT INTO heatmap_data (longitude,latitude) VALUES("' . $_REQUEST['longitude'] . '","' . $_REQUEST['latitude'] . '")';



    $result = $conn->query($query);
	
	if (!$result) {

		$output['status']['code'] = "400";
		$output['status']['name'] = "executed";
		$output['status']['description'] = "query failed";	
		$output['data'] = [];

		mysqli_close($conn);

		echo json_encode($output); 

		exit;

	}

	$output['status']['code'] = "200";
	$output['status']['name'] = "ok";
	$output['status']['description'] = "success";
	$output['status']['returnedIn'] = (microtime(true) - $executionStartTime) / 1000 . " ms";
	$output['data'] = [];
	
	mysqli_close($conn);

	echo json_encode($output); 
}
