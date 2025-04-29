<?php include('include/header.php');?>
        <div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 main">
       <div class="row">
        
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
<td><a class="btn btn-warning" target="_blank" href="KhanaCRM/KASSE_RECHNUNGEN/jpg/<?=$file?>"><i class="fa fa-eye"></i></a></td>
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