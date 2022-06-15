<!DOCTYPE html>
<html>
    <head>
        <title> Profile </title>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <link rel="stylesheet" type="text/css" href="mstyles.css">
    </head>
    <body>
    <?php include_once '../mainframe/header.php'; ?>
        <div class='content'>
           
            <center id='profile'>
                
            </center>
            <form id="change" action='saveProfile.php' method='post' enctype="multipart/form-data" style='display:none'>
                <h3>Manage Profile</h3>
                <div>
                    <label for='fname'>Full Name</label><br>
                    <input type="text" name='fname' id='fname' required><br>
                </div>
                <div >
                    <label for='city'>City</label><br>
                    <input type="text" name='city' id='city' required><br>
                </div>
                <div>
                    <label for='street'>Street</label><br>
                    <input type="text" name='street' id='street' required><br>
                </div>
                <div>
                    <label for='state'>State</label><br>
                    <input type='text' name='state' id='state' required><br>
                </div>
                <div>
                    <label for='zip'>Zip</label><br>
                    <input type="text" name='zip' id='zip' required><br>
                </div>
                <div>
                    <span>Profile image</span>
                    <input type="file" name="profile" id='image'>
                </div>
                <input type="hidden" name = 'id' value='0' id='uid'>
                <input type='submit' value='Save' name='change'>
                <?php
                    if(isset($_GET['failed'])){
                        echo "<p>".$_GET['failed']."</p>";
                    }
                ?>
            </form>
            <form id="setup" action='saveProfile.php' method='post' enctype="multipart/form-data" style='display:none'>
                <h3>Set Up Profile</h3>
                <div>
                    <label for='fname'>Full Name</label><br>
                    <input type="text" name='fname' id='fname' required><br>
                </div>
                <div >
                    <label for='city'>City</label><br>
                    <input type="text" name='city' id='city' required><br>
                </div>
                <div>
                    <label for='street'>Street</label><br>
                    <input type="text" name='street' id='street' required><br>
                </div>
                <div>
                    <label for='state'>State</label><br>
                    <input type='text' name='state' id='state' required><br>
                </div>
                <div>
                    <label for='zip'>Zip</label><br>
                    <input type="text" name='zip' id='zip' required><br>
                </div>
                <div>
                    <span>Profile image</span>
                    <input type="file" name="profile" id='image'>
                </div>
                <input type='submit' value='setup' name='setup'>
                <?php
                    if(isset($_GET['failed'])){
                        echo "<p>".$_GET['failed']."</p>";
                    }
                ?>
            </form>
              </div> 
              <script src="profileScript.js"></script>     
    </body>
        <script src="mscript.js"></script>
        <script src="../mainframe/websiteNav.js"></script>
		<script type='text/javascript' src="../mainframe/darkmode.js"></script>
</html>