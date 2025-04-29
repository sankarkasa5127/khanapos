<?php 
require_once("db.php");
require_once("function.php");
mysqli_set_charset($conn,'utf8');
if(!empty($_POST)){
    if(empty($_POST['dateTime'])){
    unset($_POST['dateTime']);
    }
   // echo"<pre>";print_r($_POST);die();
    $result=insert('todo',$_POST,$conn);
    
    if($result>0){
        echo "To-do has been created";
    }else{
        echo "Something went wrong....";
    }
}

?>
  <?php $conn->close();?>