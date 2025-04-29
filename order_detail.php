
<script type="6f7428353f535ba13fd4eab0-text/javascript">
let prepareCartItemArr = '[]';
let restaurantPinCodes = '[]';
let currentPinCodeRow = '[]';
let restaurantStatus = 1;
let errorMessageInCaseOfPinCode = '';
let byPassPickupCookie = 1;
</script>
<style>
    	@media only screen and (max-width: 768px) {
  .o-detail-lft {
    overflow: hidden;
}
}
</style>
<?php
$servername = "92.205.178.167";
$username = "kasseUser";
$password = "4_6Ou7x3d";
$dbname = "kasse";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$orderId = htmlentities($_GET['id']);	  
$sql = "SELECT * FROM `pos_orders` WHERE orderId='".$orderId."' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$rest = "SELECT * FROM `tbl_users` WHERE userId='".$row['restaurant_id']."' ";
$resta = $conn->query($rest);
$res = $resta->fetch_assoc();					
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="viewport" content="width=device-width">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" />
<link rel="stylesheet" href="https://foodbee.de/assets/css/bootstrap.min.css">
<link rel="stylesheet" href="https://foodbee.de/assets/css/toaster.css">
<link rel="stylesheet" type="text/css" href="https://foodbee.de/assets/css/style.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<script type="6f7428353f535ba13fd4eab0-text/javascript">
		const apiURL = 'https://foodbee.de/app/Api/';
		const siteURL = 'https://foodbee.de/';
		
	</script>
<title></title>
<style>

		.autocomplete-items {
			position: absolute;
			border: 1px solid #d4d4d4;
			border-bottom: none;
			border-top: none;
			z-index: 9;
			top: 49px;
			left: 0;
			right: 107px;
			text-align: left;
		}

		button.btn.btn-search {
			vertical-align: 6px;
		}

		.autocomplete-items div {
			padding: 10px;
			cursor: pointer;
			background-color: #fff;
			border-bottom: 1px solid #d4d4d4;
		}

		/*when hovering an item:*/
		.autocomplete-items div:hover {
			background-color: #e9e9e9;
		}

		/*when navigating through the items using the arrow keys:*/
		.autocomplete-active {
			background-color: DodgerBlue !important;
			color: #ffffff;
		}
	</style>
</head>
<body>
<header class="main-header">
<div class="topbar-container container-fluid">
<div class="row">
<div class="col-md-4">
<div class="topbar__logo">
<a href="javascript:window.history.go(-1)" class="logo-sec">
<img src="https://foodbee.de/assets/images/logonew.png" class="img-fluid">
</a>
</div>
</div>
<div class="col-md-4">
<div class="topbar__title-container">

</div>
</div>
<div class="col-md-4">
<div class="d-flex menu-container">

<div class="menu-right">
<span><img data-toggle="modal" data-target="#menu-pop" src="https://foodbee.de/assets/images/beenew.png" class="img-fluid"></span>
</div>
</div>
</div>
</div>
</div>
</header>
<script type="6f7428353f535ba13fd4eab0-text/javascript">
	let deliveryType = 'self';
	let cartprice=0;
	let deliveryTypeCookie = 'self';
	let openDeliveryPopUp = 0;
	let userSelectDeliveryType = 0;
</script>
<section class="o-detail-main">
<div class="map">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6509918.949550237!2d-123.79820902299119!3d37.184280336325216!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb9fe5f285e3d%3A0x8b5109a227086f55!2sCalifornia%2C%20USA!5e0!3m2!1sen!2sin!4v1604215488833!5m2!1sen!2sin" width="100%" height="380" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>
<div class="timer d-none"><h2><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></h2> <h6>min.s</h6></div>
<div class="container">
<div class="row">
<div class="col-md-8 m-auto">
<div class="Order_details_boxes_panel">
<div class="OrderDetailBoxes">

<span class="OrderDetailRestaurant"><img src="https://foodbee.de/app/assets/uploads/restaurant/<?php echo $res['logo']; ?>" /></span>
<?php
 if($row['paymentType']=="0"){ ?>
	 <span class="OrderDetailPaymentGateway"><img src="https://foodbee.de//assets/images/payment_0.png" /><em>Barzahlung</em></span>
<?php  } else { ?>
     <span class="OrderDetailPaymentGateway"><img src="https://foodbee.de//assets/images/paypalnew.png" /><em>	Paypal</em></span>	 
<?php  }  ?>
<?php if($row['deliveryType']=="1"){ ?>
	 <span class="OrderDetailDelivery pick-Up-Order"><img src="https://foodbee.de//assets/images/pro_duct_img_order.png" /><em>Abholen</em></span>
<?php  } else { ?>
     <span class="OrderDetailDelivery pick-Up-Order"><img src="https://foodbee.de//assets/images/delivery-boy.gif" /><em>Lieferung</em></span> 
<?php  }  ?>

