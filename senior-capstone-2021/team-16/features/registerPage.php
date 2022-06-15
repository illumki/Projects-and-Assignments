<?php
//connects you to database
$con = mysqli_connect("db.luddy.indiana.edu","i494f20_team16", "my+sql=i494f20_team16", "i494f20_team16");
if(mysqli_connect_errno())
{echo "Failed to connect to MySQL: " . mysqli_connect_error() . "<br>"; }
?>

<html>
<head>
  <link rel="stylesheet" type="text/css" href="registerPage.css">
</head>
<body>
    <form class="form" action="register.php" method="post">
      <h2>COVTRACK SIGNUP</h2>
      <input type="text" class="rinput" name="fullname" placeholder="Full name...">
      <input type="text" class="rinput" name="email" placeholder="Email...">
      <input type="text" class="rinput" name="username" placeholder="Username...">
      <input type="password" class="rinput" name="password" placeholder="Password...">
      <button type="submit" name="submit">Register</button>
    </form>
</body>
</html>
