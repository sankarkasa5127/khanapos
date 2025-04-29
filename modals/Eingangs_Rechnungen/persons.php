<table class="table table-bordered table-hover">
   <thead>
     <tr>
       <th class="text-center"> # </th>
       <th class="text-center"> Name </th>
       <th class="text-center"> Role </th>
       <th class="text-center"> Date </th>
       <th class="text-center"> Action </th>
     </tr>
   </thead>
   <tbody id="personsAppends">
   <tbody>
 </table>
 <table class="table table-bordered table-hover">
   <tbody>
     <form method="post" action="javascript:void(0);" id="personsform">
       <tr id='itemaddr0'>
         <td>
           <input type="hidden" name="invoiceid" class="roweditid" value="" />
         <td>
           <select class="form-select form-select-lg" name="personsName" required>
             <option value="">Select Person ....</option> <?php
                                                        $personprint="";
                                                         $personnum = mysqli_num_rows($personsRecords);
                                                         if($personnum>0){
                                                            while ($personrow = mysqli_fetch_assoc($personsRecords)) {
                                                                  echo "
									<option value='".$personrow['id']."'>".$personrow['name']."</option>";
                                                                  $personprint.="
									<option value='".$personrow['id']."'>".$personrow['name']."</option>";
                                                            }
                                                         }
                                                        
                                                         ?>
           </select>
         </td>
         </td>
         <td>
           <select class="form-select form-select-lg" name="personRole" required>
             <option value="">Select Role ..</option> <?php
                                                        
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
           <input type="date" name='persondate' id="persondate" data-date="" class="datepicker form-control" data-date-format="DD.m.YYYY" value="
								<?php echo date('Y-m-d');?>" />
         </td>
         <td>
           <button class=" btn btn-primary" type="submit">Add Persons</button>
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