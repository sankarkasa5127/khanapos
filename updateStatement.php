
<?php header('Content-Type: text/html; charset=utf-8');
require_once("db.php");
require_once("function.php");
mysqli_set_charset($conn,'utf8');
 $result=updateQuery('bankstatement',$_POST,'id',$_POST['id'],$conn);

if ($result > 0) {
    echo $html=include('headers/loadBankStatement.php');
}else {
    echo "Error";
}
$conn->close();
