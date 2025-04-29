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
   <tbody>
      <form method="post" action="javascript:void(0);" id="collectpayment">
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