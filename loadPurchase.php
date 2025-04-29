<?php
require_once("db.php");
mysqli_set_charset($conn,'utf8');
$supplier_detailsq = "select * from supplier_details";
$supplier_details = mysqli_query($conn, $supplier_detailsq);
$purchaseq = "select * from purchase order by id desc";
$purchaserecord = mysqli_query($conn, $purchaseq);
// $roleseQuery = "select * from roles  where status=1";