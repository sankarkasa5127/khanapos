<table class="table table-bordered table-hover">
  <table class="table table-bordered table-hover">
    <tbody>
      <form method="post" action="javascript:void(0);" id="invoiceType">
        <tr>
          <td>
            <input type="hidden" name="invoiceid" class="roweditid" value="" />
            <input type="checkbox" name="invoiceType[]" value="One time">One time
          </td>
          <td>
            <input type="checkbox" name="invoiceType[]" id="duration" value="Duration"> Duration <div style="display:none;" id="div01"> Start Date <input type="date" name="durationstart" id="durationstart" data-date="" class="datepicker form-control" data-date-format="DD.m.YYYY" value="
										<?php echo date('Y-m-d');?>" /> Expire Date <input type="date" name="expireDate" id="expireDate" data-date="" class="datepicker form-control" data-date-format="DD.m.YYYY" value="
											<?php echo date('Y-m-d');?>" />
            </div>
          </td>
          <td>
            <input type="checkbox" class="form-check-input" name="invoiceType[]" value="Kasse"> Kasse
          </td>
        </tr>
     
        <tr>
          <td>
            <input type="checkbox" class="form-check-input" name="invoiceType[]" value="Wartung"> Wartung
          </td>
          <td>
            <input type="checkbox" class="form-check-input" name="invoiceType[]" value="Miete"> Miete
          </td>
          <td>
            <input type="checkbox" class="form-check-input" name="invoiceType[]" value="Hardware"> Hardware
          </td>
        </tr>
       
        <tr>
          <td colspan="3">
            <input type="checkbox" class="form-check-input" name="invoiceType[]" value="Support"> Support
          </td>
        </tr>
        <tr>
          <td class="text-left" colspan="3">
            <button class=" btn btn-primary" type="submit">Save</button>
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
  