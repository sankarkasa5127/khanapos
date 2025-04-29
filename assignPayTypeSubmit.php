
<?php
require_once("db.php");
require_once("function.php");
mysqli_set_charset($conn,'utf8');
if(!empty($_POST['selectedType'])){
    if($_POST['selectedType']=='other'){
         $result=insert('typesPayment',array('name'=>$_POST['enterType'],'icon'=>$_POST['icon']),$conn);
         $lastid= $conn->insert_id;
        if($lastid>0){
            $result=updateQuery('bankstatement',array('paymentId'=>$lastid),'id',$_POST['payTypeid'],$conn);
            if ($result > 0) {
                echo "New added & record updated successfully";
            }
            else {
                echo "Error";
            }
        }else{
            echo "Something went wrong....";
        }
    }else{
        $result=updateQuery('bankstatement',array('paymentId'=>$_POST['selectedType']),'id',$_POST['payTypeid'],$conn);
        if ($result > 0) {
            echo "Updated successfully";
        }
        else {
            echo "Error";
        }
    }

}

// $conn->close();
