<?php
require_once("db.php");
require_once("function.php");
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($conn,'utf8');

## Fetch records
  $empQuery = "select * from restaurants ";
$empRecords = mysqli_query($conn, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
 $address=$row["restaurant_str"].' '.$row["restaurant_str_nr"].', '.$row['restaurant_plz'].' '.$row['restaurant_ort'].', Germany';
 $latlongArray= get_lat_long($address);
 updateQuery('restaurants',$latlongArray,'id',$row["id"],$conn);
 }


$conn->close();
// Darmstädter Landstraße 12, 65462 Ginsheim-Gustavsburg, Germany
// function to get  the address
function get_lat_long($address){

    $address = str_replace(" ", "+", $address);

     echo $json = file_get_contents("https://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&key=AIzaSyDCgRYolCmDrbZl76MWBD1BzgBMBLhfFGg&region=de");
    $json = json_decode($json); 

    $lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
    $long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
    
    return array('latitude'=>$lat,'longitude'=>$long);
}

?>