<?php 
require_once("db.php");
mysqli_set_charset($conn,'utf8');
if(true || !empty($_POST)){
    // if($_POST['pTypeadd']=='Parent'){
    //         unset($_POST['pTypeadd']);
    //         $_POST['parent']=0;
    // }else{
    //     unset($_POST['pTypeadd']);
    // }
    // $result=insert('typesPayment',$_POST,$conn);
    // if($result>0){
    //     echo "Insert successfully..";
    // }else{
    //     echo "Something went wrong....";
    // }
    $qry = "UPDATE kassen_protokoll SET status= ".$_POST['status']." WHERE id = ".$_POST["id"];
    $result = $conn->query($qry);
    echo "updated";
    // $status = [
    //     'statusCode' = 200
    // ];
    // echo json_encode($status);
}



?>
  <?php $conn->close();?>