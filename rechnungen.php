<?php include('include/header.php');

if(isset($_GET['from']) && isset($_GET['to'])){
   $countbarPayment = "select SUM(rechnungenpayment.amount) as totalamount FROM rechnungenpayment JOIN rechnungen ON rechnungen.id=rechnungenpayment.rowid WHERE CAST(CONCAT(SUBSTRING(rechnungen.rechnung_datum, 7, 4), '-', SUBSTRING(rechnungen.rechnung_datum, 4, 2), '-', SUBSTRING(rechnungen.rechnung_datum, 1, 2)) AS DATE) BETWEEN '".$_GET['from']."' AND '".$_GET['to']."' and rechnungenpayment.method='Bar'";
   $subBankpayment = "select SUM(rechnungenpayment.amount) as totalamountbank FROM rechnungenpayment JOIN rechnungen ON rechnungen.id=rechnungenpayment.rowid WHERE CAST(CONCAT(SUBSTRING(rechnungen.rechnung_datum, 7, 4), '-', SUBSTRING(rechnungen.rechnung_datum, 4, 2), '-', SUBSTRING(rechnungen.rechnung_datum, 1, 2)) AS DATE) BETWEEN '".$_GET['from']."' AND '".$_GET['to']."' and rechnungenpayment.method!='Bar'";
   $queryRevenue="select sum(`betrag_brutto`) as revenue FROM `rechnungen` WHERE CAST(CONCAT(SUBSTRING(rechnung_datum, 7, 4), '-', SUBSTRING(rechnung_datum, 4, 2), '-', SUBSTRING(rechnung_datum, 1, 2)) AS DATE) BETWEEN '".$_GET['from']."' AND '".$_GET['to']."'";

}elseif(isset($_GET['kunden'])){
   $countbarPayment = "select SUM(rechnungenpayment.amount) as totalamount FROM rechnungenpayment JOIN rechnungen ON rechnungen.id=rechnungenpayment.rowid WHERE  rechnungenpayment.method='Bar' and kunden_nr = ".$_GET['kunden'];
   $subBankpayment = "select SUM(rechnungenpayment.amount) as totalamountbank FROM rechnungenpayment JOIN rechnungen ON rechnungen.id=rechnungenpayment.rowid WHERE  rechnungenpayment.method!='Bar' and kunden_nr = ".$_GET['kunden'];
   $queryRevenue="select sum(`betrag_brutto`) as revenue FROM `rechnungen` WHERE kunden_nr = ".$_GET['kunden'];

}else{
   $countbarPayment = "select SUM(rechnungenpayment.amount) as totalamount FROM rechnungenpayment JOIN rechnungen ON rechnungen.id=rechnungenpayment.rowid WHERE  rechnungenpayment.method='Bar'";
   $subBankpayment = "select SUM(rechnungenpayment.amount) as totalamountbank FROM rechnungenpayment JOIN rechnungen ON rechnungen.id=rechnungenpayment.rowid WHERE  rechnungenpayment.method!='Bar'";
   $queryRevenue="select sum(`betrag_brutto`) as revenue FROM `rechnungen`";

}
$sumBar = mysqli_query($conn, $countbarPayment);
$recordsBar = mysqli_fetch_assoc($sumBar);
$sunBank = mysqli_query($conn, $subBankpayment);
$recordssummBank = mysqli_fetch_assoc($sunBank);
$revenue = mysqli_query($conn, $queryRevenue);
$totalrevenue = mysqli_fetch_assoc($revenue);
$fmt = numfmt_create( 'de_DE', NumberFormatter::CURRENCY );
$totalBk=0;$totalbar=0;$totalrev=0;
if(!empty($recordsBar['totalamount'])){
   $totalbar=$recordsBar['totalamount'];
   $totalBaramount= numfmt_format_currency($fmt, $recordsBar['totalamount'], "EUR")."\n";
}else{
   $totalBaramount= numfmt_format_currency($fmt, 0, "EUR")."\n";
}

if(!empty($recordssummBank['totalamountbank'])){
   $totalBk=$recordssummBank['totalamountbank'];
   $totalBankAmount= numfmt_format_currency($fmt, $recordssummBank['totalamountbank'], "EUR")."\n";
}else{
   $totalBankAmount= numfmt_format_currency($fmt, 0, "EUR")."\n";
}
if(!empty($totalrevenue['revenue'])){
   $totalrev=$totalrevenue['revenue'];
   $totalrevenueAmount= numfmt_format_currency($fmt, $totalrevenue['revenue'], "EUR")."\n";
}else{
   $totalrevenueAmount= numfmt_format_currency($fmt, 0, "EUR")."\n";
}
$totalCollectionAmount=$totalbar + $totalBk;
$totalOffenAmount=$totalrev - $totalCollectionAmount;
$numOffenTotal=numfmt_format_currency($fmt, $totalOffenAmount, "EUR")."\n";

?>

<style>

.ringing-bell{

    transition:translate(-50%,-50%);
}
.ringing-bell i {
    font-size: 24px;
    margin-left: 5px;
}

.faa-ring{
    color:red;
}
.faa-ring1{
    color:grey;
}


@-webkit-keyframes ring {
  0% {
    -webkit-transform: rotate(-15deg);
    transform: rotate(-15deg);
  }

  2% {
    -webkit-transform: rotate(15deg);
    transform: rotate(15deg);
  }

  4% {
    -webkit-transform: rotate(-18deg);
    transform: rotate(-18deg);
  }

  6% {
    -webkit-transform: rotate(18deg);
    transform: rotate(18deg);
  }

  8% {
    -webkit-transform: rotate(-22deg);
    transform: rotate(-22deg);
  }

  10% {
    -webkit-transform: rotate(22deg);
    transform: rotate(22deg);
  }

  12% {
    -webkit-transform: rotate(-18deg);
    transform: rotate(-18deg);
  }

  14% {
    -webkit-transform: rotate(18deg);
    transform: rotate(18deg);
  }

  16% {
    -webkit-transform: rotate(-12deg);
    transform: rotate(-12deg);
  }

  18% {
    -webkit-transform: rotate(12deg);
    transform: rotate(12deg);
  }

  20% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
}

@keyframes ring {
  0% {
    -webkit-transform: rotate(-15deg);
    -ms-transform: rotate(-15deg);
    transform: rotate(-15deg);
  }

  2% {
    -webkit-transform: rotate(15deg);
    -ms-transform: rotate(15deg);
    transform: rotate(15deg);
  }

  4% {
    -webkit-transform: rotate(-18deg);
    -ms-transform: rotate(-18deg);
    transform: rotate(-18deg);
  }

  6% {
    -webkit-transform: rotate(18deg);
    -ms-transform: rotate(18deg);
    transform: rotate(18deg);
  }

  8% {
    -webkit-transform: rotate(-22deg);
    -ms-transform: rotate(-22deg);
    transform: rotate(-22deg);
  }

  10% {
    -webkit-transform: rotate(22deg);
    -ms-transform: rotate(22deg);
    transform: rotate(22deg);
  }

  12% {
    -webkit-transform: rotate(-18deg);
    -ms-transform: rotate(-18deg);
    transform: rotate(-18deg);
  }

  14% {
    -webkit-transform: rotate(18deg);
    -ms-transform: rotate(18deg);
    transform: rotate(18deg);
  }

  16% {
    -webkit-transform: rotate(-12deg);
    -ms-transform: rotate(-12deg);
    transform: rotate(-12deg);
  }

  18% {
    -webkit-transform: rotate(12deg);
    -ms-transform: rotate(12deg);
    transform: rotate(12deg);
  }

  20% {
    -webkit-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    transform: rotate(0deg);
  }
}

