<?php
// require_once("db.php");
if(isset($_GET['from']) && isset($_GET['to'])){
    $countbarPayment = "SELECT SUM(ein_rechnungenpayment.amount) as totalamount FROM ein_rechnungenpayment JOIN Ein_rechnungen ON Ein_rechnungen.id=ein_rechnungenpayment.rowid WHERE CAST(CONCAT(SUBSTRING(Ein_rechnungen.rechnung_datum, 7, 4), '-', SUBSTRING(Ein_rechnungen.rechnung_datum, 4, 2), '-', SUBSTRING(Ein_rechnungen.rechnung_datum, 1, 2)) AS DATE) BETWEEN '".$_GET['from']."' AND '".$_GET['to']."' and ein_rechnungenpayment.method='Bar'";
    $subBankpayment = "SELECT SUM(ein_rechnungenpayment.amount) as totalamountbank FROM ein_rechnungenpayment JOIN Ein_rechnungen ON Ein_rechnungen.id=ein_rechnungenpayment.rowid WHERE CAST(CONCAT(SUBSTRING(Ein_rechnungen.rechnung_datum, 7, 4), '-', SUBSTRING(Ein_rechnungen.rechnung_datum, 4, 2), '-', SUBSTRING(Ein_rechnungen.rechnung_datum, 1, 2)) AS DATE) BETWEEN '".$_GET['from']."' AND '".$_GET['to']."' and ein_rechnungenpayment.method!='Bar'";
    $queryRevenue="SELECT sum(`betrag_brutto`) as revenue FROM `Ein_rechnungen` WHERE CAST(CONCAT(SUBSTRING(rechnung_datum, 7, 4), '-', SUBSTRING(rechnung_datum, 4, 2), '-', SUBSTRING(rechnung_datum, 1, 2)) AS DATE) BETWEEN '".$_GET['from']."' AND '".$_GET['to']."'";

}else{
    $countbarPayment = "SELECT SUM(ein_rechnungenpayment.amount) as totalamount FROM ein_rechnungenpayment JOIN Ein_rechnungen ON Ein_rechnungen.id=ein_rechnungenpayment.rowid WHERE  ein_rechnungenpayment.method='Bar'";
    $subBankpayment = "SELECT SUM(ein_rechnungenpayment.amount) as totalamountbank FROM ein_rechnungenpayment JOIN Ein_rechnungen ON Ein_rechnungen.id=ein_rechnungenpayment.rowid WHERE  ein_rechnungenpayment.method!='Bar'";
    $queryRevenue="SELECT sum(`betrag_brutto`) as revenue FROM `Ein_rechnungen`";

}
$sumBar = mysqli_query($conn, $countbarPayment);
$recordsBar = mysqli_fetch_assoc($sumBar);
$sunBank = mysqli_query($conn, $subBankpayment);
$recordssummBank = mysqli_fetch_assoc($sunBank);
$revenue = mysqli_query($conn, $queryRevenue);
$totalrevenue = mysqli_fetch_assoc($revenue);
$fmt = numfmt_create( 'de_DE', NumberFormatter::CURRENCY );
$totalBk=0;$totalbar=0;$totalrev=0;
if(!empty($recordsBar['totalamount'])){
    $totalbar=$recordsBar['totalamount'];
    $totalBaramount= numfmt_format_currency($fmt, $recordsBar['totalamount'], "EUR")."\n";
}else{
    $totalBaramount= numfmt_format_currency($fmt, 0, "EUR")."\n";
}

if(!empty($recordssummBank['totalamountbank'])){
    $totalBk=$recordssummBank['totalamountbank'];
    $totalBankAmount= numfmt_format_currency($fmt, $recordssummBank['totalamountbank'], "EUR")."\n";
}else{
    $totalBankAmount= numfmt_format_currency($fmt, 0, "EUR")."\n";
}
if(!empty($totalrevenue['revenue'])){
    $totalrev=$totalrevenue['revenue'];
    $totalrevenueAmount= numfmt_format_currency($fmt, $totalrevenue['revenue'], "EUR")."\n";
}else{
    $totalrevenueAmount= numfmt_format_currency($fmt, 0, "EUR")."\n";
}
$totalCollectionAmount=$totalbar + $totalBk;
$totalOffenAmount=$totalrev - $totalCollectionAmount;
$numOffenTotal=numfmt_format_currency($fmt, $totalOffenAmount, "EUR")."\n";



  