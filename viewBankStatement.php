<?php
require_once("db.php");
mysqli_set_charset($conn,'utf8');
 $id=$_POST['rowId'];
$vendersql = "select * from bankstatement WHERE id=".$id;
$venderrecord = mysqli_query($conn, $vendersql);
$data = array();
$row = mysqli_fetch_assoc($venderrecord); 
$response=array();
$response['appendrecord']='<input type="hidden" name="id" class="roweditid" value="'.$row['id'].'" />

    
    <div class="form-group col-md-4">
        <label for="recipient-name" class="col-form-label">Name 2:</label>
        <input type="text" class="form-control " id="typeName" value="'.$row['Name_2'].'" name="Name_2"  />
    </div>
   
    <div class="form-group col-md-4">
        <label for="recipient-name" class="col-form-label">BIC_Bankleitzahl:</label>
        <input type="text" class="form-control " id="typeName" value="'.$row['BIC_Bankleitzahl'].'" name="BIC_Bankleitzahl"  required/>
    </div>
    <div class="form-group col-md-4">
        <label for="recipient-name" class="col-form-label">Export_Bankname:</label>
        <input type="text" class="form-control " id="typeName" value="'.$row['Export_Bankname'].'" name="Export_Bankname"  required/>
    </div>
    <div class="form-group col-md-4">
        <label for="recipient-name" class="col-form-label">Export_Kontonummer:</label>
        <input type="text" class="form-control " id="typeName" value="'.$row['Export_Kontonummer'].'" name="Export_Kontonummer"  required/>
    </div>
    <div class="form-group col-md-4">
        <label for="recipient-name" class="col-form-label">Betrag:</label>
        <input type="text" class="form-control " id="typeName" value="'.$row['Betrag'].'" name="Betrag"  required/>
    </div>
    <div class="form-group col-md-4">
        <label for="recipient-name" class="col-form-label">Wahrung:</label>
        <input type="text" class="form-control " id="typeName" value="'.$row['Wahrung'].'" name="Wahrung"  required/>
    </div>
 
    <div class="form-group col-md-4">
        <label for="recipient-name" class="col-form-label">	Wertstellungsdatum:</label>
        <input type="text" class="form-control " id="typeName" value="'.$row['Wertstellungsdatum'].'" name="Wertstellungsdatum"  required/>
    </div>
    <div class="form-group col-md-4">
        <label for="recipient-name" class="col-form-label">Buchungsdatum:</label>
        <input type="text" class="form-control " id="typeName" value="'.$row['Buchungsdatum'].'" name="Buchungsdatum"  required/>
    </div>
    <div class="form-group col-md-4">
        <label for="recipient-name" class="col-form-label">Saldo_davor:</label>
        <input type="text" class="form-control " id="typeName" value="'.$row['Saldo_davor'].'" name="Saldo_davor"  required/>
    </div>
    <div class="form-group col-md-4">
        <label for="recipient-name" class="col-form-label">Saldo:</label>
        <input type="text" class="form-control " id="typeName" value="'.$row['Saldodanach'].'" name="Saldodanach"  />
    </div>
    <div class="form-group col-md-4">
        <label for="recipient-name" class="col-form-label">danach:</label>
        <input type="text" class="form-control " id="typeName" value="'.$row['Saldodanach'].'" name="Saldodanach"  />
    </div>
    <div class="form-group col-md-4">
        <label for="recipient-name" class="col-form-label">Buchungstext:</label>
        <input type="text" class="form-control " id="typeName" value="'.$row['Buchungstext'].'" name="Buchungstext"  required/>
    </div>
    <div class="form-group col-md-4">
        <label for="recipient-name" class="col-form-label">Textschlussel:</label>
        <input type="text" class="form-control " id="typeName" value="'.$row['Textschlussel'].'" name="Textschlussel"  required/>
    </div>
    <div class="form-group col-md-4">
        <label for="recipient-name" class="col-form-label">Kategorie:</label>
        <input type="text" class="form-control " id="typeName" value="'.$row['Kategorie'].'" name="Kategorie"  required/>
    </div>
    <div class="form-group col-md-4">
        <label for="recipient-name" class="col-form-label">Kategorie_Name:</label>
        <input type="text" class="form-control " id="typeName" value="'.$row['Kategorie_Name'].'" name="Kategorie_Name"  />
    </div>
    <div class="form-group col-md-4">
        <label for="recipient-name" class="col-form-label">Notizen:</label>
        <input type="text" class="form-control " id="typeName" value="'.$row['Notizen'].'" name="Notizen"  />
    </div>
    <div class="form-group col-md-4">
        <label for="recipient-name" class="col-form-label">Anzahl_Splittbuchungen:</label>
        <input type="text" class="form-control " id="typeName" value="'.$row['Anzahl_Splittbuchungen'].'" name="Anzahl_Splittbuchungen"  />
    </div>
    <div class="form-group col-md-4">
        <label for="recipient-name" class="col-form-label">Auszugnummer:</label>
        <input type="text" class="form-control " id="typeName" value="'.$row['Auszugnummer'].'" name="Auszugnummer"  />
    </div>
    <div class="form-group col-md-4">
        <label for="recipient-name" class="col-form-label">Auszugseite:</label>
        <input type="text" class="form-control " id="typeName" value="'.$row['Auszugseite'].'" name="Auszugseite"  />
    </div>
    <div class="form-group col-md-4">
        <label for="recipient-name" class="col-form-label">Buchungs_ID:</label>
        <input type="text" class="form-control " id="typeName" value="'.$row['Buchungs_ID'].'" name="Buchungs_ID"  />
    </div>  
    <div class="form-group col-md-4">
        <label for="recipient-name" class="col-form-label">Datei:</label>
        <input type="text" class="form-control " id="typeName" value="'.$row['Datei'].'" name="Datei"  />
    </div>
    <div class="form-group col-md-4">
        <label for="recipient-name" class="col-form-label">EndToEndID:</label>
        <input type="text" class="form-control " id="typeName" value="'.$row['EndToEndID'].'" name="EndToEndID"  />
    </div>
    <div class="form-group col-md-4">
        <label for="recipient-name" class="col-form-label">Mandatsreferenz:</label>
        <input type="text" class="form-control " id="typeName" value="'.$row['Mandatsreferenz'].'" name="Mandatsreferenz"  />
    </div>  <div class="form-group col-md-4">
        <label for="recipient-name" class="col-form-label">Glaubiger_ID:</label>
        <input type="text" class="form-control " id="typeName" value="'.$row['Glaubiger_ID'].'" name="Glaubiger_ID"  />
    </div>
    <div class="form-group col-md-4">
        <label for="recipient-name" class="col-form-label">Primanota:</label>
        <input type="text" class="form-control " id="typeName" value="'.$row['Primanota'].'" name="Primanota"  />
    </div>
    <div class="form-group col-md-4">
        <label for="recipient-name" class="col-form-label">Verwendungszweck_1:</label>
        <input type="text" class="form-control " id="typeName" value="'.$row['Verwendungszweck_1'].'" name="Verwendungszweck_1"  />
    </div>  <div class="form-group col-md-4">
        <label for="recipient-name" class="col-form-label">Verwendungszweck_2:</label>
        <input type="text" class="form-control " id="typeName" value="'.$row['Verwendungszweck_2'].'" name="Verwendungszweck_2"  />
    </div>
    <div class="form-group col-md-4">
        <label for="recipient-name" class="col-form-label">Verwendungszweck_3:</label>
        <input type="text" class="form-control " id="typeName" value="'.$row['Verwendungszweck_3'].'" name="Verwendungszweck_3"  />
    </div>
    <div class="form-group col-md-4">
        <label for="recipient-name" class="col-form-label">Verwendungszweck_4:</label>
        <input type="text" class="form-control " id="typeName" value="'.$row['Verwendungszweck_4'].'" name="Verwendungszweck_4"  />
    </div>  <div class="form-group col-md-4">
        <label for="recipient-name" class="col-form-label">Verwendungszweck_5:</label>
        <input type="text" class="form-control " id="typeName" value="'.$row['Verwendungszweck_5'].'" name="Verwendungszweck_5"  />
    </div>
    <div class="form-group col-md-6">
        <label for="recipient-name" class="col-form-label">Invoice ID:</label>
        <input type="text" class="form-control " id="typeName" value="'.$row['invoicenumber'].'" name="invoicenumber"  />
    </div>
    <div class="form-group col-md-6">
        <label for="recipient-name" class="col-form-label">Farbmarkierung:</label>
        <input type="text" class="form-control " id="typeName" value="'.$row['Farbmarkierung'].'" name="Farbmarkierung"  />
    </div>';
    $response['appendrecord2']='
    <div class="form-group col-md-12">
        <label for="recipient-name" class="col-form-label">Name 1:</label>
        <input type="text" class="form-control " id="typeName" value="'.$row['Name_1'].'" name="Name_1"  required/>
    </div>
     <div class="form-group col-md-6">
        <label for="recipient-name" class="col-form-label">IBAN_Kontonummer:</label> 
        <input type="text" class="form-control " id="typeName" value="'.$row['IBAN_Kontonummer'].'" name="IBAN_Kontonummer"  required/>
    </div>
    <div class="form-group col-md-6">
        <label for="recipient-name" class="col-form-label">Betrag:</label>
        <input type="text" class="form-control " id="typeName" value="'.$row['Betrag'].'" name="Betrag"  required/>
    </div>
     <div class="form-group col-md-6">
        <label for="recipient-name" class="col-form-label">Buchungsdatum:</label>
        <input type="text" class="form-control " id="typeName" value="'.$row['Buchungsdatum'].'" name="Buchungsdatum"  required/>
    </div>
       <div class="form-group col-md-6">
        <label for="recipient-name" class="col-form-label">Verwendungszweck:</label>
        <input type="text" class="form-control " id="typeName" value="'.$row['Verwendungszweck'].'" name="Verwendungszweck"  required/>
    </div>
    ';

    $InvoiceBanksql = "select * from bankInvoice WHERE invoiceid= ".$id."  ORDER BY `id` DESC";
