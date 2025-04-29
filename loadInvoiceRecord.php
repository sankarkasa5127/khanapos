<?php
require_once("db.php");
mysqli_set_charset($conn,'utf8');
  if(isset($_POST)){

    $rowid=$_POST['invoiceid'];
        $Query = "select * from rechnungenfiles WHERE rowid= ".$rowid."  ORDER BY `id` DESC";
        $Records = mysqli_query($conn, $Query);
        $data = array();
        $i=1;
        $fileHtml='';
        while ($row = mysqli_fetch_assoc($Records)) {
                $fileHtml.="<tr id='delrowf-".$row['id']."'>"; 
                $fileHtml.= "<td>".$i."</td>";    
                $file_jpg = $row['fileNames'];

                if(file_exists('KhanaCRM/KASSE_RECHNUNGEN/pdf/'.$row['invoiceid'].'/'.$file_jpg)){
                     $fileHtml.= "<td class='text-center'><a target='_blank' href='http://khana-gmbh.de/portal_/KhanaCRM/KASSE_RECHNUNGEN/pdf/".$row['invoiceid']."/".$file_jpg."'>".$file_jpg."</a></td>";  
                }else{
                     $fileHtml.= "<td class='text-center'></td>";
                }

                $fileHtml.= "<td class='text-center'>".$row['description']."</td>"; 
                $originalDate = $row['createdDate'];
                $newDate = date("d.m.Y", strtotime($originalDate));
                $fileHtml.= "<td class='text-center'>".$newDate."</td>"; 
                $fileHtml.= "<td class='text-center'><button  class=' btn btn-danger' onclick='delfiles(".$row['id'].")'><i class='fa fa-trash' aria-hidden='true'></i></button></td>";
                $fileHtml.= "</tr>";     
                $i++;
        }   
                
        $paymenthtml='';
        $Querypayment = "select * from rechnungenpayment WHERE rowid= ".$rowid."  ORDER BY `id` DESC";
        $Recordspayment = mysqli_query($conn, $Querypayment);

        $y=1;
        while ($rowpayment = mysqli_fetch_assoc($Recordspayment)) {

                $amount=$rowpayment['amount'];
                //$amount = number_format($amount, 2);
                $originalDate = $rowpayment['dateofpayment'];
                $newDate = date("d.m.Y", strtotime($originalDate));
                $paymenthtml.= "<tr id='delrow-".$rowpayment['id']."'>"; 
                $paymenthtml.=  "<td>".$rowpayment['description']."</td>";    
                $paymenthtml.=  "<td class='text-center'>".$newDate."</td>";    
                $paymenthtml.=  "<td class='text-center'>".formatPrice($amount)." €</td>"; 
                $paymenthtml.=  "<td class='text-center'>".$rowpayment['method']."</td>"; 
                $paymenthtml.=  "<td class='text-center'><button  class=' btn btn-danger' onclick='delPayment(".$rowpayment['id'].")'><i class='fa fa-trash' aria-hidden='true'></i></button></td>";
                $paymenthtml.=  "</tr>";     
                $y++;
        }    
        $itemsHtml='';
        $QueryItems = "SELECT _itemStock.*,_itemType.typeName,supplier_details.supplier_name,_items.itemName,_items.Description,persons.name as pName FROM `_itemStock` INNER JOIN _items ON _items.id=_itemStock.itemid INNER JOIN _itemType ON _itemType.id=_itemStock.typeid INNER JOIN supplier_details ON supplier_details.id=_items.venderid INNER JOIN persons on persons.id=_itemStock.assignBy WHERE  invoicerowid='".$rowid."' Order By assignDate DESC";
        $recordItems = mysqli_query($conn, $QueryItems);

        $x=1;
        while ($rowitems = mysqli_fetch_assoc($recordItems)) {
                $itemsHtml.= "<tr id='delrowitem-".$rowitems['id']."'>"; 
                $itemsHtml.=  "<td>".$x."</td>";    
                $itemsHtml.=  "<td class='text-center'>".$rowitems['itemName']." <i   class='fa fa-info-circle tool-tip' title-new='".$rowitems['Description']."'></i></td>";    
                $itemsHtml.=  "<td class='text-center'>".$rowitems['typeName']."<i   class='fa fa-info-circle tool-tip' title-new='Supplier :".$rowitems['supplier_name']."'></i></td>"; 
                $itemsHtml.=  "<td class='text-center'>".$rowitems['barcodeNumber']."</td>";
                $itemsHtml.=  "<td class='text-center'>".$rowitems['serialNumber']."</td>";
                $itemsHtml.=  "<td class='text-center'>".formatPrice($rowitems['price'])." €</td>"; 
                $itemsHtml.=  "<td class='text-center'>".$rowitems['pName']."</td>";  
                $originalDate = $rowitems['assignDate'];
                $newDate = date("d.m.Y", strtotime($originalDate));
                $itemsHtml.=  "<td class='text-center'>".$newDate."</td>";  
                // $itemsHtml.=  "<td class='text-center'><button  class=' btn btn-danger' onclick='delitems(".$rowitems['id'].")'><i class='fa fa-trash' aria-hidden='true'></i></button></td>";
                $itemsHtml.=  "</tr>";     
                $x++;
        }    
        $personHtml='';
        $queryPerson = "select * from rechnungenpersons WHERE rowid= ".$rowid."  ORDER BY `id` DESC";
        $recordPerson = mysqli_query($conn, $queryPerson);

        $a=1;
        while ($rowPerson = mysqli_fetch_assoc($recordPerson)) {
                $personHtml.= "<tr id='delrowperson-".$rowPerson['id']."'>"; 
                $personHtml.=  "<td>".$a."</td>";    
                $personHtml.=  "<td class='text-center'>".$rowPerson['personName']."</td>";    
                $personHtml.=  "<td class='text-center'>".$rowPerson['roleName']."</td>";  
                $originalDate = $rowPerson['date'];
                $newDate = date("d.m.Y", strtotime($originalDate));
                $personHtml.=  "<td class='text-center'>".$newDate."</td>";  
                $personHtml.=  "<td class='text-center'><button  class=' btn btn-danger' onclick='delperson(".$rowPerson['id'].")'><i class='fa fa-trash' aria-hidden='true'></i></button></td>";
                $personHtml.=  "</tr>";     
                $a++;
        }    
        $contactHtml='';
        $querycontact = "select * from contacts WHERE rowid= ".$rowid."  ORDER BY `id` DESC";
        $recordContact = mysqli_query($conn, $querycontact);

        $b=1;
        while ($rowContact = mysqli_fetch_assoc($recordContact)) {
                $contactHtml.= "<tr id='delrowcontact-".$rowContact['id']."'>"; 
                $contactHtml.=  "<td>".$b."</td>";  
                $originalDate = $rowContact['date'];
                $newDate = date("d.m.Y", strtotime($originalDate));
                $contactHtml.=  "<td class='text-center'>".$newDate."</td>";    
                $contactHtml.=  "<td class='text-center'>".$rowContact['name']."</td>";  
                $contactHtml.=  "<td class='text-center'>".$rowContact['phoneNumber']."</td>";  
                $contactHtml.=  "<td class='text-center'>".$rowContact['note']."</td>";  
                $contactHtml.=  "<td class='text-center'><button  class=' btn btn-danger' onclick='delcontact(".$rowContact['id'].")'><i class='fa fa-trash' aria-hidden='true'></i></button></td>";
                $contactHtml.=  "</tr>";     
                $b++;
        }    
        $rechnungenTypes = "select * from rechnungenTypes WHERE rowid= ".$rowid;
        $recordrechnungenTypes = mysqli_query($conn, $rechnungenTypes);
        while ($rowtype = mysqli_fetch_assoc($recordrechnungenTypes)) {
                $rowinvoicetype []= $rowtype;
        }

        $versandhtml='';
        $queryversand = "select * from Versand WHERE rowid= ".$rowid."  ORDER BY `id` DESC";
        $recordversand = mysqli_query($conn, $queryversand);

        $y=1;
        while ($rowversand = mysqli_fetch_assoc($recordversand)) {
                $versandhtml.= "<tr id='delrowversand-".$rowversand['id']."'>"; 
                $versandhtml.=  "<td>".$y."</td>";    
                $versandhtml.=  "<td class='text-center'>".$rowversand['description']."</td>";    
                $versandhtml.=  "<td class='text-center'>".$rowversand['method']."</td>"; 
                $originalDate = $rowversand['date'];
                $newDate = date("d.m.Y", strtotime($originalDate));
                $versandhtml.=  "<td class='text-center'>".$newDate."</td>"; 
                $versandhtml.=  "<td class='text-center'><button  class=' btn btn-danger' onclick='delversand(".$rowversand['id'].")'><i class='fa fa-trash' aria-hidden='true'></i></button></td>";
                $versandhtml.=  "</tr>";     
                $y++;
        }    
       

    $data['contactHtml']=$contactHtml;
    $data['versandhtml']=$versandhtml;
    $data['rowinvoicetype']=$rowinvoicetype;
    $data['personHtml']=$personHtml;
    $data['itemsHtml']=$itemsHtml;
    $data['paymentloading']=$paymenthtml;
    $data['fileloading']=$fileHtml;
    echo  json_encode($data);
  }
     ?>