<?php include('include/header.php');?>
            <div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 main">
            <?php  if(in_array( "purchase" ,$arraypermission )) { ?>
               <div class="table-responsive">
                  <div class="top-frame">
                     <div class="sel1" >
                     <a href="index.php" class="button" >All</a>
                     </div>
                     <div class="sel1" id="tyear">
                        <label> 
                           <select name="year" id="yearsel" class="">
                           <option value="">Year</option>
                           <option value="2024">2024</option>
                              <?php 
                           for ($x = 1; $x <= 8; $x++) {
                               $prevYear = date('Y', strtotime('-'.$x.' year'));
                               echo "<option value='".$prevYear."'>".$prevYear."</option>";
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
                           <th>Vender Nr.</th>
                           <th>Purchase Descrition</th>
                           <th>Status</th>
                           <th>Place Date</th>
                           <th>Due Date</th>
                           <th>Brutto</th>
                           <th>Paid</th>
                           <th>Offen</th>
                           <th>Action</th>
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
                              <li style="display:none;">
                                 <a data-toggle="tab" href="#menu1">Payments</a>
                              </li>
                            
                              <li style="display:none;">
                                 <a data-toggle="tab" href="#menu2"> Documents </a>
                              </li>
                              <li >
                                 <a data-toggle="tab" href="#menu3"> Items Receiving  </a>
                              </li>
                              <li style="display:none;">
                                 <a data-toggle="tab" href="#menu4"> Persons </a>
                              </li>
                              <li style="display:none;">
                                 <a data-toggle="tab" href="#menu5"> Contacts </a>
                              </li>
                              <li style="display:none;" >
                                 <a data-toggle="tab" href="#menu6"> Status </a>
                              </li>
                              <li style="display:none;" >
                                 <a data-toggle="tab" href="#menu7"> Invoice  Type</a> 
                              </li>
                              <li style="display:none;" >
                                 <a data-toggle="tab" href="#menu8">Versand</a> 
                              </li>
                             
                              
                           </ul>
                           <div class="tab-content">
                              <div id="home" class="tab-pane fade in active">
                                 
                                 <form id="editForm" action="javascript:;" enctype="multipart/form-data">
                                    <input type="hidden" name="id" class="roweditid" value="" />
                                    <div class="form-row">
                           <div class="form-group col-md-12">
                              <label for="recipient-name-nuksaan" class="col-form-label">Purchase description :</label>
                              <textarea class="form-control "  name="purchaseDescription" id="purchaseDescription"></textarea>
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="form-group col-md-6">
                              <label for="recipient-name" class="col-form-label">Rechnung Nummer:</label>
                              <input type="text" class="form-control " id="invoiceId" value="" name="invoiceId"  required/>
                           </div>
                           <div class="form-group col-md-6">
                              <label for="recipient-name" class="col-form-label">Vender:</label>
                              <select class="form-select" id="supplierNo" name="supplierNo" required >
                                <option value="">Select Vender....</option>
                                <?php
                                                        
      $numSupplieredit = mysqli_num_rows($supplier_details);
      $addvender='';
      if($numSupplieredit>0){
         while ($supplierRowedit = mysqli_fetch_assoc($supplier_details)) {
               echo "<option value='".$supplierRowedit['id']."'>".$supplierRowedit['supplier_name']."</option>";
              $addvender.= "<option value='".$supplierRowedit['id']."'>".$supplierRowedit['supplier_name']."</option>";
         }
      }
                                                       
                                                        ?>
                                                        </select>
                              <!--input type="text" class="form-control " id="kunden_nr" name="kunden_nr"-->
                           </div>
                           
                        
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Purchase  Amount :</label>
                              <input type="text" class="form-control " id="purchasedAmount" name="purchasedAmount" value="">
                           </div>
                           <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Paid :</label>
                              <input type="text" class="form-control " id="paid" name="paid" value="" readonly >
                           </div>
                           <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Offen :</label>
                              <input type="text" class="form-control " id="balanceAmount" name="balanceAmount" value="" readonly>
                           </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Rechnung Datum:</label>
                              <input type="date" data-date="" class="datepicker form-control" data-date-format="DD.m.YYYY" value="<?php echo date('Y-m-d');?>" id="orderDate" name="orderDate" style="width: 100%" required >
                           </div>
                           <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">fällig am:</label>
                              <input type="date" data-date="" class="datepicker form-control" data-date-format="DD.m.YYYY" value="<?php echo date('Y-m-d');?>" id="dueDate" name="dueDate" style="width: 100%" required >
                           </div>
                      
                           <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Order Status:</label>
                              <select class="form-select " id="status" name="status">
                                 <option value="order placed">order placed</option>
                                 <option value="dispatched">Dispatched</option>
                                 <option value="received">received</option>
                              </select>
                           </div>
                          
                          
                        </div>
                        
                        <button type="submit" class="btn btn-primary" id="addNewRecord">Save </button>
                                       <img id="editformloader" src="https://i.gifer.com/origin/b4/b4d657e7ef262b88eb5f7ac021edda87.gif" style="
    width: 50px;
    height: 34px;
    display:none;
">
                                 </form>
                                 </div>
                                 <div id="menu1" class="tab-pane fade">
                                
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
                                                Amount
                                                </th>
                                                <th class="text-center">
                                                Payment Method
                                                </th>
                                                <th class="text-center">
                                                  Action
                                                </th>
                                                </tr>
                                            </thead>
                                            <tbody id="appendpayment">
                                                    
                                                    <tbody>
                                     </table>
                                          <table class="table table-bordered table-hover" id="tab_logic">
                                           
                                            <tbody><form method="post" action="javascript:void(0);" id="collectpayment">
                                                    <tr id='addr0'>
                                                    
                                                    <td>
                                                    <input type="hidden" name="invoiceid" class="roweditid" value="" />
                                                    <input type="date" name='date' data-date="" class="datepicker form-control" data-date-format="DD.m.YYYY" value="<?php echo date('Y-m-d');?>"/>
                                                    </td>
                                                    <td>
   

<div class="input-group">	
<input type="text" name='amount' value="" placeholder='10,00' class="form-control"/>
<span class="input-group-addon"><i class="fa fa-euro"></i></span>
</div>


                                                    </td>
                                                    <td>
                                                            <select class="form-select form-select-lg" name="method">
                                                                    <option value="Unbekannt">Unbekannt</option>
                                                                    <option value="Bank&uuml;berweisung">Bank&uuml;berweisung</option>
                                                                    <option value="Bar">Bar</option>
                                                                    <option value="Lastschrift">Lastschrift</option>
                                                            </select>
                                                    </td>
                                                    <td>
                                                        <button  class=" btn btn-primary" type="submit">Add Payment</button>
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
                                 <div id="menu2" class="tab-pane fade">
                                    
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
                                            <tbody id="filesappend">
                                                    
                                                    <tbody>
                                     </table>

                                     <table class="table table-bordered table-hover" >
                                           
                                           <tbody><form method="post" action="javascript:void(0);" id="uploadfiles">
                                                   <tr id='addr0'>
                                                   
                                                   <td style="width:41%;">
                                                   <input type="hidden" name="invoiceid" class="roweditid" value="" />
                                                   <input type="file" name='uploadpdf' id="fileupload" value="" placeholder='Upload files .....' class="form-control"/>
                                                   </td>
                                                   <td>
                                                   <textarea name='description' id="desciption"  placeholder='Description' class="form-control" style="height: 34px;"></textarea>
                                                   </td>
                                                  
                                                   <td>
                                                       <button  class=" btn btn-primary" type="submit">Upload File</button>
                                                       <img id="addfilesloader" src="https://i.gifer.com/origin/b4/b4d657e7ef262b88eb5f7ac021edda87.gif" style="
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
                                 <div id="menu3" class="tab-pane fade">
                                    
                                    <table class="table table-bordered table-hover">
                                    <thead>
                                                <tr>
                                                <th class="text-center">
                                                #
                                                </th>
                                                <th class="text-center">
                                                   Type
                                                </th>
                                                <th class="text-center">
                                                  Item Name
                                                </th>
                                               
                                                <th class="text-center">
                                                  Price
                                                </th>
                                                <th class="text-center">
                                                Serial Number
                                                </th> 
                                                <th class="text-center">
                                                BarCode Number
                                                </th>
                                                <th class="text-center">
                                                 Date
                                                </th>
                                                <th class="text-center">
                                                 Action
                                                </th>
                                                </tr>
                                            </thead>
                                            <tbody id="itemsAppends">
                                                    
                                                    <tbody>
                                     </table>

                                     <table class="table table-bordered table-hover" >
                                           
                                           <tbody><form method="post" action="javascript:void(0);" id="itemsform">
                                                   <tr id='itemaddr0'>
                                                   
                                                  
                                                   <td>
                                                   <input type="hidden" name="rowId" class="roweditid" value="" />
                                                      <select class="form-select form-select-lg " id="itemType" name="typeid" required>
                                                      <option value=""> Select Type ...</option>
                                                         <?php
                                                     
                                                         $numrowtype = mysqli_num_rows($itemTypeRecords);
                                                         if($numrowtype>0){
                                                            while ($rowType = mysqli_fetch_assoc($itemTypeRecords)) {
                                                                  echo "<option value='".$rowType['id']."'>".$rowType['typeName']."</option>";
                                                            }
                                                         }
                                                        
                                                         ?>
                                                               
                                                      </select>
                                                   </td>
                                                   <td>
                                                  
                                                      <select class="form-select form-select-lg" id="itemsname" name="itemid" style=" width: 93%;" required>
                                                      <option value=""> Select item..</option>
                                                               
                                                      </select>
                                                      <i  style="display:none;" class="fa fa-info-circle tool-tip "></i>

                                                   </td>
                                                  
                                                  <td style="width: 95px;">
                                                  
                                                  <input type="text" name='price' id="itemPrice" value="" placeholder='Price' class="form-control" required/>
                                                  </td>
                                                  <td style="width: 157px;">
                                                  
                                                  
                                                   <input type="text" name='serialNumber' id="serialNumber" value="" placeholder='Serial Number' class="form-control" required/>
                                                   </td>
                                                   <td style="width: 157px;">
                                                  
                                                  
                                                  <input type="text" name='barcodeNumber' id="barcode" value="" placeholder='BarCode Number' class="form-control" required/>
                                                  </td>
                                                   <td style="width: 136px;">
                                                  
                                                   <input type="date" name='date' style="width: 111px;" id="itemdate" data-date="" class="datepicker form-control" data-date-format="DD.m.YYYY" value="<?php echo date('Y-m-d');?>"/>
                                                   </td>
                                                   <td>
                                                       <button  class=" btn btn-primary" type="submit"><i class="fa-solid fa-plus"></i></button>
                                                       <img id="additemsLoaders" src="https://i.gifer.com/origin/b4/b4d657e7ef262b88eb5f7ac021edda87.gif" style="
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
                                 <div id="menu5" class="tab-pane fade">
                                    
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
                                            <tbody id="contactApeend">
                                                    
                                                    <tbody>
                                     </table>

                                     <table class="table table-bordered table-hover" >
                                           
                                           <tbody><form method="post" action="javascript:void(0);" id="contactform">
                                                   <tr id='addr0'>
                                                   
                                                   <td >
                                                   <input type="hidden" name="invoiceid" class="roweditid" value="" />
                                                   <input type="date" name='contactdate' id="contactdate" data-date="" class="datepicker form-control" data-date-format="DD.m.YYYY" value="<?php echo date('Y-m-d');?>"/>
                                                   </td>
                                                   <td>
                                                   <input type="text" name='contactname' id="contactname"  placeholder='Name ..' class="form-control" />
                                                   </td>
                                                   <td>
                                                   <input type="text" name='contactNumber' id="contactNumber"  placeholder='Phone Number ..' class="form-control" />
                                                   </td>
                                                   <td>
                                                   <input type="text" name='contactNote' id="contactNote"  placeholder='Note ..' class="form-control" />
                                                   </td>
                                                  
                                                   <td>
                                                       <button  class=" btn btn-primary" type="submit">Add Contact</button>
                                                       <img id="addContactLoader" src="https://i.gifer.com/origin/b4/b4d657e7ef262b88eb5f7ac021edda87.gif" style="
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
                                    
                                    <table class="table table-bordered table-hover">
                                   
                                     <table class="table table-bordered table-hover" >
                                           
                                           <tbody><form method="post" action="javascript:void(0);" id="statusInvoice">
                                                   <tr id='addr0'>
                                                   
                                                   <td >
                                                   <input type="hidden" name="invoiceid" class="roweditid" value="" />
                                                   <label for="Payment" class="col-form-label" style="padding-top: 0.8rem;">Payment:</label>
                                                   </td>
                                                   <td>

                                                      <input type="radio" name="paymentStatus" value="0"> <img  class="shapesImg" src="img/Harvey/g0.png" required />
                                                      <input type="radio" name="paymentStatus" value="1">  <img class="shapesImg" src="img/Harvey/g25.png"/>
                                                      <input type="radio" name="paymentStatus" value="2"> <img  class="shapesImg"src="img/Harvey/g50.png"/>
                                                      <input type="radio" name="paymentStatus" value="3"> <img  class="shapesImg" src="img/Harvey/g75.png"/>
                                                      <input type="radio" name="paymentStatus" value="4"> <img  class="shapesImg" src="img/Harvey/g100.png"/>

 
                                                   </td>
                                                   </tr>
                                                   <tr id='addr0'>
                                                   
                                                   <td >
                                                   
                                                   <label for="install" class="col-form-label" style="padding-top: 0.8rem;">Installation:</label>
                                                   </td>
                                                   <td>

                                                      <input type="radio" name="install" value="0"> <img  class="shapesImg" src="img/Harvey/y0.png" required />
                                                      <input type="radio" name="install" value="1">  <img class="shapesImg" src="img/Harvey/y25.png"/>
                                                      <input type="radio" name="install" value="2"> <img  class="shapesImg"src="img/Harvey/y50.png"/>
                                                      <input type="radio" name="install" value="3"> <img  class="shapesImg" src="img/Harvey/y75.png"/>
                                                      <input type="radio" name="install" value="4"> <img  class="shapesImg" src="img/Harvey/y100.png"/>

 
                                                   </td>
                                                      </tr>
                                                      <tr id='addr0'>
                                                   
                                                   <td >
                                                   
                                                   <label for="install" class="col-form-label" style="padding-top: 0.8rem;">Service:</label>
                                                   </td>
                                                   <td>

                                                      <input type="radio" name="services" value="0"> <img  class="shapesImg" src="img/Harvey/r0.png" required/>
                                                      <input type="radio" name="services" value="1">  <img class="shapesImg" src="img/Harvey/r25.png"/>
                                                      <input type="radio" name="services" value="2"> <img  class="shapesImg"src="img/Harvey/r50.png"/>
                                                      <input type="radio" name="services" value="3"> <img  class="shapesImg" src="img/Harvey/r75.png"/>
                                                      <input type="radio" name="services" value="4"> <img  class="shapesImg" src="img/Harvey/r100.png"/>

 
                                                   </td>
                                                      </tr>
                                                      <tr>
                                                            <td colspan="2" class="text-center">
                                                       <button  class=" btn btn-primary" type="submit">Save</button>
                                                       <img id="statusLoader" src="https://i.gifer.com/origin/b4/b4d657e7ef262b88eb5f7ac021edda87.gif" style="
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
                                 <div id="menu7" class="tab-pane fade">
                                    
                                    <table class="table table-bordered table-hover">
                                   
                                     <table class="table table-bordered table-hover" >
                                           
                                           <tbody><form method="post" action="javascript:void(0);" id="invoiceType">
                                                 
                                                            
                                                   <tr><td>  <input type="hidden"  name="invoiceid" class="roweditid" value="" /><input type="checkbox" name="invoiceType[]" value="One time">One time</td></tr>
                                                   <tr><td> <input type="checkbox"   name="invoiceType[]" id="duration"value="Duration"> Duration
                                              <div style="display:none;" id="div01" > Start Date <input type="date" name="durationstart" id="durationstart" data-date="" class="datepicker form-control" data-date-format="DD.m.YYYY" value="<?php echo date('Y-m-d');?>"/> Expire Date <input type="date" name="expireDate" id="expireDate" data-date="" class="datepicker form-control" data-date-format="DD.m.YYYY" value="<?php echo date('Y-m-d');?>"/>
                                              </div></td>
                                                </tr>
                                                   <tr><td>  <input type="checkbox" class="form-check-input" name="invoiceType[]" value="Kasse"> Kasse</td></tr>
                                                   <tr><td>   <input type="checkbox" class="form-check-input"  name="invoiceType[]" value="Wartung"> Wartung</td></tr>
                                                   <tr><td>   <input type="checkbox" class="form-check-input" name="invoiceType[]" value="Miete"> Miete</td></tr>
                                                   <tr><td>   <input type="checkbox" class="form-check-input" name="invoiceType[]" value="Hardware"> Hardware
                                                </td></tr>
                                                   <tr><td>   <input type="checkbox" class="form-check-input" name="invoiceType[]" value="Support"> Support</td>
                                                </tr>

 
                                                  
                                                  
                                                     
                                                      <tr>
                                                            <td  class="text-center">
                                                       <button  class=" btn btn-primary" type="submit">Save</button>
                                                       <img id="invoiceTypeLoader" src="https://i.gifer.com/origin/b4/b4d657e7ef262b88eb5f7ac021edda87.gif" style="
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
                                 <div id="menu8" class="tab-pane fade">
                                
                                    <table class="table table-bordered table-hover">
                                    <thead>
                                                <tr>
                                                <th class="text-center">
                                                #
                                                </th>
                                               
                                                <th class="text-center">
                                                Description
                                                </th>
                                                <th class="text-center">
                                                Method
                                                </th>
                                                <th class="text-center">
                                                Date
                                                </th>
                                                <th class="text-center">
                                                  Action
                                                </th>
                                                </tr>
                                            </thead>
                                            <tbody id="appendVersand">
                                                    
                                                    <tbody>
                                     </table>
                                          <table class="table table-bordered table-hover" id="tab_logic">
                                           
                                            <tbody><form method="post" action="javascript:void(0);" id="formVersand">
                                                    <tr id='addr0'>
                                                    <td>
                                                    <input type="text" name='description' value="" placeholder='Description...' class="form-control"/>
                                                    </td>
                                                    <td>
                                                            <select class="form-select form-select-lg" name="method">
                                                                    <option value="Post">Post</option>
                                                                    <option value="E-mail">E-mail</option>
                                                                    <option value="By Hand">by Hand</option>
                                                                    <option value="Whatsapp">Whatsapp</option>
                                                                    <option value="DHL">DHL</option>
                                                                    <option value="Anwalt">Anwalt</option>
                                                                    <option value="Gericht">Gericht</option>
                                                            </select>
                                                    </td>
                                                    <td>
                                                    <input type="hidden" name="invoiceid" class="roweditid" value="" />
                                                    <input type="date" name='date' placeholder='Date' data-date="" class="datepicker form-control" data-date-format="DD.m.YYYY" value="<?php echo date('Y-m-d');?>"/>
                                                    </td>
                                                    
                                                    
                                                    <td>
                                                        <button  class=" btn btn-primary" type="submit">Add Versand</button>
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
                              <input type="text" class="form-control" id="restaurant_id" name="restaurant_id">
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
                     <form id="addForm" action="addPurchase.php" method="POST">
                     <div class="form-row">
                           <div class="form-group col-md-12">
                              <label for="recipient-name-nuksaan" class="col-form-label">Purchase description :</label>
                              <textarea class="form-control "  name="purchaseDescription"></textarea>
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="form-group col-md-6">
                              <label for="recipient-name" class="col-form-label">Rechnung Nummer:</label>
                              <input type="text" class="form-control " id="rechnung_nummer" value="" name="invoiceId"  required/>
                           </div>
                           <div class="form-group col-md-6">
                              <label for="recipient-name" class="col-form-label">Vender:</label>
                              <select class="form-select" name="supplierNo" required >
                                <option value="">Select Vender....</option>
                                <?php
                            echo $addvender;
   
                                                        ?>
                                                        </select>
                              <!--input type="text" class="form-control " id="kunden_nr" name="kunden_nr"-->
                           </div>
                           
                        
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Purchase  Amount :</label>
                              <input type="text" class="form-control " id="purchasedAmount" name="purchasedAmount" value="">
                           </div>
                           <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Paid :</label>
                              <input type="text" class="form-control " id="paid" name="paid" value="" readonly >
                           </div>
                           <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Offen :</label>
                              <input type="text" class="form-control " id="balanceAmount" name="balanceAmount" value="" readonly>
                           </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Rechnung Datum:</label>
                              <input type="date" data-date="" class="datepicker form-control" data-date-format="DD.m.YYYY" value="<?php echo date('Y-m-d');?>" id="orderDate" name="orderDate" style="width: 100%" required >
                           </div>
                           <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">fällig am:</label>
                              <input type="date" data-date="" class="datepicker form-control" data-date-format="DD.m.YYYY" value="<?php echo date('Y-m-d');?>" id="dueDate" name="dueDate" style="width: 100%" required >
                           </div>
                      
                           <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Order Status:</label>
                              <select class="form-select " id="orderplaced" name="status">
                                 <option value="order placed">order placed</option>
                                 <option value="dispatched">Dispatched</option>
                                 <option value="received">received</option>
                              </select>
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
      
      // $("#filterStartdate").attr('value',currentYear);
      $("#filterStartdate").val(currentYear+"-"+startDate);

      // $("#filterEndDate").attr('value',endDate+"/"+currentYear);
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
          var realInvoiceid=$("#invoiceId").val();
            $('#itemsform').append('<input type="hidden" name="venderInvoiceid" value="'+realInvoiceid+'" />');
            $("#additemsLoaders").show();
          $.ajax({
            type: 'post',
            url: 'recevieItem.php',
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
                     location.reload();
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
         $('#editForm').validate({
           rules: {
            invoiceId: {
               required: true,
             },
             supplierNo: {
               required: true,
             },
             purchasedAmount: {
                required: true,
             },
             orderDate: {
               required: true,
             },
             dueDate: {
               required: true,
             },
             status: {
               required: true,
             },
           },
           submitHandler: function(form) {
             var form_data = new FormData(document.getElementById("editForm"));
             $('#editformloader').show();
             $.ajax({
               url: 'updatePurchase.php',
               cache: false,
               contentType: false,
               processData: false,
               type: "POST",
               data: form_data,
               success: function(response) {
                  $('#editformloader').hide();
                 alert(response);
                 location.reload();
               }
             });
           }
         });
         $('#addForm').validate({
           rules: {
            invoiceId: {
               required: true,
             },
             supplierNo: {
               required: true,
             },
             purchasedAmount: {
                required: true,
             },
             orderDate: {
               required: true,
             },
             dueDate: {
               required: true,
             },
             status: {
               required: true,
             },
           },
           submitHandler: function(form) {
             //$('#addNewRecord').prop('disabled', true);
             var form_data = new FormData(document.getElementById("addForm"));
             $.ajax({
               url: form.action,
               cache: false,
               contentType: false,
               processData: false,
               type: "POST",
               data: form_data,
               success: function(response) {
                 alert(response);
                location.reload();
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
         $(document).ready(function() {
           
            $('#itemsname').on('change', function() {
            
               var itemsname=$(this);
               if(itemsname.val()!=''){
                  var itemPrice= itemsname.find(':selected').attr('data-price');
                  $('#itemPrice').val(itemPrice);
               var description= itemsname.find(':selected').attr('data-description');
               if(description!=''){
                  $(".tool-tip").show();
                  $(".tool-tip").attr('title-new',description);
               }
               }else{
                  $('#itemPrice').val("");
                  $(".tool-tip").hide();
                  $(".tool-tip").attr('title-new',"");
               }
               
              
            });
            $('#itemType').on('change', function() {
               $(".tool-tip").hide();
               $('#itemPrice').val("");
               $('#itemsname').empty().append('<option selected="selected" value="">Select Item..</option>');
               var thisdate=$(this);
               var typeid=thisdate.val();
               var vender= thisdate.find(':selected').attr('data-vender');
               $.ajax({
               url:"getItems.php",
               type:'POST', 
               dataType: "json",
               data: {'vender':vender,'type':typeid},
               success: function(response) {
                // alert(response);
                 $('#itemsname').append(response.itemList);
                 //location.reload();
               
               }
             });
//   alert( this.value );
});
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
             'pageLength': 1000,
             "aaSorting": [
               [0, "desc"]
             ],
             'ajax': {
            
                  'url': 'ajexpurchase.php' 
           
               
             },
             'columns': [{
               data: 'invoiceId'
             }, {
               data: 'supplierNo'
             }, {
               data: 'purchaseDescription'
             },
             {
               data: 'status',
               className: 'text-center'
             }, 
             {
               data: 'orderDate',
             }, 
             {
               data: 'dueDate',
               className: 'text-center'
             },
             {
               data: 'purchasedAmount',
               className: 'text-right'
             },
             {
               data: 'paid',
               className: 'text-right'
             },
             {
               data: 'balanceAmount',
               className: 'text-right'
             },
             {
               data: 'action',
               className: 'rowedit'
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
         function viewPurchase(rowid) {
            $(".tool-tip").hide();
            $('#itemPrice').val("");
            $('#itemType').empty().append('<option selected="selected" value="">Select Type..</option>');
            $('#itemsname').empty().append('<option selected="selected" value="">Select Item..</option>');
           var  invoiceid= rowid;
           $.ajax({
               url: 'viewPurchase.php',
               type: "POST",
               dataType: "json",
               data: {'rowId': invoiceid},
               success: function(response) {
                  $(".roweditid").val(response.purchase.id);
               $("#invoiceId").val(response.purchase.invoiceId);
               $("#purchaseDescription").val(response.purchase.purchaseDescription);
               $("#purchasedAmount").val(response.purchase.purchasedAmount);
               $("#orderDate").val(response.purchase.orderDateSearch);
               $("#orderDate").attr('data-date',response.purchase.orderDate);
               $("#dueDate").val(response.purchase.dueDateSearch);
               $("#dueDate").attr('data-date',response.purchase.dueDate);
               $("#status option").filter(function() {
                  return $(this).val() === response.purchase.status;
               }).prop("selected", true);
               $("#supplierNo option").filter(function() {
                  return $(this).val() === response.purchase.supplierNo;
               }).prop("selected", true);
               if(response.typeList !=''){
                  $.each(response.typeList , function(index, typevalue) { 
                     console.log(index, typevalue)
                     $('#itemType').append('<option data-vender="'+typevalue.venderid+'" value="'+typevalue.id+'">'+typevalue.typeName+'</option>');
                  });
               }
                  $('#itemsAppends').html(response.itemsrec);

                
                 
               }
             });
           $('#editmodel').modal('show');
         }
      </script>
 
 
   </body>
</html>