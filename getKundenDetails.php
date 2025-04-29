<?php
require_once("db.php");
mysqli_set_charset($conn,'utf8');
$id = htmlentities($_POST['id']);	  
  $sql = "SELECT *  from `restaurants` WHERE restaurant_id='".$id."'";

$result = $conn->query($sql);
$row = $result -> fetch_assoc();

$rowid=$_POST['rowid'];
$contactHtml='';
        $querycontact = "select * from contactskunden WHERE rowid= ".$_POST['rowid']."  ORDER BY `id` DESC";
        $recordContact = mysqli_query($conn, $querycontact);

        $b=1;
        while ($rowContact = mysqli_fetch_assoc($recordContact)) {
                $originalDate = $rowContact['date'];
$newDate = date("d.m.Y", strtotime($originalDate));
                $contactHtml.= "<tr id='delrowcontactk-".$rowContact['id']."'>"; 
                $contactHtml.=  "<td>".$b."</td>";    
                $contactHtml.=  "<td class='text-center'>".$newDate."</td>";    
                $contactHtml.=  "<td class='text-center'>".$rowContact['name']."</td>";  
                $contactHtml.=  "<td class='text-center'>".$rowContact['phoneNumber']."</td>";  
                $contactHtml.=  "<td class='text-center'>".$rowContact['note']."</td>";  
                $contactHtml.=  "<td class='text-center'><button  class=' btn btn-primary' onclick='editpayment(".$rowContact['id'].")'><i class='fa fa-edit' aria-hidden='true'></i></button><button  class=' btn btn-danger' onclick='delcontactk(".$rowContact['id'].")'><i class='fa fa-trash' aria-hidden='true'></i></button></td>";
                $contactHtml.=  "</tr>";     
                $b++;
        }    

        $Query = "select * from kundenfiles WHERE rowid= ".$rowid."  ORDER BY `id` DESC";
        $Records = mysqli_query($conn, $Query);
        $i=1;
        $fileHtml='';
        while ($rowfile = mysqli_fetch_assoc($Records)) {
                $fileHtml.="<tr id='delrowfk-".$rowfile['id']."'>"; 
                $fileHtml.= "<td>".$i."</td>";    
                $file_jpg = $rowfile['fileNames'];

                if(file_exists('KhanaCRM/KASSE_RECHNUNGEN/pdf/kunden/'.$rowfile['kundenid'].'/'.$file_jpg)){
                     $fileHtml.= "<td class='text-center'><a target='_blank' href='http://khana-gmbh.de/portal_/KhanaCRM/KASSE_RECHNUNGEN/pdf/kunden/".$rowfile['kundenid']."/".$file_jpg."'>".$file_jpg."</a></td>";  
                }else{
                     $fileHtml.= "<td class='text-center'></td>";
                }

                $fileHtml.= "<td class='text-center'>".$rowfile['description']."</td>"; 
                $fileHtml.= "<td class='text-center'>".$rowfile['createdDate']."</td>"; 
                $fileHtml.= "<td class='text-center'><button  class=' btn btn-primary' onclick='editpayment(".$rowfile['id'].")'><i class='fa fa-edit' aria-hidden='true'></i></button><button  class=' btn btn-danger' onclick='delfilesk(".$rowfile['id'].")'><i class='fa fa-trash' aria-hidden='true'></i></button></td>";
                $fileHtml.= "</tr>";     
                $i++;
        }
        
        $QueryInvoice = "select * from rechnungen WHERE kunden_nr= ".$id."  ORDER BY `id` DESC";
        $RecordsList = mysqli_query($conn, $QueryInvoice);
        $in=1;
        $invoiceList='';   
        while ($rowInvoiceList = mysqli_fetch_assoc($RecordsList)) {
                $amount= str_replace("€", "",$rowInvoiceList['betrag_brutto']);

            $invoiceList.= "<tr id='delInvoiceList-".$rowInvoiceList['id']."'>"; 
            $invoiceList.=  "<td>".$in."</td>";    
            $invoiceList.=  "<td class='text-center'>".$rowInvoiceList['rechnung_datum']."</td>";    
            $invoiceList.=  "<td class='text-center'>".$rowInvoiceList['rechnung_nummer']."</td>";  
            $invoiceList.=  "<td class='text-center'>".formatPrice($amount)." €</td>";  
            
            $invoiceList.=  "</tr>";     
            $in++;
    }        
    $QueryBank = "select * from kundenBankDetails WHERE rowid= ".$rowid."  ORDER BY `id` DESC";
    $resultBank = $conn->query($QueryBank);
$rowBank = $resultBank -> fetch_assoc();
        $row['contactHtml']=$contactHtml;
        if(!empty($rowBank)){
                if(!empty($rowBank['signedDate'])){
                        $newDate = date("d.m.Y", strtotime($rowBank['signedDate']));
                        $row['signedDate']=$newDate;
                }
                if(!empty($rowBank['startDatebank'])){
                        $startDatebank = date("d.m.Y", strtotime($rowBank['startDatebank']));
                        $row['startDatebank']=$startDatebank;
                }
                if(!empty($rowBank['endDatebank'])){
                        $endDatebank = date("d.m.Y", strtotime($rowBank['endDatebank']));
                        $row['endDatebank']=$endDatebank;
                }
               
                $row['bankdetails']=$rowBank;
        }else{
                $row['bankdetails']='';
        }
        
        $row['invoiceListappend']=$invoiceList;
        $row['filesappendk']=$fileHtml;
echo  json_encode($row);
$conn->close();
?>