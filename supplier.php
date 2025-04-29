<?php
include_once("db.php");
$q = strtolower($_GET["q"]);
if (!$q) return;
$supplier="SELECT * FROM supplier_details";
$empRecords = mysqli_query($conn, $supplier);
while ($row = mysqli_fetch_assoc($empRecords)) {
  
  	if (stristr(strtolower($empRecords['supplier_name']), $q) !== false) {
		echo $line->supplier_name"\n";
	
 }
 }

?>