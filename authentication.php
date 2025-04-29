<?php
session_start();
require_once("db.php");
 if (isset($_POST['submitBtn'])) {

     $sel="select * FROM persons WHERE username='".$_POST['username']."' AND password='".md5($_POST['passwd'])."' AND status=1";
    $Records = mysqli_query($conn, $sel);
    $row = mysqli_fetch_assoc($Records);
    if(!empty($row)){
        $_SESSION['loggedin'] = 1;
        $_SESSION['name'] = $row['name'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['roleid'] = $row['roleid'];
        $_SESSION['userid'] = $row['id'];
        $cookie_name = "userid";
$cookie_value =  $row['id'];
setcookie($cookie_name, $cookie_value, time() + (86400 * 210), "/"); // 86400 = 1 day
    }else{
        $_SESSION['loggedin'] = false;
        $_SESSION['name'] = '';
        $_SESSION['username'] = '';
        $_SESSION['roleid'] = '';
    }
            header("Location: lock.php");
        }
?>