$invoiceRecord = mysqli_query($conn, $InvoiceBanksql);
$data = array();
$htmlinvoiceBank='';
$i=1;
// $rowInvoiceBank = mysqli_fetch_assoc($invoiceRecord); 
while ($rowInvoiceBank = mysqli_fetch_assoc($invoiceRecord)) {
                  
    $htmlinvoiceBank.= "<tr id='delrowInB-".$rowInvoiceBank['id']."'>"; 
    $htmlinvoiceBank.="<td>".$i."</td>"; 
    $htmlinvoiceBank.= "<td class='text-center'>".$rowInvoiceBank['bankinvoiceid']."</td>";    
    $htmlinvoiceBank.= "<td class='text-center'>".$rowInvoiceBank['Bname']."</td>";   
  
    $originalDate = $rowInvoiceBank['bdate'];
    $newDate = date("d.m.Y", strtotime($originalDate));
    $htmlinvoiceBank.="<td class='text-center'>".$newDate."</td>";  
    if(file_exists('KhanaCRM/bankstatement/'.$rowInvoiceBank['buploadfile'])){
        $htmlinvoiceBank.= "<td class='text-center'><a data-fancybox class='fancybox' href='KhanaCRM/bankstatement/".$rowInvoiceBank['buploadfile']."'>".$rowInvoiceBank['buploadfile']."</a></td>";  
    }else{
        $htmlinvoiceBank.= "<td class='text-center'></td>";
    }
      
    $htmlinvoiceBank.= "<td class='text-center'>".$rowInvoiceBank['bnote']."</td>"; 
    $htmlinvoiceBank.="<td class='text-center'><button  class=' btn btn-danger' onclick='delInfoB(".$rowInvoiceBank['id'].")'><i class='fa fa-trash' aria-hidden='true'></i></button></td>";
    $htmlinvoiceBank.= "</tr>";     
    $i++;
}  
$response['appendInvoiceData']= $htmlinvoiceBank; 
echo json_encode($response);exit();
    ?>
 



