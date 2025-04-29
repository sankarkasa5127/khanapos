<?php
require_once("db.php");
require_once("function.php");
mysqli_set_charset($conn,'utf8');

if(!empty($_POST)){
    
    if(isset($_POST['rechnungen'])){
        if(!empty($_POST['rechnungen'])){
            $_POST['permissions']=implode(',', $_POST['rechnungen']);
           // unset($_POST['rechnungen']);
        }else{
            $_POST['permissions']='';
        }

    }else{
        $_POST['permissions']='';
    }

    unset($_POST['rechnungen']);
    $sel="select count(*) as allcount from permissions where roleid=".$_POST['roleid'];
    $Records = mysqli_query($conn, $sel);
    $row = mysqli_fetch_assoc($Records);

    $totalRecords = $row['allcount'];
    if($totalRecords==0){
            $result=insert('permissions',$_POST,$conn);
            if($result>0){
                echo "Insert successfully..";
            }else{
                echo "Something went wrong....";
            }
    }else{
        $result=updateQuery('permissions',$_POST,'roleid',$_POST['roleid'],$conn);

    if ($result > 0) {
        echo "Updated successfully";
    }
    else {
        echo "Error";
    }
    }
 

}

?>