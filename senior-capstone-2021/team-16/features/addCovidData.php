<?php
//error reports
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);

	$executionStartTime = microtime(true);


	header('Content-Type: application/json; charset=UTF-8');
//connection
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
//request statements from given
    $totalCases = $_REQUEST['totalCases'];
    $totalDeath =$_REQUEST['totalDeath'];
    $totalHospitalized = $_REQUEST['totalHospitalized'];
    $totalRecovered = $_REQUEST['totalRecovered'];
//update query from line 5 to save database room
//insert constantly update so I moved to an update query
	//$query = 'INSERT INTO covidData (totalCases,totalDeath,totalHospitalized,totalRecovered) VALUES("' . $totalCases . '","' .$totalDeath . '","' . $totalHospitalized. '","' . $totalRecovered . '")';
  	$query = "UPDATE covidData SET totalCases='$totalCases', totalDeath='$totalDeath', totalHospitalized='$totalHospitalized', totalRecovered='$totalRecovered' WHERE CovidID=5";

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

?>
