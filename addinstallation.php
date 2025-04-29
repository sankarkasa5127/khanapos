<?php 
require_once("db.php");
require_once("function.php");
if(!empty($_POST)){
    $result=insert('Kasse_Installation',$_POST,$conn);
    if($result>0){
        echo "Insert successfully..";
    }else{
        echo "Something went wrong....";
    }
}



?>
  <?php $conn->close();?>