<?php
session_start();
?>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<meta name="google-signin-client_id" content="304150552748-ih7ltn4710o3gsv1hs9qv0sef6plh7bn.apps.googleusercontent.com">
<style>
body{
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    font-size: 15px;
    line-height: 1;
    padding: 0;
    margin: 0;
    background-color: antiquewhite;
    top
}
.dark-mode {
  background-color: black;
  color: white;
}
.container{
    width: 80%;
    margin: auto;
    overflow: hidden;
}

.logo {
    padding: 20px;
    text-transform: uppercase;
    letter-spacing: 2px;
    font-size: 20px;
    top
}
.nav-links{
    color: white;
    display: flex;
    justify-content: space-around;
    width: 35%;
    /* Makes the element appear on top */
    z-index: 1;
}

.covtrack_title { color :black;
  text-decoration: none;
}

.nav-links li{
    list-style: none;
}

.nav-links a{
    top : 30px;
    color: white;
    text-decoration: none;
    letter-spacing: 3px;
    font-weight: bold;
    font-size: 14px;
}

.options div{
    width: 25px;
    height: 3px;
    background-color:black;
    margin: 5px;
    transition: all 0.3s ease;
}

.options{
    display: none;
}

@media only screen and (max-width: 1024px) {
    .nav-links{
        width: 60%
    }
}

@media only screen and (max-width: 1540px) {
    body{
        overflow-x: hidden;
    }

    .nav-links{
        position: fixed;
        right: 0px;
        height: 92vh;
        top: 8vh;
        background-color: darkgrey;
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 30%;
        transform: translateX(100%);
        transition: transform 0.5s ease-in;
    }
    .nav-links li{
        opacity: 0;
    }
    .options{
        display: block;
    }
}

.nav-active{
    transform: translateX(0%);
    z-index: 1;
}

@keyframes navLinkFade{
    from{
        opacity: 0;
        transform: translateX(50px);
    }
    to{
        opacity: 1;
        transform: translateX(0px);
    }
}

.toggle .line1 {
    transform: rotate(-45deg) translate(-5px, 6px);
}

.toggle .line2 {
    opacity: 0;
}

.toggle .line3 {
    transform: rotate(45deg) translate(-5px, -6px);
}


header{
    background: #404040;
    padding-top: 30px;
    min-height: 70px;
}

header a{
    text-decoration: none;
    font-size: 20px;
}


header li{
    float: right;
    display: inline;
    padding: 0 10px 0 10px;
}

header #title{
    float: left;
}

header #title h1{
  color: white;
    margin: 0;
}

#idsignout {
  cursor: pointer;
}

header nav{
    display: flex;
    justify-content: space-around;
    align-items: center;
    min-height: 2vh;
}
#picture_background{
    min-height: 400px;
    background: url('../mainframe/img/bloomintoncampus.jpg') no-repeat 0 -300px;
    text-align: center;
    color: white;
}

#picture_background2{
    min-height: 200px;
    background: url('../mainframe/img/research.jpg') repeat 0 -200px;
    text-align: center;
    color: white;
}


#picture_background h1{
    margin-top: 100px;
    font-size: 40px;
    margin-bottom: 10px;
}

#picture_background2 h1{
    margin-top: 50px;
    font-size: 40px;
    margin-bottom: 10px;
}

#picture_background p{
    font-size: 30px;
}

#separator h1{
    text-align: center;
}

#boxes{
    margin-top: 20px;
}
.risk_system_bttns p{
font-size: 16px;
margin-left: 50px;
}
.risk_system_bttns input{
font-size: 16px;
margin-top: 60px;
margin-bottom: 60px;
margin-left: 50px;

}

.risk_system_bttns .submit{
background-color: black;
border: none;
color: white;
padding: 15px 32px;
text-align: center;
text-decoration: none;
display: inline-block;
font-size: 16px;
margin: 4px 2px;
cursor: pointer;
margin-left: 50px;
}

.risk_system_bttns h2{
  font-size: 30px;
  text-align: center;
  text-decoration:underline;

}
.risk_system_bttns h3{
  text-align: center;
  font-size:22px;

}

#boxes .box a{
    text-decoration: none;
}

#boxes .box{
    float: left;
    text-align: center;
    width: 50%;
    padding: 10px;
}
.jumbotron{
	background-color: darkcyan;
}
.jumbotron h1{
	color: black;
}
body{
	background-color: cornsilk;
}
/* Button styling */
button, input[type="submit"]{
    border: none;
    border-radius: 4px;
    color: #202020;
	background-color: aquamarine;
}
</style>
<script>
if (!localStorage.getItem('token')) {
  window.location.replace("https://cgi.luddy.indiana.edu/~team16/team-16/mainframe/googleLogin.php")
}
</script>
<script>
  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();

    auth2.signOut().then(function () {
      console.log('User signed out.');
      localStorage.removeItem("token");
      window.location.replace("https://cgi.luddy.indiana.edu/~team16/team-16/mainframe/googleLogin.php");
    });
  }

  function onLoad() {
        gapi.load('auth2', function() {
          gapi.auth2.init();
        });
      }
</script>
<script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
</head>
<body>
<header>
    <div class="container">
        <div id = "title">
            <h1><a href="../mainframe/home.php" style=color:white;>CovTrack</a></h1>
        </div>

        <nav>
            <ul class="nav-links">
		<li> <a href ="../mainframe/home.php">Home</a></li>
                <li> <a href ="../mainframe/explore.php">Explore</a></li>
                <li> <a href ="../mainframe/about.php">About</a></li>
                <li> <a href ="../mainframe/heat_map.php">Heat Map</a></li>
                <li> <a href ="../features/messageBoard.php">Forum Page</a></li>
                <li> <a href ="../features/risk_system.php">Risk System</a></li>
		<li> <a href ="../features/profile.php">Profile</a></li>
                <li><a id="idsignout" onclick="signOut();logout.php;">Sign out</a></li>
                <button onclick="updateDarkmode()">Toggle dark mode</button>


            </ul>
        <div class="options">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
        </nav>
    </div>
</header>
