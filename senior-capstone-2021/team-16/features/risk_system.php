<?php
session_start();
//connects you to database
$con = mysqli_connect("db.luddy.indiana.edu","i494f20_team16", "my+sql=i494f20_team16", "i494f20_team16");
if(mysqli_connect_errno())
{echo "Failed to connect to MySQL: " . mysqli_connect_error() . "<br>"; }
?>
<html>
<head>
    <?php
  if (isset($_POST['submit'])) {
     $_SESSION['addResult'] = 0;
     //var_dump($_POST['contact'] == 'yes');
  if ($_POST["contact"] == 'yes') {
     $_SESSION["contact"] = $_POST["contact"];
     header("location: quarantine.php");

   }
   else if ($_POST["tested"] == 'yes' || $_POST["vaccine"] == 'yes') {
     $_SESSION["tested"] = $_POST["tested"];
     $_SESSION["vaccine"] = $_POST["vaccine"];
     header("location: health.php");
   }
   else{

    if($_POST["fever"] == 'yes'){
     $_SESSION["fever"] = $_POST["fever"];
     $sql = "SELECT symptomPercent FROM symptoms_tracker WHERE SymptomsName = 'fever';";
      $result = mysqli_query($con, $sql);
      while($row = mysqli_fetch_assoc($result)) {
        $_SESSION['addResult'] = $_SESSION['addResult'] + $row["symptomPercent"];
      }
   }

    if($_POST["cough"] == 'yes'){
      $_SESSION["cough"] = $_POST["cough"];
      $sql = "SELECT symptomPercent FROM symptoms_tracker WHERE SymptomsName = 'dry cough';";
     $result = mysqli_query($con, $sql);
     while($row = mysqli_fetch_assoc($result)) {
       $_SESSION['addResult'] = $_SESSION['addResult'] + $row["symptomPercent"];
     }
   }

   if($_POST["tired"] == 'yes'){
     $_SESSION['tired'] = $_POST["tired"];
     $sql = "SELECT symptomPercent FROM symptoms_tracker WHERE SymptomsName = 'tired';";
     $result = mysqli_query($con, $sql);
     while($row = mysqli_fetch_assoc($result)) {
       $_SESSION['addResult'] = $_SESSION['addResult'] + $row["symptomPercent"];
     }
   }


   if($_POST['small'] == 'yes'){
      $_SESSION['small'] = $_POST["small"];
      $sql = "SELECT symptomPercent FROM symptoms_tracker WHERE SymptomsName = 'small symptoms';";
       $result = mysqli_query($con, $sql);
       while($row = mysqli_fetch_assoc($result)) {
         $_SESSION['addResult'] += $row["symptomPercent"];
       }
     }

     if($_POST['serious'] == 'yes'){
       $_SESSION['serious'] = $_POST["serious"];
       $sql = "SELECT symptomPercent FROM symptoms_tracker WHERE SymptomsName = 'serious symptoms';";
       $result = mysqli_query($con, $sql);
     while($row = mysqli_fetch_assoc($result)) {
      $_SESSION['addResult'] += $row["symptomPercent"];
     }
   }
  //  else {
  //  //echo $_SESSION['addResult'];
  //  header('location: percentage.php');
  // }
   header('location: percentage.php');
 }
}
 ?>
 <?php include_once '../mainframe/header.php'?>
    <form class="risk_system_bttns" action='' method="post">
    <h2 class= "title"> Covid-19 Personal Assessment</h2>
    <h3 class= "warning"> The CovTrack health assessment is only a tool and cannot diagnose you. Consult a health care provider if you have any medical concerns or questions. </h3>
    <p> 1. Have you been in contact with someone who has Covid-19? </p>
    <input type="radio" name="contact"
    <?php if (isset($contact) && $contact=="yes") echo "checked";?>
    value="yes">Yes</input>
    <input type="radio" name="contact"
    <?php if (isset($contact) && $contact=="no") echo "checked";?>
    value="no">No</input>
    <br>
    <p> 2. Have you had a vaccine for Covid-19? </p>
    <input type="radio" name="vaccine"
    <?php if (isset($vaccine) && $vaccine=="yes") echo "checked";?>
    value="yes">Yes</input>
    <input type="radio" name="vaccine"
    <?php if (isset($vaccine) && $vaccine=="no") echo "checked";?>
    value="no">No</input>
    <br>
    <p> 3. Have you been tested the past week? </p>
    <input type="radio" name="tested"
    <?php if (isset($tested) && $tested=="yes") echo "checked";?>
    value="yes">Yes</input>
    <input type="radio" name="tested"
    <?php if (isset($tested) && $tested=="no") echo "checked";?>
    value="no">No</input>
    <br>
    <p> 4. Have you experienced any low-grade fever? </p>
    <input type="radio" name="fever"
    <?php if (isset($fever) && $fever=="yes") echo "checked";?>
    value="yes">Yes</input>
    <input type="radio" name="fever"
    <?php if (isset($fever) && $fever=="no") echo "checked";?>
    value="no">No</input>
    <br>
    <p> 5. Have you experienced a dry cough? </p>
    <input type="radio" name="cough"
    <?php if (isset($cough) && $cough=="yes") echo "checked";?>
    value="yes">Yes</input>
    <input type="radio" name="cough"
    <?php if (isset($cough) && $cough=="no") echo "checked";?>
    value="no">No</input>
    <br>
    <p> 6. Have you experienced any unusual tiredness? </p>
    <input type="radio" name="tired"
    <?php if (isset($tired) && $tired=="yes") echo "checked";?>
    value="yes">Yes</input>
    <input type="radio" name="tired"
    <?php if (isset($tired) && $tired=="no") echo "checked";?>
    value="no">No</input>
    <br>
    <p> 7. Have you noticed any smaller symptoms, such as aches, sore throat, diarrhea, headaches or a loss of taste and smell? </p>
    <input type="radio" name="small"
    <?php if (isset($small) && $small=="yes") echo "checked";?>
    value="yes">Yes</input>
    <input type="radio" name="small"
    <?php if (isset($small) && $small=="no") echo "checked";?>
    value="no">No</input>
    <br>
    <p> 8. Have you noticed any serious symptoms such as difficulty of breath, Chest pain, loss of speech, immobility? </p>
    <input type="radio" name="serious"
    <?php if (isset($serious) && $serious=="yes") echo "checked";?>
    value="yes">Yes</input>
    <input type="radio" name="serious"
    <?php if (isset($serious) && $serious=="no") echo "checked";?>
    value="no">No</input>
    <br>
    <button name = "submit" class = "submit" type = "submit">Submit</button>

  </form>
  <script src="../mainframe/websiteNav.js"></script>
  <script type="text/javascript" src="../mainframe/darkmode.js"></script>
  </body>
</html>
