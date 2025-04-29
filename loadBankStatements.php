<?php header('Content-Type: text/html; charset=utf-8'); 

require_once("db.php");

if(isset($_POST['id'])){
    // echo "<pre>";
    // print_r($_POST);die;
    $array = implode("','",$_POST['id']);
     $query = "select *,(select sum(rechnungenpayment.amount) from rechnungenpayment where rechnungenpayment.rowid=rechnungen.id) as collectedAmount from rechnungen WHERE  rechnungen.rechnung_nummer IN ('".$array."') order by id desc";
$records = mysqli_query($conn, $query);
$rowcount=mysqli_num_rows($records);
if($rowcount!=0){

    ?>
<table class="statement">
                  <thead>
                     <tr>
                        <th><span>Invoice No.</span></th>
                        <th><span>Date</span></th>
                        <th><span>Transaction Type</span></th>
                        <th><span>Deposit</span></th>
                        <th><span>Credit</span></th>
                        <th><span>Balance</span></th>
                     </tr>
                  </thead>
                  <tbody>
                  <?php 
                 mysqli_set_charset($conn,'utf8');
                 $balanceamount=0;
                 $x=1;
                 while ($row = mysqli_fetch_assoc($records)) {
                    $totalcollected = $row['collectedAmount'];
                    $removeeuro=str_replace("€","",$row['betrag_brutto']);
                    $balanceamount+= $removeeuro;
                    $offenamount=$removeeuro - $totalcollected;
                    $betrag_brutto= formatPrice($removeeuro);
                    $Bezahlt= formatPrice($totalcollected);
                    $Offen= formatPrice($offenamount);
                    ?>
                     <tr>
                        <td><span><?=$row['rechnung_nummer'];?></span></td>
                        <td><span><?=$row['rechnung_datum'];?></span></td>
                        <td><span>Credit</span></td>
                        <td><span></span></td>
                        <td class="pr"><span><?=$removeeuro;?></span></td>
                        <td class="pr"><span><?=$balanceamount;?></span></td>
                     </tr>
                     <?php 
                           $Querypayment = "select * from rechnungenpayment WHERE rowid= ".$row['id']."  ORDER BY `id` DESC";
                           $Recordspayment = mysqli_query($conn, $Querypayment);
                           // if($x){
                           //    mysqli_set_charset($conn,'utf8');
                           // }
                           mysqli_set_charset($conn,'utf8');

                           $y=1;
                           while ($rowpayment = mysqli_fetch_assoc($Recordspayment)) {
                              $balanceamount=trim($balanceamount)- trim($rowpayment['amount']);
                              ?>
                                    <tr>
                                    <td><span><?=$rowpayment['invoiceid'];?></span></td>
                                    <td><span><?=date('d.m.Y',strtotime($rowpayment['dateofpayment']));?></span></td>
                                    <td><span><?=$rowpayment['method'];?></span></td>
                                    <td class="pr"><span><?=$rowpayment['amount'];?></span></td>
                                    <td><span></span></td>
                                    <td class="pr"><span><?=$balanceamount;?></span></td>
                                    </tr>
                              <?php
                           }
                           $x++;
                  } ?>
                    
                     <!-- <tr>
                        <th colspan="5"><span><strong>Balance</strong></span></th>
                        <th><span><strong>353</strong></span></th>
                     </tr> -->
                  </tbody>
               </table>
               <div class="panel panel-default text-center">
                  <table class="table-fixed">
                     <thead>
                        <tr>
                        <!-- <td><span></span></td>
                        <td><span></span></td> -->
                        <th colspan="5" class="pr"><span ><strong>Balance</strong></span></th>
                        <!-- <td><span></span></td>
                        <td><span></span></td> -->
                        <th class="pr"><span><strong><?=$balanceamount;?></strong></span></th>
                     </tr>
                     </thead>
                  </table>
                  <div class="panel-body">
                  <?php 
                           $querytemplates = "select * from templates where type=1 ORDER BY `id` DESC";
                           $templatesql = mysqli_query($conn, $querytemplates);
                           // if($x){
                           //    mysqli_set_charset($conn,'utf8');
                           // }
                           mysqli_set_charset($conn,'utf8');

                           $u=1;
                           while ($rwotemplatesql = mysqli_fetch_assoc($templatesql)) {
                              ?>
                                   <a class="btn btn-black" onclick="downloadPDF('<?=$rwotemplatesql['id'];?>')" data-rel="<?=$rwotemplatesql['id'];?>" href="javascript:void(0)" ><i class="fas fa-file-pdf" ></i><?=$u;?>. <?=$rwotemplatesql['name'];?></a>
                              <?php
                           
                           $u++;
                  } ?>
                 
                     <!-- <a class="btn btn-black" onclick="downloadPDF('download')" href="javascript:void(0)" ><i class="fas fa-file-pdf" ></i> Download Pdf</a>
                     <a class="btn btn-success" onclick="downloadPDF('whatsapp')" href="javascript:void(0)" ><i class="fab fa-whatsapp"></i> Send Whatsapp</a>
                     <a class="btn btn-warning" href="javascript:void(0)"  ><i class="fa fa-envelope"></i> Send E-mail</a> -->
                  </div>
               </div>

               <?php }
            } ?>