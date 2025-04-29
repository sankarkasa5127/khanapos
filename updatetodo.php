
<?php
require_once("db.php");
require_once("function.php");
mysqli_set_charset($conn,'utf8');
// echo "<pre>";print_r($_POST);die();
// unset($_POST['form_type_edit']);
$result=updateQuery('todo',$_POST,'id',$_POST['id'],$conn);

if ($result > 0) {
    echo "To-do has been updated.";
    }
 else {
    echo "Error";
}
$conn->close();
