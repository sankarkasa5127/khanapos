<?php
require("db.php");


if (isset($_POST['apk_name']) && count($_FILES['apk_file']) > 0) {
      $filename = $_FILES['apk_file']['name'];
      $filepath = 'files/'.$_FILES['apk_file']['name'];
      $checkExistFileQry_ = mysqli_query($conn, "select * from apk where file_name = '".$filename."'");
      if ($checkExistFileQry_->num_rows > 0) {
         $checkExistFileQry = mysqli_query($conn, "select * from apk order by id desc limit 0,1");
         $checkExistFile = mysqli_fetch_assoc($checkExistFileQry);
         $extension = substr($filename,strrpos($filename,"."));
         $filename = explode($extension,$filename)[0]."_".($checkExistFile["id"]+1).$extension;
         $filepath = 'files/'.$filename;
      }
    $alert_msg = "Oops...! something went wrong.";
    $name = $_POST['apk_name'];
    
    if (move_uploaded_file($_FILES['apk_file']["tmp_name"], './'.$filepath)) {
        $result = mysqli_query($conn, "insert into apk(name,file_name,file_path) values('".$name."','".$filename."','".$filepath."')");
        if ($result) {
            $alert_msg = "file uploaded succesfully.";
        }
    }
}

header('Location: ' . $_SERVER['HTTP_REFERER']);




?>
