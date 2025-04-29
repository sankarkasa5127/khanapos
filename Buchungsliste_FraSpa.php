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
  </head>

  <body>

    <nav class="navbar navbar-dark navbar-fixed-top bg-inverse">
      <button type="button" class="navbar-toggler hidden-sm-up" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">KHANA Portal</a>
      <div id="navbar">
        <nav class="nav navbar-nav pull-xs-left">
          <a class="nav-item nav-link" href="index.php">Home</a>
          <a class="nav-item nav-link" href="telekom.php">Telekom</a>
          <a class="nav-item nav-link" href="it_support.php">IT Support & Webdesign</a>
          <a class="nav-item nav-link" href="kasse.php">Kassensysteme</a>
        </nav>
        <form class="pull-xs-right">
          <input type="text" class="form-control" id="filter" placeholder="Search...">
        </form>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            
            <li><a href="index.php">Rechnungen</a></li>
			<li><a href="kunden.php">Kunden</a></li>
			<li><a href="kunden_protokoll.php">Kunden Protokoll</a></li>
			<li class="active"><a href="Buchungsliste_FraSpa.php">FraSpa <span class="sr-only">(current)</span></a></li>
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
          </ul>
        </div>
        <div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 main">
          <div class="table-responsive">
            <table class="table table-striped tablesorter">
              <thead>
                <tr>
                  <th>Kunden_Nr.</th>
				  <th>Rechnungs_Nr.</th>
                  <th>Buchungsdatum</th>
				  <th>Empfaenger</th>
                  <th>Verwendungszweck</th>
                  <th>Betrag</th>
                </tr>
              </thead>
			  <tbody>
			  
<?php
$servername = "localhost";
$username = "dbu10975332";
$password = "ch03ms23";
$dbname = "db10975332-khana";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Buchungsliste_FraSpa WHERE invoice=1 ORDER BY id ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		$Buchungsdatum = str_replace('00:00:00', '', $row["Buchungsdatum"]);
		$Buchungsdatum = new DateTime($row["Buchungsdatum"]);
	
        echo "<tr><td> ".$row["Kunden_Nr"]." </td><td> ".$row["Rechnungs_Nr"]." </td><td> ".$Buchungsdatum->format('d.m.Y')." </td><td> ".$row["Empfaenger"]." </td><td> ".$row["Verwendungszweck"]." </td><td align='right'> ".number_format($row["Betrag"], 2)." &euro;</td></tr>";
    }
} else {
    //echo "0 results";
}
$conn->close();
?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

<!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js" integrity="sha384-ux8v3A6CPtOTqOzMKiuo3d/DomGaaClxFYdCu2HPMBEkf6x2xiDyJ7gkXU0MWwaD" crossorigin="anonymous"></script>
  </body>
</html>
