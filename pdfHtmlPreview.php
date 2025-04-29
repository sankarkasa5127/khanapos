<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
header('Content-Type: text/html; charset=utf-8'); 
$tr='';
require_once("db.php");
// require_once 'dompdf/vendor/autoload.php'; 
require_once('TCPDF-main/tcpdf.php');

class MYPDF extends TCPDF {
  //Page header
  public function Header() {
      // get the current page break margin
      $bMargin = $this->getBreakMargin();
      // get current auto-page-break mode
      $auto_page_break = $this->AutoPageBreak;
      // disable auto-page-break
      $this->SetAutoPageBreak(false, 0);
      // set bacground image
      $img_file = 'Telekom_Rechnung.png';
      $this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
      // restore auto-page-break status
      $this->SetAutoPageBreak($auto_page_break, $bMargin);
      // set the starting point for the page content
      $this->setPageMark();
  }
}

if(isset($_POST['invoiceRealId'])){
      $query = "select *,(select sum(rechnungenpayment.amount) from rechnungenpayment where rechnungenpayment.rowid=rechnungen.id) as collectedAmount from rechnungen WHERE  rechnungen.rechnung_nummer IN (".$_POST['invoiceRealId'].") order by id desc";
$records = mysqli_query($conn, $query);
$rowcount=mysqli_num_rows($records);
if($rowcount!=0){
    mysqli_set_charset($conn,'utf8');
    $balanceamount=0;
    $x=1;
    while ($row = mysqli_fetch_assoc($records)) {
       $totalcollected = $row['collectedAmount'];
       $removeeuro=str_replace("€","",$row['betrag_brutto']);
       $balanceamount+= $removeeuro;
       $offenamount=$removeeuro - $totalcollected;
       $betrag_brutto= formatPrice($removeeuro);
       $Bezahlt= formatPrice($totalcollected);
       $Offen= formatPrice($offenamount);
      
       $tr.='<tr>
           <td style="border-top:1px solid #000;padding:3px 8px; text-align: center;background-color: #cdcdcd;"><span>'.$row["rechnung_nummer"].'</span></td>
           <td style="border-top:1px solid #000;padding:3px 8px; text-align: center;background-color: #cdcdcd;"><span>'.date("d.m.Y",strtotime($row["rechnung_datum"])).'</span></td>
           <td style="border-top:1px solid #000;padding:3px 8px; text-align: center;background-color: #cdcdcd;"><span>Credit</span></td>
           <td style="border-top:1px solid #000;padding:3px 8px; text-align: right;background-color: #cdcdcd;" >0 €</td>
           <td class="pr" style="border-top:1px solid #000;padding:3px 8px; text-align: right;background-color: #cdcdcd;" ><span>'.$removeeuro.' €</td>
           <td class="pr" style="border-top:1px solid #000;padding:3px 8px; text-align: right;background-color: #cdcdcd;">'.$balanceamount.' €</td>
        </tr>';
      
              $Querypayment = "select * from rechnungenpayment WHERE rowid= ".$row['id']."  ORDER BY `id` DESC";
              $Recordspayment = mysqli_query($conn, $Querypayment);
          
              mysqli_set_charset($conn,'utf8');

              $y=1;
              while ($rowpayment = mysqli_fetch_assoc($Recordspayment)) {
                 $balanceamount=trim($balanceamount)- trim($rowpayment['amount']);
                 
                    $tr.='<tr>
                       <td style="border-top:1px solid #000;padding:3px 8px; text-align: center;background-color: #cdcdcd;">'.$rowpayment["invoiceid"].'</td>
                       <td style="border-top:1px solid #000;padding:3px 8px; text-align: center;background-color: #cdcdcd;" >'.date("d.m.Y",strtotime($rowpayment["dateofpayment"])).'</td>
                       <td style="border-top:1px solid #000;padding:3px 8px; text-align: center;background-color: #cdcdcd;" ><span>'.$rowpayment["method"].'</td>
                       <td class="pr" style="border-top:1px solid #000;padding:3px 8px; text-align: right;background-color: #cdcdcd;">'.$rowpayment["amount"].' €</td>
                       <td style="border-top:1px solid #000;padding:3px 8px; text-align: right;background-color: #cdcdcd;">0 €</td>
                       <td class="pr" style="border-top:1px solid #000;padding:3px 8px; text-align: right;background-color: #cdcdcd;">'.$balanceamount.' €</td>
                       </tr>';
                 
              }
              $x++;
     } 
} 
if(isset($_POST['editor'])){

  $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
  $time=strtotime("now");
  // set document information
  $pdf->SetCreator(PDF_CREATOR);
  $pdf->SetAuthor('Nicola Asuni');
  $pdf->SetTitle('Payment Statement');
  $pdf->SetSubject('Invoice Staement');
  // $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
  
  // set header and footer fonts
  $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
  
  // set default monospaced font
  $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
  
  // set margins
  $pdf->SetMargins(PDF_MARGIN_LEFT, 65, PDF_MARGIN_RIGHT);
  $pdf->SetHeaderMargin(0);
  $pdf->SetFooterMargin(0);
  
  // remove default footer
  $pdf->setPrintFooter(false);
  
  // set auto page breaks
  $pdf->SetAutoPageBreak(TRUE, 50);
  
  // set image scale factor
  $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
  
  
  
  // ---------------------------------------------------------
  
  
  // add a page
  $pdf->AddPage();

$html=$_POST['editor'];
$pdf->writeHTML($html, true, false, true, false, '');




// ---------------------------------------------------------

//Close and output PDF document
// $time=strtotime
if(isset($_POST['downloadpdf'])){
  $pdf->Output($time.'.pdf', 'D');
}elseif(isset($_POST['sendwhatsapp'])){
  // $pdf->Output($time.'.pdf', 'I');
  $pdf->Output(__DIR__."/statementPdf/".$time.'.pdf', 'F');
  $params=array(
    'token' => 'vls3ylhw57jov3h1',
    'to' => '+'.$_POST['phonenumber'],
    'filename' => $time.'.pdf',
    'document' => "https://portal.khanapos.de/statementPdf/".$time.".pdf",
    'caption' => 'Rechnungen Statement',
    'priority' => '',
    'referenceId' => '',
    'nocache' => '',
    'msgId' => '',
    'mentions' => ''
    );
    $curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.ultramsg.com/instance69943/messages/document",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => http_build_query($params),
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
    // echo "Sent Successfully...";
  echo $response;
}
}else if(isset($_POST['sendemail'])){
   $querytemplatesemail = "select * from templates  WHERE id='".$_POST['emailtemplateid']."' ORDER BY `id` DESC";
  $templatesqlemail = mysqli_query($conn, $querytemplatesemail);
  mysqli_set_charset($conn,'utf8');
  $u=1;
  $rwotemplatesqlemail = mysqli_fetch_assoc($templatesqlemail);
  // echo "templates/pdf/".$rwotemplatesql['filename'].".php";die;
   $htmlload=file_get_contents("templates/pdf/".$rwotemplatesqlemail['filename']);
 $tablebody=' <table  cellspacing="0" cellpadding="0" width="100%" style="border-top:1px solid #000; border-bottom:1px solid #000; text-align: left;font-size: 12px; padding:10px;">
 <thead style="background-color: #cdcdcd;">
 <tr>
                 <th style="padding:3px 8px; text-align: center;font-weight:bold;">Invoice No.</th>
                 <th style="padding:3px 8px; text-align: center;font-weight:bold;"><span>Date</span></th>
                 <th style="padding:3px 8px; text-align: center;font-weight:bold;" >Transaction Type</th>
                 <th style="padding:3px 8px; text-align: right;font-weight:bold;" >Deposit</th>
                 <th style="padding:3px 8px; text-align: right;font-weight:bold;" >Credit</th>
                 <th style="padding:3px 8px; text-align: right;font-weight:bold;">Balance</th>
              </tr>
 </thead>

 <tbody >
 '.$tr.'
 </tbody>
</table>';
 $htmlload=str_replace("[STATEMENTS]",$tablebody,$htmlload);
 $htmlload=str_replace("[BALANCE]",$balanceamount,$htmlload);
 $htmlload=str_replace("[TODAYDATE]",date('d.m.Y'),$htmlload);

  $emailhtml=$htmlload;

  $pdf->Output(__DIR__."/statementPdf/".$time.'.pdf', 'F');
  // $selemailsingal = "select * from templates  WHERE type=0 ORDER BY `id` DESC";
  //   $queryemailsingal = mysqli_query($conn, $selemailsingal);
  //   // mysqli_set_charset($conn,'utf8');
  //   $u=1;
  // $rowemailsingal = mysqli_fetch_assoc($queryemailsingal);

  include ('mail/autoload.php');


$mail = new PHPMailer(true);
// echo "vrg";die;

   
$sender = 'info@khana.de';
		$senderName = "Khana rechnungen";
		$recipient = $_POST['emailid']; 
    $usernameSmtp = 'paramjeetkaur2541@gmail.com';
		$passwordSmtp = 'dDmF7bXqLw6hfJvU';
		$host = 'smtp-relay.brevo.com';
		$port = 587;
                 try {
			// Specify the SMTP settings.
			$mail->isSMTP();
			$mail->setFrom($sender, $senderName);
			$mail->Username   = $usernameSmtp;
			$mail->Password   = $passwordSmtp;
			$mail->Host       = $host;
			$mail->Port       = $port;
			$mail->SMTPAuth   = true;
			$mail->SMTPSecure = 'tls';
		   // $mail->addCustomHeader('X-SES-CONFIGURATION-SET', $configurationSet);
       $mail->addAttachment(__DIR__."/statementPdf/".$time.".pdf");
			// Specify the message recipients.
			$mail->addAddress($recipient);
			// You can also add CC, BCC, and additional To recipients here.

			// Specify the content of the message.
			$mail->isHTML(true);
			$mail->Subject    =$rwotemplatesqlemail['name'];
			$mail->Body       = $emailhtml;
			//$mail->AltBody    = $bodyText;
			$mail->Send();
			echo "Email sent!" , PHP_EOL;
		} catch (phpmailerException $e) {
			echo "An error occurred. {$e->errorMessage()}", PHP_EOL; //Catch errors from PHPMailer.
		} catch (Exception $e) {
			echo "Email not sent. {$mail->ErrorInfo}", PHP_EOL; //Catch errors from Amazon SES.
		}
}else{
  $pdf->Output($time.'.pdf', 'I');
}
}else{
    $querytemplates = "select * from templates  WHERE id='".$_POST['pdfid']."' ORDER BY `id` DESC";
    $templatesql = mysqli_query($conn, $querytemplates);
    mysqli_set_charset($conn,'utf8');
    $u=1;
    $rwotemplatesql = mysqli_fetch_assoc($templatesql);
    //echo "templates/pdf/".$rwotemplatesql['filename'].".php";die;
     $htmlload=file_get_contents("templates/pdf/".$rwotemplatesql['filename']);
   $tablebody=' <table  cellspacing="0" cellpadding="0" width="100%" style="border-top:1px solid #000; border-bottom:1px solid #000; text-align: left;font-size: 12px; padding:10px;">
   <thead style="background-color: #cdcdcd;">
   <tr>
                   <th style="padding:3px 8px; text-align: center;font-weight:bold;">Invoice No.</th>
                   <th style="padding:3px 8px; text-align: center;font-weight:bold;"><span>Date</span></th>
                   <th style="padding:3px 8px; text-align: center;font-weight:bold;" >Transaction Type</th>
                   <th style="padding:3px 8px; text-align: right;font-weight:bold;" >Deposit</th>
                   <th style="padding:3px 8px; text-align: right;font-weight:bold;" >Credit</th>
                   <th style="padding:3px 8px; text-align: right;font-weight:bold;">Balance</th>
                </tr>
   </thead>

   <tbody >
   '.$tr.'
   </tbody>
 </table>';
   $htmlload=str_replace("[STATEMENTS]",$tablebody,$htmlload);
   $htmlload=str_replace("[BALANCE]",$balanceamount,$htmlload);
   $htmlload=str_replace("[TODAYDATE]",date('d.m.Y'),$htmlload);

  $html=$htmlload;

}
}?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Invoice editor</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/css/bootstrap.min.css" integrity="sha384-MIwDKRSSImVFAZCVLtU0LMDdON6KVCrZHyVQQj6e8wIEJkW4tvwqXrbMIya1vriY" crossorigin="anonymous">
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script> -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.tiny.cloud/1/87wkobbkbhk1hmj92en7s7v1vqc064xauiic54qr8hmvw5y3/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <style>
    .form-control {
    display: inline-block;
    width: 12%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    background-color: #f5f5f5;
    /* margin-top: 2px; */
    position: relative;
    top: 2px;
}
  </style>