<span class="OrderDetailTime "><b class="timer2"></b><em>Minuten</em></span>
</div>
</div>
<div class="o-detail-lft">
<div class="order-names">

<div class="comp-logo">
<div class="comp-left">
<div class="restro-logo d-none">
<img src="https://foodbee.de/app/assets/uploads/restaurant/<?php echo $res['logo']; ?>">
</div>
<h3><?php echo $res['name']; ?></h3>
<p><a target="_blank" href="https://www.google.com/maps?q=<?php echo $row['restaurant_address']; ?>"><?php echo $row['restaurant_address']; ?></a></p>
<p><a style="color: #1574f5;" href="tel:+<?php echo $res['mobile']; ?>"><?php echo $res['mobile']; ?></a></p>
</div>
<div class="comp-right" style="display:inline;">
<span>Ihre Bestellnummer: <b><?php echo $row['restaurant_id']."-".$row['orderId']; ?> </b></span>
</div>
</div>
</div>
<!--<div class="procesing-sec m-0 my-2">
<h3>Bestellstatus</h3>
<ul>
<li><div class="process"><div class="tick done "><img src="images/tick.png" alt=""></div> <h5>Bestelleingang</h5></div></li>
<li><div class="process"><div class="tick "><img src="images/tick.png" alt=""></div> <h5>Verarbeitung</h5></div></li>
<li><div class="process"><div class="tick "><img src="images/tick.png" alt=""></div> <h5>Lieferbereit</h5></div></li>
<li><div class="process"><div class="tick "><img src="images/tick.png" alt=""></div> <h5>Ausgeliefert</h5></div></li>
</ul>
</div>
-->
<div class="orderDetails mb-2">

<div class="order_note">
</div>
</div>
<div class="order-table">
<div class="table-responsive">
<table class="table table-borderless">
<thead>
<tr>
<th>Anz.</th>
<th>Produktname</th>
<th class="text-right">Gesamt</th>
</tr>
</thead>
<tbody>
 
<?php 
$sql13 = "SELECT * FROM `pos_items` WHERE orderId='".$row['orderId']."'";
$result3 = $conn->query($sql13);
while($row3 = $result3->fetch_assoc()) { ?>
<tr>
<td><?php echo $row3['count']; ?></td>
<td>
<div class="pro_qty_prc">
<p class="m-0">
<span class="product_sku"><?php echo $row3['sku_no']; ?> </span>
<b><?php echo $row3['articleName']; ?> [<em> <?php echo $row3['unitPrice']; ?> €</em>]</b><br>
<small style="font-style:italic"></small>
</p>
</div>
</td>
 <td class="text-right"><?php echo $row3['price']; ?></td>
</tr>

<?php 
$sql14 = "SELECT * FROM `pos_sub_items` WHERE orderId='".$row['orderId']."' AND  pos_item_id='".$row3['id']."'";
$result4 = $conn->query($sql14);
 if($result4->num_rows>0) {  
 while($row4 = $result4->fetch_assoc()) { ?>
 <tr>
<td> </td>

<td>
<div class="pro_qty_prc">
<p class="m-0">
<span class="product_sku"><?php echo $row3['count']; ?> </span>
<b><?php echo $row4['articleName']; ?> [<em> <?php echo $row4['unitPrice']; ?> €</em>]</b><br>
<small style="font-style:italic"></small>
</p>
</div>
</td>
 <td class="text-right"><?php echo $row4['price']; ?></td>
</tr>
<?php } } } ?>

