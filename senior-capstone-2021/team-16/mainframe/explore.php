<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//connects you to database
$con = mysqli_connect("db.luddy.indiana.edu", "i494f20_team16", "my+sql=i494f20_team16", "i494f20_team16");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error() . "<br>";
} else {
   echo "DB connected. ";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Coronavirus News API</title>
  <!-- <link href="HomePage.css" rel="stylesheet" /> -->
  <script src="bootstrap.js"></script>
  <?php include_once 'header.php' ?>
  <link href="explore.css" rel="stylesheet" />

  <section id="picture_background2">
    <div class="container">
      <h1>Explore CovTrack</h1>
      <p>This is the explore page for IU students, it is where students can be kept up to date on the latest news and articles on the pandemic and vaccination developments</p>
    </div>
  </section>
  <h1> Indiana Statistics </h1>
  <div id="covidData">
    <table class = "covidData">
      <tr>
        <th class="ch">Total Cases</th>
        <th class="ch">Total Deaths</th>
        <th class="ch">Total Hospitalized</th>
        <!-- <th class="ch">Total Recovered</th> -->
      </tr>
      <tr>
        <td class="cd" id="totalCases"></td>
        <td class="cd" id="totalDeath"></td>
        <td class="cd" id="totalHospitalized"></td>
        <!-- <td class="cd" id="totalRecovered"></td> -->
      </tr>
    </table>
  </div>
  <h1>Explore Testing and Vaccine Areas</h1>
  <style>
    #map {
      height: 50%;
      width: 60%;
    }
  </style>
</head>

<html>

<body>
  <div id="map"></div>

  <script>
    var customLabel = {
      vaccines: {
        label: 'V'
      },
      testing: {
        label: 'T'
      }
    };

    function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        center: new google.maps.LatLng(39.1653, -86.5264),
        zoom: 12
      });
      var infoWindow = new google.maps.InfoWindow;

      // Change this depending on the name of your PHP or XML file
      downloadUrl('https://cgi.luddy.indiana.edu/~joncheng/team-16/mainframe/domxml.php', function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName('marker');
        Array.prototype.forEach.call(markers, function(markerElem) {
          var id = markerElem.getAttribute('id');
          var name = markerElem.getAttribute('name');
          var address = markerElem.getAttribute('address');
          var type = markerElem.getAttribute('type');
          var point = new google.maps.LatLng(
            parseFloat(markerElem.getAttribute('lat')),
            parseFloat(markerElem.getAttribute('lng')));

          var infowincontent = document.createElement('div');
          var strong = document.createElement('strong');
          strong.textContent = name
          infowincontent.appendChild(strong);
          infowincontent.appendChild(document.createElement('br'));
          var customLabel = {
            testing: {
              label: 'T'
            },
            vaccine: {
              label: 'V'
            }
          };
          var text = document.createElement('text');
          text.textContent = address
          infowincontent.appendChild(text);
          var icon = customLabel[type] || {};
          var marker = new google.maps.Marker({
            map: map,
            position: point,
            label: icon.label
          });
          marker.addListener('click', function() {
            infoWindow.setContent(infowincontent);
            infoWindow.open(map, marker);
          });
        });
      });
    }



    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }

    function doNothing() {}

    function getCovid() {
      fetch("https://api.covidtracking.com/v2/states/in/daily/simple.json")
        .then((response) => response.json())
        .then((data) => {
          console.log(data.data[0])

          var totalCases = data.data[0].cases.total
          var totalDeath = data.data[0].outcomes.death.total
          var totalHospitalized = data.data[0].outcomes.hospitalized.total
          var totalRecovered = data.data[0].outcomes.recovered

          fetch("https://cgi.luddy.indiana.edu/~team16/team-16/features/addCovidData.php?totalCases="+totalCases+"&totalDeath="+totalDeath+"&totalHospitalized="+totalHospitalized+"&totalRecovered="+totalRecovered)
            .then((response) => response.json())
            .then((data) => console.log(data));
        });
    }
    getCovid()
    function getCovidData() {
    fetch("https://cgi.luddy.indiana.edu/~team16/team-16/features/getCovidData.php")
    .then((response) => response.json())
    .then((data) => {
    console.log(data)
    document.getElementById('totalCases').innerHTML =data.data[0].totalCases
    document.getElementById('totalDeath').innerHTML =data.data[0].totalDeath
    document.getElementById('totalHospitalized').innerHTML =data.data[0].totalHospitalized
    document.getElementById('totalRecovered').innerHTML =data.data[0].totalRecovered
    });
    }
    getCovidData()
  </script>
  <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCsKDkSVNZHD63rQKOTAqpiBjNxkulaeV8&callback=initMap">
  </script>
</body>

<?php
$url = "http://newsapi.org/v2/everything?q=coronavirus&apiKey=d66f1dd825ba4f78bc2f402c589283c4";
$response = file_get_contents($url);
$NewsData = json_decode($response);
?>
<h1>Explore Coronavirus News</h1>
<div class="container-fluid">
  <?php
  foreach ($NewsData->articles as $News) {
  ?>
    <div class="row NewsGrid">
      <div class="col-md-3">
        <img src="<?php echo $News->urlToImage  ?>" alt="News thumbnail" class="rounded" width="500" height="300">
      </div>
      <div class="col-md-9">
        <h2>Title: <?php echo $News->title ?></h2>
        <h2>Description: <?php echo $News->description ?></h2>
        <p>Content: <?php echo $News->content ?></p>
        <p>Author: <?php echo $News->author ?></p>
        <p>Published: <?php echo $News->publishedAt ?></p>
      </div>
    </div>
  <?php
  }
  ?>
</div>
<script src="websiteNav.js"></script>
 <script type="text/javascript" src="darkmode.js"></script>
</body>

</html>
