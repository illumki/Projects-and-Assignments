<!DOCTYPE html>
<?php
//connects you to database
$con = mysqli_connect("db.luddy.indiana.edu","i494f20_team16", "my+sql=i494f20_team16", "i494f20_team16");
if(mysqli_connect_errno())
{echo "Failed to connect to MySQL: " . mysqli_connect_error() . "<br>"; }
else 
{echo "connect successful" . "<br>"; }
?>
<html>
    <head>

        <title> Accessibility</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
    <body>
    <header>
            <h1>COVID TRACKER</h1>
        </header>
        <div class='content'>
           <div class='sidebar'>
                <div class='sidebar-content'>
                    <img src="profile.png" alt="Profile">
                    <button><a href="index.php">Home</a></button><br><br>
                </div>
           </div>
           <div class='main'>
                <h2>Accessibility</h2>
                <table>
                    <tr>
                        <td>
                            <p>Dark Mode</p>
                        </td>
                        <td>
                            <input type="checkbox" id='dark-mode'>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Color</p>
                        </td>
                        <td>
                            <input type="color" id='color'>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Text Size</p>
                        </td>
                        <td>
                            <input type="number" id='text-size' min=5 max=16>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <button onclick="accessibilityChanges()">Apply</button>
                        </td>
                    </tr>
                </table>
           </div>             
        </div>      
        <script>
            
            function accessibilityChanges(){
                let textSizeNum = document.getElementById("text-size").value;
                let color = document.getElementById("color").value;
                let darkMode = document.getElementById("dark-mode").checked;
                let textSize = textSizeNum.toString()+"pt";

                let applied = {
                    "darkMode": darkMode,
                    "textSize": textSize,
                    "color": color
                }
               
                localStorage.setItem("accessibilityFeatures", JSON.stringify(applied));

                applyAccessibilityFeatures();
            }

            

        </script>

        <script src="script.js"></script>
    </body>
    </body>
</html>