<tr class="totalRow">
<td colspan="2">Zwischensumme</td>
<td class="text-right"><?php echo $row['total']; ?> €</td>
</tr>
<tr class="totalRow">
<td colspan="2">Lieferkosten</td>
<td class="text-right"><?php echo $row['deliverycharges']; ?> €</td>
</tr>
<tr class="totalRow MainRow">
<td colspan="2"> <b>Zahlung</b> </td>
<td class="text-right"><b><?php echo $row['totalAmount']; ?>€</b></td>
</tr>
</tbody>
</table>
</div>
</div>
<div class="UserInfoTable">
<div class="table-responsive">
<table class="table">
<tr>
<td><img src="https://foodbee.de/assets/images/icon1.jpg" class="img_icon" /></td>
<td><?php echo $row['firstName']."(".$row['company'].")"; ?></td>
</tr>
<tr>
<td><img src="https://foodbee.de/assets/images/icon3.jpg" class="img_icon" /></td>
<td><?php echo $row['phoneNo']; ?></td>
</tr>
<tr>
<td><img src="https://foodbee.de/assets/images/icon4.jpg" class="img_icon" /></td>
<td><?php echo $row['email']; ?></a></td>
</tr>
<tr>
<td><img src="https://foodbee.de/assets/images/icon5.jpg" class="img_icon" /></td>
<td><b><?php echo $row['order_note']; ?></b></td>
</tr>
<tr>
<td><img src="https://foodbee.de//assets/images/unnamed.png" class="img_icon" /></td>
<td><h3>
<?php if($row['desired_delivery_time']=="So schnell wie möglich" || $row['desired_delivery_time']=="ASAP" ) { echo $row['desired_delivery_time']; } else { ?>
 <span>(Standard:<span class="timer3"><?php echo $row['desired_delivery_time']; ?></span> Minuten)</span>
<?php } ?>
</h3></td>
</tr>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</section>



<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://foodbee.de/assets/js/jquery.validate.min.js" type="6f7428353f535ba13fd4eab0-text/javascript"></script>
<script src="https://foodbee.de/assets/js/form-handler.js" type="6f7428353f535ba13fd4eab0-text/javascript"></script>
<script src="https://foodbee.de/assets/js/cart.js" type="6f7428353f535ba13fd4eab0-text/javascript"></script>
<script src="https://foodbee.de/assets/js/jquery.toast.js" type="6f7428353f535ba13fd4eab0-text/javascript"></script>
<script type="6f7428353f535ba13fd4eab0-text/javascript">
		$(document).ready(function () {
		    $('.tlogin').click(function () {
				$('#register-form')[0].reset();
			});
			$('.tregister').click(function () {
				$('#login-form')[0].reset();
			});
			$('.tforget').click(function () {
				$('#login-form')[0].reset();
				$('#forget-form')[0].reset();
			});

		    $('.ordertarget').click(function () {
			   $('.authcontainer').removeClass('active').addClass('fade');
			   $('.myoderdlist').addClass('active');
			});

			$('.orlistshow').click(function () {
			   $('.myoderdlist').removeClass('active');
			   $('.authcontainer').removeClass('fade').addClass('active');
			});

			$('.forget-password').click(function () {
				 $('.login-fm').removeClass('active').addClass('fade');
				$('.forget-password-form').addClass('active');
			});

			$('.search-icon').click(function () {
				$('.slide-content').addClass('active');
			});
			$('.slide-content .close').click(function () {
				$('.slide-content').removeClass('active');
			});
		});
		jQuery(document).ready(function () {
			jQuery(window).scroll(function () {
				var sticky = jQuery('div#ibasket'),
						scroll = jQuery(window).scrollTop();

				if (scroll >= 70) sticky.addClass('fixed');
				else sticky.removeClass('fixed');
			});
		});

	</script>
<script type="6f7428353f535ba13fd4eab0-text/javascript">
		var owl = $('#slide-carousel');
		owl.owlCarousel({
		    center: false,
			// loop: true,
			// margin: 5,
			nav: true,
			dots: false,
			autoWidth: true,
			responsive: {
				0: {items: 1},
				600: {items: 3},
				1000: {items: 5}
			},
			URLhashListener:true,
			startPosition: 'URLHash'
		});
	</script>
