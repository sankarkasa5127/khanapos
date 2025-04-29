<?php
session_start();
require_once("db.php");
 if (isset($_POST['submitBtn'])) {
    if(isset($_COOKIE['userid'])) {
        // echo "<pre>";
        // print_r($_POST);die;
         $digitspw=$_POST['digit1'].$_POST['digit2'].$_POST['digit3'].$_POST['digit4'];
     $sel="select * FROM persons WHERE id='".$_COOKIE['userid']."' AND digits='".$digitspw."' AND status=1";
    $Records = mysqli_query($conn, $sel);
    $row = mysqli_fetch_assoc($Records);
    if(!empty($row)){
        $_SESSION['loggedin'] = 1;
        $_SESSION['name'] = $row['name'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['roleid'] = $row['roleid'];
        $cookie_name = "userid";
$cookie_value =  $row['id'];
setcookie($cookie_name, $cookie_value, time() + (86400 * 210), "/"); // 86400 = 1 day
    }else{
        $_SESSION['loggedin'] = false;
        $_SESSION['name'] = '';
        $_SESSION['username'] = '';
        $_SESSION['roleid'] = '';
    }
}
            header("Location: index.php");

        }
?>