<?php
require_once("../../db.php");
   $selPermission="select * FROM permissions WHERE roleid=".$_POST['id'];
  $permissionsquery = mysqli_query($conn, $selPermission);
  $rowPermission = mysqli_fetch_assoc($permissionsquery);
    if(!empty($rowPermission)){
        $arraypermission = explode(',',$rowPermission['permissions']);
    }else{
        $arraypermission=array();
    }


?>
<div class="form-group col-md-6">
<label for="recipient-name" class="col-form-label">Rechnungen :</label>
</div>
<div class="form-group col-md-6">
<input class='input-switch' type="checkbox" name="rechnungen[]" value="rechnungen" id="Rechnungendemo" <?php  if(in_array( "rechnungen" ,$arraypermission )) { echo "checked"; }?> />
<label class="label-switch" for="Rechnungendemo"></label>
<span class="info-text"></span>

</div>


<div class="form-group col-md-6">
<label for="recipient-name" class="col-form-label">EinRechnungen :</label>
</div>
<div class="form-group col-md-6">

<input class='input-switch' type="checkbox" name="rechnungen[]" value="Eingangs_Rechnungen" id="EinRechnungendemo" <?php  if(in_array( "Eingangs_Rechnungen" ,$arraypermission )) { echo "checked"; }?> />
<label class="label-switch" for="EinRechnungendemo"></label>
<span class="info-text"></span>
</div>
<div class="form-group col-md-6">
<label for="recipient-name" class="col-form-label">  Kassenbuch :</label>
</div>
<div class="form-group col-md-6">
<input class='input-switch' type="checkbox" name="rechnungen[]" value="kassenbuch"  id="Kassenbuch1" <?php  if(in_array( "kassenbuch" ,$arraypermission )) { echo "checked"; }?> />
<label class="label-switch" for="Kassenbuch1"></label>
<span class="info-text"></span>
</div>
<div class="form-group col-md-6">
<label for="recipient-name" class="col-form-label"> Kunden :</label>
</div>
<div class="form-group col-md-6">
<input class='input-switch' type="checkbox" name="rechnungen[]" value="kunden"  id="Kunden1" <?php  if(in_array( "kunden" ,$arraypermission )) { echo "checked"; }?> />
<label class="label-switch" for="Kunden1"></label>
<span class="info-text"></span>
</div>
<div class="form-group col-md-6">
<label for="recipient-name" class="col-form-label"> Personal :</label>
</div>
<div class="form-group col-md-6">
<input class='input-switch' type="checkbox" name="rechnungen[]" value="Personal"  id="Personal" <?php  if(in_array( "Personal" ,$arraypermission )) { echo "checked"; }?>  />
<label class="label-switch" for="Personal"></label>
<span class="info-text"></span>
</div>
<div class="form-group col-md-6">
<label for="recipient-name" class="col-form-label"> Persons :</label>
</div>
<div class="form-group col-md-6">
<input class='input-switch' type="checkbox" name="rechnungen[]" value="persons"  id="Persons1" <?php  if(in_array( "persons" ,$arraypermission )) { echo "checked"; }?>  />
<label class="label-switch" for="Persons1"></label>
<span class="info-text"></span>
</div>
<div class="form-group col-md-6">
<label for="recipient-name" class="col-form-label"> Contacts :</label>
</div>
<div class="form-group col-md-6">
<input class='input-switch' type="checkbox" name="rechnungen[]" value="contacts" id="Contacts1" <?php  if(in_array( "contacts" ,$arraypermission )) { echo "checked"; }?>  />
<label class="label-switch" for="Contacts1"></label>
<span class="info-text"></span>
  
</div>
<div class="form-group col-md-6">
<label for="recipient-name" class="col-form-label"> Todo :</label>
</div>
<div class="form-group col-md-6">
<input class='input-switch' type="checkbox" name="rechnungen[]" value="todo"  id="Todo1" <?php  if(in_array( "todo" ,$arraypermission )) { echo "checked"; }?> />
<label class="label-switch" for="Todo1"></label>
<span class="info-text"></span>
  
</div>
<div class="form-group col-md-6">
<label for="recipient-name" class="col-form-label"> Vender :</label>
</div>
<div class="form-group col-md-6">
<input class='input-switch' type="checkbox" name="rechnungen[]" value="venders"  id="Vender1" <?php  if(in_array( "venders" ,$arraypermission )) { echo "checked"; }?>  />
<label class="label-switch" for="Vender1"></label>
<span class="info-text"></span>
</div>
<div class="form-group col-md-6">
<label for="recipient-name" class="col-form-label"> Type :</label>
</div>
<div class="form-group col-md-6">
<input class='input-switch' type="checkbox" name="rechnungen[]" value="types"  id="Type1" <?php  if(in_array( "types" ,$arraypermission )) { echo "checked"; }?> />
<label class="label-switch" for="Type1"></label>
<span class="info-text"></span>
</div>
<div class="form-group col-md-6">
<label for="recipient-name" class="col-form-label">  Bank Statement :</label>
</div>
<div class="form-group col-md-6">

