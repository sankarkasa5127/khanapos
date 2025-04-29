<?php 
$id = $_GET['id'];
require_once 'dompdf/autoload.inc.php'; 
// Reference the Dompdf namespace 
use Dompdf\Dompdf; 
// Instantiate and use the dompdf class 
$dompdf = new Dompdf();
include('html.php');
 $dompdf->loadHtml($html);
// (Optional) Setup the paper size and orientation 
$dompdf->setPaper('A4', 'portrait');  
// Render the HTML as PDF 
$dompdf->render(); 
 
// Output the generated PDF to Browser 
$dompdf->stream();


echo $html;
// Include autoloader 

?>