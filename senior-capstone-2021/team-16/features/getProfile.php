<?php
//connects you to database
$con = mysqli_connect("db.luddy.indiana.edu","i494f20_team16", "my+sql=i494f20_team16", "i494f20_team16");
// $con = mysqli_connect("localhost","root", "", "team16");
$display = "Cannot connect to database";
if(mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error() . "<br>"; 
}else{

    $display = "<button onclick='change()'>Set Up Profile</button>";
    $email = $_GET['email'];
    $qry = "SELECT * FROM user where email = '$email'";

    $res = $con -> query($qry);
    if($row = $res->fetch_row()){
        $display = "
            <table>
                <tr><td colspan=2><img src='".$row[0].".jpg' alt='Profile Image'  style='width:300px; max-height:300px'/></td></tr>
                <tr><th>Full Name :</th><td>".$row[2]."</td></tr>
                <tr><th>Email :</th><td>".$row[1]."</td></tr>
                <tr><th>City :</th><td>".$row[3]."</td></tr>
                <tr><th>Street :</th><td>".$row[4]."</td></tr>
                <tr><th>State :</th><td>".$row[5]."</td></tr>
                <tr><th>Zip :</th><td>".$row[6]."</td></tr>
                <tr><td colspan=2 style='text-align: center'><button onclick='change(".$row[0].")'>Change Profile</button></td></tr>
            </table>
        ";
    }

    echo $display;
}
?>