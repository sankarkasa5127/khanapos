<?php 
require_once("db.php");
mysqli_set_charset($conn,'utf8');
if(!empty($_POST)){
    // print_r($_POST);
    if ($_POST['id']) {
      if ($_GET['type'] == 'multiple') {
          $qry = "UPDATE andriod_device SET device_status= '".$_POST['device_status']."' WHERE id in (".$_POST['id'].")";
       }else{
        $qry = "UPDATE andriod_device SET device_status= '".$_POST['device_status']."' WHERE id = ".$_POST["id"];
       }
        $result = $conn->query($qry);
    }
   
    echo "updated";
}



?>
  <?php $conn->close();?>