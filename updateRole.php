
<?php
require_once("db.php");
require_once("function.php");
mysqli_set_charset($conn,'utf8');
$result=updateQuery('roles',$_POST,'id',$_POST['id'],$conn);

if ($result > 0) {
    echo "Updated successfully";
    }
 else {
    echo "Error";
}
$conn->close();
