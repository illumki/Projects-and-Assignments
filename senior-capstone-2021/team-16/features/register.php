<?php
//connection

ini_set('display_errors', 1);

//connects you to database
$con = mysqli_connect("db.luddy.indiana.edu","i494f20_team16", "my+sql=i494f20_team16", "i494f20_team16");
if(mysqli_connect_errno())
{echo "Failed to connect to MySQL: " . mysqli_connect_error() . "<br>"; }
else
{ echo "DB connected. ";}

if (isset($_POST["submit"])) {

  //grab data from page
  $fullname = $_POST["fullname"];
  $email = $_POST["email"];
  $username = $_POST["username"];
  $password = $_POST["password"];

  // grab functions page
  require_once 'functions.php';

  //checks to see if any inputs are empty
  if (emptyInputSignup($fullname, $email, $username, $password) !== false) {
    header("location: registerPage.php?error=emptyinput");
		exit();
  }
	//Checks to see if username has correct syntax
  if (invalidUsername($username) !== false) {
    header("location: registerPage.php?error=invalidusername");
		exit();
  }
  //Checks email entered has correct syntax
  if (invalidEmail($email) !== false) {
    header("location: registerPage.php?error=invalidemail");
		exit();
  }

  //Checks to see if the username already is taken
  if (usernameExists($con, $username) !== false) {
    header("location: registerPage.php?error=usernametaken");
		exit();
  }
  //Checks to see if the username already is taken
  if (emailExists($con, $email) !== false) {
    header("location: registerPage.php?error=emailtaken");
		exit();
  }

  // errors arent found

  // Now we insert the user into the database
  createUser($con, $fullname, $email, $username, $password);

} else {
	header("location: ../mainframe/googleLogin.php");
    exit();
}
?>
