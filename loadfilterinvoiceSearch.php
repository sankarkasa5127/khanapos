<?php
require_once("db.php");

if(isset($_POST['kundenNr'])){
$query = "select *,(select sum(rechnungenpayment.amount) from rechnungenpayment where rechnungenpayment.rowid=rechnungen.id) as collectedAmount from rechnungen WHERE  rechnungen.kunden_nr='".$_POST['kundenNr']."' order by id desc";
$records = mysqli_query($conn, $query);
$rowcount=mysqli_num_rows($records);
if($rowcount!=0){
?>
<table class="inventory">
                  <thead>
                     <tr>
                        <th><span>Invoice No.</span></th>
                        <th><span>Kunden Nr.</span></th>
                        <th><span>Date</span></th>
                        <th><span>Name</span></th>
                        <th><span>Betrag</span></th>
                        <th><span>Paid</span></th>
                        <th><span>Offen</span></th>
                        <th><span>Action</span></th>
                     </tr>
                  </thead>
                  <tbody>
               <form action="pdfHtmlPreview.php"  id="postpreviewPdf" method="post" >
                 <?php 
                 mysqli_set_charset($conn,'utf8');
                 while ($row = mysqli_fetch_assoc($records)) {
                        $totalcollected = $row['collectedAmount'];
                    $removeeuro=str_replace("€","",$row['betrag_brutto']);
                    $offenamount=$removeeuro - $totalcollected;
                     $betrag_brutto= formatPrice($removeeuro);
                     $Bezahlt= formatPrice($totalcollected);
                     $Offen= formatPrice($offenamount);
                    ?>
                     <tr>
                        <td><span><?=$row['rechnung_nummer'];?></span></td>
                        <td><span><?=$row['kunden_nr'];?></span></td>
                        <td><span><?=$row['rechnung_datum'];?></span></td>
                        <td><span><?=mb_strimwidth($row['kunden_name'], 0, 50, '...');?></span></td>
                        <td><span><?=$betrag_brutto." &euro;";?></span></td>
                        <td><span><?=$Bezahlt." &euro;";?></span></td>
                        <td><span><?=$Offen." &euro;";?></span></td>
                        <td><span>
                           <div class="form-group">
                              <div class="checkbox">
                                <label><input type="checkbox" name="invoiceids" class="checkedInvoice" onclick="loadInvoiceStatement('<?php echo $row['rechnung_nummer']?>')" value="<?php echo $row['rechnung_nummer']?>" ></label>
                              </div>
                             
                           </div>
                        </span></td>
                     </tr>
                     <?php }?>
                     <!-- <tr>
                        <td><span>2023-2021</span></td>
                        <td><span>27-11-2023</span></td>
                        <td><span>Hayna Kasse</span></td>
                        <td><span>595</span></td>
                        <td><span>0</span></td>
                        <td><span>595</span></td>
                        <td><span>
                           <div class="form-group">
                              <div class="checkbox">
                                <label><input type="checkbox" value="">Option 1</label>
                              </div>
                              <div class="checkbox">
                                <label><input type="checkbox" value="">Option 2</label>
                              </div> 
                           </div>
                        </span></td>
                     </tr> -->
                 </form>
                  </tbody>
               </table>

<?php 
}else{
    echo "No invoice generated yet.";
}
}else{
echo "Unauthorized.";
} ?>