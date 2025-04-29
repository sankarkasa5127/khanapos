<?php require_once("maxProtector.class.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="iso-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/css/bootstrap.min.css" integrity="sha384-MIwDKRSSImVFAZCVLtU0LMDdON6KVCrZHyVQQj6e8wIEJkW4tvwqXrbMIya1vriY" crossorigin="anonymous">
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script> -->
	<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
	<script src="http://code.jquery.com/qunit/qunit-git.js"></script>
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
		<!-- Pick a theme, load the plugin & initialize plugin -->
	<link href="css/theme.default.min.css" rel="stylesheet">
	<script src="js/jquery.tablesorter.min.js"></script>
	<script src="js/jquery.tablesorter.widgets.min.js"></script>
	
    <link rel="stylesheet" type="text/css" media="only screen and (max-width: 480px)" href="mobile.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css" type="text/css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>
<script> 
$(".fancybox").fancybox({
    width  : 500,
    height : 300,
    type   :'iframe'
});
</script>
<style>
  .rowedit{
      cursor: pointer;
    }
	.error{color: red;}
.button {
		  background-color: #B0252E;
		  border: none;
		  color: white;
		  padding: 5px 10px;
		  text-align: center;
		  text-decoration: none;
		  display: inline-block;
		  font-size: 16px;		  
		  cursor: pointer;
		}
</style>


</head>
<body>
<embed id="embed" width="100%" height="100%"></embed>
    <nav class="navbar navbar-dark navbar-fixed-top bg-inverse">
      <button type="button" class="navbar-toggler hidden-sm-up" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">KHANA Portal</a>	  
      <div id="navbar">
	  <!--
        <nav class="nav navbar-nav pull-xs-left">
          <a class="nav-item nav-link" href="index.php">Home</a>
          <a class="nav-item nav-link" href="telekom.php">Telekom</a>
          <a class="nav-item nav-link" href="it_support.php">IT Support & Webdesign</a>
          <a class="nav-item nav-link" href="kasse.php">Kassensysteme</a>
        </nav>
		-->
        <form class="pull-xs-right">
          <input type="text" class="form-control" id="filter" placeholder="Search...">
        </form>
      </div>	  
    </nav>

    <div class="container-fluid" >
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Rechnungen <span class="sr-only">(current)</span></a></li>
			<li><a href="Kasse_Installation.php">Installations</a></li>
            <li><a href="Eingangs_Rechnungen.php">EinRechnungen</a></li>
			<li><a href="kunden.php">Kunden</a></li>
			<li><a href="kunden_protokoll.php">Kunden Protokoll</a></li>
            <li><a href="Buchungsliste_FraSpa.php">FraSpa</a></li>
			<li><a href="Buchungsliste_FraSpa_.php">FraSpa_Old</a></li>
			<li><a href="#">Angebot</a></li>
            <li><a href="#">ZE</a></li>
			<li><a href="#">Gutschrift</a></li>
			<li><a href="#">Storno</a></li>
          </ul>
          <ul class="nav nav-sidebar">
			<li><a href="">Neu Kunden</a></li>
            <li><a href="">Neu Angebot</a></li>
            <li><a href="">Neu Rechnung</a></li>
			<li><a href="">Neu ZE</a></li>
			<li><a href="">Neu Gutschrift</a></li>
			<li><a href="">Neu Storno</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Lieferanten</a></li>
            <li><a href="">Bestellungen</a></li>
          </ul>
		  <ul class="nav nav-sidebar">
            <li><a href="Kassen_protokoll.php">Kassen Protokoll</a></li>  
			<li><a href="Kassen_protokoll_.php">Kassen Protokoll_</a></li>  
            <li><a href="Kassen_protokoll_.php">Files</a></li>  
            <!--<li><a href="foodbee.php">FoodBee Protokoll</a></li> 
            <li><a href="pos.php">FoodBeeId Update in pos</a></li> -->			
          </ul>
        </div>
        <div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 main">
       <div class="row">
        <div class="col-6">
          <div class="table-responsive">
            <table class="table table-striped tablesorter display dataTable" id="empTable">
              <thead>
                  <tr>
                    <th>PDF File</th>
                    <th>Action</th>
                  </tr>
              </thead>

			  <tbody>
			  <?php
$pdf = 'KhanaCRM/KASSE_RECHNUNGEN/pdf/';
// $jpg = 'KhanaCRM/KASSE_RECHNUNGEN/jpg/';

if (! is_dir($pdf)) {
	exit('Invalid diretory path');
}

foreach (scandir($pdf) as $filepdf) {
    	if ('.' === $filepdf) continue;
	if ('..' === $filepdf) continue;

?>
<tr><td><?=$filepdf?></td>
<td><a target="_blank" href="KhanaCRM/KASSE_RECHNUNGEN/jpg/<?=$filepdf?>">View Now</a></td>
</tr>
<?php

// 	//echo $file.'<br/>';
// 	$pdf_file = $pdf.''.$file;
// 	//echo $pdf_file.'<br/>';
// 	$file_jpg = preg_replace('"\.pdf$"', '.jpg', $file);
// 	//echo $file_jpg.'<br/>';
// 	$jpg_file = $jpg.''.$file_jpg;
// 	//echo $jpg_file.'<br/>';
	

}
?>


              </tbody>
            </table>
          </div>
</div>
<div class="col-6">
          <div class="table-responsive">
            <table class="table table-striped tablesorter display dataTable" id="empTable1">
              <thead>
                  <tr>
                    <th>JPG File .</th>
                    <th>Action</th>
                  </tr>
              </thead>

			  <tbody>
			  <?php
$jpg = 'KhanaCRM/KASSE_RECHNUNGEN/jpg/';
// $jpg = 'KhanaCRM/KASSE_RECHNUNGEN/jpg/';

if (! is_dir($jpg)) {
	exit('Invalid diretory path');
}

foreach (scandir($jpg) as $file) {
    	if ('.' === $file) continue;
	if ('..' === $file) continue;

?>
<tr><td><?=$file?></td>
<td><a target="_blank" href="KhanaCRM/KASSE_RECHNUNGEN/jpg/<?=$file?>">View Now</a></td>
</tr>
<?php

// 	//echo $file.'<br/>';
// 	$pdf_file = $pdf.''.$file;
// 	//echo $pdf_file.'<br/>';
// 	$file_jpg = preg_replace('"\.pdf$"', '.jpg', $file);
// 	//echo $file_jpg.'<br/>';
// 	$jpg_file = $jpg.''.$file_jpg;
// 	//echo $jpg_file.'<br/>';
	

}
?>


              </tbody>
            </table>
          </div>
</div>
</div>
        </div>
      </div>

    </div>

<!-- jQuery first, then Tether, then Bootstrap JS. -->
<!-- Datatable CSS -->
<link href='https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
<link href='https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css' rel='stylesheet' type='text/css'>
<link href='https://cdn.datatables.net/select/1.7.0/css/select.dataTables.min.css' rel='stylesheet' type='text/css'>
<link href='https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css' rel='stylesheet' type='text/css'>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
    
    <!-- Datatable JS -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>
<script src="https://editor.datatables.net/extensions/Editor/js/dataTables.editor.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js" integrity="sha384-ux8v3A6CPtOTqOzMKiuo3d/DomGaaClxFYdCu2HPMBEkf6x2xiDyJ7gkXU0MWwaD" crossorigin="anonymous"></script>
	<script src=
"https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js">
      </script>
    <script src=
"https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js">
      </script> 
	 
  <script>
    $(document).ready(function(){
     
 
   $('#empTable').DataTable();
   $('#empTable1').DataTable();
});


    </script>
  
  </body>
</html>
<?php
// $pdf = 'KhanaCRM/KASSE_RECHNUNGEN/pdf/';
// $jpg = 'KhanaCRM/KASSE_RECHNUNGEN/jpg/';

// if (! is_dir($pdf)) {
// 	exit('Invalid diretory path');
// }

// foreach (scandir($pdf) as $file) {
// 	if ('.' === $file) continue;
// 	if ('..' === $file) continue;

// 	//echo $file.'<br/>';
// 	$pdf_file = $pdf.''.$file;
// 	//echo $pdf_file.'<br/>';
// 	$file_jpg = preg_replace('"\.pdf$"', '.jpg', $file);
// 	//echo $file_jpg.'<br/>';
// 	$jpg_file = $jpg.''.$file_jpg;
// 	//echo $jpg_file.'<br/>';
	
// 	if (!file_exists($jpg_file)) {
	
// 	$fp_pdf = fopen($pdf_file, 'rb');

// 	$img = new imagick(); // [0] can be used to set page number
// 	$img->setResolution(300,300);
// 	$img->readImageFile($fp_pdf);
// 	$img->setImageFormat( "jpeg" );
// 	$img->setImageCompression(imagick::COMPRESSION_JPEG); 
// 	$img->setImageCompressionQuality(1); 
// 	$img->setImageUnits(imagick::RESOLUTION_PIXELSPERINCH);

// 	//$data = $img->getImageBlob();

// 	file_put_contents($jpg_file, $img);	
// 	}
// }
?>