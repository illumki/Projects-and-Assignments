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

	$query = 'SELECT body_value_name FROM user_settings WHERE UserID= '.$_REQUEST['user_id'];

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

   	$data = [];

	while ($row = mysqli_fetch_assoc($result)) {

		array_push($data, $row);

	}

	mysqli_close($con);

	echo json_encode($data);

?>
