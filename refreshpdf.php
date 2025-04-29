<?php
$pdf = 'KhanaCRM/KASSE_RECHNUNGEN/pdf/';
$jpg = 'KhanaCRM/KASSE_RECHNUNGEN/jpg/';

if (! is_dir($pdf)) {
	exit('Invalid diretory path');
}
$file=$_POST['realInvoiceid'].".pdf";
// foreach (scandir($pdf) as $file) {
	// if ('.' === $file) continue;
	// if ('..' === $file) continue;
	//echo $file.'<br/>';
	$pdf_file = $pdf.''.$file;
	//echo $pdf_file.'<br/>';
	$file_jpg = preg_replace('"\.pdf$"', '.jpg', $file);
	//echo $file_jpg.'<br/>';
	$jpg_file = $jpg.''.$file_jpg;
	//echo $jpg_file.'<br/>';
	
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
    echo $file_jpg;
	// }
}
?>