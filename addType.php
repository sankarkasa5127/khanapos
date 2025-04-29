<?php 
require_once("db.php");
require_once("function.php");
mysqli_set_charset($conn,'utf8');
if(!empty($_POST)){
    $result=insert('_itemType',$_POST,$conn);
    if($result>0){
        echo "Insert successfully..";
    }else{
        echo "Something went wrong....";
    }
}



?>
  <?php $conn->close();?>