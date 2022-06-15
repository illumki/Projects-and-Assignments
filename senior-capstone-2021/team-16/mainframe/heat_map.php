<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="covtrack.css">
    <link rel="stylesheet" href="heatmap.css">
    <title>Capstone Rough Draft</title>
    <?php include_once '../mainframe/header.php'; ?>

</head>

<style>
    #map {
        height: 600px;
        width: 65%;
    }
</style>




<div id="floating-panel">
    <button onclick="toggleHeatmap()"> Toggle Heatmap </button>
    <button onclick="changeGradient()"> Change Gradient</button>
    <button onclick="changeRadius()"> Change Radius</button>
    <button onclick="changeOpacity()"> Change Opacity</button>
</div>

<div id="map"></div>

<script>
    //map options
    var map, heatmap;

    function initMap() {
        fetch('https://cgi.luddy.indiana.edu/~team16/team-16/mainframe/testPoints.php', {
            method: 'GET', // or 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },

        })
            .then(response => response.json())
            .then(data => {
                console.log(data);

                var points = []

                data.forEach(point => {

                    points.push(new google.maps.LatLng(point.longitude, point.latitude))
                });

                map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 13,
                    center: { lat: 39.1653, lng: -86.5242 }
                });

                heatmap = new google.maps.visualization.HeatmapLayer({
                    data: points,
                    map: map
                });
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    }

    function toggleHeatmap() {
        heatmap.setMap(heatmap.getMap() ? null : map);
    }

    function changeGradient() {
        var gradient = [
            'rgba(0, 255, 255, 0)',
            'rgba(0, 255, 255, 1)',
            'rgba(0, 191, 255, 1)',
            'rgba(0, 127, 255, 1)',
            'rgba(0, 63, 255, 1)',
            'rgba(0, 0, 255, 1)',
            'rgba(0, 0, 253, 1)',
            'rgba(0, 0, 191, 1)',
            'rgba(0, 0, 159, 1)',
            'rgba(0, 0, 127, 1)',
            'rgba(63, 0, 91, 1)',
            'rgba(127, 0, 63, 1)',
            'rgba(191, 0, 21, 1)',
            'rgba(255, 0, 0, 1)'
        ]
        heatmap.set('gradient', heatmap.get('gradient') ? null : gradient);
    }


    function changeRadius() {
        heatmap.set('radius', heatmap.get('radius') ? null : 20);
    }

    function changeOpacity() {
        heatmap.set('opacity', heatmap.get('opacity') ? null : 0.2);
    }

    function savePoints(){
        var longitude= document.getElementById('longitude').value;
        var latitude= document.getElementById('latitude').value;

        fetch('https://cgi.luddy.indiana.edu/~ducphan/insertPoints.php?longitude='+longitude+'&latitude='+latitude, {
            method: 'GET', // or 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
        })
            .then(response => response.json())
            .then(data => {
                console.log(data);

                if(data.status.name == "ok"){
                //   document.getElementById('message').innerHTML = "Message : Points Added To The Heat Map";
                  alert('Points Added To The Heat Map')
                  location.reload()
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });

    }


</script>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD29XbEC4DCGyuxP1_u_E_gHfSVS4X7iOA&libraries=visualization&callback=initMap"
    type="text/javascript"></script>

<section id="separator">
    <div class="container">
        <h1></h1>
    </div>
</section>


<section id="boxes">


    </div>
</section>
<section>
    <div class="form">
        <p id="message">Type in your location to display on the heatmap! </p>
        <form>
            <label for="longitude">Longitude</label><br>
            <input type="text" id="longitude"><br>
            <label for="latitude">Latitude</label><br>
            <input type="text" id="latitude"><br>
            <button type='button' onclick="savePoints()">Save</button>
        </form>
    </div>
</section>

<script src="websiteNav.js"></script>
<script type="text/javascript" src="darkmode.js"></script>

<script>


</script>
</body>

</html>