</head>
<body>
<form action="pdfHtmlPreview.php" method="post"  >
<textarea name="editor" id="mytextarea" style="width: 100%;
  height: 650px;"><?=$html; ?></textarea>
  <input type="hidden" name="invoiceRealId" value="<?=$_POST['invoiceRealId']?>"/>

  <button class="btn btn-black"  type="submit"  name="previewpdf"><i class="fas fa-file-pdf" ></i> Preview Pdf</button>
  <button class="btn btn-black"  type="submit" name="downloadpdf"><i class="fas fa-file-pdf" ></i> Download Pdf</button>
  <input type="text" name="phonenumber" class="form-control" id="whatsappNumber" placeholder="Enter No.">
  <button class="btn btn-success"  type="submit"  name="sendwhatsapp" ><i class="fab fa-whatsapp"></i> Send Whatsapp</button>
  <select class="form-control" name="emailtemplateid" >
      <option value="">select email template...</option>
  <?php 
  $selemail = "select * from templates  WHERE type=0 ORDER BY `id` DESC";
    $queryemail = mysqli_query($conn, $selemail);
    mysqli_set_charset($conn,'utf8');
    $u=1;
    while($rowemail = mysqli_fetch_assoc($queryemail)){
  ?>
      <option value="<?=$rowemail['id'];?>"><?=$rowemail['name'];?></option>
<?php } ?>
   
    </select>
  <input type="email" name="emailid" class="form-control" id="whatsappNumber" placeholder="Enter Email Id.">
  <button class="btn btn-warning"   type="submit" name="sendemail"><i class="fa fa-envelope"></i> Send E-mail</button>
</form>

<script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>

</body>
</html>

  