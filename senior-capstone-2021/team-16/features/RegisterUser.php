<?php


    function register(){
        $fullname = $_POST['fname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        if($password){
            $type = strtolower(pathinfo($_FILES['profile']['name'], PATHINFO_EXTENSION));
            $target_file = $fullname.".".$type;
            $uploadOk = 0;
            if (move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file)) {
                $uploadOk = 1;
            }

            if($uploadOk == 1){
                $log = fopen("users.txt", "a");
                fwrite($log, $fullname.",".$email.",".$phone.",".$password);
                fclose($log);
                header("Location: googleLogin.php?register_success=true");
            }else{
                header("Location: register.php?failed=Could not upload image");
            }
        }
    }
    register();

?>
