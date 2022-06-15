<?php
//connects you to database

	// example use from browser
	// http://localhost/companydirectory/libs/php/getAll.php

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

$body_value_name= $_REQUEST['body_value_name'];
$body_value= $_REQUEST['body_value'];
$UserID= $_REQUEST['UserID'];
$query = "UPDATE user_settings SET body_value_name='$body_value_name', body_value='$body_value' WHERE UserID=$UserID";

	$result = $con->query($query);

	if (!$result) {

		$output['status']['code'] = "400";
		$output['status']['name'] = "executed";
		$output['status']['description'] = "query failed";
		$output['data'] = [];

		mysqli_close($con);

		echo json_encode($output);

		exit;

	}

	$output['status']['code'] = "200";
		$output['status']['name'] = "ok";
		$output['status']['description'] = "success";
		$output['status']['returnedIn'] = (microtime(true) - $executionStartTime) / 1000 . " ms";
		$output['data'] = [];

		mysqli_close($con);

		echo json_encode($output);

?>
