<?php
require_once("db.php");

$itemTypeQuery = "select * from _itemType";
$itemTypeRecords = mysqli_query($conn, $itemTypeQuery);

$roleseQuery = "select * from roles  where status=1";
$roleRecords = mysqli_query($conn, $roleseQuery);
$personsQuery = "select * from persons where status=1";
$personsRecords = mysqli_query($conn, $personsQuery);



  