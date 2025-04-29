<?php 
require_once('TCPDF-main/tcpdf.php');

//============================================================+
// File name   : example_051.php
// Begin       : 2009-04-16
// Last Update : 2013-05-14
//
// Description : Example 051 for TCPDF class
//               Full page background
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Full page background
 * @author Nicola Asuni
 * @since 2009-04-16
 */

// Include the main TCPDF library (search for installation path).



// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
    //Page header
    public function Header() {
        // get the current page break margin
        $bMargin = $this->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $this->AutoPageBreak;
        // disable auto-page-break
        $this->SetAutoPageBreak(false, 0);
        // set bacground image
        $img_file = 'Telekom_Rechnung.png';
        $this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
        // restore auto-page-break status
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        $this->setPageMark();
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 051');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP-15, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(0);

// remove default footer
$pdf->setPrintFooter(false);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM-15);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);



// ---------------------------------------------------------


// add a page
$pdf->AddPage();

// Print a text
$html = '<!DOCTYPE html>
<html>
  <head>
    <title>KASA</title>
  </head>
  <body style="width: 195mm;height: 100%;margin: 0 auto;padding: 0;font-size: 12px;">
    <div style="width: 195mm; height:100%;margin: 0 auto;padding:50px 20px 0;">
      <div style="text-align: right;">
        <p style="line-height: 22px;">den, 04.12.2023</p>
      </div>
      <div style="text-align:left;">
        <p>Sehr geehrte Damen und Herren,</p>
      </div>
      <div style="line-height: 22px;">
        <p>trotz mehrfacher Mahnungen blieben die nachfolgenden Rechnungen offen.<br>
           Der Gesamtbetrag an unbezahlten, l&auml;ngst f&auml;lligen Rechnungen in H&ouml;he<br>
           von <strong>0 &euro;</strong> zzgl. Mahnkosten i.H. von 30,00 &euro; setzt sich wie folgt zusammen:</p>
      </div>
      <table cellspacing="0" cellpadding="0" width="100%" style="border-top:1px solid #000; border-bottom:1px solid #000; text-align: left;font-size: 12px; padding:10px;">
        <thead style="background-color: #cdcdcd;">
        <tr>
            <th style="padding:3px 8px; text-align: center;font-weight:bold;">Invoice No.</th>
            <th style="padding:3px 8px; text-align: center;font-weight:bold;">Date</th>
            <th style="padding:3px 8px; text-align: center;font-weight:bold;">Transaction Type</th>
            <th style="padding:3px 8px; text-align: right;font-weight:bold;" >Deposit</th>
            <th style="padding:3px 8px; text-align: right;font-weight:bold;" >Credit</th>
            <th style="padding:3px 8px; text-align: right;font-weight:bold;">Balance</th>
         </tr>
        </thead>

        <tbody style="background-color: #cdcdcd;">
        <tr>
           <td style="border-top:1px solid #000;padding:3px 8px; text-align: center;background-color: #cdcdcd;">2015-0402</td>
           <td style="border-top:1px solid #000;padding:3px 8px; text-align: center;background-color: #cdcdcd;">03.04.2015</td>
           <td style="border-top:1px solid #000;padding:3px 8px; text-align: center;background-color: #cdcdcd;">Credit</td>
           <td style="border-top:1px solid #000;padding:3px 8px; text-align: right;background-color: #cdcdcd;">0 €</td>
           <td class="pr" style="border-top:1px solid #000;padding:3px 8px; text-align: right;background-color: #cdcdcd;">154.7 €</td>
           <td class="pr" style="border-top:1px solid #000;padding:3px 8px; text-align: right;background-color: #cdcdcd;">154.7 €</td>
        </tr>
        <tr>
           <td style="border-top:1px solid #000;padding:3px 8px; text-align: center;background-color: #cdcdcd;">2015-0402</td>
           <td style="border-top:1px solid #000;padding:3px 8px; text-align: center;background-color: #cdcdcd;">14.04.2015</td>
           <td style="border-top:1px solid #000;padding:3px 8px; text-align: center;background-color: #cdcdcd;">Banküberweisung</td>
           <td class="pr" style="border-top:1px solid #000;padding:3px 8px; text-align: right;background-color: #cdcdcd;">154.7 €</td>
           <td style="border-top:1px solid #000;padding:3px 8px; text-align: right;background-color: #cdcdcd;">0 €</td>
           <td class="pr" style="border-top:1px solid #000;padding:3px 8px; text-align: right;background-color: #cdcdcd;">0 €</td>
        </tr>
        <tr>
           <td style="border-top:1px solid #000;padding:3px 8px; text-align: center;background-color: #cdcdcd;">2015-0118</td>
           <td style="border-top:1px solid #000;padding:3px 8px; text-align: center;background-color: #cdcdcd;">26.01.2015</td>
           <td style="border-top:1px solid #000;padding:3px 8px; text-align: center;background-color: #cdcdcd;">Credit</td>
           <td style="border-top:1px solid #000;padding:3px 8px; text-align: right;background-color: #cdcdcd;">0 €</td>
           <td class="pr" style="border-top:1px solid #000;padding:3px 8px; text-align: right;background-color: #cdcdcd;">89.25 €</td>
           <td class="pr" style="border-top:1px solid #000;padding:3px 8px; text-align: right;background-color: #cdcdcd;">89.25 €</td>
        </tr>
        <tr>
           <td style="border-top:1px solid #000;padding:3px 8px; text-align: center;background-color: #cdcdcd;">2015-0118</td>
           <td style="border-top:1px solid #000;padding:3px 8px; text-align: center;background-color: #cdcdcd;">19.02.2015</td>
           <td style="border-top:1px solid #000;padding:3px 8px; text-align: center;background-color: #cdcdcd;">Banküberweisung</td>
           <td class="pr" style="border-top:1px solid #000;padding:3px 8px; text-align: right;background-color: #cdcdcd;">89.25 €</td>
           <td style="border-top:1px solid #000;padding:3px 8px; text-align: right;background-color: #cdcdcd;">0 €</td>
           <td class="pr" style="border-top:1px solid #000;padding:3px 8px; text-align: right;background-color: #cdcdcd;">0 €</td>
        </tr>
        <tr>
           <td style="border-top:1px solid #000;padding:3px 8px; text-align: center;background-color: #cdcdcd;">2015-0117</td>
           <td style="border-top:1px solid #000;padding:3px 8px; text-align: center;background-color: #cdcdcd;">25.01.2015</td>
           <td style="border-top:1px solid #000;padding:3px 8px; text-align: center;background-color: #cdcdcd;">Credit</td>
           <td style="border-top:1px solid #000;padding:3px 8px; text-align: right;background-color: #cdcdcd;">0 €</td>
           <td class="pr" style="border-top:1px solid #000;padding:3px 8px; text-align: right;background-color: #cdcdcd;">499.8 €</td>
           <td class="pr" style="border-top:1px solid #000;padding:3px 8px; text-align: right;background-color: #cdcdcd;">499.8 €</td>
        </tr>
        <tr>
           <td style="border-top:1px solid #000;padding:3px 8px; text-align: center;background-color: #cdcdcd;">2015-0111</td>
           <td style="border-top:1px solid #000;padding:3px 8px; text-align: center;background-color: #cdcdcd;">25.01.2015</td>
           <td style="border-top:1px solid #000;padding:3px 8px; text-align: center;background-color: #cdcdcd;">Credit</td>
           <td style="border-top:1px solid #000;padding:3px 8px; text-align: right;background-color: #cdcdcd;">0 €</td>
           <td class="pr" style="border-top:1px solid #000;padding:3px 8px; text-align: right;background-color: #cdcdcd;">238 €</td>
           <td class="pr" style="border-top:1px solid #000;padding:3px 8px; text-align: right;background-color: #cdcdcd;">737.8 €</td>
        </tr>
        <tr>
           <td style="border-top:1px solid #000;padding:3px 8px; text-align: center;background-color: #cdcdcd;">2015-0111</td>
           <td style="border-top:1px solid #000;padding:3px 8px; text-align: center;background-color: #cdcdcd;">25.01.2015</td>
           <td style="border-top:1px solid #000;padding:3px 8px; text-align: center;background-color: #cdcdcd;">Banküberweisung</td>
           <td style="border-top:1px solid #000;padding:3px 8px; text-align: right;background-color: #cdcdcd;">499.8 €</td>
           <td class="pr" style="border-top:1px solid #000;padding:3px 8px; text-align: right;background-color: #cdcdcd;">0 €</td>
           <td class="pr" style="border-top:1px solid #000;padding:3px 8px; text-align: right;background-color: #cdcdcd;">238 €</td>
        </tr>
        <tr>
           <td style="border-top:1px solid #000;padding:3px 8px; text-align: center;background-color: #cdcdcd;">2015-0402</td>
           <td style="border-top:1px solid #000;padding:3px 8px; text-align: center;background-color: #cdcdcd;">03.04.2015</td>
           <td style="border-top:1px solid #000;padding:3px 8px; text-align: center;background-color: #cdcdcd;">Credit</td>
           <td style="border-top:1px solid #000;padding:3px 8px; text-align: right;background-color: #cdcdcd;">0 €</td>
           <td class="pr" style="border-top:1px solid #000;padding:3px 8px; text-align: right;background-color: #cdcdcd;">154.7 €</td>
           <td class="pr" style="border-top:1px solid #000;padding:3px 8px; text-align: right;background-color: #cdcdcd;">154.7 €</td>
        </tr>
        <tr>
           <td style="border-top:1px solid #000;padding:3px 8px; text-align: center;background-color: #cdcdcd;">2015-0402</td>
           <td style="border-top:1px solid #000;padding:3px 8px; text-align: center;background-color: #cdcdcd;">14.04.2015</td>
           <td style="border-top:1px solid #000;padding:3px 8px; text-align: center;background-color: #cdcdcd;">Banküberweisung</td>
           <td style="border-top:1px solid #000;padding:3px 8px; text-align: right;background-color: #cdcdcd;">154.7 €</td>
           <td class="pr" style="border-top:1px solid #000;padding:3px 8px; text-align: right;background-color: #cdcdcd;">0 €</td>
           <td class="pr" style="border-top:1px solid #000;padding:3px 8px; text-align: right;background-color: #cdcdcd;">0 €</td>
        </tr>
        </tbody>
      </table>
      <div>
        <p>Bitte helfen Sie uns, den letzten Schritt &ndash; ein Inkassoverfahren gegen Sie einzuleiten &ndash; zu vermeiden, und &uuml;berweisen Sie den f&auml;lligen Betrag innerhalb der n&auml;chsten 5 Tage.<br><br>Beachten Sie, dass bei weiterem Verzug zus&auml;tzliche Mahngeb&uuml;hren und Verzugszinsen f&auml;llig werden.</p>
        <p><br>Bei nicht fristgerechter Zahlung werden die gesamte Forderung und alle weiteren Rechnungen sofort f&auml;llig. Mit diesem Schreiben stellen wir bis zum Kontoausgleich alle weiteren Lieferungen und Leistungen ein.<br><br>Bei eventuellen R&uuml;ckfragen erreichen Sie uns unter 069-95649624 <em>oder</em> <strong>info@khana.de</strong><br><br>Sofern sich Ihre Zahlung mit diesem Schreiben &uuml;berschnitten hat, betrachten Sie diese Email bitte als gegenstandslos.</p>
        <p style="margin-bottom: 0;">Mit freundlichen Gr&uuml;&szlig;en</p>
        <p style="margin:0;"><strong>i. A. Gurpreet Mielke</strong></p>
        <p>Finanz Buchhaltung</p>
      </div>
    </div>
  </body>
</html>';
$pdf->writeHTML($html, true, false, true, false, '');




// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_051.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+