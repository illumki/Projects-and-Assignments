<?php
session_start();
//echo "<p> the percentage of possibly having COVID-19 is ".$_SESSION['addResult'] ."%";
if (isset($_POST['exit'])) {
  session_unset();
  header("location: risk_system.php");
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <style>
    h1{
       text-align: center;
       text-decoration:underline;
    }
    body{
      text-align: center
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      font-size: 15px;
      line-height: 1;
      padding: 200px;
      margin: 120px;
      background-color: antiquewhite;
    }
     .percentagebttn{
      background-color: black;
      border: none;
      color: white;
      padding: 12px 24px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
      align-content: center;
    }
    .percentagebttnform{
      text-align: center;
    }

    </style>
    <meta charset="utf-8">
    <title>Percentage of Covid-19</title>
  </head>
  <body>
    <?php echo "<h1> the percentage of possibly having COVID-19 is ".$_SESSION['addResult'] ."%</h1>" ; ?>
    <h3>This is not fully accurate and any medical issues or concerns should be addressed by a medical professional. Information used here is from the CDC resource page. </h3>
    <form method="post" class = "percentagebttnform">
      <button class="percentagebttn" name="exit" type="submit"> Exit </button>
    </form>
  </body>
</html>
