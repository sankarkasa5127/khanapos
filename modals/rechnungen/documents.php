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
   <tbody>
      <form method="post" action="javascript:void(0);" id="uploadfiles">
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