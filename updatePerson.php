
<?php
require_once("db.php");
require_once("function.php");
mysqli_set_charset($conn,'utf8');
if(empty($_POST['password'])){
unset($_POST['password']);
}else{
    $_POST['password']=md5($_POST['password']);
}
$result=updateQuery('persons',$_POST,'id',$_POST['id'],$conn);
$status = [
    'statusCode' => 201,
    'status' => 'error',
    'message' => 'Something went wrong....'
];
if ($result > 0) {
    $status = [
            'statusCode' => 200,
            'status' => 'success',
            'message' => 'User record has been updated.'
        ];
}

echo json_encode($status,true);
$conn->close();
