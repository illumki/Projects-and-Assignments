<!DOCTYPE html>
<?php
session_start();
//connects you to database
$con = mysqli_connect("db.luddy.indiana.edu","i494f20_team16", "my+sql=i494f20_team16", "i494f20_team16");
// $con = mysqli_connect("localhost","root", "", "team16");
if(mysqli_connect_errno())
{echo "Failed to connect to MySQL: " . mysqli_connect_error() . "<br>"; }

?>

<html>
    <head>
        <title> Forum!! </title>
        <link rel="stylesheet" type="text/css" href="mstyles.css">
  <?php include_once '../mainframe/header.php'; ?>

        </header>
        <div class='content'>
           <div class='main'>
                <h2> Forum Page </h2>

                <div id="posts">

                  <?php

                    $sql = "Select * from message_board where parentID=0 order by date_created desc";

$sql = "SELECT user.email, user.UserId as uid, user.fullname, message_board.*
FROM message_board
INNER JOIN user
ON message_board.UserID = user.UserID
where parentID=0 order by date_created desc";

$rs1 = mysqli_query($con, $sql);

while ($obj1 = mysqli_fetch_object($rs1)) {
    $img = $obj1->uid.".jpg";
    if(!file_exists($img)){
        $img = "profile.png";
    }
    echo "<div class='post'><img src='".$img."' alt='Profile'/><p>".$obj1->fullname."&nbsp;&nbsp;<i>".$obj1->date_created."</i><br>".$obj1->body."
     </p><button onclick='show(\"" .$obj1->postID. "\")' id='btn-" .$obj1->postID. "'>Comment</button><br>
            <form id='cmt-" .$obj1->postID. "' class='cmt' action='posts.php' method='post'><input type='hidden' value='' name='email' class='c_mail'><textarea name='message'></textarea>
            <input type='hidden' name='parent' value='".$obj1->postID."'/><input type='submit' value='send' name='post'/></form>";

    $sql_replies = "SELECT user.email, user.fullname, user.UserId as uid, message_board.*
            FROM message_board
            INNER JOIN user
            ON message_board.UserID = user.UserID where parentID=".$obj1->postID."
            order by date_created asc";

    $rs2 = mysqli_query($con, $sql_replies);
    while ($rs2 && $obj2 = mysqli_fetch_object($rs2)) {
        $img = $obj2->uid.".jpg";
        if(!file_exists($img)){
            $img = "profile.png";
        }
        echo "<div class = 'cmts'><div class='post'><img src='".$img."' alt='Profile'/><p>".$obj2->fullname."&nbsp;&nbsp;<i>".$obj2->date_created."</i><br>".$obj2->body."</p></div></div>";

    }
    echo "<p><hr></p>";
}

?>
<h3>Say Something...</h3><form action='posts.php' method='post'><textarea name='message'></textarea>
        <input type="hidden" value="" name="email" id="m_mail">
        <input type='submit' value='send' name='post'/></form></div>



                </div>
           </div>
        </div>
        <script> 
            document.getElementById("m_mail").value = localStorage.getItem("currentEmail");

            let cmts = document.getElementsByClassName("c_mail");
            for(var i = 0; i < cmts.length; i++){
                cmts[i].value = localStorage.getItem("currentEmail");
            }
        </script>
        <script src="../mainframe/websiteNav.js"></script>
        <script type="text/javascript" src="../mainframe/darkmode.js"></script>

    </body>

    <script>

  function show(id) {
    document.getElementById("cmt-" + id).classList.toggle("show");
}

</script>
</html>
