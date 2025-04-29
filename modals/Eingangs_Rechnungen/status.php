<table class="table table-bordered table-hover">
    <table class="table table-bordered table-hover">
      <tbody>
        <form method="post" action="javascript:void(0);" id="statusInvoice">
          <tr id='addr0'>
            <td>
              <input type="hidden" name="invoiceid" class="roweditid" value="" />
              <label for="Payment" class="col-form-label" style="padding-top: 0.8rem;">Payment:</label>
            </td>
            <td>
              <input type="radio" name="paymentStatus" value="0">
              <img class="shapesImg" src="img/Harvey/g0.png" required />
              <input type="radio" name="paymentStatus" value="1">
              <img class="shapesImg" src="img/Harvey/g25.png" />
              <input type="radio" name="paymentStatus" value="2">
              <img class="shapesImg" src="img/Harvey/g50.png" />
              <input type="radio" name="paymentStatus" value="3">
              <img class="shapesImg" src="img/Harvey/g75.png" />
              <input type="radio" name="paymentStatus" value="4">
              <img class="shapesImg" src="img/Harvey/g100.png" />
            </td>
          </tr>
          <tr id='addr0'>
            <td>
              <label for="install" class="col-form-label" style="padding-top: 0.8rem;">Installation:</label>
            </td>
            <td>
              <input type="radio" name="install" value="0">
              <img class="shapesImg" src="img/Harvey/y0.png" required />
              <input type="radio" name="install" value="1">
              <img class="shapesImg" src="img/Harvey/y25.png" />
              <input type="radio" name="install" value="2">
              <img class="shapesImg" src="img/Harvey/y50.png" />
              <input type="radio" name="install" value="3">
              <img class="shapesImg" src="img/Harvey/y75.png" />
              <input type="radio" name="install" value="4">
              <img class="shapesImg" src="img/Harvey/y100.png" />
            </td>
          </tr>
          <tr id='addr0'>
            <td>
              <label for="install" class="col-form-label" style="padding-top: 0.8rem;">Service:</label>
            </td>
            <td>
              <input type="radio" name="services" value="0">
              <img class="shapesImg" src="img/Harvey/r0.png" required />
              <input type="radio" name="services" value="1">
              <img class="shapesImg" src="img/Harvey/r25.png" />
              <input type="radio" name="services" value="2">
              <img class="shapesImg" src="img/Harvey/r50.png" />
              <input type="radio" name="services" value="3">
              <img class="shapesImg" src="img/Harvey/r75.png" />
              <input type="radio" name="services" value="4">
              <img class="shapesImg" src="img/Harvey/r100.png" />
            </td>
          </tr>
          <tr>
            <td colspan="2" class="text-center">
              <button class=" btn btn-primary" type="submit">Save</button>
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