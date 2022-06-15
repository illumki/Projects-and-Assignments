<?php
//for the connection

ini_set('display_errors', 1);

//connects you to database
$con = mysqli_connect("db.luddy.indiana.edu","i494f20_team16", "my+sql=i494f20_team16", "i494f20_team16");
if(mysqli_connect_errno())
{echo "Failed to connect to MySQL: " . mysqli_connect_error() . "<br>"; }
else
{ echo "DB connected. ";}


// Check for empty input signup
function emptyInputSignup($fullname, $email, $username, $password) {
	$result;
	if (empty($fullname) || empty($email) || empty($username) || empty($password)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}



// Check invalid username
function invalidUsername($username) {
	$result;
	if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

// Check invalid email
function invalidEmail($email) {
	$result;
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

// Check if username is in database, if so then return data
function usernameExists($con, $username) {
  $sql = "SELECT * FROM user WHERE username = ? OR email = ?;";
	$stmt = mysqli_stmt_init($con);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: register.php?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "ss", $username, $username);
	mysqli_stmt_execute($stmt);
	//returns the results from statement
	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	}
	else {
		$result = false;
		return $result;
	}
	mysqli_stmt_close($stmt);
}
//same thing though, with email
function emailExists($con, $email) {
  $sql = "SELECT * FROM user WHERE username = ? OR email = ?;";
	$stmt = mysqli_stmt_init($con);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: register.php?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "ss", $email, $email);
	mysqli_stmt_execute($stmt);

	//returns the results from statement
	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	}
	else {
		$result = false;
		return $result;
	}
	mysqli_stmt_close($stmt);
}

// Insert new user into database
function createUser($con, $fullname, $email, $username, $password) {
  $sql = "INSERT INTO user (fullname, email, username, password) VALUES (?, ?, ?, ?);";

	$stmt = mysqli_stmt_init($con);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: register.php?error=createfailed");
		exit();
	}
//hashes the password
	$password = md5($password);
//binds prepares and closes sql stmt
	mysqli_stmt_bind_param($stmt, "ssss", $fullname, $email, $username, $password);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	mysqli_close($con);
	header("location: register.php?error=none");
	exit();
}
?>
