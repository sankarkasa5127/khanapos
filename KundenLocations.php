
<?php
require_once("db.php");
// Fetch the marker info from the database
$result = $conn->query("SELECT * FROM restaurants WHERE 1=1 AND latitude !=0 AND longitude !=0");

// Fetch the info-window data from the database
$result2 = $conn->query("SELECT * FROM restaurants WHERE 1=1 AND latitude !=0 AND longitude !=0");
?>
<style>
    #mapCanvas {
    width: 100%;
    height: 650px;
}
    </style>
<div id="mapCanvas"></div>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyBxPMNgchpJkJS8TbZUlwjagv7zdmbFKgU&region=de"></script>
<script>
function initMap() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap',
        zoom: 8,
                center: {lat: 50.122711, lng: 8.568380} // Default center
    };
                    
    // Display a map on the web page
    map = new google.maps.Map(document.getElementById("mapCanvas"), mapOptions);
    map.setTilt(50);
        
    // Multiple markers location, latitude, and longitude
    var markers = [
        ["Khana It EDV", 50.122711, 8.568380],
        <?php if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo '["'.$row['restaurant_name'].'", '.$row['latitude'].', '.$row['longitude'].'],';
            }
        }
        ?>
    ];
                        
    // Info window content
    var infoWindowContent = [
        ["<div class='info_content'>" +
                "<h3>Khana IT</h3>" +
                "<p>Westerwaldstr. 2, 65936 Frankfurt am Main</p>" + "</div>"],
        <?php if($result2->num_rows > 0){
            while($row = $result2->fetch_assoc()){ 
                $address=$row['restaurant_name'].','.$row["restaurant_str"].' '.$row["restaurant_str_nr"].','.$row['restaurant_plz'].','.$row['restaurant_ort'];
                ?>
                ["<div class='info_content'>" +
                "<h3><?php echo $row['restaurant_name']; ?></h3>" +
                "<p><?php echo $address; ?></p>" + "</div>"],
        <?php }
        }
        ?>
    ];
        
    // Add multiple markers to map
    var infoWindow = new google.maps.InfoWindow(), marker, i;
    
    // Place each marker on the map  
    for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            title: markers[i][0]
        });
        
        // Add info window to marker    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        // Center the map to fit all markers on the screen
        map.fitBounds(bounds);
    }

    // Set zoom level
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
       // map.setZoom(map.getZoom());
        google.maps.event.removeListener(boundsListener);
    });
    
}

// Load initialize function
google.maps.event.addDomListener(window, 'load', initMap);
</script>
