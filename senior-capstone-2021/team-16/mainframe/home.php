<?php
session_start();
//connects you to database
$con = mysqli_connect("db.luddy.indiana.edu","i494f20_team16", "my+sql=i494f20_team16", "i494f20_team16");
if(mysqli_connect_errno())
{echo "Failed to connect to MySQL: " . mysqli_connect_error() . "<br>"; }


if (isset($_GET['signin']) && $_GET['signin'] == 'google') {
  $sql1 = "SELECT * FROM user WHERE email = '".$_GET['email']."'";
  //store email in the server session
  $_SESSION['email'] = $_GET['email'];
  $q = mysqli_query($con, $sql1);
  if (mysqli_num_rows($q) == 0) {
    $sql = "INSERT INTO user (email, fullname) VALUES ('".$_GET['email']."','".$_GET['full_name']."')";
    mysqli_query($con, $sql);
    $user_id = mysql_insert_id($con);
  }
  else{

    while ($obj = mysqli_fetch_object($q)) {
     $user_id = $obj->UserID;
}
}
}
// if (mysqli_num_rows($q) == 0) {
//     $insertsql = "INSERT INTO user_settings (UserID, body_value_name, body_value)
//     VALUES (51, 'lightmode', 1)";
//     //mysqli_query($con, $insertsql);
//     $con->query($insertsql);
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="HomePage.css"> -->
    <title id = "adminTitle">COVTRACK</title>
    <?php include_once 'header.php'; ?>
    <section id = "picture_background">
        <div class = "container">
            <h1> COVID-19 Resource Page for Indiana University Students</h1>
            <p>This website is a resource for IU students to reference from to see the current news and methods of being safe within our community</p>
        </div>
    </section>

    <section id = "separator">
        <div class = "container">
            <h1 id = "giveUsername"> Welcome  to COVTRACK!</h1>
        </div>
    </section>


    <section id = "boxes">

        <div class="container">
            <div class = "box">
                <h3>Indiana Resource</h3>
                <p>Resource for anyone that lives in Indiana</p>
            </div>
            <a href="https://www.coronavirus.in.gov/">
            <img src="img/COVID indiana.jpg" width="600" height="300"></a>

            <div class = "box">
                <h3>COVID-19 Resource</h3>
                <p>Resource for COVID-19</p>
            </div>
            <a href="https://www.cdc.gov/coronavirus/2019-ncov/index.html">
            <img src="img/coronavirus-Information.png" width="600" height="300"></a>

            <div class = "box">
                <h3>COVID-19 Assistance</h3>
                <p>Resource for Assistance</p>
            </div>
            <a href="https://www.benefits.gov/help/faq/Coronavirus-resources">
            <img src="img/covid help.jpg" width="600" height="300"></a>

        </div>
    </section>
    <script src="websiteNav.js"></script>
    <script type="text/javascript" src="darkmode.js"></script>
    <script>
        admin1 = localStorage.getItem('user').fullname;
        console.log(admin1);
          if (localStorage.getItem('user')){
          document.getElementById('giveUsername').innerHTML = "Welcome to COVTRACK, "+ JSON.parse(localStorage.getItem('user')).fullname + " " + "(" + JSON.parse(localStorage.getItem('user')).admin + ")";
          } else {
            document.getElementById('giveUsername').innerHTML = "Welcome to COVTRACK, "+ JSON.parse(localStorage.getItem('user')).fullname;
      }
     
    </script>
</body>

</html>
