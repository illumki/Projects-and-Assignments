function DarkMode() {
   var element = document.body;
   var user_id = JSON.parse(localStorage.getItem('user')).UserID;
   fetch('https://cgi.luddy.indiana.edu/~team16/team-16/mainframe/settings.php?user_id='+user_id)
  .then(response => response.json())
  .then(data =>{
       if(data[0].body_value_name  ==  "darkmode"){
          element.classList.add("dark-mode");

       }
       else {
         element.classList.remove('dark-mode');

       }
    });

 }
 function updateDarkmode() {
   var user_id = JSON.parse(localStorage.getItem('user')).UserID;
   var element = document.body;
   var body_value_name = element.classList.contains('dark-mode')?'lightmode':'darkmode';
   var body_value = element.classList.contains('dark-mode')?0:1;
   element.classList.contains('dark-mode')?element.classList.remove('dark-mode'):element.classList.add('dark-mode');
   fetch('https://cgi.luddy.indiana.edu/~team16/team-16/mainframe/updateSettings.php?body_value_name='+body_value_name+'&body_value='+body_value_name+'&UserID='+user_id)
  .then(response => response.json())
  .then(data =>{
    console.log(data);
    });
 }
DarkMode();