<input class='input-switch' type="checkbox" name="rechnungen[]" value="bankstatement"  id="Statement1" <?php  if(in_array( "bankstatement" ,$arraypermission )) { echo "checked"; }?>  />
<label class="label-switch" for="Statement1"></label>
<span class="info-text"></span>
</div>
<div class="form-group col-md-6">
<label for="recipient-name" class="col-form-label">  Filter Statement :</label>
</div>
<div class="form-group col-md-6">

<input class='input-switch' type="checkbox" name="rechnungen[]" value="search"  id="search23" <?php  if(in_array( "search" ,$arraypermission )) { echo "checked"; }?>  />
<label class="label-switch" for="search23"></label>
<span class="info-text"></span>
</div>
<div class="form-group col-md-6">
<label for="recipient-name" class="col-form-label"> Items :</label>
</div>
<div class="form-group col-md-6">
<input class='input-switch' type="checkbox" name="rechnungen[]" value="items"  id="Items1" <?php  if(in_array( "items" ,$arraypermission )) { echo "checked"; }?>  />
<label class="label-switch" for="Items1"></label>
<span class="info-text"></span>
</div>
<div class="form-group col-md-6">
<label for="recipient-name" class="col-form-label">Purchase :</label>
</div>
<div class="form-group col-md-6">
<input class='input-switch' type="checkbox" name="rechnungen[]" value="purchase"  id="Purchase1" <?php  if(in_array( "purchase" ,$arraypermission )) { echo "checked"; }?>  />
<label class="label-switch" for="Purchase1"></label>
<span class="info-text"></span>
</div>
<div class="form-group col-md-6">
<label for="recipient-name" class="col-form-label">Kassen Protokoll:</label>
</div>
<div class="form-group col-md-6">
<input class='input-switch' type="checkbox" name="rechnungen[]" value="Kassen_protokoll" id="Protokoll1" <?php  if(in_array( "Kassen_protokoll" ,$arraypermission )) { echo "checked"; }?>  />
<label class="label-switch" for="Protokoll1"></label>
<span class="info-text"></span>
</div>
<div class="form-group col-md-6">
<label for="recipient-name" class="col-form-label">Kassen Installtion:</label>
</div>
<div class="form-group col-md-6">
<input class='input-switch' type="checkbox" name="rechnungen[]" value="Kasse_Installation" id="Installtion1" <?php  if(in_array( "Kasse_Installation" ,$arraypermission )) { echo "checked"; }?>  />
<label class="label-switch" for="Installtion1"></label>
<span class="info-text"></span>
</div>
<div class="form-group col-md-6">
<label for="recipient-name" class="col-form-label">Roles:</label>
</div>
<div class="form-group col-md-6">
<input class='input-switch' type="checkbox" name="rechnungen[]" value="roles" id="roles1" <?php  if(in_array( "roles" ,$arraypermission )) { echo "checked"; }?>  />
<label class="label-switch" for="roles1"></label>
<span class="info-text"></span>
</div>
<div class="form-group col-md-6">
<label for="recipient-name" class="col-form-label">Templates:</label>
</div>
<div class="form-group col-md-6">
<input class='input-switch' type="checkbox" name="rechnungen[]" value="roles" id="templates1" <?php  if(in_array( "roles" ,$arraypermission )) { echo "checked"; }?>  />
<label class="label-switch" for="templates1"></label>
<span class="info-text"></span>
</div>
<div class="form-group col-md-6">
<label for="recipient-name" class="col-form-label">Payments Types:</label>
</div>
<div class="form-group col-md-6">
<input class='input-switch' type="checkbox" name="rechnungen[]" value="paymentTypes" id="templates432" <?php  if(in_array( "paymentTypes" ,$arraypermission )) { echo "checked"; }?>  />
<label class="label-switch" for="templates432"></label>
<span class="info-text"></span>
</div>
<div class="form-group col-md-6">
<label for="recipient-name" class="col-form-label">Business Types:</label>
</div>
<div class="form-group col-md-6">
<input class='input-switch' type="checkbox" name="rechnungen[]" value="businessType" id="templates4324" <?php  if(in_array( "businessType" ,$arraypermission )) { echo "checked"; }?>  />
<label class="label-switch" for="templates4324"></label>
<span class="info-text"></span>
</div>