.faa-ring.animated,
.faa-ring.animated-hover:hover,
.faa-parent.animated-hover:hover > .faa-ring {
  -webkit-animation: ring 2s ease infinite;
  animation: ring 2s ease infinite;
  transform-origin-x: 50%;
  transform-origin-y: 0px;
  transform-origin-z: initial;
}


   </style>
 
            <div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 main">
            <?php  if(in_array( "rechnungen" ,$arraypermission )) { ?>
               <div class="row">
                  <div class="col-lg-3 col-md-3">
                     <div class="price-box">
                        <i class="fas fa-inbox icon1"></i>
                        <div class="contant-box">
                           <h3 class="main-title">Umsatz</h3>
                           <p class="tprice"><?php echo $totalrevenueAmount;?></i></p>
                        </div>
                     </div>
                  </div> 
                  <div class="col-lg-3 col-md-3">
                     <div class="price-box">
                        <i class="fas fa-university icon1"></i>
                        <div class="contant-box">
                           <h3 class="main-title">Bank</h3>
                           <p class="tprice"><?php echo $totalBankAmount;?></p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-3">
                     <div class="price-box">
                        <i class="fas fa-money-bill icon1"></i>
                        <div class="contant-box">
                           <h3 class="main-title">Bar</h3>
                           <p class="tprice"><?php echo $totalBaramount;?></p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-3">
                     <div class="price-box">
                        <i class="far fa-credit-card icon1"></i>
                        <div class="contant-box">
                           <h3 class="main-title">Offen</h3>
                           <p class="tprice"><?php echo $numOffenTotal;?></p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="table-responsive">
                  <div class="top-frame">
                     <div class="sel1" >
                     <a href="index.php" class="button" >All</a>
                     </div>
                     <div class="sel1" id="tyear">
                        <label> 
                           <select name="year" id="yearsel" class="">
                           <option value="">Year</option>
                              <option data-date-start='01-01' data-date-end='12-31' value="<?= date('Y');?>"><?= date('Y');?></option>
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
                    <label>From:  <input type="date" name="from" id="filterStartdate" data-date="" class=" form-control"  value="<?php if(isset($_GET['from'])){ echo $_GET['from']; }else{echo date('Y-m-d'); }?>"/>  </label> 
                    
                    <label>To:
                     <input type="date" name="to" id="filterEndDate" data-date="" class=" form-control" data-date-format="DD.m.YYYY" value="<?php if(isset($_GET['to'])){ echo $_GET['to']; }else{echo date('Y-m-d'); }?>"/> </label>
                     </div>
                     <div class="sel1">
                        <input type="submit" class="button" value="Apply">
                     </div>
                      
                  </div>
                  </form>
                  <table class="table table-striped tablesorter display dataTable" id='empTable'>
                     <thead>
                        <tr>
                           <th>Rech Nr.</th>
                           <th>Kd Nr.</th>
                           <th>Name</th>
                           <th>Status</th>
                           <th>Datum</th>
                           <th style="    width: 95px !important;" >Betrag</th>
                           <th style="    width: 95px !important;" >Bezahlt</th>
                           <th style="    width: 95px !important;">Offen</th>
                           <th style="display:none;">Payment</th> 
                           <th data-orderable="false">Notiz</th>
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
                              <li class="active">
                                 <a data-toggle="tab" href="#home">Invoice Info</a>
                              </li>
                              <li>
                                 <a data-toggle="tab" href="#menu1">Payments</a>
                              </li>
                            
                              <li>
                                 <a data-toggle="tab" href="#menu2"> Documents </a>
                              </li>
                              <li>
                                 <a data-toggle="tab" href="#menu3"> Items </a>
                              </li>
                              <li>
                                 <a data-toggle="tab" href="#menu4"> Persons </a>
                              </li>
                              <li>
                                 <a data-toggle="tab" href="#menu5"> Contacts </a>
                              </li>
                              <li>
                                 <a data-toggle="tab" href="#menu6"> Status </a>
                              </li>
                              <li>
                                 <a data-toggle="tab" href="#menu7"> Invoice  Type</a> 
                              </li>
                              <li>
                                 <a data-toggle="tab" href="#menu8">Versand</a> 
                              </li>
                             
                              
                           </ul>
                           <div class="tab-content">
                              <div id="home" class="tab-pane fade in active">
                                <?php include("modals/rechnungen/info.php");?>
                                 </div>
                                 <div id="menu1" class="tab-pane fade">
                                
                                 <?php include("modals/rechnungen/payments.php");?>
                                          
                                 </div>
                                 <div id="menu2" class="tab-pane fade">
                                    <?php include("modals/rechnungen/documents.php");?>
                                 </div>
                                 <div id="menu3" class="tab-pane fade">
                                   
                                 <?php include("modals/rechnungen/items.php");?>
                                   
                                 </div>
                                 <div id="menu4" class="tab-pane fade">
                                 <?php include("modals/rechnungen/persons.php");?>
                                   
                                 </div>
                                 <div id="menu5" class="tab-pane fade">
                                    
                                 <?php include("modals/rechnungen/contacts.php");?>
                                 </div>
                                 <div id="menu4" class="tab-pane fade">
                                    
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
                                                   Role
                                                </th>
                                              
                                                <th class="text-center">
                                                 Date
                                                </th>
                                                <th class="text-center">
                                                 Action
                                                </th>
                                                </tr>
                                            </thead>
                                            <tbody id="personsAppends">
                                                    
                                                    <tbody>
                                     </table>

                                     <table class="table table-bordered table-hover" >
                                           
                                           <tbody><form method="post" action="javascript:void(0);" id="personsform">
                                                   <tr id='itemaddr0'>
                                                   
                                                   <td>
                                                   <input type="hidden" name="invoiceid" class="roweditid" value="" />
                                                   <td>
                                                      <select class="form-select form-select-lg" name="personsName" required>
                                                         <option value="">Select Person ....</option>
                                                         <?php
                                                        
                                                         $personnum = mysqli_num_rows($personsRecords);
                                                         if($personnum>0){
                                                            while ($personrow = mysqli_fetch_assoc($personsRecords)) {
                                                                  echo "<option value='".$personrow['id']."'>".$personrow['name']."</option>";
                                                            }
                                                         }
                                                        
                                                         ?>
                                                               
                                                      </select>
                                                   </td>
                                                   </td>
                                                   <td>
                                                      <select class="form-select form-select-lg" name="personRole" required>
                                                         <option value="">Select Role ..</option>
                                                         <?php
                                                        
                                                         $numroles = mysqli_num_rows($roleRecords);
                                                         if($numroles>0){
                                                            while ($rolerow = mysqli_fetch_assoc($roleRecords)) {
                                                                  echo "<option value='".$rolerow['id']."'>".$rolerow['roleName']."</option>";
                                                            }
                                                         }
                                                        
                                                         ?>
                                                               
                                                      </select>
                                                   </td>
                                                  
                                                   
                                                   <td>
                                                  
                                                   <input type="date" name='persondate' id="persondate" data-date="" class="datepicker form-control" data-date-format="DD.m.YYYY" value="<?php echo date('Y-m-d');?>"/>
                                                   </td>
                                                   <td>
                                                       <button  class=" btn btn-primary" type="submit">Add Persons</button>
                                                       <img id="addpersonloader" src="https://i.gifer.com/origin/b4/b4d657e7ef262b88eb5f7ac021edda87.gif" style="
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
                                 <div id="menu6" class="tab-pane fade">
                                    
                                 <?php include("modals/rechnungen/status.php");?>
                                 </div>
                                 <div id="menu7" class="tab-pane fade">
                                 <?php include("modals/rechnungen/invoiceType.php");?>
                                   
                                 </div>
                                 <div id="menu8" class="tab-pane fade">
                                
                                 <?php include("modals/rechnungen/versand.php");?>
                                          
                                 </div>
                              
                              </div>
                           </div>
                        
                    
                  </div>
               </div>
            </div>
         </div>
         <!-- edit Kunden details -->
         <div class="modal fade" id="editKunden" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="editModalLabel">Edit Kunden Details</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                  <ul class="nav nav-tabs">
                              <li class="active">
                                 <a data-toggle="tab" href="#info"> Info</a>
                              </li>
                              <li>
                                 <a data-toggle="tab" href="#invoiceList"> Invoice List </a>
                              </li>
                              <li>
                                 <a data-toggle="tab" href="#documents"> Documents </a>
                              </li>
                              
                              <li>
                                 <a data-toggle="tab" href="#contactsk"> Contacts </a>
                              </li>
                              <li>
                                 <a data-toggle="tab" href="#bankdetail">Bank details in kunden  </a>
                              </li>
                              
                             
                              
                           </ul>
                     <div class="tab-content">
                              <div id="info" class="tab-pane fade in active">
                              <form id="updatekudenform" action="updateCustomer.php" method="POST">
                        <input type="hidden" name="rowid" class="kundenrowid" id="kundenrowid" value="" />
                        <input type="hidden" name="invoiceid" class="roweditid" value="" />
                        <div class="form-row">
                           <div class="form-group col-md-4 ">
                              <label for="recipient-name" class="col-form-label">Kunden Id:</label>
                              <input type="text" class="form-control input-datalist" list="list-timezone1" id="restaurant_id" name="restaurant_id">
                              <datalist id="list-timezone1">
                                               
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
                           <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Kunden Name:</label>
                              <input type="text" class="form-control" id="restaurant_name" name="restaurant_name">
                           </div>
                           <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">restaurant inhaber:</label>
                              <input type="text" class="form-control" id="restaurant_inhaber" name="restaurant_inhaber">
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">restaurant str:</label>
                              <input type="text" class="form-control " id="restaurant_str" name="restaurant_str">
                           </div>
                           <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">restaurant str nr:</label>
                              <input type="text" class="form-control " id="restaurant_str_nr" name="restaurant_str_nr">
                           </div>
                           <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">restaurant plz:</label>
                              <input type="text" class="form-control" id="restaurant_plz" name="restaurant_plz">
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="form-group col-md-12">
                              <label for="recipient-name" class="col-form-label">restaurant ort:</label>
                              <input type="text" class="form-control" id="restaurant_ort" name="restaurant_ort">
                           </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                     </form>
                              </div>
                              <div id="documents" class="tab-pane fade">
                                    
                                    <table class="table table-bordered table-hover">
                                    <thead>
                                                <tr>
                                                <th class="text-center">
                                                #
                                                </th>
                                                <th class="text-center">
                                                File Name
                                                </th>
                                               
                                                <th class="text-center">
                                                  Description
                                                </th>
                                                <th class="text-center">
                                                 Uploaded Date
                                                </th>
                                                <th class="text-center">
                                                  Action
                                                </th>
                                                </tr>
                                            </thead>
                                            <tbody id="filesappendk">
                                                    
                                                    <tbody>
                                     </table>

                                     <table class="table table-bordered table-hover" >
                                           
                                           <tbody><form method="post" action="javascript:void(0);" id="uploadfileskunden">
                                                   <tr id='addr0'>
                                                   
                                                   <td style="width:41%;">
                                                   <input type="hidden" name="invoiceid" class="roweditid" value="" />
                                                   
                                                   <input type="file" name='uploadpdfk' id="fileupload" value="" placeholder='Upload files .....' class="form-control" required />
                                                   </td>
                                                   <td>
                                                   <textarea name='description' id="desciption"  placeholder='Description' class="form-control" style="height: 34px;" required></textarea>
                                                   </td>
                                                  
                                                   <td>
                                                       <button  class=" btn btn-primary" type="submit">Upload File</button>
                                                       <img class="loader" src="https://i.gifer.com/origin/b4/b4d657e7ef262b88eb5f7ac021edda87.gif" style="
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
                                 <div id="contactsk" class="tab-pane fade">
                                    
                                    <table class="table table-bordered table-hover">
                                    <thead>
                                                <tr>
                                                <th class="text-center">
                                                #
                                                </th>
                                                <th class="text-center">
                                                         Date
                                                </th>
                                               
                                                <th class="text-center">
                                                  Name
                                                </th>
                                                <th class="text-center">
                                                 Phone Number
                                                </th>
                                                <th class="text-center">
                                                  Note
                                                </th>
                                                <th class="text-center">
                                                  Action
                                                </th>
                                                </tr>
                                            </thead>
                                            <tbody id="contactkApeend">
                                                    
                                                    <tbody>
                                     </table>

                                     <table class="table table-bordered table-hover" >
                                           
                                           <tbody><form method="post" action="javascript:void(0);" id="contactformkunden">
                                                   <tr id='addr0'>
                                                   
                                                   <td >
                                                 
                                                   <input type="hidden" name="invoiceid" class="roweditid" value="" />
                                                   <input type="date" name='contactdate' id="contactdate" data-date="" class="datepicker form-control" data-date-format="DD.m.YYYY" value="<?php echo date('Y-m-d');?>"/>
                                                   </td>
                                                   <td>
                                                   <input type="text" name='contactname' id="contactname"  placeholder='Name ..' class="form-control"   required />
                                                   </td>
                                                   <td>
                                                   <input type="text" name='contactNumber' id="contactNumber"  placeholder='Phone Number ..' class="form-control" required  />
                                                   </td>
                                                   <td>
                                                   <input type="text" name='contactNote' id="contactNote"  placeholder='Note ..' class="form-control" required  />
                                                   </td>
                                                  
                                                   <td>
                                                       <button  class=" btn btn-primary" type="submit">Add Contact</button>
                                                       <img class="loader" src="https://i.gifer.com/origin/b4/b4d657e7ef262b88eb5f7ac021edda87.gif" style="
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
                                 <div id="invoiceList" class="tab-pane fade">
                                    
                                    <table class="table table-bordered table-hover">
                                    <thead>
                                                <tr>
                                                <th class="text-center">
                                                #
                                                </th>
                                                <th class="text-center">
                                                         Date
                                                </th>
                                               
                                                <th class="text-center">
                                                  Invoice Number
                                                </th>
                                                <th class="text-center">
                                                Betrag Brutto
                                                </th>
                                               
                                                </tr>
                                            </thead>
                                            <tbody id="invoiceListappend">
                                                    
                                                    <tbody>
                                     </table>

                                 
                                 </div>
                                 <div id="bankdetail" class="tab-pane fade">
                                 <form method="post" action="javascript:void(0);" id="bankdetailform">
                                             <div class="form-row">
                                                <div class="form-group col-md-12">
                                                <div class="form-check form-check-inline">
                                                <input type="hidden" name="invoiceid" class="roweditid" value="" />
                                                      <input class="form-check-input" type="radio" name="directdebit" id="inlineRadio1" value="Lastschrift (direct debit)">
                                                   <label class="form-check-label" for="inlineRadio1">&nbsp; : Lastschrift (direct debit) </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                      <input class="form-check-input" type="radio" name="directdebit" id="inlineRadio2" value="Überweisung (transfer)">
                                                      <label class="form-check-label" for="inlineRadio2">&nbsp; : Überweisung (transfer)</label>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="form-row">
                                                <div class="form-group col-md-12">
                                                <div class="form-check form-check-inline">
                                                      <input class="form-check-input timeoption" type="radio" name="timeoption" id="ontime" value="onetime">
                                                   <label class="form-check-label" for="ontime">&nbsp;  : One time</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                      <input class="form-check-input timeoption" type="radio" name="timeoption" id="validfrom" value="validfrom">
                                                      <label class="form-check-label" for="validfrom">&nbsp; : Valid from</label>
                                                     
                                                   </div>
                                                </div>
                                                <div style="display:none;" id="bankduration" > Start Date <input type="date" name="bankdurationstart" id="bankdurationstart" data-date="" class="datepicker form-control" data-date-format="DD.m.YYYY" value="<?php echo date('Y-m-d');?>"/> Expire Date <input type="date" name="bankexpireDate" id="bankexpireDate" data-date="" class="datepicker form-control" data-date-format="DD.m.YYYY" value="<?php echo date('Y-m-d');?>"/>
                                                      </div>
                                                
                                             </div>
                                       <div class="form-row">
                                       <div class="form-group col-md-4">
                                             <label for="inputEmail4">Signed by:</label>
                                             <input type="text" class="form-control" name="signedby" id="signedby" placeholder="Signed By">
                                       </div>
                                       <div class="form-group col-md-4">
                                             <label for="inputPassword4">Signed Date:</label>
                                             <input type="date" class="form-control datepicker" name="signeddate" id="signeddate" data-date=""  data-date-format="DD.m.YYYY" value="<?php echo date('Y-m-d');?>"/>
                                       </div>
                                       <div class="form-group col-md-4">
                                             <label for="inputPassword4">Upload pdf:<span id="bankpdf"></span></label>
                                             <input type="file" class="form-control" id="upPdf" name="kuppdf" />
                                       </div>
                                       </div>
                                       <div class="form-row">
                                       <div class="form-group col-md-4">
                                             <label for="inputEmail4">Name:</label>
                                             <input type="text" class="form-control" id="nameBankkunden" name="name" placeholder="Name">
                                       </div>
                                       <div class="form-group col-md-8">
                                             <label for="inputPassword4">IBAN:</label>
                                             <input type="text" class="form-control " id="IBAN" placeholder="IBAN"  name="iban"/>
                                       </div>
                                      
                                       </div>
                                       <div class="form-row">
                                       <div class="form-group col-md-4">
                                             <label for="inputEmail4">BIC:</label>
                                             <input type="text" class="form-control" id="BIC" placeholder="BIC" name="bic">
                                       </div>
                                       <div class="form-group col-md-8">
                                             <label for="inputPassword4">Bank:</label>
                                             <input type="text" class="form-control " id="bank" name="bank" placeholder="Bank name"/>
                                       </div>
                                      
                                       </div>
                                       <div class="form-row">
                                       <div class="form-group col-md-12">
                                             <label for="inputEmail4">Anschrift:</label>
                                             <input type="text" class="form-control" id="anschrift" name="anschrift" placeholder="Anschrift">
                                       </div>
                                     
                                      
                                       </div>
                               
                                      
                                       <button type="submit" class="btn btn-primary">Save</button>
                                       <img class="loader" src="https://i.gifer.com/origin/b4/b4d657e7ef262b88eb5f7ac021edda87.gif" style=" width: 50px; height: 34px; display:none;">
                                       </form>
                                 </div>
                     </div>                           
                   
                  </div>
               </div>
            </div>
         </div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog  modal-lg" role="document">
      <div class="modal-content" style="height: 421px;">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Rechnungen Nr. <strong class="showinvoiceId"></strong></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <ul class="nav nav-tabs">
               <li class="active"><a data-toggle="tab" href="#Automatically">Automatically</a></li>
               <li><a data-toggle="tab" href="#Manually">Manually</a></li>
            </ul>
            <div class="tab-content"  style="height: 421px;">
               <div id="Automatically" class="tab-pane fade in active">
                  <form action="barcodeItemassign.php" method="post" id="assignBarcode" >
                     <div class="form-row align-items-center">
                        <div class="col-auto">
                           <label class="sr-only" for="inlineFormInput">Enter BarCode</label>
                           <input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Enter BarCode" >
                           <input type="hidden" value="" name="invoicerowid" class="invoiceidBarcode"/>
                           <input type="hidden" value="" name="assignInvoiceNumber" class="invoiceNumberscan"/>
                        </div>
                        <div id="loadData">
                        </div>
                        <div class="row assigndiv" style="display:none;">
                           <div class=" col-md-4">
                              <p class="card-text"><strong>Assign Date</strong>: <input type="date" name='assignDate' id="" data-date="" class="datepicker form-control dateFilterLH" data-date-format="DD.m.YYYY" value="<?php echo date('Y-m-d');?>" required/></p>
                           </div>
                           <div class=" col-md-4">
                              <p class="card-text">
                                 <strong>Assign By</strong>: 
                                 <select class="form-select form-select-lg" name="assignBy" required>
                                    <option value="">Select Person ....</option>
                                    <?php
                                       echo $personprint;
                                       
                                       ?>
                                 </select>
                              </p>
                           </div>
                           <div class=" col-md-4">
                              <p class="card-text">
                                 <button  class=" btn btn-primary" type="submit">Assign</button>
                                 <img class="loader" src="https://i.gifer.com/origin/b4/b4d657e7ef262b88eb5f7ac021edda87.gif" style="
                                    width: 50px;
                                    height: 34px;
                                    display:none;
                                    ">
                              </p>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
               <div id="Manually" class="tab-pane fade">
               <form action="barcodeItemassignMenaully.php" method="post" id="assignBarcodeMenually" >
               <input type="hidden" value="" name="invoicerowid" class="invoiceidBarcode"/>
                  <div class="form-row">
                  <div class="form-group col-md-6">
                  <label for="recipient-name" class="col-form-label">Vender:</label>
                  <select class="form-select form-select-lg itemsGetOnChange" id="venderMenually" name="typeid" required>
                  <option value=""> Select Vender ...</option>
                  <?php
                  $numsupplier_details = mysqli_num_rows($supplier_details);
                  if($numsupplier_details>0){
                  while ($rowSupplier = mysqli_fetch_assoc($supplier_details)) {
                  echo "<option value='".$rowSupplier['id']."'>".$rowSupplier['supplier_name']."</option>";
                  }
                  }

                  ?>
                  </select>
                  </div>
                  <div class="form-group col-md-6">
                  <label for="recipient-name" class="col-form-label">Type:</label>
                  <select class="form-select itemsGetOnChange" name="supplierNo" id="TypeMenually" required >
                  <option value="">Select Type....</option>
                  <?php
                  $numrowtype = mysqli_num_rows($itemTypeRecords);
                  if($numrowtype>0){
                  while ($rowType = mysqli_fetch_assoc($itemTypeRecords)) {
                     echo "<option value='".$rowType['id']."'>".$rowType['typeName']."</option>";
                  }
                  }

                  ?>
                  </select>
                  </div>
                  <div class="form-group col-md-6">
                  <label for="recipient-name" class="col-form-label">Items:</label>
                  <select class="form-select" name="supplierNo" id="itemsMenaully" required >
                  <option value="">Select item....</option>
                  
                  </select>
                  <i  style="display:none;" class="fa fa-info-circle tool-tip " id="iteminfo"></i>
                  </div>
                  <div class="form-group col-md-6">
                  <label for="recipient-name" class="col-form-label">Select BarCode:</label>
                  <select class="form-select" name="barCodesbarCodes" id="barCodes" required >
                  <option value="">Select BarCode....</option>
                  
                  </select>
                  </div>
                  <div class="form-group col-md-6">
                  <label for="recipient-name" class="col-form-label">Assign Date:</label>
                  <input type="date" name='assignDate' id="" data-date="" class="datepicker form-control dateFilterLH" data-date-format="DD.m.YYYY" value="<?php echo date('Y-m-d');?>" required/>
                  </div>
                  <div class="form-group col-md-6">
                  <label for="recipient-name" class="col-form-label">Assign By:</label>
                  <select class="form-select" name="assignBy" required>
                                    <option value="">Select Person ....</option>
                                    <?php
                                       echo $personprint;
                                       
                                       ?>
                                 </select>
                  </div>
                  <div class="form-group col-md-12">
                  <button  class=" btn btn-primary" type="submit">Assign</button>
                                 <img class="loader" src="https://i.gifer.com/origin/b4/b4d657e7ef262b88eb5f7ac021edda87.gif" style="
                                    width: 50px;
                                    height: 34px;
                                    display:none;
                                    ">
               </div>
               </div>
               </form>
              
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
               <!-- Modal -->
<div class="modal fade" id="assignBankid" tabindex="-1" role="dialog" aria-labelledby="assignBankidlabel" aria-hidden="true">
   <div class="modal-dialog  modal-lg" role="document">
      <div class="modal-content" style="height: 421px;">
         <div class="modal-header">
            <h5 class="modal-title" id="assignBankidlabel">Assign Transcations. <strong class="showinvoiceId"></strong></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <ul class="nav nav-tabs">
               <li class="active"><a data-toggle="tab" href="#Automaticallybank">Automatically</a></li>
               <li><a data-toggle="tab" href="#Manuallybank">Manually</a></li>
               <li><a data-toggle="tab" href="#split">Split</a></li>
            </ul>
            <div class="tab-content"  style="height: 421px;">
               <div id="Automaticallybank" class="tab-pane fade in active">
                  <form action="barcodeItemassign.php" method="post" id="assignBarcode" >
                     <div class="form-row align-items-center">
                        <div class="col-auto">
                           <label class="sr-only" for="inlineFormInput">Buchungs ID</label>
                           <input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Enter Buchungs ID" >
                           <input type="hidden" value="" name="invoicerowid" class="invoiceidBarcode"/>
                           <input type="hidden" value="" name="assignInvoiceNumber" class="invoiceNumberscan"/>
                        </div>
                        <div id="loadData">
                        </div>
                        <div class="row assigndiv" style="display:none;">
                          
                          
                           <div class=" col-md-4">
                              <p class="card-text">
                                 <button  class=" btn btn-primary" type="submit">Assign</button>
                                 <img class="loader" src="https://i.gifer.com/origin/b4/b4d657e7ef262b88eb5f7ac021edda87.gif" style="
                                    width: 50px;
                                    height: 34px;
                                    display:none;
                                    ">
                              </p>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
               <div id="Manuallybank" class="tab-pane fade">
               <form action="barcodeItemassignMenaully.php" method="post" id="assignBarcodeMenually" >
               <input type="hidden" value="" name="invoicerowid" class="invoiceidBarcode"/>
                cgftf
               </form>
              
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
         <!-- add Invoice details  -->
         <div class="modal fade" id="addModalLabel" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="addModalLabel">Add record</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <form id="addForm" action="addInvoice.php" method="POST">
                        <div class="form-row">
                           <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Rechnung Nummer:</label>
                              <input type="text" class="form-control " id="rechnung_nummer" name="rechnung_nummer" required>
                           </div>
                           <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Kunden Nr:</label>
                              <input type="text" class="form-control input-datalist" list="list-timezone" id="kunden_nr" name="kunden_nr" required >
                              <datalist id="list-timezone">
                                              <?php echo $kudenOption;?>
                                            </datalist> 
                           </div>
                           <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Kunden Name:</label>
                              <input type="text" class="form-control " id="kunden_name" name="kunden_name" required >
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Betrag Brutto:</label>
                              <input type="text" class="form-control " id="betrag_brutto" name="betrag_brutto" required >
                           </div>
                           <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Bezahlt:</label>
                              <input type="text" class="form-control " id="Bezahlt" name="Bezahlt">
                           </div>
                           <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Offen:</label>
                              <input type="text" class="form-control " id="Offen" name="Offen">
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Payment Method:</label>
                              <select class="form-select " id="payment_method" name="payment_method">
                                 <option value="Unbekannt">Unbekannt</option>
                                 <option value="Banküberweisung">Banküberweisung</option>
                                 <option value="Bar">Bar</option>
                                 <option value="Bar und Banküberweisung">Bar und Banküberweisung</option>
                              </select>
                           </div>
                           <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Rechnung Datum:</label> 
                              <input type="text" class="form-control " id="rechnung_datum" name="rechnung_datum" required>
                           </div>
                           <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Upload PDF File :</label>
                              <input type="file" class="form-control " id="uploadpdf" name="uploadpdf">
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="form-group col-md-12">
                              <label for="recipient-name" class="col-form-label">Notiz:</label>
                              <textarea class="form-control " id="ckeditortxt" name="notiz"></textarea>
                           </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="addNewRecord">Add New </button>
                     </form>
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
      <!-- <script src="https://editor.datatables.net/extensions/Editor/js/dataTables.editor.min.js"></script> -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js" integrity="sha384-ux8v3A6CPtOTqOzMKiuo3d/DomGaaClxFYdCu2HPMBEkf6x2xiDyJ7gkXU0MWwaD" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
      <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
      <script src="js/autoComplete/bootstrap-autocomplete.js"></script>
      <script>
    $(".datepicker").on("change", function() {
    this.setAttribute(
        "data-date",
        moment(this.value, "YYYY-m-DD")
        .format( this.getAttribute("data-date-format") )
    )
}).trigger("change");
</script>
      <script>
         ClassicEditor.create(document.querySelector('#ckeditortxt')).then(editor => {
           console.log(editor);
         }).catch(error => {
           console.error(error);
         });
      </script>
      <script>
         ClassicEditor.create(document.querySelector('#ckeditortxt1')).then(editor => {
           console.log(editor);
         }).catch(error => {
           console.error(error);
         });
      </script>

<script>
   $(function() {
  var checkbox = $("#duration");
  var hidden = $("#div01");
  hidden.hide();
  checkbox.change(function() {
    if (checkbox.is(':checked')) {
      hidden.show();
      $('#expireDate').prop('required', true); //to add required
      $('#durationstart').prop('required', true); //to add required
    } else {
      hidden.hide();
      $("#expireDate").val("");
      $("#durationstart").val("");
      $('#expireDate').prop('required', false); //to remove required
      $('#durationstart').prop('required', false); //to remove required
    }
  });
});

$(document).ready(function() {
   $('.itemsGetOnChange').on('change', function (e) {
      $('#itemsMenaully').empty().append('<option selected="selected" value="">Select Item..</option>');
      $('#barCodes').empty().append('<option selected="selected" value="">Select Item..</option>');
      $("#iteminfo").hide();
     var venderid= $('#venderMenually').val();
      var typeid=$('#TypeMenually').val();
      $.ajax({
            type: 'post',
            url: 'filltersItemData.php',
            data: {'venderid':venderid,'typeid':typeid},
            success: function (response) {
               
               $('#itemsMenaully').append(response);
            }
          });
          $("#iteminfo").hide();
   });
   $('#itemsMenaully').on('change', function (e) {
      var itemsname=$(this);
      $('#barCodes').empty().append('<option selected="selected" value="">Select Item..</option>');
     var itemsMenaully= $('#itemsMenaully').val();
      var typeid=$('#TypeMenually').val();
      var itemPrice= itemsname.find(':selected').attr('data-price');
      $('#itemPrice').val(itemPrice);
      var description= itemsname.find(':selected').attr('data-description');
      $("#iteminfo").attr('title-new',description+" Price: "+itemPrice);
      $("#iteminfo").show();
      $.ajax({
            type: 'post',
            url: 'filltersItemsBarcodeData.php',
            data: {'itemsMenaully':itemsMenaully},
            success: function (response) {
               
               $('#barCodes').append(response);
            }
          });
      
   });

//setup before functions
var typingTimer;                //timer identifier
var doneTypingInterval = 500;  //time in ms, 5 seconds for example
var $input = $('#inlineFormInput');

//on keyup, start the countdown
$input.on('keyup', function () {
  clearTimeout(typingTimer);
  typingTimer = setTimeout(doneTyping, doneTypingInterval);
});

//on keydown, clear the countdown 
$input.on('keydown', function () {
  clearTimeout(typingTimer);
});

//user is "finished typing," do something
function doneTyping () {
  //do something
  var barcode=$('#inlineFormInput').val();
  $("#loadData").html("");
  $('.assigndiv').hide();
  $.ajax({
            type: 'post',
            dataType: "json",
            url: 'loadItembyBarCode.php',
            data: {'barcode':barcode},
            success: function (response) {
               if(response.loadhtml!=''){
                  $("#loadData").html(response.loadhtml);
                  $('.assigndiv').show();
              
               }else{
                  $("#loadData").html("<p>BarCode not found...</p>");
               }
             

            }
          });
}



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

$('.pdfrefresh').click(function() {
   var realInvoiceid=$("#rechnung_nummer").val();
           
            $("#editformloader").show();
          $.ajax({
            type: 'post',
            url: 'refreshpdf.php',
            data: {'realInvoiceid':realInvoiceid},
            success: function (response) {
               $('#jpgname').html("<a target='_Blank' href='KhanaCRM/KASSE_RECHNUNGEN/jpg/"+response+"'>("+response+")</a>");
               $("#editformloader").hide();

            }
          });
   });
   $('.timeoption').click(function() {
       if($(this).val() == 'validfrom') {
            $('#bankduration').show(); 
            $('#bankdurationstart').prop('required', true); //to remove required
            $('#bankexpireDate').prop('required', true); //to remove required          
       }
       else {
            $('#bankduration').hide();   
            $("#bankdurationstart").val("");
            $("#bankexpireDate").val("");
            $('#bankdurationstart').prop('required', false); //to remove required
            $('#bankexpireDate').prop('required', false); //to remove required
       }
   });
});

      $(function () {

        $('#itemsform').on('submit', function (e) {

          e.preventDefault();
          var realInvoiceid=$("#rechnung_nummer").val();
            $('#itemsform').append('<input type="hidden" name="invoiceRealId" value="'+realInvoiceid+'" />');
            $("#additemsLoaders").show();
          $.ajax({
            type: 'post',
            url: 'addItems.php',
            data: $('#itemsform').serialize(),
            success: function (response) {
               $("#additemsLoaders").hide();
               $('#itemsform')[0].reset();
               $('#itemsAppends').html(response);
               alert("Items added successfully....");
            }
          });

        });
         $('#personsform').on('submit', function (e) {
            e.preventDefault();
            var realInvoiceid=$("#rechnung_nummer").val();
            $('#personsform').append('<input type="hidden" name="invoiceRealId" value="'+realInvoiceid+'" />');
            $("#addpersonloader").show();
            $.ajax({
                  type: 'post',
                  url: 'addperson.php',
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
            var realInvoiceid=$("#rechnung_nummer").val();
            $('#contactform').append('<input type="hidden" name="invoiceRealId" value="'+realInvoiceid+'" />');
            $("#addContactLoader").show();
            $.ajax({
                  type: 'post',
                  url: 'addContact.php',
                  data: $('#contactform').serialize(),
                  success: function (response) {
                     $("#addContactLoader").hide();
                     $('#contactform')[0].reset();
                     $('#contactApeend').html(response);
                     alert("Record added successfully....");
                  }
            });

         });
         
         $('#bankdetailform').on('submit', function (e) {
            e.preventDefault();
            var kundenrowid=$("#kundenrowid").val();
            $('#bankdetailform').append('<input type="hidden" name="kundenrowid" value="'+kundenrowid+'" />');
            var form_data = new FormData(document.getElementById("bankdetailform"));
            $(".loader").show();
            $.ajax({
                  url: 'kundenBankDetail.php',
               cache: false,
               contentType: false,
               processData: false,
               type: "POST",
               data: form_data,
                  success: function (response) {
                     $(".loader").hide();
                    if(response != ''){
                     $('#bankpdf').html(response);
                    }
                   
                     alert("Record saved successfully....");
                  }
            });

         });
         $('#contactformkunden').on('submit', function (e) {
            e.preventDefault();
            var kundenrowid=$("#kundenrowid").val();
            $('#contactformkunden').append('<input type="hidden" name="kundenrowid" value="'+kundenrowid+'" />');
            $(".loader").show();
            $.ajax({
                  type: 'post',
                  url: 'addContactkunden.php',
                  data: $('#contactformkunden').serialize(),
                  success: function (response) {
                     $(".loader").hide();
                     $('#contactformkunden')[0].reset();
                     $('#contactkApeend').html(response);
                     alert("Record added successfully....");
                  }
            });

         });
         $('#statusInvoice').on('submit', function (e) {
            e.preventDefault();
            var realInvoiceid=$("#rechnung_nummer").val();
            $('#statusInvoice').append('<input type="hidden" name="invoiceRealId" value="'+realInvoiceid+'" />');
            $("#statusLoader").show();
            $.ajax({
                  type: 'post',
                  url: 'updateInvoiceStatus.php',
                  data: $('#statusInvoice').serialize(),
                  success: function (response) {
                     $("#statusLoader").hide();
                    
                   //  $('#contactApeend').html(response);
                     alert("Status updated successfully....");
                     $('#empTable').DataTable().ajax.reload();
                  }
            });

         });
         $('#invoiceType').on('submit', function (e) {
            e.preventDefault();
            var realInvoiceid=$("#rechnung_nummer").val();
            $('#invoiceType').append('<input type="hidden" name="invoiceRealId" value="'+realInvoiceid+'" />');
            $("#invoiceTypeLoader").show();
            $.ajax({
                  type: 'post',
                  url: 'invoiceType.php',
                  data: $('#invoiceType').serialize(),
                  success: function (response) {
                     $("#invoiceTypeLoader").hide();
                    
                   //  $('#contactApeend').html(response);
                     alert("Record updated successfully....");
                     //location.reload();
                  }
            });

         });
        

      });
    </script>
      <script type="text/javascript">
        $(document).ready(function(){
      var i=1;
     $("#add_row").click(function(){
      b=i-1;
      $('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
      $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      i++; 
  });
     $("#delete_row").click(function(){
    	 if(i>1){
		 $("#addr"+(i-1)).html('');
		 i--;
		 }
	 });

});
         function delPayment(rowid) {
          $('#delrow-'+rowid).remove();

         $.ajax({
               url: 'deletePayment.php',
               type: "POST",
               data: {'id': rowid},
               success: function(response) {
               
                 alert(response);
                 $('#empTable').DataTable().ajax.reload();
               }
             });
         }
         function delversand(rowid) {
          $('#delrowversand-'+rowid).remove();

         $.ajax({
               url: 'deleteversand.php',
               type: "POST",
               data: {'id': rowid},
               success: function(response) {
               
                 alert(response);
               }
             });
         }
         function delfiles(rowid) {
          $('#delrowf-'+rowid).remove();

         $.ajax({
               url: 'deleteinvoiceFiles.php',
               type: "POST",
               data: {'id': rowid},
               success: function(response) {
               
                 alert(response);
               }
             });
         } 
         function delfilesk(rowid) {
          $('#delrowfk-'+rowid).remove();

         $.ajax({
               url: 'deletekundenFiles.php',
               type: "POST",
               data: {'id': rowid},
               success: function(response) {
               
                 alert(response);
               }
             });
         } 
         function delitems(rowid) {
          $('#delrowitem-'+rowid).remove();

         $.ajax({
               url: 'deleteItem.php',
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
               url: 'deletePerson.php',
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
               url: 'deleteContact.php',
               type: "POST",
               data: {'id': rowid},
               success: function(response) {
               
                 alert(response);
               }
             });
         }
         function delcontactk(rowid) {
          $('#delrowcontactk-'+rowid).remove();

         $.ajax({
               url: 'deleteContactkunden.php',
               type: "POST",
               data: {'id': rowid},
               success: function(response) {
               
                 alert(response);
               }
             });
         }
         
         $(document).ready(function() {

            
         var upload_number = 2;
         $('#attachMore').click(function() {
         //add more file
         var moreUploadTag = '';
         moreUploadTag += '<div class="element">';
         moreUploadTag += '<input type="file" id="upload_file' + upload_number + '" name="upload_file' + upload_number + '"/>';
         moreUploadTag += ' <a href="javascript:del_file(' + upload_number + ')" style="cursor:pointer;" onclick="return confirm("Are you really want to delete ?")">Delete </a></div>';
         $('<dl id="delete_file' + upload_number + '">' + moreUploadTag + '</dl>').fadeIn('slow').appendTo('#moreImageUpload');
         upload_number++;
         });
         });
         $('#collectpayment').validate({
           rules: {
             date: {
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
            var realInvoiceid=$("#rechnung_nummer").val();
            $('#collectpayment').append('<input type="hidden" name="invoiceRealId" value="'+realInvoiceid+'" />');
             var form_data = new FormData(document.getElementById("collectpayment"));
             $.ajax({
               url: 'collectpayment.php',
               cache: false,
               contentType: false,
               processData: false,
               type: "POST",
               data: form_data,
               success: function(response) {
                $("#addPaymentloader").hide();
                 if(response!='error'){
                  $('#collectpayment')[0].reset();
                  $('#appendpayment').html(response);
                  $('#empTable').DataTable().ajax.reload();
                 }
                 
               }
             });
           }
         });
         $('#formVersand').validate({
           rules: {
             date: {
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
            $(".loader").show();
            var realInvoiceid=$("#rechnung_nummer").val();
            $('#formVersand').append('<input type="hidden" name="invoiceRealId" value="'+realInvoiceid+'" />');
             var form_data = new FormData(document.getElementById("formVersand"));
             $.ajax({
               url: 'versand.php',
               cache: false,
               contentType: false,
               processData: false,
               type: "POST",
               data: form_data,
               success: function(response) {
                $(".loader").hide();
                 if(response!='error'){
                  $('#formVersand')[0].reset();
                  $('#appendVersand').html(response);
                 }
                 
               }
             });
           }
         });
         $('#uploadfiles').validate({
           rules: {
            filepdf: "required",
            description: "required",
           },
           submitHandler: function(form) {
            
            var realInvoiceid=$("#rechnung_nummer").val();
            $('#uploadfiles').append('<input type="hidden" name="invoiceRealId" value="'+realInvoiceid+'" />');
             var form_data = new FormData(document.getElementById("uploadfiles"));
           
             if( document.getElementById("fileupload").files.length != 0 &&  document.getElementById("fileupload").value !=''){
              $("#addfilesloader").show();
             $.ajax({
               url: 'uploadFilesPDF.php',
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
         $('#uploadfileskunden').validate({
           rules: {
            filepdf: "required",
            description: "required",
           },
           submitHandler: function(form) {
            var kundenrowid=$("#kundenrowid").val();
            $('#uploadfileskunden').append('<input type="hidden" name="kundenrowid" value="'+kundenrowid+'" />');
             var form_data = new FormData(document.getElementById("uploadfileskunden"));
           
            
              $(".loader").show();
             $.ajax({
               url: 'uploadFileskundenPDF.php',
               cache: false,
               contentType: false,
               processData: false,
               type: "POST",
               data: form_data,
               success: function(response) {
                $(".loader").hide();
                 if(response!='error'){
                  $('#uploadfileskunden')[0].reset();
                  $('#filesappendk').html(response);
                 }
                 
               }
             });
           
           }
         });
         $('#assignBarcodeMenually').validate({
           
           submitHandler: function(form) {
             var form_data = new FormData(document.getElementById("assignBarcodeMenually"));
             $('.loader').show();
             $.ajax({
               url: 'assignBarCodeMenually.php',
               cache: false,
               contentType: false,
               processData: false,
               type: "POST",
               data: form_data,
               success: function(response) {
                  $('.loader').hide();
                 alert(response);
               
                // $('#empTable').DataTable().ajax.reload();
               }
             });
           }
         });
         $('#assignBarcode').validate({
           rules: {
            invoiceidBarcode: {
               required: true,
             },
             invoiceNumberscan: {
               required: true,
             }
           },
           submitHandler: function(form) {
             var form_data = new FormData(document.getElementById("assignBarcode"));
             $('.loader').show();
             $.ajax({
               url: 'assigninvoiceItem.php',
               cache: false,
               contentType: false,
               processData: false,
               type: "POST",
               data: form_data,
               success: function(response) {
                  $('.loader').hide();
                 alert(response);
               
                // $('#empTable').DataTable().ajax.reload();
               }
             });
           }
         });
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
             betrag_brutto: {
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
             var form_data = new FormData(document.getElementById("editForm"));
             $('#editformloader').show();
             $.ajax({
               url: 'updateInvoice.php',
               cache: false,
               contentType: false,
               processData: false,
               type: "POST",
               data: form_data,
               success: function(response) {
                  $('#editformloader').hide();
                 alert(response);
                 $('#empTable').DataTable().ajax.reload();
               }
             });
           }
         });
         $('#addForm').validate({
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
             betrag_brutto: {
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
             $('#addNewRecord').prop('disabled', true);
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
                  $('#addForm')[0].reset();
                 alert(response);
                 $('#empTable').DataTable().ajax.reload();
               }
             });
           }
         });
         $('#updatekudenform').validate({
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
                 location.reload();
               }
             });
           }
         });
      </script>
      <script>
          var table = $(document).ready(function() {
           $('#empTable').DataTable({
             'processing': true,
             "language": {
               "processing": "<img src='img/calc-app-loading.gif'/>"
        },
             'serverSide': true,
             'serverMethod': 'post',
             columnDefs: [{
               target: 6,
               visible: false,
             }, {
               target: 7,
               visible: false
             }, {
               target: 8,
               visible: false
             }],
             'lengthMenu': [100, 500, 1000],
             'pageLength': 500,
             "aaSorting": [
               [0, "desc"]
             ],
             'ajax': {
              <?php if(isset($_GET['from']) && isset($_GET['to'])){
?>  
'url': 'ajexinvoice.php?from=<?php echo $_GET['from'];?>&to=<?php echo $_GET['to'];?>'
                  <?php 
               }elseif(isset($_GET['kunden'])){
?>  
'url': 'ajexinvoice.php?kunden=<?= $_GET['kunden'] ?>'
                  <?php 
               }else{
                  ?>  
                  'url': 'ajexinvoice.php'
               <?php 
               }
               ?>
               
             },
             'columns': [{
               data: 'rechnung_nummer'
             }, {
               data: 'kunden_nr'
             }, {
               data: 'kunden_name'
             },
             {
               data: 'status',
               className:'shapedisplayflex'
             }, 
             {
               data: 'rechnung_datum'
             }, {
               data: 'betrag_brutto',
               className: 'text-right'
             }, {
               data: 'Bezahlt',
               className: 'text-right'
             }, {
               data: 'Offen',
               className: 'text-right'
    
             }, {
               data: 'payment_method',
               className: 'hideClass'
             }, {
               data: 'Update_Img',
               className: 'roweditcol'
             }, ],
           });
         });
         $(document).on('click', 'body .kundenView', function() {
           var datakundenId = $(this).attr('data-ref');
           var row = $(this).closest("tr"),
             tds = row.find("td");
           var countitems = 1;
           $('.roweditid').val(row.find(".inputvalue").val());
           // alert(datakundenId);
           $.ajax({
             url: "getKundenDetails.php",
             type: "POST",
             dataType: "json",
             data: {
               'id': datakundenId,
               'rowid': $('.roweditid').val(),
             },
             success: function(response) {
               if (response != '') {
                 //console.log(response.restaurant_id);
                 $("#restaurant_id").val(response.restaurant_id);
                 $('#kundenrowid').val(response.id);
                 $("#restaurant_name").val(response.restaurant_name);
                 $("#restaurant_inhaber").val(response.restaurant_inhaber);
                 $("#restaurant_str").val(response.restaurant_str);
                 $("#restaurant_str_nr").val(response.restaurant_str_nr);
                 $("#restaurant_plz").val(response.restaurant_plz);
                 $("#restaurant_ort").val(response.restaurant_ort);
                 $('#contactkApeend').html(response.contactHtml);
                 $('#filesappendk').html(response.filesappendk);
                 $('#invoiceListappend').html(response.invoiceListappend);
                 if(response.bankdetails!=''){
                  if (response.bankdetails.collectedthrow == 'Lastschrift (direct debit)'){
                    $(':radio[name=directdebit][value="Lastschrift (direct debit)"]').prop('checked', true);
                  }else{
                    $(':radio[name=directdebit][value="Überweisung (transfer)"]').prop('checked', true);
                  }
                  if (response.bankdetails.collectionType == 'validfrom'){
                     $(':radio[name=timeoption][value="validfrom"]').prop('checked', true);
                     $(':radio[name=timeoption][value="onetime"]').prop('checked', false);
                     $('#bankduration').show();   
                     // $("#bankdurationstart").val(moment(response.bankdetails.startDatebank, "DD.m.YYYY"));
                     // $("#bankexpireDate").val(moment(response.bankdetails.endDatebank, "DD.m.YYYY"));
                     $("#bankdurationstart").val(response.bankdetails.startDatebank);
                     $("#bankdurationstart").attr('data-date',response.bankdetails.startDatebank);
                     $("#bankexpireDate").val(response.bankdetails.endDatebank);
                     $("#bankexpireDate").attr('data-date',response.bankdetails.endDatebank);
                     $('#bankdurationstart').prop('required', true); //to remove required
                     $('#bankexpireDate').prop('required', true); //to remove required
                  }else{
                     $(':radio[name=timeoption][value="onetime"]').prop('checked', true);
                     $(':radio[name=timeoption][value="validfrom"]').prop('checked', false);
                     $('#bankduration').hide();   
                     $("#bankdurationstart").val("");
                     $("#bankexpireDate").val("");
                     $('#bankdurationstart').prop('required', false); //to remove required
                     $('#bankexpireDate').prop('required', false); //to remove required
                  }
                     $("#signedby").val(response.bankdetails.signedBy);
                     var singDate=response.bankdetails.signedDate;
                     $("#signeddate").val(singDate);
                     $("#signeddate").attr('data-date',singDate);
                     $("#nameBankkunden").val(response.bankdetails.name);
                     $("#IBAN").val(response.bankdetails.IBAN);
                     $("#BIC").val(response.bankdetails.BIC);
                     $("#bank").val(response.bankdetails.bankname);
                     $("#anschrift").val(response.bankdetails.anschrift);
                     
                     if(response.bankdetails.uploadpdf!=''){
                        $('#bankpdf').html("(<a target='_Blank' href='KhanaCRM/KASSE_RECHNUNGEN/pdf/kunden/"+response.bankdetails.kundenid+"/"+response.bankdetails.uploadpdf+"'>"+response.bankdetails.uploadpdf+"</a>)");
                     }else{
                        $('#bankpdf').html("");
                     }
                 }else{
                  $('#bankduration').hide();  
                     $('#bankdetailform')[0].reset();
                 }
                 //alert(response);
                 $('#editKunden').modal('show');
               }
             }
           });
         });
         $(document).on('click', 'body .popupBarcode', function() {
            $('#inlineFormInput').val("");
  $("#loadData").html("");
  $('.assigndiv').hide();
           var row = $(this).closest("tr"),
             tds = row.find("td");
             $('.invoiceidBarcode').val(row.find(".inputvalue").val());
             $('.showinvoiceId').html(row.find(".rechnungannumber").val());
             $('.invoiceNumberscan').val(row.find(".rechnungannumber").val());
             $('#itemsMenaully').empty().append('<option selected="selected" value="">Select Item..</option>');
      $('#barCodes').empty().append('<option selected="selected" value="">Select Item..</option>');
      $("#iteminfo").hide();
             $('#exampleModal').modal('show');
            
         
         });
         $(document).on('click', 'body .rowedit', function() {
         var row = $(this).closest("tr"),
         tds = row.find("td");
         var countitems = 1;
         $('.roweditid').val(row.find(".inputvalue").val());
         $('#datumnext').val(row.find(".rechnungaexpiredate").val());
         $('#datumnext').attr('data-date',row.find(".rechnungaexpiredate").attr('data-value'));
         var  payset=row.find(".payset").val();
         var  installset=row.find(".installset").val();
         var  serviceset=row.find(".serviceset").val();
         $('#empTable').DataTable().ajax.reload();
         $("#notizdata").html(row.find(".inputnotiz").val());
         var invoiceid=row.find(".inputvalue").val();
         $(':radio[name=paymentStatus][value="'+payset+'"]').prop('checked', true);
         $(':radio[name=install][value="'+installset+'"]').prop('checked', true);
         $(':radio[name=services][value="'+serviceset+'"]').prop('checked', true);
           $.ajax({
               url: 'loadInvoiceRecord.php',
               type: "POST",
               dataType: "json",
               data: {'invoiceid': invoiceid},
               success: function(response) {
                $("#addPaymentloader").hide();
                $('#appendpayment').html(response.paymentloading);
                $('#filesappend').html(response.fileloading);
                $('#itemsAppends').html(response.itemsHtml);
                $('#personsAppends').html(response.personHtml);
                $('#contactApeend').html(response.contactHtml);
                $('#appendVersand').html(response.versandhtml);
                console.log(response.rowinvoicetype);
                $("#div01").hide();
                $('input:checkbox').prop('checked', false);
                $("#durationstart").val("");
                $("#expireDate").val("");
                $.each(response.rowinvoicetype, function(k, v) {
                  if(v.invoiceType=='Duration'){
                        $("#div01").show();
                        $("#durationstart").val(v.expiredate);
                        $("#expireDate").val(v.createdDate);

                  }
               $('input[name="invoiceType[]"]').map(function(){
                   if($(this).val()==v.invoiceType){
                     $(this).prop('checked', true);
                   }
                  });
                   
});
                
                 
               }
             });



           $('#jpgname').html("<a target='_Blank' href='KhanaCRM/KASSE_RECHNUNGEN/jpg/"+row.find(".inputjpg").val()+"'>("+row.find(".inputjpg").val()+")</a>");
           $('#pdfdoc').html("<a target='_Blank' href='KhanaCRM/KASSE_RECHNUNGEN/pdf/"+row.find(".inputpdf").val()+"'>("+row.find(".inputpdf").val()+")</a>");
           $('#worddoc').html("<a target='_Blank' href='KhanaCRM/KASSE_RECHNUNGEN/word/"+row.find(".inputword").val()+"'>("+row.find(".inputword").val()+")</a>");
           $.each(tds, function() {
             $('.rowedit' + countitems).val($(this).text().trim());
             countitems++;
           });
           $('#editmodel').modal('show');
         });
      </script>
      <script>
            document.addEventListener('DOMContentLoaded', e => {
            $('.input-datalist').autocomplete()
            }, false);

      </script>
   </body>
</html>