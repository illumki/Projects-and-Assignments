<html lang="en">
<head>
<title>Login</title>
<link rel="stylesheet" type="text/css" href="login.css">
<meta charset='utf-8'>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="google-signin-scope" content="profile email">
<meta name="google-signin-client_id" content="304150552748-ih7ltn4710o3gsv1hs9qv0sef6plh7bn.apps.googleusercontent.com">
<script src="https://apis.google.com/js/platform.js" async defer></script>
</head>

<body>
<form class="form" action="" method="get" enctype="multipart/form-data">
<h1 class="login-title">COVTRACK Login</h1>
<div id="google-log" class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"><input type="hidden" name="data"></div>
</form>
</body>


<script type="text/javascript">
function onSignIn(googleUser) {
// user profile information within google
var profile = googleUser.getBasicProfile();
console.log("ID: " + profile.getId()); // Don't send this directly to your server!
console.log('Full Name: ' + profile.getName());
console.log('Given Name: ' + profile.getGivenName());
console.log('Family Name: ' + profile.getFamilyName());
console.log("Image URL: " + profile.getImageUrl());
console.log("Email: " + profile.getEmail());
var id_token = googleUser.getAuthResponse().id_token;
localStorage.setItem("img", profile.getImageUrl());
localStorage.setItem("token", id_token);
localStorage.setItem("currentEmail", profile.getEmail());
localStorage.setItem("userGetName", profile.getName());
localStorage.setItem("adminName", profile.getName());
console.log("variabletest");
fetch('https://cgi.luddy.indiana.edu/~team16/team-16/mainframe/registerUser.php?email='+ profile.getEmail() + '&fullname=' + profile.getName())
.then(response => response.json())
.then(data => {
console.log(data);
localStorage.setItem('user', JSON.stringify(data.data[0]))
});
window.location.replace("https://cgi.luddy.indiana.edu/~team16/team-16/mainframe/home.php?signin=google&email=" + profile.getEmail() + "&full_name=" + profile.getName());
// The ID token you need to pass to your backend:
//var id_token = googleUser.getAuthResponse().id_token;
console.log("ID Token: " + id_token);

}
</script>

</html>
