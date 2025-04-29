<?php
    require_once("db.php");
    require_once("function.php");
    mysqli_set_charset($conn,'utf8');
    if($_POST['type']=='Rechnungen'){
        $Query = "select * from rechnungenpayment WHERE invoiceid = '".$_POST['rechnungen_nr']."' AND  bankstatementid= '".$_POST['invoiceid']."' Limit 1";
    }else{
        $Query = "select * from ein_rechnungenpayment WHERE invoiceid = '".$_POST['einrechnungen_nr']."' AND  bankstatementid= '".$_POST['invoiceid']."' Limit 1";
    }
    // $Query = "select * from rechnungenpayment WHERE invoiceid = '".$_POST['rechnungen_nr']."' AND  bankstatementid= '".$_POST['invoiceid']."' Limit 1";
    $Records = mysqli_query($conn, $Query);
    $row = mysqli_fetch_assoc($Records);
    if(empty($row)){
        if(isset($_POST['typeofpayment'])){
                $type=1;
                $requestDate=array('status'=>1);
                $paymenttype="Bar";
            updateQuery('Kassenbuch',$requestDate,'id',$_POST['invoiceid'],$conn);
        }else{
            $type=2;
            $requestDate=array('status'=>1);
            $paymenttype="Banküberweisung";
            updateQuery('bankstatement',$requestDate,'id',$_POST['invoiceid'],$conn);
        }
        if($_POST['type']=='Rechnungen'){
                $sql = "INSERT INTO `rechnungenpayment`  
                (rowid,
                invoiceid,
                dateofpayment,
                amount,
                bankBookingid,
                bankstatementid,
                typeofPayment,
                method)
                VALUES
                ('".$_POST['rowid']."',
                '".$_POST['rechnungen_nr']."',
                '".$_POST['dateofpayment']."',
                '".$_POST['invoiceamount']."',
                '".$_POST['Buchungs_ID']."',
                '".$_POST['invoiceid']."',
                '".$type."',
                '".$paymenttype."')
                ";
        }else{
                $sql = "INSERT INTO `ein_rechnungenpayment`  
                (rowid,
                invoiceid,
                dateofpayment,
                amount,
                bankBookingid,
                bankstatementid,
                typeofPayment,
                method)
                VALUES
                ('".$_POST['rowid']."',
                '".$_POST['einrechnungen_nr']."',
                '".$_POST['dateofpayment']."',
                '".$_POST['invoiceamount']."',
                '".$_POST['Buchungs_ID']."',
                '".$_POST['invoiceid']."',
                '".$type."',
                '".$paymenttype."')
                ";
        }
        $result = $conn->query($sql);
        echo "Payment assign successfully....";
    }else{
        
        if($_POST['type']=='Rechnungen'){
            $requestDate=array(
                'rowid'=>$_POST['rowid'],
                'invoiceid'=>$_POST['rechnungen_nr'],
                'dateofpayment'=>$_POST['dateofpayment'],
                'amount'=>$_POST['bankamount'],
                'bankBookingid'=>$_POST['Buchungs_ID'],
                'bankstatementid'=>$_POST['invoiceid'],
            
            );
        updateQuery('rechnungenpayment',$requestDate,'id',$row['id'],$conn);
        }else{
            $requestDate=array(
                'rowid'=>$_POST['rowid'],
                'invoiceid'=>$_POST['einrechnungen_nr'],
                'dateofpayment'=>$_POST['dateofpayment'],
                'amount'=>$_POST['bankamount'],
                'bankBookingid'=>$_POST['Buchungs_ID'],
                'bankstatementid'=>$_POST['invoiceid'],
            
            );
            updateQuery('ein_rechnungenpayment',$requestDate,'id',$row['id'],$conn);
        }
        echo "Payment assign updated successfully....";
    }
    $conn->close();
    ?>