<script type="6f7428353f535ba13fd4eab0-text/javascript">

		$(document).ready(function () {
				let userHasScrolled = false;
			let refIds = [];
			// Cache selectors
			var lastId,
				topMenu = $("#slide-carousel"),
				topMenuHeight = topMenu.outerHeight()+15,
				// All list items
				menuItems = topMenu.find(".owl-item a"),
				// Anchors corresponding to menu items
				scrollItems = menuItems.map(function(){
					var item = $($(this).attr("href"));
					if (item.length) { if(!refIds.includes($(this).attr("href"))){
						refIds.push($(this).attr("href"));
						return item;
					}}
				});
			// Bind click handler to menu items
			// so we can get a fancy scroll animation


			$('.slide-sec a').on('click', function (e) {
				e.preventDefault(); // prevent hard jump, the default behavior
				var target = $(this).attr("href"); // Set the target as variable
				// perform animated scrolling by getting top-position of target-element and set it as scroll target
				smoothScrollToElement($(target));
				location.hash = target;
				$(document).find(".owl-item .item").removeClass("active");
				$(this).parent(".item").addClass("active");
				let cEle = $('a[href="'+target+'"]').parents(".owl-item");
				let current = $('.owl-item').index(cEle);
				owl.trigger('to.owl.carousel',[current, 100]);
				userHasScrolled = true;
				return false;
			});
			/** Catch the value from URL */
			if(window.location.hash) {
				var chref = window.location.hash,
					offsetTop = chref === "#" ? 0 : $(chref).offset().top-topMenuHeight+1;
				$('html, body').stop().animate({scrollTop: offsetTop}, 300);
				$(document).find(".owl-item .item").removeClass("active");
				$('a[href="'+chref+'"]').parent(".item").addClass("active");
				let cEle = $('a[href="'+chref+'"]').parents(".owl-item");
				let current = $('.owl-item').index(cEle);
				owl.trigger('to.owl.carousel',[current, 100]);
				userHasScrolled = true;
				// return false;
			}

			var lastScrollTop = 0;
			// Bind to scroll
			$(window).scroll(function(e){
			clearTimeout( $.data( this, "scrollCheck" ) );
			$.data( this, "scrollCheck", setTimeout(function() { userHasScrolled = false;}, 250) );

			if(userHasScrolled === true) return;

			// Get container scroll position
			var fromTop = $(this).scrollTop() + topMenuHeight;

			// Get id of current scroll item
			var cur = scrollItems.map(function(){
				if ($(this).offset().top < fromTop){
					return this;
				}
			});
			// console.log(cur);
			// Get the id of the current element
			cur = cur[cur.length-1];
			var id = cur && cur.length ? cur[0].id : "";

			if (lastId !== id) {
				if(id) {
					let cEle = $('a[href="#'+id+'"]').parents(".owl-item");
					if(!cEle.find(".owl-item").hasClass("active")) {
						let current = $('.owl-item').index(cEle);
						owl.trigger('to.owl.carousel',[current, 100]);
					}
					window.location.hash    = `${id}`;
				}
				lastId = id;
				// Set/remove active class
				menuItems
					.parent()
					.removeClass("active")
					.end()
					.filter("[href='#"+id+"']")
					.parent()
					.addClass("active");
			}
			});

			// When the user clicks on the button, scroll to the top of the document
			$(document).on('click',"#myBtntoptobottom",function(e) {
				userHasScrolled = true;
				window.scroll(0,0);
				owl.trigger('to.owl.carousel',[0, 100]);

				$(document).find('.owl-stage').find('.owl-item').find('.item').removeClass("active");
			})

		});


	</script>
<script type="6f7428353f535ba13fd4eab0-text/javascript">
		new WOW().init();
	</script>
<script type="6f7428353f535ba13fd4eab0-text/javascript">
		function up(max) {
			document.getElementById("myNumber").value = parseInt(document.getElementById("myNumber").value) + 1;
			if (document.getElementById("myNumber").value >= parseInt(max)) {
				document.getElementById("myNumber").value = max;
			}
		}

		function down(min) {
			document.getElementById("myNumber").value = parseInt(document.getElementById("myNumber").value) - 1;
			if (document.getElementById("myNumber").value <= parseInt(min)) {
				document.getElementById("myNumber").value = min;
			}
		}
	</script>
