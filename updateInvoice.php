<?php
require_once("db.php");
mysqli_set_charset($conn,'utf8');
  

  
  // Check if image file is a actual image or fake image
  if(isset($_FILES["uploadpdf"]["tmp_name"])) {
        $errors= array();
        $file_name = $_FILES['uploadpdf']['name'];
        $file_size =$_FILES['uploadpdf']['size'];
        $file_tmp =$_FILES['uploadpdf']['tmp_name'];
        $file_type=$_FILES['uploadpdf']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['uploadpdf']['name'])));
        $file_jpg = preg_replace('"\.pdf$"', '.jpg', $file_name);
            if(is_file("KhanaCRM/KASSE_RECHNUNGEN/pdf/".$file_name)) 
            {
            // Delete the given file
            unlink("KhanaCRM/KASSE_RECHNUNGEN/pdf/".$file_name); 
            }
            if(is_file("KhanaCRM/KASSE_RECHNUNGEN/jpg/".$file_jpg)) 
            {
            // Delete the given file
            unlink("KhanaCRM/KASSE_RECHNUNGEN/jpg/".$file_jpg); 
            }
        move_uploaded_file($file_tmp,"KhanaCRM/KASSE_RECHNUNGEN/pdf/".$file_name);
        $pdf = 'KhanaCRM/KASSE_RECHNUNGEN/pdf/';
        $jpg = 'KhanaCRM/KASSE_RECHNUNGEN/jpg/';
      
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

     if(isset($_FILES["worddocument"]["tmp_name"])) {
        $errors= array();
        $file_name = $_FILES['worddocument']['name'];
        $file_size =$_FILES['worddocument']['size'];
        $file_tmp =$_FILES['worddocument']['tmp_name'];
        $file_type=$_FILES['worddocument']['type'];
       // $file_ext=strtolower(end(explode('.',$_FILES['worddoc']['name'])));
       // $file_jpg = preg_replace('"\.pdf$"', '.jpg', $file_name);
            if(is_file("KhanaCRM/KASSE_RECHNUNGEN/word/".$file_name)) 
            {
            // Delete the given file
            unlink("KhanaCRM/KASSE_RECHNUNGEN/word/".$file_name); 
            }
        move_uploaded_file($file_tmp,"KhanaCRM/KASSE_RECHNUNGEN/word/".$file_name);
     }

     if(isset($_FILES["uploadjpg"]["tmp_name"])) {
        $errors= array();
        $file_name = $_FILES['uploadjpg']['name'];
        $file_size =$_FILES['uploadjpg']['size'];
        $file_tmp =$_FILES['uploadjpg']['tmp_name'];
        $file_type=$_FILES['uploadjpg']['type'];
       // $file_ext=strtolower(end(explode('.',$_FILES['worddoc']['name'])));
       // $file_jpg = preg_replace('"\.pdf$"', '.jpg', $file_name);
            if(is_file("KhanaCRM/KASSE_RECHNUNGEN/jpg/".$file_name)) 
            {
            // Delete the given file
            unlink("KhanaCRM/KASSE_RECHNUNGEN/jpg/".$file_name); 
            }
        move_uploaded_file($file_tmp,"KhanaCRM/KASSE_RECHNUNGEN/jpg/".$file_name);
     }
     

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
   

    //  $d = explode(',', $price);
    //  if(count($d) == 1) {
    //    $price = $d[0];
    //  } else if(count($d) > 1) {
    //    $price = $d[0].'.'.$d[1];
    //  }
     $namepost=mysqli_real_escape_string($conn,$_POST["kunden_name"] );
     $notizpost=mysqli_real_escape_string($conn,htmlspecialchars($_POST["notiz"]));
      $name='"'.$namepost.'"';
      $notiz='"'.$notizpost.'"';
      $expireDate='';
      if(!empty($_POST['datumnext'])){
        $expireDate=date('Y-m-d',strtotime($_POST['datumnext']));
      }else{
        $expireDate=NULL;
      }
      
 $sql = "UPDATE `rechnungen` SET 
rechnung_nummer= '".$_POST['rechnung_nummer']."',
kunden_nr= '".$_POST['kunden_nr']."',
kunden_name= ".$name.",
notiz= ".$notiz.",
rechnung_datum= '".$_POST['rechnung_datum']."',
paymentReminderDate= '".$expireDate."',
betrag_brutto= '".$price."',
Bezahlt= '".$priceBezahlt."',
payment_method= '',
Offen= '".$priceOffen."'
 WHERE id='".$_POST['rowid']."'";

$result = $conn->query($sql);

if ($result > 0) {
    echo "Updated successfully";
    }
 else {
    echo "Error";
}
$conn->close();
?>