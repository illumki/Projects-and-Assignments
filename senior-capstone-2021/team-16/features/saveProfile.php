<?php

    
    function changeProfile(){
        $fname = $_POST['fname'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
        $street = $_POST['street'];
        $id = $_POST['id'];

        $con = mysqli_connect("db.luddy.indiana.edu","i494f20_team16", "my+sql=i494f20_team16", "i494f20_team16");
        // $con = mysqli_connect("localhost","root", "", "team16");

        $res = mysqli_query($con, "SELECT * FROM user");
        $row = $res->fetch_row();
        $oldfname = $row[2];

        unlink($oldfname.".jpg");
        
        $type = strtolower(pathinfo($_FILES['profile']['name'], PATHINFO_EXTENSION));
        $target_file = $id.".jpg";
        $uploadOk = 0;
        if (move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file)) {
            $uploadOk = 1;
        }

        if($uploadOk){
            $sql = "UPDATE user set fullname = '$fname', city = '$city', street = '$street', state = '$state', zip = $zip where UserId = $id";
            if (mysqli_query($con, $sql)) {
                header("Location: profile.php?success=Profile Saved Successfully");
            } else {
                header("Location: profile.php?fail=Failed to save profile information");
            }
        }else{
            header("Location: profile.php?fail=Failed to save profile information");
        }

        
            
        
    }

    function setupProfile(){
        $fname = $_POST['fname'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
        $street = $_POST['street'];
        $email = $_SESSION['email'];
        
        
        $type = strtolower(pathinfo($_FILES['profile']['name'], PATHINFO_EXTENSION));
        $target_file = $fname.".jpg";
        $uploadOk = 0;
        if (move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file)) {
            $uploadOk = 1;
        }

        if($uploadOk == 1){
            
            $sql = "UPDATE user set fullname = '$fname', city = '$city', street = '$street', state = '$state', zip = $zip where UserId = $id";
            $con = mysqli_connect("db.luddy.indiana.edu","i494f20_team16", "my+sql=i494f20_team16", "i494f20_team16");
            // $con = mysqli_connect("localhost","root", "", "team16");
            if (mysqli_query($con, $sql)) {
                header("Location: profile.php?success=Profile Saved Successfully");
             } else {
                header("Location: profile.php?fail=Failed to save profile information");
             }
            
        }else{
            header("Location: profile.php?fail=Failed to save profile information");
        } 
        
    }
    
    if(isset($_POST['setup'])){
        setupProfile();
    }else if(isset($_POST['change'])){
        changeProfile();
    }

?>