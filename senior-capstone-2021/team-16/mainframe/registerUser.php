<?php

// example use from browser
// http://localhost/companydirectory/libs/php/getPersonnel.php?id=1

//registerUser?email=""&fullName=""

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

$sql = "SELECT * FROM user WHERE email='".$_REQUEST['email']."'";
//echo $sql;
//$result = $con->query($sql);
$result = mysqli_query($con, $sql);
//echo mysqli_num_rows($result);

$userInfo = array();
if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
	 array_push($userInfo, $row);
 }
    $output['status']['code'] = "200";
    $output['status']['name'] = "executed";
    $output['data'] = $userInfo;

    mysqli_close($con);

    echo json_encode($output);

    exit;
} else {

    $email = $_REQUEST['email'];
    $fullname = $_REQUEST['fullname'];

    $sql1 = "INSERT INTO user (email, fullname) VALUES ('" . $email . "', '" . $fullname . "')";
    $storeUser =  mysqli_query($con, $sql1);

    $last_id = $con->insert_id;

    $sql2 = "INSERT INTO user_settings (UserID, body_value_name,body_value) VALUES ('" . $last_id . "', 'lightmode', 1)";

    $storeUserSettings = mysqli_query($con, $sql2);

    if ($storeUser == TRUE &&  $storeUserSettings == TRUE) {
			$sql = "SELECT * FROM user WHERE email='".$_REQUEST['email']."'";
			//echo $sql;
			//$result = $con->query($sql);
			$result = mysqli_query($con, $sql);
			//echo mysqli_num_rows($result);

			$userInfo = array();
				while($row = mysqli_fetch_assoc($result)) {
				 array_push($userInfo, $row);
			 }
			    $output['status']['code'] = "200";
			    $output['status']['name'] = "executed";
			    $output['data'] = $userInfo;

			    mysqli_close($con);

			    echo json_encode($output);

			    exit;
    } else {
        $output['status']['code'] = "400";
        $output['status']['name'] = "executed";
        $output['data']['status'] = "Error While creating";
        mysqli_close($con);

        echo json_encode($output);
    }
}
