<?php include('include/header.php');?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
<link href="colorPicker/dist/css/bootstrapicons-iconpicker.css" rel="stylesheet">
<style type="text/css">
.tab-pane.fade {
  display: none;
}

.tab-pane.fade.active.in {
  display: block;
}
    .tool-tip[title-new]:hover:after {
      content: attr(title-new);
      position: absolute;
      padding: 10px;
      display: block;
      z-index: 100;
      color: #ffffff;
      max-width: 200px;
      text-decoration: none;
      text-align:center;
      font-size: 10px;
      line-height: 20px;
      border: none;
      top: 75%;
      left: 14%;
      background-color: #337ab7 !important;
      margin-top: 4px;
      width: 200px;
    }
    i.fa.fa-info-circle.tool-tip {
    position: absolute;
    margin-left: 3px;
    margin-top: 10px;
}


</style>
      <style>
           
    .datepicker {
    position: relative;
    width: 150px; height: 34px;
    color: white;
}
#empTable_wrapper{
width:100%
}
.datepicker:before {
    position: absolute;
    content: attr(data-date);
    display: inline-block;
    color: black;
}

.datepicker::-webkit-datetime-edit, .datepicker::-webkit-inner-spin-button, .datepicker::-webkit-clear-button {
    display: none;
}

.datepicker::-webkit-calendar-picker-indicator {
    position: absolute;
    top: 3px;
    right: 0;
    color: black;
    opacity: 1;
}
/*.top-frame{display: flex;position: relative;top: 22px;z-index: 1;justify-content: center; align-items:center;text-align: center;margin-bottom: 35px;}
.top-frame select {border: 1px solid #aaa;border-radius: 3px;background-color: transparent;padding: 4px; height: 34px;}
.top-frame .sel1{padding-right: 20px;}
.top-frame .sel1 .button{padding: 0px 15px 0px; border-radius: 3px; height: 34px; line-height: 34px; color: #fff; text-decoration: none;}
.top-frame .sel1 label{margin-bottom: 0;}
.top-frame .form-control{display: inline-block;}*/

