<?php
require_once("db.php");
mysqli_set_charset($conn,'utf8');
  
$sel="SELECT count(*) as allcount FROM rechnungen WHERE rechnung_nummer='".$_POST['rechnung_nummer']."'";
$Records = mysqli_query($conn, $sel);
$row = mysqli_fetch_assoc($Records);
// $records = mysqli_fetch_assoc($sel);
$totalRecords = $row['allcount'];
if($totalRecords==0){
  // Check if image file is a actual image or fake image
  if(isset($_FILES["uploadpdf"]["tmp_name"])) {
    $errors= array();
    $file_name = $_FILES['uploadpdf']['name'];
    $file_size =$_FILES['uploadpdf']['size'];
    $file_tmp =$_FILES['uploadpdf']['tmp_name'];
    $file_type=$_FILES['uploadpdf']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['uploadpdf']['name'])));
    move_uploaded_file($file_tmp,"KhanaCRM/KASSE_RECHNUNGEN/pdf/".$file_name);
    $pdf = 'KhanaCRM/KASSE_RECHNUNGEN/pdf/';
    $jpg = 'KhanaCRM/KASSE_RECHNUNGEN/jpg/';
    $file_jpg = preg_replace('"\.pdf$"', '.jpg', $file_name);
    $pdf_file = $pdf.''.$file_name;
    $jpg_file = $jpg.''.$file_jpg;
    if (!file_exists($jpg_file)) {
        $fp_pdf = fopen($pdf_file, 'rb');
        $img = new imagick(); // [0] can be used to set page number
        $img->setResolution(300,300);
        $img->readImageFile($fp_pdf);
        $img->setImageFormat( "jpeg" );
        $img->setImageCompression(imagick::COMPRESSION_JPEG); 
        $img->setImageCompressionQuality(1); 
        $img->setImageUnits(imagick::RESOLUTION_PIXELSPERINCH);
        //$data = $img->getImageBlob();
        file_put_contents($jpg_file, $img);	
        }



 }
 $namepost=mysqli_real_escape_string($conn,$_POST["kunden_name"] );
 $notizpost=mysqli_real_escape_string($conn,htmlspecialchars($_POST["notiz"]));

 $fmt = new NumberFormatter( 'de_DE', NumberFormatter::CURRENCY );
 $removeeuro=str_replace("€","",$_POST['betrag_brutto']);
 $removeeuroBezahlt=str_replace("€","",$_POST['Bezahlt']);
 $removeeuroOffen=str_replace("€","",$_POST['Offen']);


 $ffff=trim($removeeuro);
 $fBezahlt=trim($removeeuroBezahlt);
 $fOffen=trim($removeeuroOffen);


 $num = $ffff."\xc2\xa0$"; 
 $numBezahlt = $fBezahlt."\xc2\xa0$";
 $numOffen = $fOffen."\xc2\xa0$";


 $priceBezahlt = $fmt->parseCurrency($numBezahlt, $curr);
 $priceOffen = $fmt->parseCurrency($numOffen, $curr);
 $price = $fmt->parseCurrency($num, $curr);

  $name='"'.$namepost.'"';
  $notiz='"'.$notizpost.'"';
  $sql = "INSERT INTO `rechnungen`  
(rechnung_nummer,
kunden_nr,
kunden_name,
rechnung_datum,
betrag_brutto,
Bezahlt,
notiz,
payment_method,
Offen)
VALUES
('".$_POST['rechnung_nummer']."',
'".$_POST['kunden_nr']."',
".$name.",
'".$_POST['rechnung_datum']."',
'".$price."',
'".$priceBezahlt."',
".$notiz.",
'".$_POST['payment_method']."',
'".$priceOffen."')
";
$result = $conn->query($sql);

if ($result > 0) {
    echo "added successfully";
    }
 else {
    echo "Error";
}
}else{
  echo "Rechnung nummer already added.....";
}
$conn->close();
?>