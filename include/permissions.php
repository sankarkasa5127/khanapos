<?php
    session_start();
        $selPermission="select * FROM permissions WHERE roleid=".$_SESSION['roleid'];
        $permissionsquery = mysqli_query($conn, $selPermission);
        $rowPermission = mysqli_fetch_assoc($permissionsquery);

        $arraypermission = explode(',',$rowPermission['permissions']);
        // echo "<pre>";
        // print_r($arraypermission);die; 
//    if(!empty($rowPermission)){

//    }

?>