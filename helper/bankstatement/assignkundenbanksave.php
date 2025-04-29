<?php
require_once("./../../db.php");
require_once("./../../function.php");
mysqli_set_charset($conn,'utf8');
$result=updateQuery('bankstatement',array('kundenBankNr'=>$_POST['kunden_nr']),'id',$_POST['rowidkunden'],$conn);

if ($result > 0) {
    echo "Updated successfully";
    }
 else {
    echo "Error";
}
$conn->close();