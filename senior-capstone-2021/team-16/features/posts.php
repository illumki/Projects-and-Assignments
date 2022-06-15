<?php
session_start();

//check if a message was sent in the request
if(isset($_POST['message'])){
	//extract the message
    $message = $_POST['message'];
    $email = $_POST['email'];

	//check if the message is empty
    if($message != ""){
		//set parent id to -1 initially
        $parent = "0";
		//check if the parent has been sent. This is to determine if this is a comment to a post and which post it is
        if(isset($_POST['parent'])){
			//get the parent id
            $parent = $_POST['parent'];
        }
		
		//get the current date and time
        $date = date('Y-m-d H:i:s');
        //connect to db
         $con = mysqli_connect("db.luddy.indiana.edu","i494f20_team16", "my+sql=i494f20_team16", "i494f20_team16");
        // $con = mysqli_connect("localhost","root", "", "team16"); $user_id = 1;

        $query = "SELECT UserID from user where email = '$email'";
        $res = mysqli_query($con, $query);
        if ($obj2 = mysqli_fetch_object($res)) {
            $user_id = $obj2->UserID;
        }

        // echo $con->errno;
       
			//insert the post data to the database
            $query = "INSERT INTO message_board (body, date_created, UserID, parentID)
            VALUES ('$message', '$date', $user_id, $parent)";

            mysqli_query($con, $query);
            //$con->query($query);

            //echo $con->errno;
        //write the post to the file
        //fwrite($write, "\n".$id.",".$parent.",".$message.",".$date);
    }
}
//redirect back to the message board
header("Refresh:0; url=messageBoard.php");
?> 