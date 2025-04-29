<html>
<head>
<title>Order Info</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://foodbee.de/sales/assets/order/css/style.css" type="text/css" rel="stylesheet" />
<link href="https://foodbee.de/assets/css/style.css" type="text/css" rel="stylesheet" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script>
 function saveValue(){
   $('#datepick_form').submit();
   document.forms[myFormName].submit();
}
</script>
<?php
if (!empty(htmlentities($_POST["from"]))) {   
   $date = $_POST["from"];
} else {  
    $date = date("Y-m-d");
}
 ?>
<style>
	table {
			  background:#fff;
		}

	td, th {
			  border: 1px solid #dddddd;
			  padding: 8px 16px;			  
		}
		</style>
</head>
<body>

<?php
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
$r_id = htmlentities($_GET['id']);	  
$sql = "SELECT * FROM `tbl_users` WHERE userId='".$r_id."' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
					
?>

<div class="Restaurant_Page_Panel">
<div id="Restaurant_header">
<div class="row align-center">
<div class="col-md-8 col-8">
<div class="Restaurant_header_left">
<div class="Restaurant_name">
<?php echo $row['name']." (".$row['code'].")";  ?>
</div>
</div>
</div>
<div class="col-md-4 col-4 text-right">
<div class="dropdown">
<span class=" dropdown-toggle" type="button" data-toggle="dropdown">
<img src="https://foodbee.de/sales/assets/images/bee.png">
</span>
<!--<ul class="dropdown-menu">
<li><h4>Restaurant</h4>
<span class="abc">Geöffnet</span> <input id="togBtn" type="checkbox" value="0" checked data-toggle="toggle" data-onstyle="outline-primary" data-offstyle="outline-secondary">
</li>
<li>
<h4>Abholen</h4>
<span class="abc">Geöffnet</span>
<input id="selfBtn" type="checkbox" value="0" checked data-toggle="toggle" data-onstyle="outline-primary" data-offstyle="outline-secondary">
<h4>Lieferung</h4>
<span class="abc">Geöffnet</span>
<input id="deliveryBtn" type="checkbox" value="0" checked data-toggle="toggle" data-onstyle="outline-primary" data-offstyle="outline-secondary">
</li>
<li><a href="https://foodbee.de/sales/logout">Logout</a></li>
</ul>-->
</div>
</div>
</div>
</div>

<div class="today_order_title">
<div class="center-br">
<h2 class="tddate">Heutige Bestellung</h2>
<div style="margin-left:10px">
<form method="POST" id="datepick_form">
<div class="form-groups">
<div class="input-group date" id="datepicker">
<input type="hidden" name="from" id="picker" onChange="saveValue()" class="form-control dateinput" />
<span class="input-group-addon">
<span class="glyphicon glyphicon-calendar"></span>
</span>
</div>
</div>
</form>
</div>
</div>
</div>
<div class="TodaysOrder_Panel">
<div class="order-heading-main">
<h2>
<em class="total_new_count">
<?php 
$count=0;
$sql1 = "SELECT * FROM `pos_orders` WHERE `dateandtime`='".$date."' AND `restaurant_id`='".$_GET['id']."' "; 
$result1 = $conn->query($sql1);
echo $result1->num_rows ;
?>
</em>Neu </h2>

</div>
<?php 
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
   
