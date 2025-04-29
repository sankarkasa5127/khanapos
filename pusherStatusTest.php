<?php 
if(isset($_POST['submit'])){
// // First, run 'composer require pusher/pusher-php-server'

// require_once("db.php");
// require_once("function.php");
require __DIR__ . '/pusher/vendor/autoload.php';
$pusher = new Pusher\Pusher(
    "4b13f77f8e34738ec5a2",
    "4b305fb7a71f478397c3",
    "1697795",
    array('cluster' => 'ap2')
  );

// mysqli_set_charset($conn,'utf8');
// unset($_POST['submit']);
// $result=updateQuery('kassen_protokoll',$_POST,'client_id',"'".$_POST['client_id']."'",$conn);


// if ($result > 0) {

      $array=array(
          "client_id" =>$_POST['client_id'],
          "status" =>$_POST['status'],
      );
      
      $pusher->trigger('foodbeePOS', 'POSSTATUS', array('message' => $array));
    echo "Updated successfully";
//     }
//  else {
//     echo "Something wrong";
// }
// $conn->close();







}
?>
<html>
        <form action="" method="post" name="postclientid">
            <input type="text" name="client_id" placeholder="Enter Client id.."/><br>
            <input type="number" name="status" placeholder="1=>online,2=>sleep,0=>offline" />
            <input type="submit" name="submit" value="submit"/>
        </form>
    </html>
