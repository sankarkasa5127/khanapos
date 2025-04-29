<?php 
require_once("db.php");
require_once("function.php");
$time=strtotime("now");
file_put_contents(__DIR__.'/templates/pdf/'.$time.'.php', $_POST['template']);
$_POST['filename']=$time.".php";
unset($_POST['template']);
// echo "<pre>";
// print_r($_POST);die;
if(!empty($_POST)){
    $result=insert('templates',$_POST,$conn);
    if($result>0){
        echo "Insert successfully..";
    }else{
        echo "Something went wrong....";
    }
}
?>
  <?php //$conn->close();?>