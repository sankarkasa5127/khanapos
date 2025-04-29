<table class="table table-bordered table-hover">
                                    <thead>
                                                <tr>
                                                <th class="text-center">
                                                #
                                                </th>
                                                <th class="text-center">
                                                    Descriptions
                                                </th>
                                               
                                                <th class="text-center">
                                                    Anydesk id.
                                                </th>
                                                <th class="text-center">
                                                    Date
                                                </th>
                                                <th class="text-center">
                                                    Status
                                                </th>
                                                <th class="text-center">
                                                  Action
                                                </th>
                                                </tr>
                                            </thead>
                                            <tbody id="anydeskApeend">
                                                    
                                                    <tbody>
                                     </table>

                                     <table class="table table-bordered table-hover" >
                                           
                                           <tbody><form method="post" action="javascript:void(0);" id="anydeskForm">
                                                   <tr id='addr0'>
                                                   <td>
                                                   <input type="text" name='anydeskDescriptions' id="anydeskDescriptions"  placeholder='Descriptions ..' class="form-control" />
                                                   </td>
                                                   <td>
                                                   <input type="text" name='anydeskid' id="anydeskid"  placeholder='anydesk id ..' class="form-control" />
                                                   </td>
                                                   <td >
                                                   <input type="hidden" name="invoiceid" class="roweditid" value="" />
                                                   <input type="date" name='anydeskdate' id="anydeskdate" data-date="" class="datepicker form-control" data-date-format="DD.m.YYYY" value="<?php echo date('Y-m-d');?>"/>
                                                   </td>
                                                   
                                                 
                                                   <td>
           <select class="form-select form-select-lg" name="anydeskStatus" required>
             <option value="">Select Status ....</option> 
             <option value="1">Active ....</option> 
             <option value="0">Deactive ....</option> 
           </select>
         </td>
                                                  
                                                   <td>
                                                       <button  class=" btn btn-primary" type="submit">Add Anydesk</button>
                                                       <img id="anydeskLoader" src="https://i.gifer.com/origin/b4/b4d657e7ef262b88eb5f7ac021edda87.gif" style="
   width: 50px;
   height: 34px;
   display:none;
">
                                                            
                                                   </td>
                                                   </tr>
       </form>
                                           </tbody>
                                         </table>