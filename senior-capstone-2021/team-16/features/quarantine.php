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
    CovTrack Quarantine
  </title>
</head>
<body>
  <h1> It is recommended that you quarantine immediately for the next two weeks(14 days) </h1>
  <h3> Medical health care providers recommend to not be in contact with anyone if you have possibly been exposed with COVID-19 during the pandemic. Even with a test or vaccine, it is still recommended you stay in your residence to maintain widespread. Family members should also get tested for safety within your community. </h3>
  <form method="post" class = "percentagebttnform">
    <button class="percentagebttn" name="exit" type="submit"> Exit </button>
  </form>
</body>
</html>
