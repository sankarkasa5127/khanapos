<?php 
require_once("db.php");
require_once("function.php");
mysqli_set_charset($conn,'utf8');
if(!empty($_POST)){
    if($_POST['pTypeadd']=='Parent'){
            unset($_POST['pTypeadd']);
            $_POST['parent']=0;
    }else{
        unset($_POST['pTypeadd']);
    }
    $result=insert('typesPayment',$_POST,$conn);
    if($result>0){
        echo "Insert successfully..";
    }else{
        echo "Something went wrong....";
    }
}



?>
  <?php $conn->close();?>