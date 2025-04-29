<?php 
require_once("db.php");
require_once("function.php");
if(!empty($_POST)){
    $sel="select count(*) as allcount from persons where username='".$_POST['username']."'";
   // $sel="SELECT count(*) as allcount FROM rechnungen WHERE rechnung_nummer='".$_POST['rechnung_nummer']."'";
$Records = mysqli_query($conn, $sel);
$row = mysqli_fetch_assoc($Records);
// $records = mysqli_fetch_assoc($sel);
$totalRecords = $row['allcount'];
$status = [
    'statusCode' => 201,
    'status' => 'error',
    'message' => 'Username already taken...'
];
if($totalRecords==0){
    $_POST['password']=md5($_POST['password']);
    $result=insert('persons',$_POST,$conn);
    if($result>0){
        $status = [
            'statusCode' => 200,
            'status' => 'success',
            'message' => 'User has been created.'
        ];
    }else{
        $status['message'] = "Something went wrong....";
    }
}

echo json_encode($status,true);
}



?>
  <?php $conn->close();?>