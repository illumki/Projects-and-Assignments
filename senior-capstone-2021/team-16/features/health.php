<?php
session_start();
if (isset($_POST['exit'])) {
  session_unset();
  header("location: risk_system.php");
}
 ?>

<html>
<head>
  <style>
  h1{
     text-align: center;
    border: 2px solid black;
  }
  body {
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
  <title>
    CovTrack Health
  </title>
</head>
<body>
  <h1>Check-up and Health screen</h1>
  <p> If you are still showing smaller symptoms even with being tested and a vaccine, it is recommended you visit a medical center and have a check-up along with another COVID-19 test due to false negative reports. </p>
  <form method="post" class = "percentagebttnform">
    <button class="percentagebttn" name="exit" type="submit"> Exit </button>
  </form>
</body>
</html>
