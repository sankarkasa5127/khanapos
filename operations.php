<?php
$host = "92.205.178.167";
$user = "kasseUser";
$password = "4_6Ou7x3d";
$dbname = "kasse";
// require_once("function.php");

$conn = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

function getData($conn,$table, $column = "", $value = ""){
   $query = "select * from  ".$table;
   if ($column && $value) {
      $query .= " where $column = '".$value."'";
   }
   $getAll = mysqli_query($conn,$query);
   $records = mysqli_fetch_assoc($getAll);
   return $records;
}

function access($conn){
    if ($_GET['type'] == 'getData') {
       echo json_encode(getData($conn,$_POST['table'], $_POST['column'], $_POST['value']));
    }
    
}
access($conn);

$conn->close();
?>
