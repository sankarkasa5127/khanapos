<?php 
require_once("db.php");
$response=array();
mysqli_set_charset($conn,'utf8');
if(isset($_POST['id'])){
    if($_POST['type']=='Rechnungen'){
        $Query = "select * from rechnungen WHERE rechnung_nummer= '".$_POST['id']."' Limit 1";
    }else{
        $Query = "select * from Ein_rechnungen WHERE rechnung_nummer= '".$_POST['id']."' Limit 1";
    }
    
     //$Query = "select * from rechnungen WHERE rechnung_nummer= '".$_POST['id']."' Limit 1";
    $Records = mysqli_query($conn, $Query);
    $row = mysqli_fetch_assoc($Records);
    // echo "<pre>";
    // print_r($row);die;
    if(!empty($row)){
        $response['message']="invoice get successfully";
        $response['record']=array(
                        'rowid'=>$row['id'],
                        'kundennr'=>$row['kunden_nr'],
                        'name'=>$row['kunden_name'],
                        'invoiceamount'=>$row['betrag_brutto'],
                        'amount'=>formatPrice($row['betrag_brutto']),
                    );
        $response['status']=true;
    }else{
        $response['status']=false;
        $response['message']="invoice not exist in table";
      //  $response['data']=$row;
    }
}else{
    $response['status']=false;
    $response['message']="unauthorized access";

}
$conn->close();
echo json_encode($response);exit();
