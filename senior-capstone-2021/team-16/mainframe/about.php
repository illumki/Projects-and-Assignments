<?php
session_start();
//connects you to database
$con = mysqli_connect("db.luddy.indiana.edu","i494f20_team16", "my+sql=i494f20_team16", "i494f20_team16");
if(mysqli_connect_errno())
{echo "Failed to connect to MySQL: " . mysqli_connect_error() . "<br>"; }

$title="";
$body="";

$bio_out="";

$sql1 = "SELECT * FROM pages WHERE pagename='about'";
  $q = mysqli_query($con, $sql1);
  

    while ($obj = mysqli_fetch_object($q)) {
     $title = $obj->title;
     $body = $obj->body;
    }
      
$sql2 = "SELECT * FROM bios order by lastname, firstname";
  $q2 = mysqli_query($con, $sql2);
  

    while ($obj2 = mysqli_fetch_object($q2)) {
     $bio_out.="<p>".$obj2->firstname." ".$obj2->lastname."<br />";
     $bio_out.=$obj2->email."<br />";
     $bio_out.=$obj2->bio."</p><hr />";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="HomePage.css"> -->
    <title>Capstone Rough Draft</title>
    <?php include_once 'header.php'; ?>
    <section id = "picture_background">
        <div class = "container">
        <h1><?php echo $title ?></h1>
    	<h1><?php echo $body ?></h1>   
        </div>
    </section>

    <section id = "separator">
        <div class = "container">
        <h1><?php echo $bio_out ?></h1>
        </div>
    </section>


    <script src="websiteNav.js"></script>
    <script type="text/javascript" src="darkmode.js"></script>
</body>

</html>