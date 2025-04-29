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
	<script>	
	$(document).ready(function(){
    $("#filter").keyup(function(){
 
        // Retrieve the input field text and reset the count to zero
        var filter = $(this).val(), count = 0;
 
        // Loop through the comment list
        $(".tablesorter tr").each(function(){
 
            // If the list item does not contain the text phrase fade it out
            if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                $(this).fadeOut();
 
            // Show the list item if the phrase matches and increase the count by 1
            } else {
                $(this).show();
                count++;
            }
        });
 
        // Update the count
        // var numberItems = count;
        // $("#filter-count").text("Number of Comments = "+count);
    });
	
		$(function(){
			$('table').tablesorter({
				widgets        : ['zebra', 'columns'],
				usNumberFormat : false,
				sortReset      : true,
				sortRestart    : true
			});
		});
	});

	</script>
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
<script>
function deleteRecord(name){
	   $.ajax('deleteImg.php', {
				type: 'POST',  // http method
				data: { name: name },  // data to submit
				success: function (data, status, xhr) {
					alert(data);
				},
				error: function (jqXhr, textStatus, errorMessage) {
						alert("error");
					}
			});	
	}
</script>
<iframe id="myFrame" style="display:none" style="z-index:2" width="100%" height="100%"></iframe>
<script type="text/javascript">
function ShowGoogleMap(number)
{
  console.log(this);
	var left  = ($(window).width()/2)-(900/2);
     var top   = ($(window).height()/2)-(600/2);
	  
	 
	
  var w = window.open("", "popupWindow", "width=600, height=800, top="+top+", left="+left+", scrollbars=yes");
                var $w = $(w.document.body);
                $w.html("<iframe id='frame' src='http://khana-gmbh.de/portal/KhanaCRM/KASSE_RECHNUNGEN/pdf/"+number+".pdf' width='100%' height='100%'></iframe>"); 
									
}
//http://khana-gmbh.de/portal/KhanaCRM/KASSE_RECHNUNGEN/pdf/2021-0335.pdf
</script>
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
            <!--<li><a href="foodbee.php">FoodBee Protokoll</a></li> 
            <li><a href="pos.php">FoodBeeId Update in pos</a></li> -->			
          </ul>
        </div>
        <div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 main">
          <div class="table-responsive">
            <table class="table table-striped tablesorter display dataTable" id='empTable'>
              <thead>
                  <tr>
                    <th>Rech-Nr.</th>
                    <th>Kd-Nr.</th>
                    <th>Name</th>
                    <th>Datum</th>
                    <th align='right'>Betrag &euro;</th>
                    <th>Payment</th>
                    <th>Offen</th>
                    <th>Update Img</th>
                  </tr>
              </thead>
			  <tbody>
			  


              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="modal fade" id="editmodel" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit your record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editForm" action="updateInvoice.php" method="POST">
			<input type="hidden" name="rowid" class="roweditid" value=""/>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Rechnung Nummer:</label>
            <input type="text" class="form-control rowedit1" id="rechnung_nummer" name="rechnung_nummer">
          </div>
		  <div class="form-group">
            <label for="recipient-name" class="col-form-label">Kunden Nr:</label>
            <input type="text" class="form-control rowedit2" id="kunden_nr" name="kunden_nr">
          </div>
		  <div class="form-group">
            <label for="recipient-name" class="col-form-label">Kunden Name:</label>
            <input type="text" class="form-control rowedit3" id="kunden_name" name="kunden_name">
          </div>
		  <div class="form-group">
            <label for="recipient-name" class="col-form-label">Rechnung Datum:</label>
            <input type="text" class="form-control rowedit4" id="rechnung_datum" name="rechnung_datum">
          </div>
		  <div class="form-group">
            <label for="recipient-name" class="col-form-label">Bezahlt:</label>
            <input type="text" class="form-control rowedit5" id="Bezahlt" name="Bezahlt">
          </div>
		  <div class="form-group">
            <label for="recipient-name" class="col-form-label">Payment Method:</label>
            <input type="text" class="form-control rowedit6" id="payment_method" name="payment_method">
          </div>
		  <div class="form-group">
            <label for="recipient-name" class="col-form-label">Offen:</label>
            <input type="text" class="form-control rowedit7" id="Offen" name="Offen">
          </div>
		 
		  <button type="submit" class="btn btn-primary">Update</button>
		  
        </form>
      </div>
      
    </div>
  </div>
</div>
    </div>

<!-- jQuery first, then Tether, then Bootstrap JS. -->
<!-- Datatable CSS -->
<link href='https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>






    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
    
    <!-- Datatable JS -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js" integrity="sha384-ux8v3A6CPtOTqOzMKiuo3d/DomGaaClxFYdCu2HPMBEkf6x2xiDyJ7gkXU0MWwaD" crossorigin="anonymous"></script>
	<script src=
"https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js">
      </script>
    <script src=
"https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js">
      </script> 
	  <script>
       
	   $('#editForm').validate({
		rules: {
		rechnung_nummer: {
                required: true,
            },
		kunden_nr: {
            required: true,
        },          
        kunden_name: {
            required: true,
        },
		rechnung_datum: {
            required: true,
        },
		Bezahlt: {
            required: true,
        },
		payment_method: {
            required: true,
        },
		Offen: {
            required: true,
        },
		
    },
submitHandler: function(form) {
	
	$.ajax({
		url: form.action,
		type: form.method,
		data: $(form).serialize(),
		success: function(response) {
			alert(response);
			location.reload();
		}            
	});
}
});
   </script>
  <script>
    $(document).ready(function(){
     
 
   $('#empTable').DataTable({
      'processing': true,
      'serverSide': true,
      'serverMethod': 'post',
	 

      'ajax': {
          'url':'ajexinvoice.php'
      },
   
      'columns': [
         { data: 'rechnung_nummer'},
         { data: 'kunden_nr' ,className: 'rowedit'},
         { data: 'kunden_name' ,className: 'rowedit'},
         { data: 'rechnung_datum' ,className: 'rowedit'},
         { data: 'Bezahlt' ,className: 'rowedit'},
         { data: 'payment_method' ,className: 'rowedit'},
         { data: 'Offen' ,className: 'rowedit'},
         { data: 'Update_Img' ,className: 'rowedit'},
      ],
      
   });
});

$(document).on('click','body .rowedit',function(){
    //  $(this) = your current element that clicked.
    // additional code
	
	var row = $(this).closest("tr"),        // Finds the closest row <tr> 
    tds = row.find("td");    // Finds the 2nd <td> element
	var countitems=1;
	$('.roweditid').val(row.find(".inputvalue").val());
	$.each(tds, function() {               // Visits every single <td> element
			
		
	$('.rowedit'+countitems).val($(this).text());
	countitems++;
	// Prints out the text within the <td>
});
	$('#editmodel').modal('show'); 
});

    </script>
  
  </body>
</html>
<?php
$pdf = 'KhanaCRM/KASSE_RECHNUNGEN/pdf/';
$jpg = 'KhanaCRM/KASSE_RECHNUNGEN/jpg/';

if (! is_dir($pdf)) {
	exit('Invalid diretory path');
}

foreach (scandir($pdf) as $file) {
	if ('.' === $file) continue;
	if ('..' === $file) continue;

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
	}
}
?>