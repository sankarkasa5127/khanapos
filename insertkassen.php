<?php
require_once("db.php");
require_once("function.php");
$itemTypeQuery = "select * from kassen_protokoll_ where kassen_protokoll_.anydesk NOT IN (select anydesk from kassen_protokoll);";
$itemTypeRecords = mysqli_query($conn, $itemTypeQuery);
$i=0;
while ($row = mysqli_fetch_assoc($itemTypeRecords)) {

unset($row['id']);
echo "<pre>";
print_r($row); 
$result=insert('kassen_protokoll',$row,$conn);
$i++;
}
echo $i;
?>