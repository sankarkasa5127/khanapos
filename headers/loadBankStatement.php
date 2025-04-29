<div class="col-lg-3 col-md-3">
                     <div class="price-box">
                        <i class="fas fa-inbox icon1"></i>
                        <div class="contant-box">
                           <h3 class="main-title">Umsatz</h3>

                           <?php 
                           $fmt = numfmt_create( 'de_DE', NumberFormatter::CURRENCY );
                           if(isset($_GET['from']) && isset($_GET['to'])){
                               $bankquery = "SELECT SUM(bankstatement.einzahlungen) as einzahlungen,SUM(bankstatement.auszahlungen) as auszahlungen FROM bankstatement WHERE CAST(CONCAT(SUBSTRING(bankstatement.Buchungsdatum, 7, 4), '-', SUBSTRING(bankstatement.Buchungsdatum, 4, 2), '-', SUBSTRING(bankstatement.Buchungsdatum, 1, 2)) AS DATE) BETWEEN '".$_GET['from']."' AND '".$_GET['to']."'";
                                $queryLastEntry = "SELECT * FROM bankstatement WHERE CAST(CONCAT(SUBSTRING(bankstatement.Buchungsdatum, 7, 4), '-', SUBSTRING(bankstatement.Buchungsdatum, 4, 2), '-', SUBSTRING(bankstatement.Buchungsdatum, 1, 2)) AS DATE) BETWEEN '".$_GET['from']."' AND '".$_GET['to']."' Order by id desc LIMIT 1";
                               $queryFirstEntry = "SELECT * FROM bankstatement WHERE CAST(CONCAT(SUBSTRING(bankstatement.Buchungsdatum, 7, 4), '-', SUBSTRING(bankstatement.Buchungsdatum, 4, 2), '-', SUBSTRING(bankstatement.Buchungsdatum, 1, 2)) AS DATE) BETWEEN '".$_GET['from']."' AND '".$_GET['to']."'  LIMIT 1";
                            
                           }else{
                              $bankquery = "SELECT SUM(bankstatement.einzahlungen) as einzahlungen,SUM(bankstatement.auszahlungen) as auszahlungen FROM bankstatement";
                              $queryLastEntry = "SELECT * FROM bankstatement Order by id desc LIMIT 1";
                              $queryFirstEntry = "SELECT * FROM bankstatement  LIMIT 1";
                           }

                           $sumQueryrecord = mysqli_query($conn, $bankquery);
                           $recordQuery = mysqli_fetch_assoc($sumQueryrecord);
                           $saldolastenry = mysqli_query($conn, $queryLastEntry);
                           $saldoRecord = mysqli_fetch_assoc($saldolastenry);
                           $saldofristentry = mysqli_query($conn, $queryFirstEntry);
                           $saldofirstentryRow = mysqli_fetch_assoc($saldofristentry);
                           // echo "<pre>";
                           // print_r($saldoRecord);die; 
                        $totaleinzahlungen=0;
                        $totalauszahlungen=0;
                           if(!empty($recordQuery['einzahlungen'])){
                              $totaleinzahlungen=$recordQuery['einzahlungen'];
                              $einzahlungen= numfmt_format_currency($fmt, $recordQuery['einzahlungen'], "EUR")."\n";
                          }else{
                              $einzahlungen= numfmt_format_currency($fmt, 0, "EUR")."\n";
                          }
                          if(!empty($recordQuery['auszahlungen'])){
                           $totalauszahlungen=$recordQuery['auszahlungen'];
                           $auszahlungen= numfmt_format_currency($fmt, $recordQuery['auszahlungen'], "EUR")."\n";
                       }else{
                           $auszahlungen= numfmt_format_currency($fmt, 0, "EUR")."\n";
                       }
                       if(isset($saldoRecord)){

                       }
                       $saldofirst= str_replace(",",".",$saldofirstentryRow['Saldo_davor']);
                       $saldo=$totaleinzahlungen - $totalauszahlungen;
$totaltransaction=$totaleinzahlungen + $totalauszahlungen;

    ?>
                           <p class="tprice"><?php echo numfmt_format_currency($fmt, $totaltransaction, "EUR")."\n";?></i></p>
                        </div>
                     </div>
                  </div> 
                  <div class="col-lg-3 col-md-3">
                     <div class="price-box">
                        <i class="fas fa-university icon1"></i>
                        <div class="contant-box">
                           <h3 class="main-title">Einzahlungen</h3>
                           <p class="tprice"><?php echo $einzahlungen;?></p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-3">
                     <div class="price-box">
                        <i class="fas fa-money-bill icon1"></i>
                        <div class="contant-box">
                           <h3 class="main-title">Auszahlungen</h3>
                           <p class="tprice">-<?php echo $auszahlungen;?></p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-3">
                     <div class="price-box">
                        <i class="far fa-credit-card icon1"></i>
                        <div class="contant-box">
                           <h3 class="main-title">Saldo</h3>
                           <p class="tprice"><?php echo $saldoRecord['Saldodanach'];?> €</p>
                        </div>
                     </div>
                  </div>