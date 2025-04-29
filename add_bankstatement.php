<?php
require_once("db.php");

$fileMimes = array(
    'text/x-comma-separated-values',
    'text/comma-separated-values',
    'application/octet-stream',
    'application/vnd.ms-excel',
    'application/x-csv',
    'text/x-csv',
    'text/csv',
    'application/csv',
    'application/excel',
    'application/vnd.msexcel',
    'text/plain'
);

try {
    if (!empty($_FILES['uploadCsv']['name']) && in_array($_FILES['uploadCsv']['type'], $fileMimes)) {
        $file = fopen($_FILES['uploadCsv']['tmp_name'], "r");

        if ($_FILES["uploadCsv"]["size"] > 0) {
            $i=1;
            $fmt = new NumberFormatter( 'de_DE', NumberFormatter::CURRENCY );
            while (($getData = fgetcsv($file, 10000, ",")) !== FALSE) {
                if($i!=1){
                    $ffff=trim($getData[6]);
                    $num = $ffff."\xc2\xa0$";
                    $price = $fmt->parseCurrency($num, $curr);
                    // $price2=strtok($price, " ");
                    $einzahlungen=0;
                    $auszahlungen=0;
                    if (str_contains($price, '-')) { 
                        $auszahlungen=trim($price, "-");
                            
                    }else{
                        $einzahlungen=$price;
                    }
                    $empQuery = "select * from bankstatement WHERE  Buchungs_ID='".$getData[21]."'";
$empRecords = mysqli_query($conn, $empQuery);

$row = mysqli_fetch_assoc($empRecords);
if(empty($row)){
                $values = '"'.$getData[0].'","'.$getData[1].'","'.$getData[2].'","'.$getData[3].'","'.$getData[4].'","'.$getData[5].'","'.$getData[6].'","'.$getData[7].'","'.$getData[8].'","'.$getData[9].'","'.$getData[10].'","'.$getData[11].'","'.$getData[12].'","'.$getData[13].'","'.$getData[14].'","'.$getData[15].'","'.$getData[16].'","'.$getData[17].'","'.$getData[18].'","'.$getData[19].'","'.$getData[20].'","'.$getData[21].'","'.$getData[22].'","'.$getData[23].'","'.$getData[24].'","'.$getData[25].'","'.$getData[26].'","'.$getData[27].'","'.$getData[28].'","'.$getData[29].'","'.$getData[30].'","'.$getData[31].'","'.$getData[32].'","'.$einzahlungen.'","'.$auszahlungen.'"';
                // echo "<pre>";
                // print_r($getData);die;
                
                
            $sql = "INSERT into bankstatement (Name_1, Name_2, IBAN_Kontonummer, BIC_Bankleitzahl, Export_Bankname, Export_Kontonummer, Betrag, Wahrung, Verwendungszweck, Wertstellungsdatum, Buchungsdatum, Saldo_davor,Saldodanach,Buchungstext,Textschlussel,Kategorie,Kategorie_Name,Notizen,Anzahl_Splittbuchungen,Auszugnummer,Auszugseite,Buchungs_ID,Datei,EndToEndID,Mandatsreferenz,Glaubiger_ID,Primanota,Verwendungszweck_1,Verwendungszweck_2,Verwendungszweck_3,Verwendungszweck_4,Verwendungszweck_5,Farbmarkierung,einzahlungen,auszahlungen) 
                    values (".$values.")";
                    $result = $conn->query($sql);
                }
                }
                //$result = mysqli_query($conn, $sql);
$i++;
                if (!$result) {
                    //echo "Error: " . mysqli_error($conn);
                }
            }
            echo "File Imported Successfully..!!";
            fclose($file);
        } else {
            echo "Error: File size is 0.";
        }
    }
} catch(\Exception $ex) {
    echo $ex->getMessage(); die;
}

?>
  <?php $conn->close();?>