.top-frame{display: flex;position: relative;top: 22px;z-index: 1;justify-content: center; align-items:center;text-align: center;margin-bottom: 35px;}
.top-frame select {border:0;border-radius: 3px;background-color: transparent;padding: 4px; height: 34px;font-weight: 500;border-bottom: 1px solid #f3be4a;}
.top-frame .sel1{padding-right: 20px;}
.top-frame .sel1 .button{padding: 0px 15px 0px; border-radius: 3px; height: 34px; line-height: 34px; color: #fff; text-decoration: none;}
.top-frame .sel1 label{margin-bottom: 0;}
.top-frame .form-control{display: inline-block;font-weight: 500;border: 0;border-bottom: 1px solid #f3be4a; box-shadow: none;}

.top-form{display: flex; align-items:center;}
.top-form #ycustom{margin-top:-20px;}

.or{padding-right: 20px; padding-top: 8px;}
/*.price-box{background: #b8aaaa; text-align: center; padding: 15px; margin-top: 10px; display: flex;justify-content: center;align-items: center;}
.price-box h3{font-size: 40px; margin-top: 0px;}
.price-box p{font-size: 20px; margin-bottom: 0;}
.price-box i.icon1{font-size: 24px; margin-right: 25px; margin-bottom: 0; background: #fff; width: 45px; height: 45px; line-height:42px; border-radius: 50%; color: #B0252E;}*/

.price-box{/*background: #b8aaaa;*/ background: #fff; text-align: center; padding:20px 15px; margin-top: 10px; display: flex;justify-content: space-between;align-items: center;border-left: 0.4rem solid #f3be4a;}
.price-box h3{font-size: 18px; margin-top: 0px;color: #eda300; font-weight: 700;}
.price-box p{font-size: 20px; margin-bottom: 0; font-weight: 600;}
/*.price-box i.icon1{font-size: 24px; margin-right: 25px; margin-bottom: 0; background: #fff; width: 45px; height: 45px; line-height:42px; border-radius: 50%; color: #B0252E;}*/
.price-box i.icon1{font-size: 24px; margin-right: 25px; margin-bottom: 0; background: #f3be4a; width: 45px; height: 45px; line-height:42px; border-radius: 10px; color: #000;}

.dataTables_wrapper .dataTables_processing{top:-55%!important; z-index: 1;}
.dataTables_wrapper .dataTables_processing img{width: 7%; position: relative; z-index: 1111;}
#reloadHeader {margin-bottom: 15px;}

.table-top{margin-top:17px;position: relative;z-index: 0;}
div.dataTables_wrapper {position: relative;z-index: 0;}
.sorting-frame{position: absolute; width: 80%;left: 107px;  margin-top: 20px; display: flex; align-items: center;z-index: 1;}
.sorting-frame .short_by{position: relative; top:-5px; margin-bottom: 0;}
.sorting-frame select.form-control:not([size]):not([multiple]){height: 34px;}

div.dt-buttons > .dt-button{background: #f3be4a!important; border:1px solid #f3be4a!important;}

@media only screen and (max-width:767px){
.top-frame{top:15px;left:8px; margin-bottom:20px;flex-wrap: wrap;align-items: center;justify-content: center;}
.top-frame .sel1 {padding-right: 17px;}   
.price-box h3{font-size: 30px;}
.price-box p{font-size: 18px;}
.sorting-frame{position: relative; width:auto; left: 0; display: block;}
.filters-frame .form-group{display: flex;}
}
@media only screen and (min-width:768px) and (max-width:991px){
.top-frame{top: 15px;left:45px;margin-bottom:20px;flex-wrap: wrap;align-items: center;justify-content: center;}
.top-frame .sel1 {padding-right: 17px;} 
.price-box{padding: 5px;}  
.price-box h3{font-size: 26px;}
.price-box p{font-size: 15px;}
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
         td.shapedisplayflex{
            display:flex;
         }
         .shapesImg{
            width: 28px;
         }
        .form-select{
         border: 1px solid #ccc;
  background: #fff;
  height: 34px;
  border-radius: 5px;
  width: 100%;
}
         #rowAdder {
         margin-left: 17px;
         }
         .rowedit {
         cursor: pointer;
         }
         .hideClass {
         display: none;
         }
         .error {
         color: red;
         }
         .button {
         background-color: #000;
         border: none;
         color: white;
         padding: 5px 10px;
         text-align: center;
         text-decoration: none;
         display: inline-block;
         font-size: 16px;
         cursor: pointer;
         }
         .subitem{
            display:none;
         }
         
      </style>
      <div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 main">
         <?php  if(in_array( "bankstatement" ,$arraypermission )) { ?>
         <div class="row" id="reloadHeader">
         <img id="reloadimg" src="https://i.gifer.com/origin/b4/b4d657e7ef262b88eb5f7ac021edda87.gif" style="width: 50px;height: 34px;display:none;margin-left: 400px;">
               
            <?php include('headers/loadBankStatement.php');?>
         </div>
         <div class="table-responsive">
               <div class="top-frame">
                  <div class="sel1" >
                     <a href="bankstatement.php" class="button" >All</a>
                  </div>
                  <div class="sel1" id="tyear">
                     <label> 
                        <select name="year" id="yearsel" class="">
                        <option value="">Year</option>
                           <option data-date-start='01-01' data-date-end='12-31' value="<?php echo date('Y');?>"><?php echo date('Y');?></option>
                           <?php
                        
                        for ($x = 1; $x <= 8; $x++) {
                            $prevYear = date('Y', strtotime('-'.$x.' year'));
                            echo "<option data-date-start='01-01' data-date-end='12-31' value='".$prevYear."'>".$prevYear."</option>";
                        }
                     ?>
                        </select>
                     </label>
                  </div>
                  <div class="sel1 ">
                     <label> 
                        <select name="quartalDate" id="quartalDate" class="">
                           <option value="">Quartal</option>
                           <option value="Q1" data-date-start='01-01' data-date-end='03-31'>Q1</option>
                           <option value="Q2"  data-date-start='04-01' data-date-end='06-30'>Q2</option>
                           <option value="Q3" data-date-start='07-01' data-date-end='09-30'>Q3</option>
                           <option value="Q4" data-date-start='10-01' data-date-end='12-31'>Q4</option>
                        </select>
                     </label>
                  </div>
                  <div class="sel1" >
                     <label> 
                        <select name="year" id="monthfilter">
                          <?php
                       
                       for ($x = 1; $x <= 12; $x++) {
                        $monthName = date('F', mktime(0, 0, 0, $x, 10));
                        $firstdate=date('m-d',strtotime(date($x.'/01')));
                        $lastdate = date("m-t", strtotime('2023-'.$x.'-01') ); 
                           echo "<option data-first='".$firstdate."' data-last='".$lastdate."' value='".$x."'>".$monthName."</option>";
                       }
                     ?>
                        </select>
                     </label> 
                  </div>
                  <form action="" method="get" class="top-form">
                     <div class="sel1" id="ycustom">
                        <label>From:  <input type="date" name="from" id="filterStartdate" data-date="" class=" form-control"  value="<?php if(isset($_GET['from'])){ echo $_GET['from']; }else{echo date('Y-m-d'); }?>"/>  
                        </label> 
                    
                        <label>To:
                           <input type="date" name="to" id="filterEndDate" data-date="" class=" form-control" data-date-format="DD.m.YYYY" value="<?php if(isset($_GET['to'])){ echo $_GET['to']; }else{echo date('Y-m-d'); }?>"/> 
                        </label>
                     </div>
                     <div class="sel1">
                        <input type="submit" class="button" value="Apply">
                     </div>
                  </form>
                  
               </div>
         </div>  
         <div class="row sorting-frame">
            <div class="col-lg-3">
               <div class="short_by">
                  <div class="form-group">
                     <span class="label-text"><label>Sort By</label></span>
                     <select data-filter="make" id="sortvalue" class="filter-make filter form-control">
                        <option value="21">All</option>
                        <option value="id">ID</option>
                        <option value="kundenBankNr">kunden Nr</option>
                        <option value="Buchungsdatum">Datum</option>
                     </select>
                  </div>
               </div>
            </div>
            <div class="col-lg-9 filters-frame" id="filter">
               <form class="form-inline">
                  <!-- <div class="filter-icon">
                     <button type="button"  id="resetbtn" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Tooltip on top"><i class="fa-solid fa-arrows-rotate"></i><span>All</span></button>
                     <i class="ti ti-filter-filled"></i>
                  </div> -->
                  <div class="form-group">
                     <!-- <span class="label-text"><label>Search</label></span> -->
                     <select data-filter="make" id="searchingvalue" class="filter-make filter form-control">
                        <option value="">Select Filter</option>
                        <option value="kundenBankNr">Search by kunden Number</option>
                        <option value="Buchungsdatum">Search by Datum</option>
                        <!-- <option value=".anydesk">Any desk id</option> -->
                        <option value="Name_1">Search by Name </option>
                        
                     </select>
                  </div>
                  <div class="form-group">
                     <!-- <span class="label-text"><label>Search</label></span> -->
                     <input class="form-control" type="text" placeholder="Search" id="searchvalue" />
                     <button type="button"  id="searchbtn" class="btn btn-primary"><i class="ti ti-search"></i></button>
                     <!-- <button type="button"  id="resetbtn" class="btn btn-primary">Reset</button> -->
                  </div>
               </form>
            </div>
         </div>
         <div class="table-responsive table-top">
               <div class="top-frame">
                  
                  <table class="table table-striped tablesorter display dataTable" id='empTable' style="width: 100%;">
                     <thead>
                        <tr>
                           <th>Id</th>
                          
                           <th>KundenNr</th>
                           <th>InvoiceId</th>
                           <th>Datum</th>
                           <th>Name</th>
                          
                           <th>Verwendungszweck</th>
                           <th>Einzahlungen</th>
                           <th>Auszahlungen</th>
                        
                           <th>Type</th>
                        </tr>
                     </thead>
                     <tbody></tbody>
                  </table>
               </div>
               <?php }else { ?>
               <div class="image-overlay" style="background-image:url(../img/access-denied.jpg);"></div>
               <?php } ?>
         </div>
      </div>
      <div class="modal fade" id="editmodel" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="editModalLabel">Edit your record</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <ul class="nav nav-tabs">
                  <li class="active" >
                        <a data-toggle="tab" href="#bankDetail">Bank</a>
                     </li>
                     <li >
                        <a data-toggle="tab" href="#home">Info</a>
                     </li>
                     
                     <li >
                        <a data-toggle="tab" id="assigntab" href="#assign">Assign</a>
                     </li>
                     <li >
                        <a data-toggle="tab" id="InvoiceTab" href="#Invoicest">Invoice</a>
                     </li>
                  </ul>
                  <div class="tab-content">
                  <div id="Invoicest" class="tab-pane fade ">
                  <table class="table table-bordered table-hover">
                              <thead>
                                 <tr>
                                    <th class="text-center">
                                       #
                                    </th>
                                    <th class="text-center">
                                   Invoice Id 
                                    </th>
                                    <th class="text-center">
                                     Name
                                    </th>
                                   
                                    <th class="text-center">
                                       Date
                                    </th>
                                    <th class="text-center">
                                       Upload File
                                    </th>
                                    <th class="text-center">
                                      Notes
                                    </th>
                                    <th class="text-center">
                                      Action
                                    </th>
                                   
                                 </tr>
                              </thead>
                              <tbody id="appendInvoiceData">
                              <tbody>
                           </table>
                           <table class="table table-bordered table-hover" id="tab_logic">
                              <tbody>
                                 <form method="post" action="javascript:void(0);" id="invoiceBadd">
                                    <tr id='addr0'>
                                       <td>
                                       <input type="text" class="form-control"  placeholder="Enter rechnungen Nr" width="30%" name="binvoiceNumber"  id="binvoiceNumber" required />
                                          
                                       </td>
                                       <td>
                                       <input type="hidden" name="invoiceid" class="roweditid" value="" />
                                          <input type="hidden" name="bankamount" class="bankamount" value="" />
                                          <input type="hidden" name="rowid" class="rowids" value="" />
                                          <input type="hidden" name="dateofpayment" class="dateofpayment" value="" />
                                          <input type="hidden" name="Buchungs_ID" class="Buchungs_ID" value="" />
                                          <input type="hidden" name="invoiceamount" class="invoiceamount" value="" />
                                          
                                          <input type="text" class="form-control" placeholder="Name" width="30%" name="bname"  id="bname" required  />
                                                    
                                       </td>
                                       <td>
                                       <input type="date" name='bdate' id="bdate" data-date="" class="datepicker form-control" data-date-format="DD.m.YYYY" value="<?php echo date('Y-m-d');?>"/>
                                                  
                                       </td>
                                       <td>
                                       <input type="file" name='fileuploadInvoice' id="fileuploadInvoice" value="" placeholder='Upload files .....' class="form-control"/>
                                       </td>
                                       <td>
                                       <textarea name='bnotes' id="bnotes"  placeholder='Notes' class="form-control" style="height: 34px;"></textarea>
                                       </td>
                                       <td>
                                          <button  class=" btn btn-primary " type="submit"  >Save </button>
                                          <img id="invoicebLoader" src="https://i.gifer.com/origin/b4/b4d657e7ef262b88eb5f7ac021edda87.gif" style="width: 50px;height: 34px;display:none;">
                                       </td>
                                    </tr>
                                 </form>
                              </tbody>
                           </table>
                  </div>
                  <div id="assign" class="tab-pane fade ">
                           <table class="table table-bordered table-hover">
                              <thead>
                                 <tr>
                                    <th class="text-center">
                                       #
                                    </th>
                                    <th class="text-center">
                                   Datum
                                    </th>
                                    <th class="text-center">
                                    Rechnungen Nr.
                                    </th>
                                   
                                    <th class="text-right">
                                       Amount
                                    </th>
                                    <th class="text-center">
                                       method
                                    </th>
                                   
                                 </tr>
                              </thead>
                              <tbody id="appendpayment">
                              <tbody>
                           </table>
                           <table class="table table-bordered table-hover" id="tab_logic">
                              <tbody>
                                 <form method="post" action="javascript:void(0);" id="collectpayment">
                                    <tr id='addr0'>
                                       <td>
                                          <select class="form-select form-select-lg typeinvoice" name="type" required>
                                          <option value="">Rechnungen Type...</option>
                                          <option value="Rechnungen">Rechnungen</option>
                                          <option value="EinRechnungen">EinRechnungen</option>
                                          </select>
                                       </td>
                                       <td>
                                          <input type="hidden" name="invoiceid" class="roweditid" value="" />
                                          <input type="hidden" name="bankamount" class="bankamount" value="" />
                                          <input type="hidden" name="rowid" class="rowids" value="" />
                                          <input type="hidden" name="dateofpayment" class="dateofpayment" value="" />
                                          <input type="hidden" name="Buchungs_ID" class="Buchungs_ID" value="" />
                                          <input type="hidden" name="invoiceamount" class="invoiceamount" value="" />
                                          <input type="text" class="form-control input-datalist redisplayshow" style="display:none;" placeholder="Enter rechnungen Nr" width="30%" name="rechnungen_nr" onmouseout="callfunction();" onmouseover="callfunction();" list="list-timezone1" id="customer_no_edit" required />
                                          <datalist id="list-timezone1">
                                            
                                                <?php
                                                $kundenQuery = "select DISTINCT rechnung_nummer from rechnungen";
                                                $kundenRecord = mysqli_query($conn, $kundenQuery);
                                                $data = array();
                                                $kudenOption='';
                                                while ($kundenRow = mysqli_fetch_assoc($kundenRecord)) {
                                                echo "<option class='invoiceids'  data-rel='".$kundenRow['rechnung_nummer']."'>".$kundenRow['rechnung_nummer']."</option>";
                                                $kudenOption.= "<option>".$kundenRow['rechnung_nummer']."</option>";
                                                }
                                                ?>
                                          </datalist>
                                          <input type="text" class="form-control input-datalist eindisplayshow" style="display:none;" placeholder="Enter Einrechnungen Nr" width="30%" name="einrechnungen_nr" onmouseout="callfunctione();" onmouseover="callfunction();" list="list-timezone2" id="customer_no_editein" required />
                                          <datalist id="list-timezone2">

                                          <?php
                                          $kundenQueryein = "select DISTINCT rechnung_nummer from Ein_rechnungen";
                                          $kundenRecordein = mysqli_query($conn, $kundenQueryein);
                                          $data = array();
                                          $kudenOptionein='';
                                          while ($kundenRowein = mysqli_fetch_assoc($kundenRecordein)) {
                                          echo "<option class='invoiceids'  data-rel='".$kundenRowein['rechnung_nummer']."'>".$kundenRowein['rechnung_nummer']."</option>";
                                          $kudenOptionein.= "<option>".$kundenRowein['rechnung_nummer']."</option>";
                                          }
                                          ?>
                                          </datalist>
                                                    
                                       </td>
                                       <td>
                                          <input type="text" class="form-control displayshow" placeholder="Kunden Nr" width="30%" name="customer_no"  id="customer_no" style="display:none;"  required readonly />
                                       </td>
                                       <td>
                                          <input type="text" class="form-control displayshow" placeholder="Name" width="30%" name="name"  id="name" style="display:none;"  required readonly />
                                       </td>
                                       <td>
                                          <div class="input-group">  
                                             <input type="text" name='amount' value="" id="amount" placeholder='10,00' class="form-control displayshow" style="display:none;" readonly />
                                             <span class="input-group-addon displayshow" style="display:none;" ><i class="fa fa-euro"></i></span>
                                          </div>
                                       </td>
                                       <td>
                                          <button  class=" btn btn-primary displayshow" type="submit" style="display:none;">Assign </button>
                                          <img id="addPaymentloader" src="https://i.gifer.com/origin/b4/b4d657e7ef262b88eb5f7ac021edda87.gif" style="width: 50px;height: 34px;display:none;">
                                       </td>
                                    </tr>
                                 </form>
                              </tbody>
                           </table>
                        </div>
                   
                        <div id="home" class="tab-pane fade">
                        <form id="editForm" action="javascript:;" enctype="multipart/form-data">  
                           <div class="form-row" id="appendrecord">
                       
                           </div>
                     
                           <button type="submit" class="btn btn-primary addNewRecord" >Save </button>
                           <img id="editformloader" src="https://i.gifer.com/origin/b4/b4d657e7ef262b88eb5f7ac021edda87.gif" style="width: 50px;height: 34px;display:none;">
                        </div>
                        <div id="bankDetail"  class="tab-pane fade in active">
                           <div class="form-row" id="appendrecord2">
                 
                           </div>
                     
                           <button type="submit" class="btn btn-primary addNewRecord">Save </button>
                           <img id="editformloader" src="https://i.gifer.com/origin/b4/b4d657e7ef262b88eb5f7ac021edda87.gif" style="width: 50px;height: 34px;display:none;">
                              </form>
                           </div>
                          
                        
                    
                  </div>
               </div>      
            </div>
         </div>
      </div>
      <div class="modal fade" id="editmodel1" tabindex="-1" role="dialog" aria-labelledby="editModal1Label" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="editModal1Label">Edit your record</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body ui-front">
            <ul class="nav nav-tabs">
               <li class="active">
                  <a data-toggle="tab" href="#home1">Info</a>
               </li>
               <li>
                  <a data-toggle="tab" href="#menu2"> Documents </a>
               </li>
               <li>
                  <a data-toggle="tab" href="#menu5"> Contacts </a>
               </li>
               <li>
                  <a data-toggle="tab" href="#menu4"> Persons </a>
               </li>
               <li >
                  <a data-toggle="tab" href="#users">Users</a>
               </li>
               <li >
                  <a data-toggle="tab" href="#devicesTab">Devices</a>
               </li>
               <li >
                  <a data-toggle="tab" href="#anydesktab">Anydesk</a>
               </li>
               <li >
                  <a data-toggle="tab" href="#tsetab">TSE</a>
               </li>
               <li >
                  <a data-toggle="tab" href="#uploadsTab">Uploads</a>
               </li>
            </ul>
            <div class="tab-content">
               <div id="menu4" class="tab-pane fade">
                  <?php include("modals/rechnungen/persons.php");?>
               </div>
               <div id="menu5" class="tab-pane fade">
                  <?php include("modals/kunden/contacts.php");?>
               </div>
               <div id="menu2" class="tab-pane fade">
                  <?php include("modals/kunden/documents.php");?>
               </div>
               <div id="anydesktab" class="tab-pane fade">
                  <?php include("modals/kunden/anydesks.php");?>
               </div>
               <div id="tsetab" class="tab-pane fade">
                  <?php include("modals/kunden/tse.php");?>
               </div>
               <div id="uploadsTab" class="tab-pane fade">
                  <?php include("modals/kunden/uploads.php");?>
               </div>
               <div id="home1" class="tab-pane fade in active">
                  <form id="editForm1" action="updateCustomer.php" method="POST">
                  <input type="hidden"  class="bankrealid" value=""/>
                     <input type="hidden" name="rowid" class="roweditid" value=""/>
                     <div class="form-row">
                        <div class="form-group col-md-12">
                           <label for="address">Google Map address</label>
                           <textarea id="searchInput" name="address" class="form-control" id="address" autocomplete="off"></textarea>
                           <div id="map"></div>
                           <input type="hidden" id="latitude" name="latitude" value="" />
                           <input type="hidden" id="longitude" name="longitude" value="" />
                        </div>
                     </div>
                     <div class="form-row">
                        <div class="form-group col-md-4 ">
                           <label for="recipient-name" class="col-form-label">Restaurant id:</label>
                           <input type="text" class="form-control rowedit1" id="restaurant_id" name="restaurant_id">
                        </div>
                        <div class="form-group col-md-4">
                           <label for="recipient-name" class="col-form-label">Restaurant Name:</label>
                           <input type="text" class="form-control rowedit2" id="restaurant_name" name="restaurant_name">
                        </div>
                        <div class="form-group col-md-4">
                           <label for="recipient-name" class="col-form-label">restaurant inhaber:</label>
                           <input type="text" class="form-control " id="restaurant_inhaber" name="restaurant_inhaber">
                        </div>
                     </div>
                     <div class="form-row">
                        <div class="form-group col-md-4">
                           <label for="recipient-name" class="col-form-label">restaurant str & nr:</label>
                           <input type="text" class="form-control " id="restaurant_str" name="restaurant_str">
                        </div>
                        <div class="form-group col-md-4">
                           <label for="recipient-name" class="col-form-label">restaurant str nr:</label>
                           <input type="text" class="form-control " id="restaurant_str_nr" name="restaurant_str_nr">
                        </div>
                        <div class="form-group col-md-4">
                           <label for="recipient-name" class="col-form-label">restaurant_plz:</label>
                           <input type="text" class="form-control rowedit5" id="restaurant_plz" name="restaurant_plz">
                        </div>
                     </div>
                     <div class="form-row">
                        <div class="form-group col-md-4">
                           <label for="recipient-name" class="col-form-label">restaurant_ort:</label>
                           <input type="text" class="form-control rowedit6" id="restaurant_ort" name="restaurant_ort">
                        </div>
                        <div class="form-group col-md-4">
                           <label for="recipient-name" class="col-form-label">Type:</label>
                           <!-- <input type="text" class="form-control " id="type" name="resttype"> -->
                           <select class="form-select"  id="type" name="resttype"   >
                              <option value="">Business Type....</option>
                              <?php
                     $typesPayment = "select id,name from businessType";
                     $typesPaymentrecord = mysqli_query($conn, $typesPayment);
                     $data = array();
                     $kudenTypes='';
                     while ($typesPaymentRow = mysqli_fetch_assoc($typesPaymentrecord)) {
                        echo "<option value='".$typesPaymentRow['name']."'>".ucfirst($typesPaymentRow['name'])."</option>";
                        $kudenTypes.= "<option value='".$typesPaymentRow['name']."'>".ucfirst($typesPaymentRow['name'])."</option>";
                     }
 ?>            

                           </select>
                        </div>
                        <div class="form-group col-md-4">
                           <label for="recipient-name" class="col-form-label">Status :</label>
                           <select class="form-select" id="status" name="status" required >
                              <option value="">Status....</option>
                              <option value="1">Active</option>
                              <option value="0">Deactive</option>
                              <option value="2">Wechsel</option>
                              <option value="3">Delete</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-row">
                        <div class="form-group col-md-12">
                           <label for="address">Notiz:</label>
                           <textarea id="Notiz" name="Notiz" class="form-control" id="Notiz" autocomplete="off"></textarea>
                        </div>
                     </div>
                     <button type="submit" class="btn btn-primary">Save</button><button type="button" class="btn btn-primary resetKunden ">Reset</button>
                  </form>
               </div>
               <div id="users" class="tab-pane fade in">
                  <table class="table table-bordered table-hover">
                     <thead>
                        <tr>
                           <th class="text-center">
                              #
                           </th>
                           <th class="text-center">
                              Name
                           </th>
                           <th class="text-center">
                              User Name
                           </th>
                           <th class="text-center">
                              Password 
                           </th>
                           <th class="text-center">
                              Action
                           </th>
                        </tr>
                     </thead>
                     <tbody id="appendusers">
                     <tbody>
                  </table>
                  <table class="table table-bordered table-hover" id="tab_logic">
                     <tbody>
                        <form method="post" action="javascript:void(0);" id="addkasseUsers">
                           <input type="hidden" name="kunden_nr" id="knumber" value=""/>
                           <tr id='addr0'>
                              <td>
                                 <div class="input-group">	
                                    <input type="text" name='name' value="" placeholder='Name' class="form-control"/>
                                 </div>
                              </td>
                              <td>
                                 <div class="input-group">	
                                    <input type="text" name='username' value="" placeholder='UserName' class="form-control"/>
                                 </div>
                              </td>
                              <td>
                                 <div class="input-group">	
                                    <input type="text" name='password' value="" placeholder='Password' class="form-control"/>
                                 </div>
                              </td>
                              <td>
                                 <button  class=" btn btn-primary" type="submit">Add New</button>
                                 <img id="addPaymentloader" src="https://i.gifer.com/origin/b4/b4d657e7ef262b88eb5f7ac021edda87.gif" style="
                                    width: 50px;
                                    height: 34px;
                                    display:none;
                                    ">
                              </td>
                           </tr>
                        </form>
                     </tbody>
                  </table>
               </div>
               <div id="devicesTab" class="tab-pane fade in">
                  <table class="table table-bordered table-hover">
                     <thead>
                        <tr>
                           <th class="text-center">
                              #
                           </th>
                           <th class="text-center">
                              Client Id
                           </th>
                           <th class="text-center">
                              Device Type
                           </th>
                           <!-- <th class="text-center">
                              Bussiness Type
                              </th> -->
                           <th class="text-center">
                              Action
                           </th>
                        </tr>
                     </thead>
                     <tbody id="appendDevices">
                     <tbody>
                  </table>
                  <table class="table table-bordered table-hover" id="devicsTable">
                     <tbody>
                        <form method="post" action="javascript:void(0);" id="devicekundeform">
                           <!-- <input type="hidden" name="kunden_nr" class="knumberNr" value=""/> -->
                           <tr id='addr0'>
                              <td>
                                 <div class="input-group">	
                                    <input type="text" name='client_id' value="" placeholder='Client Id' class="form-control" required />
                                 </div>
                              </td>
                              <td>
                                 <div class="input-group">
                                    <select class="form-select" id="typeDevice" name="deviceType" required >
                                       <option value="">Device Type....</option>
                                       <option value="kasse">Kasse</option>
                                       <option value="server">Server</option>
                                       <option value="client">Client</option>
                                       <option value="tablet">Tablet</option>
                                       <option value="mobile">Mobile</option>
                                    </select>
                                 </div>
                              </td>
                              <!-- <td>
                                 <div class="input-group">	
                                 
                                                <select class="form-select" id="typeDevice" name="bussinessType"  >
                                                  <option value="">Business Type....</option>
                                                  <option value="restaurant">Restaurant</option>
                                                  <option value="einzel">Einzel (Retail)</option>
                                                  <option value="pc">PC</option>
                                                
                                                                          </select>
                                 </div>
                                 </td> -->
                              <td>
                                 <button  class=" btn btn-primary" type="submit">Save</button>
                                 <img id="addPaymentloader" src="https://i.gifer.com/origin/b4/b4d657e7ef262b88eb5f7ac021edda87.gif" style="
                                    width: 50px;
                                    height: 34px;
                                    display:none;
                                    ">
                              </td>
                           </tr>
                        </form>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
      <!-- Modal -->
      <div class="modal fade" id="assignBankid" tabindex="-1" role="dialog" aria-labelledby="assignBankidlabel" aria-hidden="true">
         <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content" style="">
               <div class="modal-header">
                  <h5 class="modal-title" id="assignBankidlabel">Assign Transcations. <strong class="showinvoiceId"></strong></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <ul class="nav nav-tabs">
                     <li class="active"><a data-toggle="tab" href="#Automaticallybank">Assigned Invoices</a></li>
                     
                  </ul>
                  <div class="tab-content"  >
                     <div id="Automaticallybank" class="tab-pane fade in active">
                   
                      
                     </div>
                     
               </div>
               <!-- <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary"></button>
                  </div> -->
              </div>
            </div>
         </div>
      </div>

<!--modal type of kunden assign ---->
      <!-- Modal -->
      <div class="modal fade" id="kundenassignmodel" tabindex="-1" role="dialog" aria-labelledby="kundenassignmodellabel" aria-hidden="true">
         <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content" style="">
               <div class="modal-header">
                  <h5 class="modal-title" id="kundenassignmodellabel">Kunden Assign. <strong class="showinvoiceId"></strong></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <form id="assignkundenbank" action="assignkundebank.php" method="POST">
                     <input type="hidden" id="rowidkunden" name="rowidkunden" value="" required />
                     <div class="form-row">
                        <div class="form-group col-md-12">
                        <label for="recipient-name" class="col-form-label">Kunden Nr:</label>
                                          <input type="text" class="form-control rowedit2 input-datalist"  list="list-timezone12"  id="kunden_nr" name="kunden_nr">
                                          <datalist id="list-timezone12">
                                               
                                               <?php
                                               $kundenQuery = "select restaurant_id,restaurant_name from restaurants";
                                               $kundenRecord = mysqli_query($conn, $kundenQuery);
                                               $data = array();
                                               $kudenOption='';
                                               while ($kundenRow = mysqli_fetch_assoc($kundenRecord)) {
                                               echo "<option>".$kundenRow['restaurant_id']."</option>";
                                               $kudenOption.=  "<option>".$kundenRow['restaurant_id']."</option>";
                                               }
                                               ?>
                                        </datalist>
                        </div>
                      
                     </div>
                        <button type="submit" class="btn btn-primary" id="updatekundenrecord">Save </button>
                        <img id="savekundenLoader" src="https://i.gifer.com/origin/b4/b4d657e7ef262b88eb5f7ac021edda87.gif" style="width: 50px;height: 34px;display:none;">
                  </form>
               </div>                      
            </div>
         </div>
      </div>
      <!--modal type of payment ---->
      <!-- Modal -->
      <div class="modal fade" id="typeofpayment" tabindex="-1" role="dialog" aria-labelledby="typeofpaymentlabel" aria-hidden="true">
         <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content" style="">
               <div class="modal-header">
                  <h5 class="modal-title" id="typeofpaymentlabel">Types. <strong class="showinvoiceId"></strong></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <form id="assignPayType" action="assignPayType.php" method="POST">
                     <input type="hidden" id="payTypeid" name="payTypeid" value="" required />
                     <div class="form-row">
                        <div class="form-group col-md-12">
                           <label for="recipient-name" class="col-form-label">Choose Type </label>
                           <select  class="form-control" id="payTypeSel" name="selectedType" style="height: 3.5rem !important;"  required>
                              <option value=''>Select Type</option>
                              <?php
                              $paymenttype = "select * from typesPayment ORDER BY name ASC";
                              $paymentrecordtype = mysqli_query($conn, $paymenttype);
                              $data = array();
                              while ($row = mysqli_fetch_assoc($paymentrecordtype)){
                              ?>
                              <option value='<?php echo $row['id'];?>'><?php echo $row['name'];?></option>
                              <?php } ?>
                              <option value='other'>Other</option>
                           </select>
                        </div>
                        <div class="form-group col-md-12" id="otherPay" style="display:none;">
                           <label for="recipient-name" class="col-form-label"></label>
                           <input type="text" class="form-control" id="payType" Placeholder="Enter Payment Type.." value="" name="enterType"  required/>
                           <!-- <input type="text" class="form-control form-control-color" name="icon" placeholder="Icon Picker" > -->
                           <label for="recipient-name" class="col-form-label">Choose Color:</label>
                           <input type="color" class="form-control form-control-color"  name="icon" id="myColor" value="#CCCCCC" title="Choose a color" style="width: 10%;height: 36px;">
                        </div>
                     </div>
                        <button type="submit" class="btn btn-primary" id="updatePaymentrecord">Save </button>
                        <img id="addloaderpay" src="https://i.gifer.com/origin/b4/b4d657e7ef262b88eb5f7ac021edda87.gif" style="width: 50px;height: 34px;display:none;">
                  </form>
               </div>                      
            </div>
         </div>
      </div>
         <!-- add Invoice details  -->
      <div class="modal fade" id="addModalLabel" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="addModalLabel">Upload CSV</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <form id="addForm" action="add_bankstatement.php" method="POST">
                     <div class="form-row">
                        <div class="form-group col-md-12">
                           <label for="recipient-name" class="col-form-label">Upload CSV</label>
                           <input type="file" class="form-control"  value="" name="uploadCsv"  required/>
                        </div>
                     </div>
                     <button type="submit" class="btn btn-primary" id="addNewRecord">Add New </button>
                     <img id="addloader" src="https://i.gifer.com/origin/b4/b4d657e7ef262b88eb5f7ac021edda87.gif" style="width: 50px;height: 34px;display:none;">
                  </form>
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
      <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.dataTables.js"></script>
      <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
      <script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>
      <script src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>
      <!-- <script src="https://editor.datatables.net/extensions/Editor/js/dataTables.editor.min.js"></script> -->

      <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js" integrity="sha384-ux8v3A6CPtOTqOzMKiuo3d/DomGaaClxFYdCu2HPMBEkf6x2xiDyJ7gkXU0MWwaD" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
      <script src="js/autoComplete/bootstrap-autocomplete.js"></script>
      <script src="colorPicker/dist/js/bootstrapicon-iconpicker.js"></script>

     
      <script>
    // initialize the icon picker and done
    $('.iconpicker').iconpicker({
        // customize the icon picker with the following options
        // THANKS FOR WATCHING!
        title: 'My Icon Picker',
        selected: false,
        defaultValue: false,
        placement: "bottom",
        collision: "none",
        animation: true,
        hideOnSelect: true,
        showFooter: true,
        searchInFooter: false,
        mustAccept: false,
        selectedCustomClass: "bg-primary",
        fullClassFormatter: function (e) {
            return e;
        },
        input: "input,.iconpicker-input",
        inputSearch: false,
        container: false,
        component: ".input-group-addon,.iconpicker-component",
        templates: {
            popover: '<div class="iconpicker-popover popover" role="tooltip"><div class="arrow"></div>' + '<div class="popover-title"></div><div class="popover-content"></div></div>',
            footer: '<div class="popover-footer"></div>',
            buttons: '<button class="iconpicker-btn iconpicker-btn-cancel btn btn-default btn-sm">Cancel</button>' + ' <button class="iconpicker-btn iconpicker-btn-accept btn btn-primary btn-sm">Accept</button>',
            search: '<input type="search" class="form-control iconpicker-search" placeholder="Type to filter" />',
            iconpicker: '<div class="iconpicker"><div class="iconpicker-items"></div></div>',
            iconpickerItem: '<a role="button" href="javascript:;" class="iconpicker-item"><i></i></a>'
        }
    });
</script>
      <script type="text/javascript">
         // $(document).on('change', '.typeinvoice', function() {

            function kundenAssing(id,kundennr){
               
               $('#kunden_nr').val(kundennr);
               $('#rowidkunden').val(id);
              
               $('#kundenassignmodel').modal('show');
            }
            function kundenEditPopup(id,kundennr){
               $('#kunden_nr').val(kundennr);
               $('.bankrealid').val(id);
               var kundenid=kundennr;   
               $("#knumber").val(kundenid);
               $('#appendusers').html('');
               $("#type option").prop("selected", false);
               $.ajax({
               url: 'loadkundenBykundenNr.php',
               type: "POST",
               dataType: "json",
               data: {'id': kundenid},
               success: function(responsedata) {
               $.ajax({
               url: 'loadKundenData.php',
               type: "POST",
               dataType: "json",
               data: {'id': kundenid,'realid':responsedata.kundenData.id},
               success: function(response) {
            $('.roweditid').val(responsedata.kundenData.id);
            $('#restaurant_id').val(responsedata.kundenData.restaurant_id);
            $('#restaurant_name').val(responsedata.kundenData.restaurant_name);
            $('#restaurant_plz').val(responsedata.kundenData.restaurant_plz);
            $('#restaurant_ort').val(responsedata.kundenData.restaurant_ort);
            $('#Notiz').val(responsedata.kundenData.Notiz);
            
            $('#restaurant_str').val(responsedata.kundenData.restaurant_str);
            $('#restaurant_str_nr').val(responsedata.kundenData.restaurant_str_nr);
                $('#filesappend').html(response.fileloading);
                $('#contactApeend').html(response.contactHtml);
                $('#personsAppends').html(response.personHtml);
                $('#anydeskApeend').html(response.anydeskHtml);
                $('#tseApeend').html(response.tseHtml);
                 $('#uploadsApeend').html(response.uploadsHtml);
                
                $('#restaurant_inhaber').val(response.kundenrow.restaurant_inhaber);
               // $('#type').val(response.kundenrow.resttype);
                 $("#status option").filter(function() {
                 
                 return $(this).val() === response.kundenrow.status;
              }).prop("selected", true);
              $("#type option").filter(function() {
                 
                 return $(this).val() === response.kundenrow.resttype;
              }).prop("selected", true);
                if(response.kundenUsers != ''){
                
                  $('#appendusers').html(response.kundenUsers);
                }
                if(response.devices != ''){
                
                $('#appendDevices').html(response.devices);
              }
            }
               });
              }
               });




               $('#editmodel1').modal('show');
            }
           function paymentTypes(id){
$('#payTypeid').val(id);
$('#typeofpayment').modal('show');
           }
         function loadcollectedpayment(id) {
           
             $.ajax({
               url: 'loadcollectedbankPayment.php',
             
               type: "POST",
               data: {'invoiceid':id},
               success: function(response) {
                  $('#appendpayment').html(response);
               }
             });
           }
         function callfunction(){
            
            var type=$(".typeinvoice option:selected").val();
            if(type=='Rechnungen'){
               var invoiceid=$("#customer_no_edit").val();
               
            }else{
               var invoiceid=$("#customer_no_editein").val();
            }
            $.ajax({
                        url: 'loadinvoicedetail.php',
                        type: "POST",
                        dataType: "json",
                        data: {'id': invoiceid,'type':type},
                        success: function(response) {
                           if(response.status==true){
                              $('.rowids').val(response.record.rowid);
                              $('#customer_no').val(response.record.kundennr);
                              $('#name').val(response.record.name);
                              $('.invoiceamount').val(response.record.invoiceamount);
                              
                              $('#amount').val(response.record.amount);
                           }
                           console.log(response);
                           //$('#empTable').DataTable().ajax.reload(null, false);
                        
                        }
                     });
         }
    function assignBookingId(rowid,bankamount,Buchungs_ID){
      loadcollectedpayment(rowid);
      //var row = $(this).closest("tr");
      var dateofpayment=$(".datsumss-"+rowid).val();
     
$('.roweditid').val(rowid);
$('.bankamount').val(bankamount);
$('.dateofpayment').val(dateofpayment);
$('.Buchungs_ID').val(Buchungs_ID);
$('#assignBankid').modal('show');
    }
         function delVender(rowid) {
         // $('#delrow-'+rowid).remove();
         if (confirm("Are you sure?")) {
                  $.ajax({
                        url: 'deleteVender.php',
                        type: "POST",
                        data: {'id': rowid},
                        success: function(response) {
                           alert(response);
                           $('#empTable').DataTable().ajax.reload(null, false);
                        
                        }
                     });
            }
            return false;
         }
         
       
        
       
       
       
         
      
         
         $('#collectpayment').validate({
           
           submitHandler: function(form) {
            $("#addPaymentloader").show();
             var form_data = new FormData(document.getElementById("collectpayment"));
             $.ajax({
               url: 'addcollectpaymentofbank.php',
               cache: false,
               contentType: false,
               processData: false,
               type: "POST",
               data: form_data,
               success: function(response) {
                $("#addPaymentloader").hide();
                loadcollectedpayment($('.roweditid').val());
              alert(response);
                $('#empTable').DataTable().ajax.reload(null, false);
               //   if(response!='error'){
                  $('#collectpayment')[0].reset();
               //    $('#appendpayment').html(response);
               //    $('#empTable').DataTable().ajax.reload(null, false);
               //   }
                 
               }
             });
           }
         });
    
         $('#editForm').validate({
           rules: {
           },
           submitHandler: function(form) {
             var form_data = new FormData(document.getElementById("editForm"));
             $('#editformloader').show();
             $.ajax({
               url: 'updateStatement.php',
               cache: false,
               contentType: false,
               processData: false,
               type: "POST",
               data: form_data,
               success: function(response) {
                  $('#editformloader').hide();
                  alert("Record Updated Successfully.");
                 //$('#editmodel').modal('hide');
                 $('#empTable').DataTable().ajax.reload(null, false);
               }
             });
           }
         });
         $('#assignPayType').validate({
           rules: {
            selectedType: {
               required: true,
             },
           },
           submitHandler: function(form) {
             var form_data = new FormData(document.getElementById("assignPayType"));
             $('#addloaderpay').show();
             $.ajax({
               url: 'assignPayTypeSubmit.php',
               cache: false,
               contentType: false,
               processData: false,
               type: "POST",
               data: form_data,
               success: function(response) {
                  $('#addloaderpay').hide();
                  alert(response);
                 //$('#editmodel').modal('hide');
                 $('#empTable').DataTable().ajax.reload(null, false);
               }
             });
           }
         });

         $('#assignkundenbank').validate({
           rules: {
            selectedType: {
               required: true,
             },
           },
           submitHandler: function(form) {
             var form_data = new FormData(document.getElementById("assignkundenbank"));
             $('#savekundenLoader').show();
             $.ajax({
               url: 'helper/bankstatement/assignkundenbanksave.php',
               cache: false,
               contentType: false,
               processData: false,
               type: "POST",
               data: form_data,
               success: function(response) {
                  $('#savekundenLoader').hide();
                  alert(response);
                 //$('#editmodel').modal('hide');
                 $('#empTable').DataTable().ajax.reload(null, false);
               }
             });
           }
         });




         $('#addForm').validate({
           rules: {
           
            
           },
           submitHandler: function(form) {
             $('#addNewRecord').prop('disabled', true);
             $('#addloader').show();
             var form_data = new FormData(document.getElementById("addForm"));
             $.ajax({
               url: form.action,
               cache: false,
               contentType: false,
               processData: false,
               type: "POST",
               data: form_data,
               success: function(response) {
                  $('#addNewRecord').prop('disabled', false);
                 alert(response);
                 $('#addloader').hide();
                 $('#reloadHeader').show();
                 $('#addForm')[0].reset();
               //  $('#addModalLabel').modal('hide');
                 $('#empTable').DataTable().ajax.reload(null, false);
                //location.reload(null, false);
                 $.ajax({
        url: "headers/loadBankStatement.php",
        type: 'GET',
        success: function(res) {
            $('#reloadHeader').html(res);
        }
    });
               
               }
             });
           }
         });

      </script>


<script>
      function delfiles(rowid) {
          $('#delrowf-'+rowid).remove();
         $.ajax({
               url: 'helper/kunden/deleteinvoiceFiles.php',
               type: "POST",
               data: {'id': rowid},
               success: function(response) {
               
                 alert(response);
               }
             });
         } 
         
         function delAnydesk(rowid) {
          $('#delrowanydesk-'+rowid).remove();

         $.ajax({
               url: 'helper/kunden/deleteAnydesk.php',
               type: "POST",
               data: {'id': rowid},
               success: function(response) {
               
                 alert(response);
               }
             });
         }
         function delTse(rowid) {
          $('#delrowtse-'+rowid).remove();

         $.ajax({
               url: 'helper/kunden/deleteTSE.php',
               type: "POST",
               data: {'id': rowid},
               success: function(response) {
               
                 alert(response);
               }
             });
         }
         function delcontact(rowid) {
          $('#delrowcontact-'+rowid).remove();

         $.ajax({
               url: 'helper/kunden/deleteContact.php',
               type: "POST",
               data: {'id': rowid},
               success: function(response) {
               
                 alert(response);
               }
             });
         }
         function delperson(rowid) {
          $('#delrowperson-'+rowid).remove();

         $.ajax({
               url: 'helper/kunden/deletePerson.php',
               type: "POST",
               data: {'id': rowid},
               success: function(response) {
               
                 alert(response);
               }
             });
         }
    $(document).ready(function(){
      $('.resetKunden').on('click', function (e) {
         e.preventDefault();
         var bankid=$('.bankrealid').val();
         $.ajax({
               url: 'helper/bankstatement/resetKunden.php',
               type: "POST",
               data: {'id': bankid},
               success: function(response) {
               
                 alert(response);
                 $('#empTable').DataTable().ajax.reload(null, false);

               }
             });

      });
      $('#personsform').on('submit', function (e) {
            e.preventDefault();
            var realInvoiceid=$(".roweditid").val();
          var kundenNumber=  $("#restaurant_id").val();
            $('#personsform').append('<input type="hidden" name="invoiceRealId" value="'+kundenNumber+'" />');
            $('#personsform').append('<input type="hidden" name="invoiceid" value="'+realInvoiceid+'" />');
            $("#addpersonloader").show();
            $.ajax({
                  type: 'post',
                  url: 'helper/kunden/addperson.php',
                  data: $('#personsform').serialize(),
                  success: function (response) {
                     $("#addpersonloader").hide();
                     $('#personsform')[0].reset();
                     $('#personsAppends').html(response);
                     alert("Person added successfully....");
                  }
            });

         });
      $('#contactform').on('submit', function (e) {
            e.preventDefault();
            var realInvoiceid=$(".roweditid").val();
          var kundenNumber=  $("#restaurant_id").val();
            $('#contactform').append('<input type="hidden" name="invoiceRealId" value="'+kundenNumber+'" />');
            $('#contactform').append('<input type="hidden" name="invoiceid" value="'+realInvoiceid+'" />');
           
            $("#addContactLoader").show();
            $.ajax({
                  type: 'post',
                  url: 'helper/kunden/addContact.php',
                  data: $('#contactform').serialize(),
                  success: function (response) {
                     $("#addContactLoader").hide();
                     $('#contactform')[0].reset();
                     $('#contactApeend').html(response);
                     alert("Record added successfully....");
                  }
            });

         });
         $('#anydeskForm').on('submit', function (e) {
            e.preventDefault();
            var realInvoiceid=$(".roweditid").val();
          var kundenNumber=  $("#restaurant_id").val();
            $('#anydeskForm').append('<input type="hidden" name="invoiceRealId" value="'+kundenNumber+'" />');
            $('#anydeskForm').append('<input type="hidden" name="invoiceid" value="'+realInvoiceid+'" />');
           
            $("#anydeskLoader").show();
            $.ajax({
                  type: 'post',
                  url: 'helper/kunden/addAnydesk.php',
                  data: $('#anydeskForm').serialize(),
                  success: function (response) {
                     $("#anydeskLoader").hide();
                     $('#anydeskForm')[0].reset();
                     $('#anydeskApeend').html(response);
                     alert("Record added successfully....");
                  }
            });

         });
         $('#tseForm').on('submit', function (e) {
            e.preventDefault();
            var realInvoiceid=$(".roweditid").val();
          var kundenNumber=  $("#restaurant_id").val();
            $('#tseForm').append('<input type="hidden" name="invoiceRealId" value="'+kundenNumber+'" />');
            $('#tseForm').append('<input type="hidden" name="invoiceid" value="'+realInvoiceid+'" />');
           
            $("#addlseLoader").show();
            $.ajax({
                  type: 'post',
                  url: 'helper/kunden/addTSE.php',
                  data: $('#tseForm').serialize(),
                  success: function (response) {
                     $("#addlseLoader").hide();
                     $('#tseForm')[0].reset();
                     $('#tseApeend').html(response);
                     alert("Record added successfully....");
                  }
            });

         });
         $('#invoiceBadd').validate({
           rules: {
            filepdf: "required",
            description: "required",
           },
           submitHandler: function(form) {
            
       
             var form_data = new FormData(document.getElementById("invoiceBadd"));
             if( document.getElementById("fileuploadInvoice").files.length != 0 ){
              $("#invoicebLoader").show();
             $.ajax({
               url: 'helper/bankstatement/invoiceuploadFilesPDF.php',
               cache: false,
               contentType: false,
               processData: false,
               type: "POST",
               data: form_data,
               success: function(response) {
                $("#invoicebLoader").hide();
                 if(response!='error'){
                  $('#invoiceBadd')[0].reset();
                  $('#appendInvoiceData').html(response);
                 }
                 
               }
             });
            }else{
              alert("Please fill in all the  fields");

            }
           }
         });
      $('#uploadfiles').validate({
           rules: {
            filepdf: "required",
            description: "required",
           },
           submitHandler: function(form) {
            
            var realInvoiceid=$(".roweditid").val();
          var kundenNumber=  $("#restaurant_id").val();
            $('#uploadfiles').append('<input type="hidden" name="invoiceRealId" value="'+kundenNumber+'" />');
            $('#uploadfiles').append('<input type="hidden" name="invoiceid" value="'+realInvoiceid+'" />');
             var form_data = new FormData(document.getElementById("uploadfiles"));
           
             if( document.getElementById("fileupload").files.length != 0 &&  document.getElementById("fileupload").value !=''){
              $("#addfilesloader").show();
             $.ajax({
               url: 'helper/kunden/uploadFilesPDF.php',
               cache: false,
               contentType: false,
               processData: false,
               type: "POST",
               data: form_data,
               success: function(response) {
                $("#addfilesloader").hide();
                 if(response!='error'){
                  $('#uploadfiles')[0].reset();
                  $('#filesappend').html(response);
                 }
                 
               }
             });
            }else{
              alert("Please fill in all the  fields");

            }
           }
         });
      $('#addkasseUsers').validate({
           rules: {
             username: {
               required: true,
             },
             amount: {
               required: true,
             },
             method: {
               required: true,
             }
           }, 
           submitHandler: function(form) {
            $("#addPaymentloader").show();
            
             var form_data = new FormData(document.getElementById("addkasseUsers"));
             $.ajax({
               url: 'addKasseUser.php',
               cache: false,
               contentType: false,
               processData: false,
               dataType: "json",
               type: "POST",
               data: form_data,
               success: function(response) {
                $("#addPaymentloader").hide();
                $('#addkasseUsers')[0].reset();
                  alert(response.message);
                  $('#appendusers').html(response.htmlData);
                 
                 
               }
             });
           }
         });

});
$(document).on('click','body .editDevices',function(){
  $(this).hide();
  var relx=$(this).attr('data-rel');
  $('.sp-deviceType-'+relx).hide();
  // $('.sp-bussinessType-'+relx).hide();
  $('.typeDeviceSel-'+relx).show();
  $('.bussinessSelectType-'+relx).show();
  $('.updatebutton-'+relx).show();
  $('.canceldevicebutton-'+relx).show();

});
$(document).on('click','body .cancelDevice',function(){
  $(this).hide();
  var relx=$(this).attr('data-rel');
  $('.sp-deviceType-'+relx).show();
  // $('.sp-bussinessType-'+relx).show();
  $('.typeDeviceSel-'+relx).hide();
  $('.editbutton-'+relx).show();
  $('.bussinessSelectType-'+relx).hide();
  $('.updatebutton-'+relx).hide();
  $('.canceldevicebutton-'+relx).hide();

});
$(document).on('click','body .updateDevice',function(){

  var relx=$(this).attr('data-rel');
  var realid=$(this).attr('data-rel-id');
  var devicetype=$('.bussinessSelectType-'+relx).val();
  $.ajax({
               url: 'updateDevice.php',
               type: "POST",
               data: {'id': realid,'deviceType':devicetype},
               success: function(response) {
alert(response);
               }
              });

});

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDCgRYolCmDrbZl76MWBD1BzgBMBLhfFGg&callback=initMap" async defer></script>
<script>
function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: -33.8688, lng: 151.2195},
      zoom: 13
    });
    var input = document.getElementById('searchInput');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);

    var infowindow = new google.maps.InfoWindow();
    var marker = new google.maps.Marker({
        map: map,
        anchorPoint: new google.maps.Point(0, -29)
    });

    autocomplete.addListener('place_changed', function() {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
        }
  
        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }
        marker.setIcon(({
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(35, 35)
        }));
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);
    
        var address = '';
        if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
        }
    
        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
        infowindow.open(map, marker);
      
        // Location details
		var zipcode='';
        
		console.log(place);
        //document.getElementById('location').innerHTML = place.formatted_address;
        //document.getElementById('lat').innerHTML = place.geometry.location.lat();
        //document.getElementById('lon').innerHTML = place.geometry.location.lng();
			$('#chooselocation').modal('hide');
		$(".topbar__title").text(place.formatted_address);
			var Geopincode = localStorage.getItem('Geopincode');
	if(Geopincode == null) {
		localStorage.setItem('Geopincode', JSON.stringify(65936));
	} else {
			if(zipcode!=null){
			localStorage.removeItem('Geopincode');
			localStorage.setItem('Geopincode',zipcode);	
			}
	}
		
		$('#latitude').val(place.geometry.location.lat());
		$('#longitude').val(place.geometry.location.lng());
    });
}
</script>

      <script>
      function delusers(rowid) {
          $('#delrow-'+rowid).remove();

         $.ajax({
               url: 'deleteKasseUsers.php',
               type: "POST",
               data: {'id': rowid},
               success: function(response) {
               
                 alert(response);
                
               }
             });
         }
       
       $('#editForm1').validate({
      rules: {
        restaurant_id: {
                  required: true,
              },
        restaurant_name: {
              required: true,
          },          
          restaurant_inhaber: {
              required: true,
          },
          restaurant_str: {
              required: true,
          },
          restaurant_str_nr: {
              required: true,
          },
          restaurant_plz: {
              required: true,
          },
          
          restaurant_ort: {
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
        $('#empTable').DataTable().ajax.reload(null, false);
      }            
    });
  }
  });
  $('#devicekundeform').on('submit', function (e) {
            e.preventDefault();
            var kundenrowid=$("#knumber").val();
            $('#devicekundeform').append('<input type="hidden" name="kundenNr" value="'+kundenrowid+'" />');
          //  $(".loader").show();
            $.ajax({
                  type: 'post',
                  url: 'addDevices.php',
                  data: $('#devicekundeform').serialize(),
                  success: function (response) {
                    if(response !=0){
                      if(response !=1){
                        $('#appendDevices').html(response);
                      }else{
                         alert("client id is already exists");
                      }
                    }else{
                      alert("error...");
                    }
                    // console.log(response);
                    // alert(response);
                   //  $(".loader").hide();
                    //  $('#contactformkunden')[0].reset();
                    //  $('#contactkApeend').html(response);
                    //  alert("Record added successfully....");
                  }
            });

         });

     </script>
      <script>
         var sortvalue='';
         $(document).ready(function() {
            $('#sortvalue').on('change', function (e) {
               
                sortvalue = this.value;
               $('#empTable').DataTable().ajax.reload();

});
            
            $('#payTypeSel').on('change', function (e) {
                  var optionSelected = $("option:selected", this);
                  var valueSelected = this.value;
                 
                  if(valueSelected=='other'){
                     $("#otherPay").show();
                     $("#payType").prop('required',true);
                  }else{
                     $("#otherPay").hide();
                     $("#payType").prop('required',false);
                  }
            });
            $('.typeinvoice').on('change', function (e) {
            var optionSelected = this.value;
           
            if(optionSelected!=''){
               $('.displayshow').show();
               if(optionSelected=='Rechnungen'){
                  $('.eindisplayshow').hide();
                  $('.redisplayshow').show();
               }else{
                  $('.eindisplayshow').show();
                  $('.redisplayshow').hide();
               }
            }else{
               $('.displayshow').hide();
               $('.eindisplayshow').hide();
                  $('.redisplayshow').hide();
            }
               
});


            $('.invoiceids').change(function(){
               console.log($(this).attr('data-rel'));
            });
           
            $('#yearsel').on('change', function (e) {
   var element = $("option:selected", this);
      var startDate = element.attr("data-date-start");
      var endDate = element.attr("data-date-end");
      var selectvalue=element.val();
     
        var  currentYear=selectvalue;
     
      // alert(currentYear+startDate);
      $("#filterStartdate").val(currentYear+"-"+startDate);

$("#filterEndDate").val(currentYear+"-"+endDate);
});
$('#monthfilter').on('change', function (e) {
      // var selectedMonth=$(this).val();
      var firstdate = $('option:selected', this).attr('data-first');
      var lastdate = $('option:selected', this).attr('data-last');
      // var firstdate=$(this).attr('data-first');
      // var lastdate=$(this).attr('data-last');
      var selectvalue=$('#yearsel option:selected').val();
      if(selectvalue!=''){
        var  currentYear=selectvalue;
      }else{
        var  currentYear=new Date().getFullYear();
      }
      var firstDayWithSlashes = currentYear+"-"+firstdate;
      var firstDayWithSlashesval =  currentYear+"-"+firstdate;
      var lastDayWithSlashes =  currentYear+"-"+lastdate ;
      var lastDayWithSlashesval =  currentYear+"-"+lastdate;
    console.log(lastDayWithSlashesval+" "+ firstDayWithSlashesval);
      // $("#filterStartdate").attr('data-date',firstDayWithSlashes);
      $("#filterStartdate").val(firstDayWithSlashesval);
      // $("#filterEndDate").attr('data-date',lastDayWithSlashes);
      $("#filterEndDate").val(lastDayWithSlashesval);

   });
   function getLastDateOfMonth(year, month) {
  // Create a new Date object with the next month's first day
  var nextMonth = new Date(year, month + 1, 1);
  // Subtract one day to get the last day of the current month
  var lastDate = new Date(nextMonth - 1);
  return lastDate.getDate();
}
   $('#quartalDate').on('change', function (e) {
     // alert();
     // currentYear=new Date().getFullYear();
      var element = $("option:selected", this);
      var startDate = element.attr("data-date-start");
      var endDate = element.attr("data-date-end");
      var selectvalue=$('#yearsel option:selected').val();
      if(selectvalue!=''){
        var  currentYear=selectvalue;
      }else{
        var  currentYear=new Date().getFullYear();
      }
      
      $("#filterStartdate").val(currentYear+"-"+startDate);

      $("#filterEndDate").val(currentYear+"-"+endDate);
    
});

           $('#empTable').DataTable({
            dom: 'Bfrtip',
 buttons: [{ extend: 'print', exportOptions:
                { columns: ':visible' }
            },],
             'processing': true,
             "language": {
               "processing": "<img src='img/calc-app-loading.gif'/>"
        },
       
             'serverSide': true,
             'serverMethod': 'post',
             'lengthMenu': [100, 500, 1000],
             'pageLength': 500,
             "aaSorting": [
               [0, "desc"]
             ],
             'ajax': {
              <?php if(isset($_GET['from']) && isset($_GET['to'])){


               if(isset($_GET['name'])){ $nameget="&name=".$_GET['name'];}else{ $nameget='';}
               if(isset($_GET['date'])){ $dateget="&date=".$_GET['date'];}else{ $dateget='';}
?>  
'url': 'bankstatementajax.php?sortvalue='+sortvalue+'&searchby='+$("#searchingvalue").val()+'&searchvalue='+searchvalue+'&from=<?php echo $_GET['from'];?>&to=<?php echo $_GET['to'].$nameget.$dateget;?>'
                  <?php  
               }




               else{
                  if(isset($_GET['name'])){ $nameget="&name=".$_GET['name'];}else{ $nameget='';}
               if(isset($_GET['date'])){  $dateget="&date=".$_GET['date'];}else{ $dateget='';}
                  ?>  
                  'url': 'bankstatementajax.php?sortvalue='+sortvalue+'&searchby='+$("#searchingvalue").val()+'&searchvalue='+$("#searchvalue").val()+'<?php echo $nameget.$dateget;?>'
               <?php 
               }
               ?>
               
             },
             'columns': [{
               data: 'id'
             }, 
             {
               data: 'kundenNr'
             }, 
             {
               data: 'invoicenumber'
             }, 
             {
               data: 'Buchungsdatum',
               className: 'text-center',
             },
             {
               data: 'Name_1',
               className: 'text-left'
             },
             {
               data: 'Verwendungszweck',
               className: 'text-left',
              
             },
           
             {
               data: 'einzahlungen',
               className: 'text-right',
              
             },
            
             {
               data: 'auszahlungen',
               className: 'text-right',
              
             },
             {
               data: 'assignType',
               className: 'text-center',
             },
             
            
             ],
           });
         });
       
         function viewdata(rowid,bankamount,Buchungs_ID) {
            if(bankamount!=0){
               $("#assigntab").show();
            
          
      //var row = $(this).closest("tr");
      var dateofpayment=$(".datsumss-"+rowid).val();

$('.bankamount').val(bankamount);
$('.dateofpayment').val(dateofpayment);
$('.Buchungs_ID').val(Buchungs_ID);
loadcollectedpayment(rowid);
            }else{
               $("#assigntab").hide();
            }
            $('.roweditid').val(rowid);
           $.ajax({
               url: 'viewBankStatement.php',
               type: "POST",
                dataType: "json",
               data: {'rowId': rowid},
               success: function(response) {
                  $('#appendrecord').html(response.appendrecord);
                  $('#appendInvoiceData').html(response.appendInvoiceData);
                  $('#appendrecord2').html(response.appendrecord2);
               
               
                
                 
               }
             });
           $('#editmodel').modal('show');
         }
      </script>
 
 <script>
                                            document.addEventListener('DOMContentLoaded', e => {
                                                $('.input-datalist').autocomplete()
                                            }, false);
                                        </script>
   </body>
   <?php $conn->close();?>
</html>