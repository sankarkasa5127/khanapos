<?php 
require_once("maxProtector.class.php");
require_once("loadData.php");
require_once("loadPurchase.php");
require_once("include/permissions.php"); 
$page= str_replace("/", "",$_SERVER['SCRIPT_NAME']);
// echo $page;die('dev');
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags always come first -->
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/css/bootstrap.min.css" integrity="sha384-MIwDKRSSImVFAZCVLtU0LMDdON6KVCrZHyVQQj6e8wIEJkW4tvwqXrbMIya1vriY" crossorigin="anonymous">
<!--[if lt IE 9]>
<script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script> -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link href="css/tabler-icons.min.css" rel="stylesheet">
<script src="https://code.jquery.com/qunit/qunit-git.js"></script>
<!-- Custom styles for this template -->
<link href="/css/dashboard.css" rel="stylesheet">
<!-- Pick a theme, load the plugin & initialize plugin -->
<link href="css/theme.default.min.css" rel="stylesheet">
<script src="js/jquery.tablesorter.min.js"></script>
<script src="js/jquery.tablesorter.widgets.min.js"></script>
<link rel="stylesheet" type="text/css" media="only screen and (max-width: 480px)" href="mobile.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css" type="text/css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>.


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style type="text/css">
.tool-tip[title-new]:hover:after {content: attr(title-new);position: absolute;padding: 10px;display: block;z-index: 100;color: #ffffff;max-width: 200px;text-decoration: none;text-align:center;font-size: 10px;line-height: 20px;border: none;top: 75%;left: 14%;background-color: #337ab7 !important;margin-top: 4px;width: 200px;}
i.fa.fa-info-circle.tool-tip {position: absolute;margin-left: 7px;margin-top: 4px;color: #337ab7;}
</style>
<style>
.boxbutton {width: 40%;margin: 0 auto;background: rgba(255,255,255,0.2);border: 2px solid #fff;background-clip: padding-box;text-align: center;}
.buttonsubpopup {font-size: 1em;padding: 10px;color: #337ab7;border: 2px solid #337ab7;border-radius: 20px/50px;text-decoration: none;cursor: pointer;transition: all 0.3s ease-out;}
.buttonsubpopup:hover {color: #fff;background-color: #286090;border-color: #204d74;}
.overlaysubpopup {position: fixed;top: 0;bottom: 0;left: 0;right: 0;background: rgba(0, 0, 0, 0.7);transition: opacity 500ms;visibility: hidden;opacity: 0;}
.overlaysubpopup:target {visibility: visible;opacity: 1;}
.popupsub {margin: 70px auto;padding: 20px;background: #fff;border-radius: 5px;width: 60%;position: relative;transition: all 5s ease-in-out;}
.popupsub h2 {margin-top: 0;color: #333;font-family: Tahoma, Arial, sans-serif;}
.popupsub .close {position: absolute;top: 20px;right: 30px;transition: all 200ms;font-size: 30px;font-weight: bold;text-decoration: none;color: #333;}
.popupsub .close:hover {color: #06D85F;}
.popupsub .content {max-height: 30%;overflow: auto;}

.m-icon{margin-right: 10px;border-radius: 10px;height: 35px;width: 35px;display: inline-flex;align-items: center;justify-content: center;vertical-align:middle;background-color: #fff;box-shadow: -3px 4px 23px rgba(0, 0, 0, 0.1)}
.m-icon i{font-size: 18px;}

a.power-icon{color: #f80909!important;}
.m-icon1{margin-left: 5px;border-radius: 4px;display: inline-flex;align-items: center;justify-content: center;vertical-align:middle;background-color: #fff;box-shadow: -3px 4px 23px rgba(0, 0, 0, 0.1); padding: 8px 9px; margin-top: 7px;color: #f80909!important;}
.m-icon1 i{font-size: 18px; color: #f80909!important;}

@media screen and (max-width: 700px){
.boxbutton{width: 70%;}
.popupsub{width: 70%;}
a.power-icon {position: absolute; top:5px; right:10px;}
}
</style>
<style>

.datepicker {position: relative;width: 150px; height: 34px;color: white;}
.datepicker:before {position: absolute;content: attr(data-date);display: inline-block;color: black;}
.datepicker::-webkit-datetime-edit, .datepicker::-webkit-inner-spin-button, .datepicker::-webkit-clear-button {display: none;}
.datepicker::-webkit-calendar-picker-indicator {position: absolute;top: 3px; right: 0;color: black;opacity: 1;}
.top-frame{display: flex;position: relative;top: 22px;z-index: 1;justify-content: center; align-items:center;text-align: center;margin-bottom: 35px;}
.top-frame select {border:0;border-radius: 3px;background-color: transparent;padding: 4px; height: 34px;font-weight: 500;border-bottom: 1px solid #f3be4a;}
.top-frame .sel1{padding-right: 20px;}
.top-frame .sel1 .button{padding: 0px 15px 0px; border-radius: 3px; height: 34px; line-height: 34px; color: #fff; text-decoration: none;}
.top-frame .sel1 label{margin-bottom: 0;}
.top-frame .form-control{display: inline-block;font-weight: 500;border: 0;border-bottom: 1px solid #f3be4a; box-shadow: none;}
.top-form{display: flex; align-items:center;}
.top-form #ycustom{margin-top:-20px;}
.or{padding-right: 20px; padding-top: 8px;}
.price-box{/*background: #b8aaaa;*/ background: #fff; text-align: center; padding:20px 15px; margin-top: 10px; display: flex;justify-content: space-between;align-items: center;border-left: 0.4rem solid #f3be4a;}
.price-box h3{font-size: 18px; margin-top: 0px;color: #eda300; font-weight: 700;}
.price-box p{font-size: 20px; margin-bottom: 0; font-weight: 600;}
/*.price-box i.icon1{font-size: 24px; margin-right: 25px; margin-bottom: 0; background: #fff; width: 45px; height: 45px; line-height:42px; border-radius: 50%; color: #B0252E;}*/
.price-box i.icon1{font-size: 24px; margin-right: 25px; margin-bottom: 0; background: #f3be4a; width: 45px; height: 45px; line-height:42px; border-radius: 10px; color: #000;}
.contant-box{text-align: right;}
.dataTables_wrapper .dataTables_processing{top:-55%!important; z-index: 1;}
.dataTables_wrapper .dataTables_processing img{width: 7%;}
.nav-sidebar .item{position: relative;cursor: pointer;}
.nav-sidebar .item a {color: #000;text-decoration: none;display: block;}
.nav-sidebar .item a:hover{/* background: #33363a;*/transition: 0.3s ease;}
.nav-sidebar .item i{/* margin-right: 15px;*/color:#000;}
.nav-sidebar .item a .dropdown{position: absolute;right: 0;margin: 11px;transition: 0.3s ease;color: #000;}
.nav-sidebar .item .sub-menu{/* background: #262627;*/display: none;list-style: none;}
.nav-sidebar .item .sub-menu li{list-style: none;}
.nav-sidebar .item .sub-menu a{padding-left: 10px;font-weight: 500;padding: 8px 10px;border-radius: 10px;}
.nav-sidebar .item .sub-menu a:hover{color: #000;background-color: #f3be4a; }
.nav-sidebar .item .sub-menu a:hover i{color: #eda300;}
.rotate{transform: rotate(90deg);}

@media only screen and (max-width:767px){
.top-frame{top:15px;left:8px; margin-bottom:20px;flex-wrap: wrap;align-items: center;justify-content: center;}
.top-frame .sel1 {padding-right: 17px;}   
.price-box h3{font-size: 30px;}
.price-box p{font-size: 18px;}
}
@media only screen and (min-width:768px) and (max-width:991px){
.top-frame{top: 15px;left:45px;margin-bottom:20px;flex-wrap: wrap;align-items: center;justify-content: center;}
.top-frame .sel1 {padding-right: 17px;} 
.price-box{padding: 5px;}  
.price-box h3{font-size: 26px;}
.price-box p{font-size: 15px;}
.nav-sidebar .item .sub-menu{padding-left: 20px;} 
.m-icon{margin-right: 5px;}
}
@media only screen and (min-width:992px) and (max-width:1199px){
.nav-sidebar .item .sub-menu{padding-left: 20px;} 
.m-icon{margin-right: 5px;}
.nav-sidebar > li > a {padding-right: 5px;padding-left: 5px;margin: 5px 2px;}
}
</style>
<script>
$(".fancybox").fancybox({
  width: 500,
  height: 300,
  type: 'iframe'
});
</script>
<style>
td.shapedisplayflex{display:flex;}
.shapesImg{width: 24px;}
.form-select{border: 1px solid #ccc;background: #fff;height: 34px;border-radius: 5px;width: 100%;}
#rowAdder {margin-left: 17px;}
.roweditcol {cursor: pointer;width: 10%}
.hideClass {display: none;}
.error {color: red;}
.button {background-color: #000;border: none;color: white;padding: 5px 10px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;cursor: pointer;}
.subitem{display:none;}
button.toggle{display: none;}
.ml-auto{float: right;}
         
@media only screen and (max-width:767px){
.navbar-brand{padding: 14px 15px 15px 5px;}   
.navbar-toggler{display: none;}
.sidebar {background:#fff;width:235px;position:fixed;top:0;left:-235px;height:100%;box-shadow:0 2px 8px rgba(0,0,0,0.2);padding-top:65px;
transition:all 0.3s ease-out;display: block;z-index: 111;}
.sidebarshow {left:0;}
button.toggle {background:transparent;border:none;width:30px;height:30px;cursor:pointer; outline:0;display: inline-block;float: left;padding-top: 20px;}
.toggle span {width:100%;height:3px;background:#000;display:block;position:relative;coursor:pointer;}
.toggle span:before,
.toggle span:after {content:'';position:absolute;left:0;width:100%;height:100%;background:#000;transition: all 0.3s ease-out;}
.toggle span:before {top:-8px;}
.toggle span:after {top:8px;}
.toggle span.toggle {background:transparent;}
.toggle span.toggle:before {top:0;transform:rotate(-45deg);background:#000; }
.toggle span.toggle:after {top:0;transform:rotate(45deg);background:#000;}
}
.uname {top: 6px;position: relative;right: 10px;}
</style>
<style>
.offcanvas-form {position: fixed;top: 0;bottom: 0;width: 250px;padding: 100px 15px 15px;background-color: #f3be4a;border-left: 1px solid #ccc;box-shadow: 5px 0 15px rgba(0, 0, 0, 0.1);transition: right 5.3s ease;z-index: 99;display: none;}
.offcanvas-form.active {right: 0;display: block;transition: right 5.3s ease;}
.settings-container {position: fixed;top: 88%;right: 5px;z-index: 999;}
.settings-icon {font-size: 20px;cursor: pointer;}
button#open-button {background-color: #f3be4a !important;border: none !important;width: 50px;height: 50px;}
button#close-button {background-color: #f3be4a;border: none;position: absolute;right: 243px;width: 50px;height: 50px;transition: all .5s cubic-bezier(.7,0,.3,1);}
button#open-button:focus {outline: none;}
button#close-button:focus{outline: none;}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {-webkit-appearance: none;margin: 0;}
/* Firefox */
input[type=number] {-moz-appearance: textfield;}

@media only screen and (max-width: 767px) {
.settings-container{top: 45%;}
}

.dateFilterLH{
   line-height: 0px !important;
}


</style>
      
      <?php
         /*
         
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
         */
         ?> <iframe id="myFrame" style="display:none; z-index:2" width="100%" height="100%"></iframe>
   </head>
   <body>
      <embed id="embed" width="100%" height="100%">
      </embed>
      <nav class="navbar navbar-dark navbar-fixed-top bg-inverse">
         <button type="button" class="navbar-toggler hidden-sm-up d-none" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         </button>
         <!-- <a class="navbar-brand" href="#">KHANA Portal</a> -->
         <button type="button" class="toggle" id="toggle">
            <span></span>
         </button>
         <a class="navbar-brand" href="#"><img src="img/logo.png" alt="Kasa" ></a>
         <div id="navbar" class="ml-auto">
          
         <span class="uname"><span style="font-weight: bold;">Welcome,</span> <?php echo  $_SESSION['name'] ;?></span>


  
               <?php
               $pageremove=str_ireplace('.php',"",$page);
                if(in_array( $pageremove ,$arraypermission )) { ?><button type="button" class="btn btn-primary btn-mt" data-toggle="modal" data-target="#addModalLabel"> + Add New </button><?php } ?>
            <a href="logout.php" class="power-icon"><span class="m-icon1"><i class="ti ti-power"></i></span></a>
         </div>
      </nav>
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-3 col-md-2 sidebar" id='sidebar'>
               <ul class="nav nav-sidebar">
               <li <?php if(trim($page)=='index.php'){?> class="active"<?php }?>>
                     <a href="index.php"><span class="m-icon"><i class="ti ti-license"></i></span> Real Time Kassen</a>
                  </li>
                  <li <?php if(trim($page)=='posDevice.php'){?> class="active"<?php }?>>
                     <a href="posDevice.php"><span class="m-icon"><i class="ti ti-license"></i></span>POS Device</a>
                  </li>
                  <li <?php if(trim($page)=='deviceLogs.php'){?> class="active"<?php }?>>
                     <a href="deviceLogs.php"><span class="m-icon"><i class="ti ti-license"></i></span>Device Logs</a>
                  </li>
                  <li <?php if(trim($page)=='rechnungen.php'){?> class="active"<?php }?> >
                     <a href="rechnungen.php"><span class="m-icon"><i class="ti ti-file-invoice"></i></span> Rechnungen  
                     <?php  if(!in_array( "rechnungen" ,$arraypermission )) { ?> <i class="fas fa-lock " style="color:black;"></i><?php }?>
                     </a>
                  </li>
                  <li <?php if(trim($page)=='kassenbuch.php'){?> class="active"<?php }?>>
                     <a href="kassenbuch.php"><span class="m-icon"><i class="ti ti-cash"></i></span> Kassenbuch    <?php  if(!in_array( "kassenbuch" ,$arraypermission )) { ?> <i class="fas fa-lock " style="color:black;"></i><?php }?></a>
                  </li>
                  <li <?php if(trim($page)=='bankstatement.php'){?> class="active"<?php }?>>
                     <a href="bankstatement.php"><span class="m-icon"><i class="ti ti-building-bank"></i></span> Bank Statement  <?php  if(!in_array( "bankstatement" ,$arraypermission )) { ?> <i class="fas fa-lock " style="color:black;"></i><?php }?></a>
                  </li>
                  <li <?php if(trim($page)=='pay.php'){?> class="active"<?php }?>>
                     <a href="pay.php"><span class="m-icon"><i class="ti ti-building-bank"></i></span> Pay </a>
                  </li>
                  <li <?php if(trim($page)=='Kasse_Installation.php'){?> class="active"<?php }?>>
                     <a href="Kasse_Installation.php"><span class="m-icon"><i class="ti ti-analyze"></i></span> Installations <?php  if(!in_array( "Kasse_Installation" ,$arraypermission )) { ?> <i class="fas fa-lock " style="color:black;"></i><?php }?></a>
                  </li>
                  <li <?php if(trim($page)=='Eingangs_Rechnungen.php'){?> class="active"<?php }?>>
                     <a href="Eingangs_Rechnungen.php"><span class="m-icon"><i class="ti ti-receipt"></i></span> EinRechnungen <?php  if(!in_array( "Eingangs_Rechnungen" ,$arraypermission )) { ?> <i class="fas fa-lock " style="color:black;"></i><?php }?></a>
                  </li>
                  <li <?php if(trim($page)=='kunden.php'){?> class="active"<?php }?>>
                     <a href="kunden.php"><span class="m-icon"><i class="ti ti-user-plus"></i></span> Kunden  <?php  if(!in_array( "kunden" ,$arraypermission )) { ?> <i class="fas fa-lock " style="color:black;"></i><?php }?></a>
                  </li>
                  <li <?php if(trim($page)=='kundenIban.php'){?> class="active"<?php }?>>
                     <a href="kundenIban.php"><span class="m-icon"><i class="ti ti-user-plus"></i></span> Kunden IBAN  <?php  if(!in_array( "kundenIban" ,$arraypermission )) { ?> <?php }?></a>
                  </li>
				   <li <?php if(trim($page)=='tse.php'){?> class="active"<?php }?>>
                     <a href="tse.php"><span class="m-icon"><i class="ti ti-user-plus"></i></span> TSE  <?php  if(!in_array( "tse" ,$arraypermission )) { ?> <?php }?></a>
                  </li>
                  
                   <li class="item">
                     <a class="sub-btn"><span class="m-icon"><i class="ti ti-id"></i></span> Personal  <i class="fas fa-angle-right dropdown"></i> </a>
                        <ul class="sub-menu">
                           <li <?php if(trim($page)=='roles.php'){?> class="active"<?php }?>>
                              <a href="roles.php"><span class="m-icon"><i class="ti ti-user-scan"></i></span> Roles <?php  if(!in_array( "roles" ,$arraypermission )) { ?> <i class="fas fa-lock " style="color:black;"></i><?php }?></a>
                           </li>
                           <li <?php if(trim($page)=='persons.php'){?> class="active"<?php }?>>
                              <a href="persons.php"><span class="m-icon"><i class="ti ti-users"></i></span> Persons <?php  if(!in_array( "persons" ,$arraypermission )) { ?> <i class="fas fa-lock " style="color:black;"></i><?php }?></a>
                           </li>
                           <li <?php if(trim($page)=='todo.php'){?> class="active"<?php }?>>
                              <a href="todo.php"><span class="m-icon"><i class="ti ti-license"></i></span> Todo <?php  if(!in_array( "todo" ,$arraypermission )) { ?> <i class="fas fa-lock " style="color:black;"></i><?php }?></a>
                           </li>
                           <li <?php if(trim($page)=='contacts.php'){?> class="active"<?php }?>>
                              <a href="contacts.php"><span class="m-icon"><i class="ti ti-phone"></i></span> Contacts <?php  if(!in_array( "contacts" ,$arraypermission )) { ?> <i class="fas fa-lock " style="color:black;"></i><?php }?></a>
                           </li>
                           <li <?php if(trim($page)=='search.php'){?> class="active"<?php }?>>
                              <a href="search.php"><span class="m-icon"><i class="ti ti-search"></i></span> Search <?php  if(!in_array( "search" ,$arraypermission )) { ?> <i class="fas fa-lock " style="color:black;"></i><?php }?></a>
                           </li>
                           <li <?php if(trim($page)=='templates.php'){?> class="active"<?php }?>>
                              <a href="templates.php"><span class="m-icon"><i class="ti ti-file"></i></span> Templates <?php  if(!in_array( "templates" ,$arraypermission )) { ?> <i class="fas fa-lock " style="color:black;"></i><?php }?></a>
                           </li>
                           <li >
                              <a href="paymentTypes.php"><span class="m-icon"><i class="ti ti-file"></i></span> Payment Type</a>
                           </li>
                        </ul>
                  </li> 
                  <li class="item">
                     <a class="sub-btn"><span class="m-icon"><i class="ti ti-id"></i></span> Types  <i class="fas fa-angle-right dropdown"></i> </a>
                        <ul class="sub-menu">
                        <li <?php if(trim($page)=='types.php'){?> class="active"<?php }?>>
                     <a href="types.php"><span class="m-icon"><i class="ti ti-brand-unity"></i></span>Item Types <?php  if(!in_array( "types" ,$arraypermission )) { ?> <i class="fas fa-lock " style="color:black;"></i><?php }?></a>
                  </li>
                           <li >
                              <a href="deviceType.php"><span class="m-icon"><i class="ti ti-file"></i></span> Device Type</a>
                           </li>
                   
                           <li >
                              <a href="businessType.php"><span class="m-icon"><i class="ti ti-file"></i></span> Business Type</a>
                           </li>
                           <li >
                              <a href="paymentTypes.php"><span class="m-icon"><i class="ti ti-file"></i></span> Payment Type</a>
                           </li>
                        </ul>
                  </li> 
               <!-- </ul>
               <ul class="nav nav-sidebar"> -->
               <!-- <li <?php if(trim($page)=='roles.php'){?> class="active"<?php }?>>
                     <a href="roles.php"><span class="m-icon"><i class="ti ti-user-scan"></i></span> Roles</a>
                  </li>
                  <li <?php if(trim($page)=='persons.php'){?> class="active"<?php }?>>
                     <a href="persons.php"><span class="m-icon"><i class="ti ti-users"></i></span> Persons</a>
                  </li> -->
                  <li <?php if(trim($page)=='venders.php'){?> class="active"<?php }?>>
                     <a href="venders.php"><span class="m-icon"><i class="ti ti-note"></i></span> Venders <?php  if(!in_array( "venders" ,$arraypermission )) { ?> <i class="fas fa-lock " style="color:black;"></i><?php }?></a>
                  </li>
               
                  <li <?php if(trim($page)=='items.php'){?> class="active"<?php }?>>
                     <a href="items.php"><span class="m-icon"><i class="ti ti-color-swatch"></i></span> Items <?php  if(!in_array( "items" ,$arraypermission )) { ?> <i class="fas fa-lock " style="color:black;"></i><?php }?></a>
                  </li>
                  <li <?php if(trim($page)=='purchase.php'){?> class="active"<?php }?>>
                     <a href="purchase.php"><span class="m-icon"><i class="ti ti-report-money"></i></span> Purchase <?php  if(!in_array( "purchase" ,$arraypermission )) { ?> <i class="fas fa-lock " style="color:black;"></i><?php }?> </a>
                  </li>
               <!-- </ul>
              
               <ul class="nav nav-sidebar"> -->
             
                  <li <?php if(trim($page)=='Kassen_protokoll.php'){?> class="active"<?php }?>>
                     <a href="Kassen_protokoll.php"><span class="m-icon"><i class="ti ti-cash-banknote"></i></span> Kassen Protokoll <?php  if(!in_array( "Kassen_protokoll" ,$arraypermission )) { ?> <i class="fas fa-lock " style="color:black;"></i><?php }?> </a>
                  </li>

                

                  <li <?php if(trim($page)=='transferNowDoc.php'){?> class="active"<?php }?>>
                     <a href="transferNowDoc.php"><span class="m-icon"><i class="ti ti-license"></i></span>Uploads List</a>
                  </li>

                 
                  <!-- <li <?php if(trim($page)=='listpdf.php'){?> class="active"<?php }?>>
                     <a href="listpdf.php"><span class="m-icon"><i class="ti ti-file-type-pdf"></i></span> PDF Files</a>
                  </li>
                  <li <?php if(trim($page)=='listjpg.php'){?> class="active"<?php }?>>
                     <a href="listjpg.php"><span class="m-icon"><i class="ti ti-file-type-jpg"></i></span> JPG Files</a>
                  </li> -->
                  <!--<li <?php if(trim($page)=='index.php'){?> class="active"<?php }?>><a href="foodbee.php">FoodBee Protokoll</a></li><li <?php if(trim($page)=='index.php'){?> class="active"<?php }?>><a href="pos.php">FoodBeeId Update in pos</a></li> -->
               </ul>
            </div>
            

               <!-- Off-canvas form -->
               <div class="settings-container">
                  <button class="btn btn-primary settings-button" id="open-button"><span class="glyphicon glyphicon-cog settings-icon" aria-hidden="true"></span></button>
                  <button class="btn btn-danger settings-button" id="close-button" style="display: none;"><span class="glyphicon glyphicon-cog settings-icon" aria-hidden="true"></span></button>
               </div>
               <div class="offcanvas-form" id="offcanvas-form">
                  <form id="updateProfile" action="javascript:;" enctype="multipart/form-data">
                     <?php
                     $sqlpro = "select * from persons WHERE username='".$_SESSION['username']."' LIMIT 1";
                     $profilerecord = mysqli_query($conn, $sqlpro);
                     $row = mysqli_fetch_assoc($profilerecord);
                     ?>
                     <input type="hidden" name="id" class="roweditid" value="<?=$row['id'];?>" />
                                
                     <div class="profile-update">
                        <h4 style="text-align: center; color: #000;"><strong>Update Profile</strong></h4>
                     </div>
                     <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" id="name" value="<?=$row['name'];?>" placeholder="Enter your name">
                     </div>
                     <div class="form-group">
                        <label for="username">User Name:</label>
                        <input type="text" class="form-control" id="username" value="<?=$row['username'];?>"  placeholder="Enter your username" disabled >
                     </div>
                     <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                     </div>
                     <div class="form-group">
                        <label for="number">4 Digit Pin:</label>
                        <input type="number" class="form-control" id="pin" value="<?=$row['digits'];?>" name="digits" placeholder="Enter pin">
                     </div>
                     <button type="submit" class="btn btn-primary">Submit</button>
                     <img id="loaderprofile" src="https://i.gifer.com/origin/b4/b4d657e7ef262b88eb5f7ac021edda87.gif" style="width: 50px;height: 34px;display:none;">
                  </form>
               </div>
               <script>
                  $(document).ready(function () {
                     // Click event for the "Open" button
                     $('#open-button').click(function () {
                        // Show the form and hide the "Open" button
                        $('#offcanvas-form').addClass('active');
                        $('#open-button').hide();
                        $('#close-button').show();
                     });

                     // Click event for the "Close" button
                     $('#close-button').click(function () {
                        // Hide the form and show the "Open" button
                        $('#offcanvas-form').removeClass('active');
                        $('#open-button').show();
                        $('#close-button').hide();
                     });
                  });
               </script>
            
               <script type="text/javascript">
                  $(document).ready(function(){
                    //jquery for toggle sub menus
                    $('.sub-btn').click(function(){
                      $(this).next('.sub-menu').slideToggle();
                      $(this).find('.dropdown').toggleClass('rotate');
                    });

                    $('#updateProfile').validate({
                       rules: {
                       },
                       submitHandler: function(form) {
                         var form_data = new FormData(document.getElementById("updateProfile"));
                         $('#loaderprofile').show();
                         $.ajax({
                           url: 'updatePerson.php',
                           cache: false,
                           contentType: false,
                           processData: false,
                           type: "POST",
                           data: form_data,
                           success: function(response) {
                              $('#loaderprofile').hide();
                             alert(response);
                             //$('#editmodel').modal('hide');
                            // $('#empTable').DataTable().ajax.reload();
                           }
                         });
                       }
                     });

                  });
               </script>

               <script>
                  var btn = document.querySelector('.toggle');
                  var btnst = true;
                  btn.onclick = function() {
                    if(btnst == true) {
                      document.querySelector('.toggle span').classList.add('toggle');
                      document.getElementById('sidebar').classList.add('sidebarshow');
                      btnst = false;
                    }else if(btnst == false) {
                      document.querySelector('.toggle span').classList.remove('toggle');
                      document.getElementById('sidebar').classList.remove('sidebarshow');
                      btnst = true;
                    }
                  }
               </script>