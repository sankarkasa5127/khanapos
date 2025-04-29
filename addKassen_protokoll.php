<?php 
require_once("db.php");
require_once("function.php");
mysqli_set_charset($conn,'utf8');

if(($_SERVER['REQUEST_METHOD'] === 'POST') && !empty($_POST)){

    $data = $_POST;
    $count = 'select * from kassen_protokoll where anydesk = '.$data['anydesk'].' and datum = "'.$data['datum'].'"';
    $qryProtokoll = $conn->query($count);
    $fetchData = $qryProtokoll->fetch_assoc();
    if ($data['anydesk'] == 0) {
        $result=insert('kassen_protokoll',$data,$conn);
    }else{
        if ($qryProtokoll->num_rows > 0) {
            $result=updateQuery('kassen_protokoll',$data,'id',$fetchData['id'],$conn);
        }else{
            $result=insert('kassen_protokoll',$data,$conn);
        }
    }
    
    if($result>0){
        if ($qryProtokoll->num_rows > 0) {
            echo "Updated successfully..";
        }else{
            echo "Insert successfully..";
        }
    }else{
        echo "Something went wrong....";
    }
}else{
    $status = [
        "status" => 403,
        "message" => "bad request"
    ];
    echo json_encode($status);
}




?>
  <?php $conn->close();?>