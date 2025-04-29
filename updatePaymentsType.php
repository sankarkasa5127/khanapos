
<?php
require_once("db.php");
require_once("function.php");
mysqli_set_charset($conn,'utf8');
if($_POST['pType']=='Parent'){
    unset($_POST['pType']);
    $_POST['parent']=0;
}else{
unset($_POST['pType']);
}
$result=updateQuery('typesPayment',$_POST,'id',$_POST['id'],$conn);

if ($result > 0) {
    echo "Updated successfully";
    }
 else {
    echo "Error";
}
$conn->close();
