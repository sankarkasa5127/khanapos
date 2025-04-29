<?php
require_once("db.php");
mysqli_set_charset($conn,'utf8');
$kundenQuery = "select * from restaurants WHERE restaurant_id= ".$_POST['id']."  ORDER BY `id` DESC";
    $kundenRecords = mysqli_query($conn, $kundenQuery);
    $kundenrow = mysqli_fetch_assoc($kundenRecords);
    $data['kundenData']=$kundenrow;
    echo  json_encode($data);   
    $conn->close();
    exit(); 
