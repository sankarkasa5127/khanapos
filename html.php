<?php 

$servername = "vwp9989.webpack.hosteurope.de";
$username = "dbu10975332";
$password = "ch03ms23";
$dbname = "db10975332-khana";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM restaurants WHERE id='".$id."'";


$result = $conn->query($sql);

//if ($result->num_rows > 0) {
	
   $row = $result->fetch_assoc() ;
//		if($row["Status"]==1) { $status = '<img src="img/green_small.png"/>'; } elseif($row["Status"]==2) { $status = '<img src="img/yellow_small.png"/>'; } elseif($row["Status"]==3) { $status = '<img src="img/gray_small.png"/>'; } else {$status = '<img src="img/red_small.png"/>';}
         //if($row["send"]){ $chk="checked"; } else { $chk=""; }      	 
    
$rname = utf8_encode($row['restaurant_name']);
if(!empty($row['restaurant_inhaber'])){ $name =  "Ihn. ".utf8_encode($row['restaurant_inhaber'])."<br>"; } else { $name = "";}
$rstr = utf8_encode($row['restaurant_str'])." ".$row['restaurant_str_nr'];
$postal= $row['restaurant_plz']. " ".utf8_encode($row['restaurant_ort']);

$html = '
<style> p { font-size:16px; } </style>
<br><br><br><br><br><br><br><br><p><b>'.$rname.' <br> '.$name.'</b>'. $rstr .'<br>'.$postal.'</p>
<p style="text-align:right;">'.utf8_encode($row['restaurant_ort']).', <br> den '.date("d.m.Y").' </p><br>
<p><b>Betreff: Implementierung der TSE (Technische Sicherheitseinrichtung)</b> <br>

<p>Sehr geehrte Kunden und Kundinnen,<br><br>
Die Integration der TSE in Ihr Kassensystem kann  entweder über eine <b>lokale</b> oder eine <b>cloudbasierte  Lösung</b> erfolgen. <br><br>

&nbsp;&nbsp; &nbsp;&nbsp;-	In der <b>hardwarebasierten Lösung</b> wird eine neue Datenspeicherkomponente wie ein <b>USB-Stick</b> an Ihr &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; POS-System <b>angeschlossen</b>.<br>
&nbsp;&nbsp;&nbsp;&nbsp; -	Mit der <b>Online-Lösung</b> wird ein spezielles Update auf dem Kassensystem installiert. Das &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kassensystem muss <b>dauerhaft mit dem Internet verbunden</b> sein. <br><br>

Weitere Informationen finden Sie auf der Website unseres TSE-Dienstleisters  <br> 
https://fiskaly.com/softwareloesung-zur-kassensichv/.<br>
<br>
Voraussetzungen für die TSE-Aktivierung: <br><br>
<b>1.  Die  Aktivierung  der  TSE  ist  erst  nach vollständiger  Bezahlung  des  beifügten Rechnungsbetrags möglich.</b><br>

<b>2.   Für die lokale TSE-Lösung müssen Sie den TSE-USB Stick auf dem Kassen-Computer anschließen und aktivieren.</b><br>
<b>3.   Für die cloudbasierte Lösung  muss eine stabile Internetverbindung verfügbar sein.</b><br><br>

 Ich bin damit einverstanden, dass mein POS-System auf die neueste TSE-Version aktualisiert und die entsprechenden Daten auf einem <b>Lokal USB Stick/Cloud-basierten</b> Server gespeichert werden können.
 
</p>
<br><br>
<hr>
<table style="width:90%;">
  <tr style="border-bottom:1px solid #000;">
    <th width="50%" style="text-align:left">Ort, Datum</th>
    <th width="50%" style="text-align:right">Unterschrift</th>
  </tr>
</table>

<p width="100%">      
   <b>Bitte unterschreiben  und uns  zurückschicken per Fax (069-92894044) oder Email (info@khana.de).</b><br> 
</p><br><br><br><br><br>


<p><br><br><br><br><br><br><br><br><b>'.$rname.' <br> '.$name.'</b>'. $rstr .'<br>'.$postal.'</p>
<p width="100%" style="text-align:right;">
<table width="100%" style="text-align:right;">
  <tr style="border-bottom:1px solid #000;">
    <td style="width:460px;"> </td>
    <td>Datum: </td>
    <td>11.06.2021</td>
  </tr>
  <tr>
    <td style="width:460px;"> </td>
    <td><b>Rechnungs- Nr.:</b></td>
    <td><b>'.$row['rechnung_nr'].'</b></td>   
  </tr>
    <tr>
	<td style="width:460px;"> </td>
    <td>Kunden Nr.:</td>
    <td>'.$row['restaurant_id'].'</td>   
  </tr>
</table><br>
</p>
<p> Wir bedanken uns  für die gute Zusammenarbeit und stellen Ihnen die Rechnung für folgende Leistungen.</p>
<table style="width:100%;border-top:1px solid #000;border-bottom:1px solid #000;">
  <tr style="border-bottom:1px solid #000;">
    <th style="text-align:left">Pos.</th>
    <th>Art.-Nr. / Bezeichnung</th> 
    <th>E-Preis</th>
    <th>Menge</th>
    <th style="text-align:right">G-Preis</th>
  </tr>
  <tr>
    <td style="text-align:left">&nbsp;&nbsp;1</td>
    <td style="text-align:center">1.	TSE einmalige einrichtungspauschale <br>
	-	Inkl. 5 Jahre TSE Lizenz			
	</td>
    <td style="text-align:center">1000,00</td>
    <td style="text-align:center">1</td>
    <td style="text-align:right">1.000,00 €</td>
  </tr>
  <tr style="text-align:right">
    <td></td>
    <td></td>
    <td></td>
    <td style="text-align:right;"><b>Neto</b></td>
    <td><b>1.000,00 €</b></td>
  </tr>
  <tr style="text-align:center">
    <td></td>
    <td></td>
    <td></td>
    <td style="text-align:right;">MwSt. 19%</td>
    <td style="text-align:right;">190,00  €</td>
  </tr>
  <tr style="text-align:center; border-bottom:1px solid;">
    <td></td>
    <td></td>
    <td></td>
    <td style="text-align:right;"><b>Gesamt</b></td>
    <td style="text-align:right;"><b>1.190,00 €</b></td>
  </tr>
  
 </table>
 <p><i>Die Rechnung ist sofort zahlbar ohne Abzug.</i></p>
'; 
return $html;


$conn->close();
?>