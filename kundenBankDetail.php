<?php
require_once("db.php");
mysqli_set_charset($conn,'utf8');
$filename='';
$invoiceid=$_POST['kundenrowid'];
if(isset($_FILES["kuppdf"]["tmp_name"])) {
    if (!file_exists('KhanaCRM/KASSE_RECHNUNGEN/pdf/kunden/'.$invoiceid)) {
        mkdir('KhanaCRM/KASSE_RECHNUNGEN/pdf/kunden/'.$invoiceid, 0777, true);
    }
        $errors= array();
        $file_name = $_FILES['kuppdf']['name'];
        $file_tmp =$_FILES['kuppdf']['tmp_name'];
        move_uploaded_file($file_tmp,"KhanaCRM/KASSE_RECHNUNGEN/pdf/kunden/".$invoiceid."/".$file_name);
        $filename=$file_name;
    }
$sel = mysqli_query($conn,"select count(*) as allcount from kundenBankDetails where rowid=".$_POST['invoiceid']);
$records = mysqli_fetch_assoc($sel);
 $totalRecords = $records['allcount'];
if(trim($totalRecords)<=0){
        $sql="INSERT INTO `kundenBankDetails`(`rowid`, `kundenid`, `collectedthrow`, `collectionType`, `signedBy`, `signedDate`, `uploadpdf`, `name`, `IBAN`, `BIC`, `bankname`, `anschrift`,`startDatebank`, `endDatebank`) VALUES ('".$_POST['invoiceid']."', '".$_POST['kundenrowid']."','".$_POST['directdebit']."','".$_POST['timeoption']."','".$_POST['signedby']."','".$_POST['signeddate']."','".$filename."','".$_POST['name']."','".$_POST['iban']."','".$_POST['bic']."','".$_POST['bank']."','".$_POST['anschrift']."','".$_POST['bankdurationstart']."','".$_POST['bankexpireDate']."')";
        $result = $conn->query($sql);

}else{
     $sql = "UPDATE `kundenBankDetails` SET 
    signedBy= '".$_POST['signedby']."',
    signedDate	= '".$_POST['signeddate']."',
    uploadpdf= '".$filename."',
    name= '".$_POST['name']."',
    IBAN= '".$_POST['iban']."',
    BIC= '".$_POST['bic']."',
    anschrift= '".$_POST['anschrift']."',
    bankname= '".$_POST['bank']."',
    collectionType= '".$_POST['timeoption']."',
    collectedthrow	= '".$_POST['directdebit']."',
    startDatebank	= '".$_POST['bankdurationstart']."',
    endDatebank	= '".$_POST['bankexpireDate']."'
     WHERE rowid='".$_POST['invoiceid']."'";
    $result = $conn->query($sql);
}
if(!empty($filename)){
    echo "<a href='KhanaCRM/KASSE_RECHNUNGEN/pdf/kunden/".$invoiceid."/".$filename."'>".$filename."</a>";
}

?>