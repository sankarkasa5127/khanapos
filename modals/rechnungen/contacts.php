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