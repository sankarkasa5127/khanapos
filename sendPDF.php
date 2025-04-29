<?php
if(isset($_POST['filename']))
$file=$_POST['filename'];
$Phone=$_POST['sendPhone'];
$params=array(
'token' => 'vls3ylhw57jov3h1',
'to' => '+'.$Phone,
'filename' => $file.'.pdf',
'document' => "https://portal.khanapos.de/statementPdf/".$file.".pdf",
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
    echo "Sent Successfully...";
//   echo $response;
}