?>
<div class="orderPanelListingBox- new">
<style>
a {
    text-decoration: none !important;
	color:black;
}
</style>
<?php  while($row1 = $result1->fetch_assoc()) { $count++;  ?>
<div class="orderPanelListingBox" id="content<?php echo $row1['id']; ?>">
<div class="order_list_box">
<a href="#" data-id="<?php echo $row1['id']; ?>" class="parentanchor" data-href="https://foodbee.de/khana-express/order/tracking/1617612674">
<div class="row">
<div class="col-md-3 col-7">
<div class="OrderTime text-center">
<h3>Order No <br /><span><?php echo $count; ?></span></h3>
</div>
<div class="OrderImgTime">
<?php if($row1['deliveryType']=='1'){ ?>
<div class="o_img"><img class="pickupimage" width="35" src="https://foodbee.de/sales/assets/order/images/bar.png" /></div>
<?php } else { ?>
<div class="o_img"><img class="pickupimage" width="40" src="https://foodbee.de/sales/assets/order/images/img1.jpg" /></div>
<?php } ?>
<div class="o_time">
<?php
$s = $row1['orderDate'];
$dt = new DateTime($s);
$date = $dt->format('y-m-d');
$time = $dt->format('H:i');
echo  $time;
 ?>
</div>
</div>
</div>
<div class="col-md-5">
<div class="cus_name_Address">
<h2>....</h2>
<p><?php echo $row1['firstName']; ?></p>
<div class="row">

<!--<div class="col-md-3 p_r_0">
<div class="T_Item">
#2 </div>
</div>-->
<div class="col-md-2 p_r_0">
<div class="O_Item">
<div class="O_Item_image"><img src="https://foodbee.de/sales/assets/order/images/o_item_img1.jpg" /></div>
<div class="O_item_qty">
<?php 
$sql12 = "SELECT * FROM `pos_items` WHERE orderId='".$row1['orderId']."' AND  beverage='1'";
$result2 = $conn->query($sql12);
echo $result2->num_rows ; ?>
</div>
</div>
</div>
<div class="col-md-3 p_r_0">
<div class="O_Item blow">
<div class="O_Item_image"><img src="https://foodbee.de/sales/assets/order/images/o_item_img2.jpg" /></div>
<div class="O_item_qty">
<?php 
$sql12 = "SELECT * FROM `pos_items` WHERE orderId='".$row1['orderId']."' AND  beverage='0'";
$result2 = $conn->query($sql12);
echo $result2->num_rows ; ?>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-4 col-5">
<div class="Order_Status text-center">
<div class="status_img">
<?php 
if($row1['paymentType']=='0'){ ?>
<h2 class="bar-txt">Bar</h2>
<?php } else { ?>
<h2 class="bar-txt">Paypal</h2>
<?php } ?>
</div>
</div>
<div class="amoutPayment2">
<h4><span><?php echo $row1['totalAmount'];?> &#128;</span>
<br>
<?php 
if($row1['paymentType']=='0'){ ?>
<img src="https://foodbee.de/sales/assets/order/images/master.png" />
<?php } else { ?>
<img src="https://foodbee.de/sales/assets/order/images/paypal.png" />
<?php  } ?>
</h4>
</div>
</div>
</div>
</a>
</div>
</div>
<div id="myModal<?php echo $count; ?>" class="modal fade" role="dialog">
<div class="modal-dialog">

<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Order Note</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<p>test bestellung</p>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<div id="myModalOrder<?php echo $row1['id']; ?>" class="modal fade" role="dialog">
<div class="modal-dialog">

<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Order</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
  <iframe width="100%" scrolling="auto" height="335px" frameborder="1" src="order_detail.php?id=<?php echo $row1['orderId']; ?>" style="border: 0px none #ffffff;" name="national-campaign" marginheight="0px" marginwidth="0px">
  </iframe>
  
 </div>
<div class="modal-footer">
</div>
</div>
</div>
</div>
<?php } ?>
</div>
	<?php } ?>
</div>
<div id="paymentTypeModal" class="modal fade" role="dialog">
<div class="modal-dialog">

<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Payment Type</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<form id="paymentTypeForm">
<div class="row">
<div class="col-md-12 py-2">
<label>Select Payment Type</label>
<select class="form-control payment_mode" name="payment_mode">
<option value="">Select Payment Type</option>
<option value="Cash">Cash</option>
<option value="Paypal">Paypal</option>
</select>
</div>
</div>
</form>
</div>
<div class="modal-footer">
<div class="col-md-3">
<input type="button" value="Update" class="btm-sm btn-primary btn form-control paymentTypeformbutton" />
</div>
</div>
</div>
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="972ca0060d5c5582063a4f43-text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" type="972ca0060d5c5582063a4f43-text/javascript"></script>
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js" type="972ca0060d5c5582063a4f43-text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" defer type="972ca0060d5c5582063a4f43-text/javascript"></script>

<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="972ca0060d5c5582063a4f43-|49" defer=""></script></body>
</html>
<script src="https://foodbee.de/sales/assets/admin/script.js" type="972ca0060d5c5582063a4f43-text/javascript"></script>

<script type="972ca0060d5c5582063a4f43-text/javascript">
 $(function () {
	$('input#datepicker1').datepicker({
		format: 'yyyy-mm-dd',
		autoHide: true
	});
	/* $('#datepicker').datepicker({
		format: 'yyyy-mm-dd',
		//buttonImage: "images/calendar.gif",
	}); */
	$('#datepicker').datepicker({
        format: "yyyy-mm-dd",
        onChange: function(dateText) {
			alert("Selected date: " + dateText + ", Current Selected Value= " + this.value);
			$(this).change();
            /* $.ajax({
                url: Routing.generate('ajax_table', {selectedDate: selectedDate})
            }) */
        }
    }).on('change', function(dateText, inst){
		console.log($('.dateinput').val());
		//$('#datepicker').hide();
		$(".datepicker").remove();
		neworder();
	});
});
 $('body').on('click', '.parentanchor', function() {
		var id = $(this).attr('data-id');
		
		//$("iframe", $('#myModalOrder'+id)).attr("src", $(this).attr('data-href'));
		$('#myModalOrder'+id).modal('show');
	});
 </script>
