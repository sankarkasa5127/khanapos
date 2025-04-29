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
	<style>
		body { height: 1000px; }
		#header-fixed { 
			position: fixed; 
			top: 50px; display:none;
			background-color:white;
			max-width:1500px;
		}
	</style>
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
         $("#filter-count").text("Total Records = "+count);
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
			<li><a href="kunden_protokoll.php">Kunden Protokoll <span class="sr-only">(current)</span></a></li>
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
            <li class="active"><a href="foodbee.php">FoodBee Protokoll <span class="sr-only">(current)</span></a></li> 	
            <li><a href="pos.php">FoodBeeId Update in pos</a></li> 			
          </ul>
        </div>
        <div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 main">
          <div class="table-responsive">
		  <div class="col-sm-3 col-md-3">
		   <form method="POST" id="selectForm">
		    <select id="mySelect" name="statusChk" class="form-control" onchange="statusGet()">
			  <option>Search Status</option>
			  <option value="UnderProcess">UnderProcess</option>
			  <option value="1">off-line</option>			  
			  <option value="2">on-line</option>
			 </select>
			</form>
			</div>
            <table class="table table-striped tablesorter" id="table-1">
              <thead>
                <tr>
                  <th>FoodBee ID</th>                 
                  <th>Restaurant Name</th>
                  <th>Address</th>
				  <th>Link</th>
				  <th>Status</th>
                  <th>Orders</th>				  
                  <th>inPOS</th>				  
                </tr>
              </thead>
			  <tbody>			  
<?php
$status="0";
$exist="0";
$servername = "vwp9989.webpack.hosteurope.de";
$username = "db10975332-abee";
$password = "CH03ms23";
$dbname = "db10975332-abee";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$numRows=0;
if (!empty($_POST["statusChk"])) {   
      $userStatus =$_POST["statusChk"]; 
if($_POST["statusChk"]=="UnderProcess") { $userStatus=="0"; }
	
	  
	  $sql = "SELECT * FROM `tbl_users` WHERE `user_status`='".$userStatus."' ORDER BY `userId` DESC ";	  
} else {  

    $sql = "SELECT * FROM `tbl_users` ORDER BY `userId` DESC ";
}

$servername1 = "vwp9989.webpack.hosteurope.de";
$username1 = "dbu10975332";
$password1 = "ch03ms23";
$dbname1 = "db10975332-khana";
// Create connection
$conn1 = new mysqli($servername1, $username1, $password1, $dbname1);
// Check connection
if ($conn1->connect_error) {
    die("Connection failed: " . $conn1->connect_error);
} 

	  

$result = $conn->query($sql);
$numRows = $result->num_rows;
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
			if($row["user_status"]=='0') {
				$status= "UnderProcess";
			} elseif ($row["user_status"]=='1')	{
				$status= "off-line";
			} else {
				$status= "on-line";
			}						
			
$sql1 = "SELECT * FROM `kassen_protokoll` WHERE foodbeeId='".$row['userId']."' ";
$result1 = $conn1->query($sql1);
$row1 = $result1->fetch_assoc();
if($result1->num_rows>0) {
				$exist= "Exists";
} else { $exist= "Not"; }			
		//if($row["Status"]==1) { $status = '<img src="img/green_small.png"/>'; } elseif($row["Status"]==2) { $status = '<img src="img/yellow_small.png"/>'; } elseif($row["Status"]==3) { $status = '<img src="img/gray_small.png"/>'; } else {$status = '<img src="img/red_small.png"/>';}
        echo "<tr>		
		<td> ".$row["userId"]." </td>		
		<td> ".$row["name"]." </td>
		<td> ".$row["address"]." </td>
		<td><a target='_blank' href='https://foodbee.de/".$row["slugname"]."'> https://foodbee.de/".$row["slugname"]."</a> </td>
		<td>".$status."</td>
		<td><a target='_blank' href='orders.php?id=".$row["userId"]."'> Orders </a> </td>
		<td>".$exist."</td></tr>";				
    }
} else {
    //echo "0 results";
}
$conn->close();
?>
              </tbody>
			  <p id="filter-count" style="color:#000; width:200px;padding:10px;text-align:center;">   <?php if(!empty($numRows)) { echo "Total Records: ".$numRows; } ?> </p>
            </table>
			<table class="table table-striped tablesorter" id="header-fixed">			
           </table>			
        </div>
      </div>
    </div>
 <script>
	var tableOffset = $("#table-1").offset().top;
	var $header = $("#table-1 > thead").clone();
	
	var $fixedHeader = $("#header-fixed").append($header);

	$(window).bind("scroll", function() {
		var offset = $(this).scrollTop();
		
		if (offset >= tableOffset && $fixedHeader.is(":hidden")) {	
           // $( $fixedHeader ).wrap( "<div class='table-responsive'></div>" );		
			$fixedHeader.show();			
		}
		else if (offset < tableOffset) {
			$fixedHeader.hide();
		}
	});
	 
	 function statusGet(){
		  $("#selectForm").submit();
		  //alert($("#mySelect").val());
	 }
 </script>
<!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js" integrity="sha384-ux8v3A6CPtOTqOzMKiuo3d/DomGaaClxFYdCu2HPMBEkf6x2xiDyJ7gkXU0MWwaD" crossorigin="anonymous"></script>
 </body>
</html>