<script type="6f7428353f535ba13fd4eab0-text/javascript">
		function autocomplete(inp, arr) {
			/*the autocomplete function takes two arguments,
			the text field element and an array of possible autocompleted values:*/
			var currentFocus;
			/*execute a function when someone writes in the text field:*/
			inp.addEventListener("input", function (e) {
				var a, b, i, val = this.value;
				$(document).find("#input_pincode").val('');
				$(document).find("#shoppingpage_input_pincode").val('');
				/*close any already open lists of autocompleted values*/
				closeAllLists();
				if (!val) {
					return false;
				}
				currentFocus = -1;
				/*create a DIV element that will contain the items (values):*/
				a = document.createElement("DIV");
				a.setAttribute("id", this.id + "autocomplete-list");
				a.setAttribute("class", "autocomplete-items");
				/*append the DIV element as a child of the autocomplete container:*/
				this.parentNode.appendChild(a);
				/*for each item in the array...*/
				for (i = 0; i < arr.length; i++) {
					/*check if the item starts with the same letters as the text field value:*/
					if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
						/*create a DIV element for each matching element:*/
						b = document.createElement("DIV");
						b.classList.add("autocomplete-item");
						/*make the matching letters bold:*/
						b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
						b.innerHTML += arr[i].substr(val.length);
						/*insert a input field that will hold the current array item's value:*/
						b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
						/*execute a function when someone clicks on the item value (DIV element):*/
						b.addEventListener("click", function (e) {
							/*insert the value for the autocomplete text field:*/
							inp.value = this.getElementsByTagName("input")[0].value;
							$(document).find("#input_pincode").val( this.getElementsByTagName("input")[0].value );
							$(document).find("#shoppingpage_input_pincode").val( this.getElementsByTagName("input")[0].value );
							$(document).find(".invalid-pincode").addClass("d-none");
							/*close the list of autocompleted values,
							(or any other open lists of autocompleted values:*/
							closeAllLists();
						});
						a.appendChild(b);
					}
				}
			});
			/*execute a function presses a key on the keyboard:*/
			inp.addEventListener("keydown", function (e) {
				var x = document.getElementById(this.id + "autocomplete-list");
				if (x) x = x.getElementsByTagName("div");
				if (e.keyCode == 40) {
					/*If the arrow DOWN key is pressed,
					increase the currentFocus variable:*/
					currentFocus++;
					/*and and make the current item more visible:*/
					addActive(x);
				} else if (e.keyCode == 38) { //up
					/*If the arrow UP key is pressed,
					decrease the currentFocus variable:*/
					currentFocus--;
					/*and and make the current item more visible:*/
					addActive(x);
				} else if (e.keyCode == 13) {
					/*If the ENTER key is pressed, prevent the form from being submitted,*/
					e.preventDefault();
					if (currentFocus > -1) {
						/*and simulate a click on the "active" item:*/
						if (x) x[currentFocus].click();
					}
				}
			});

			function addActive(x) {
				/*a function to classify an item as "active":*/
				if (!x) return false;
				/*start by removing the "active" class on all items:*/
				removeActive(x);
				if (currentFocus >= x.length) currentFocus = 0;
				if (currentFocus < 0) currentFocus = (x.length - 1);
				/*add class "autocomplete-active":*/
				x[currentFocus].classList.add("autocomplete-active");
			}

			function removeActive(x) {
				/*a function to remove the "active" class from all autocomplete items:*/
				for (var i = 0; i < x.length; i++) {
					x[i].classList.remove("autocomplete-active");
				}
			}

			function closeAllLists(elmnt) {
				/*close all autocomplete lists in the document,
				except the one passed as an argument:*/
				var x = document.getElementsByClassName("autocomplete-items");
				for (var i = 0; i < x.length; i++) {
					if (elmnt != x[i] && elmnt != inp) {
						x[i].parentNode.removeChild(x[i]);
					}
				}

				$(document).find(".autocomplete-item").length
			}

			/*execute a function when someone clicks in the document:*/
			document.addEventListener("click", function (e) {
				closeAllLists(e.target);
			});

		}


	</script>
</footer>
<script type="6f7428353f535ba13fd4eab0-text/javascript">
	//Get the button
	var mybutton = document.getElementById("myBtntoptobottom");

	// When the user scrolls down 20px from the top of the document, show the button
	window.onscroll = function () {
		scrollFunction()
	};

	function scrollFunction() {
		if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
			mybutton.style.display = "block";
		} else {
			mybutton.style.display = "none";
		}
	}


</script>
<script type="6f7428353f535ba13fd4eab0-text/javascript">
	/*An array containing all the pincode:*/
		var countries =["60310","60306","60308","60311","60323","60313","60385","60316","60318","60320","60322","60323","60435","60325","60326","60327","60596","60329","65760","65933","65936","65934","60549","60385","60386","60389","60431","60433","60437","60438","60439","60486","60487","60527","60528","60529","60594","60598","60438","60488"];
	autocomplete(document.getElementById("myInput"), countries);
	autocomplete(document.getElementById("shoppingpage_myInput"), countries);
</script>

<script type="6f7428353f535ba13fd4eab0-text/javascript">

let mintuesToAdd = '30';
let trackerTime = '2021-04-07 09:53:36';
let start = '1617783816';
var compareDate = new Date();
var endDate   = new Date(parseInt(start)*1000)

var timer;
timer = setInterval(function() {
  timeBetweenDates(endDate);
}, 1000);

function timeBetweenDates(toDate) {
  var dateEntered = toDate;
  var now = new Date();
  var difference = dateEntered.getTime() - now.getTime();

  if (difference <= 0) {

    // Timer done
    clearInterval(timer);

  } else {

    var seconds = Math.floor(difference / 1000);
    var minutes = Math.floor(seconds / 60);
    var hours = Math.floor(minutes / 60);
    var days = Math.floor(hours / 24);

    hours %= 24;
    minutes %= 60;
    seconds %= 60;

    $(".timer").find('h2').text(minutes);
     $(".timer2").text(minutes);
        $(".timer3").text(mintuesToAdd);
    // $("#seconds").text(seconds);
  }
}

</script>
<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="6f7428353f535ba13fd4eab0-|49" defer=""></script>