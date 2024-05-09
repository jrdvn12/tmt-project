<?php
// Check if the receiptData key exists in the $_POST array
if(isset($_GET['receiptData'])) {
    // Decode the JSON data to PHP array
    $receiptData = json_decode($_GET['receiptData'], true);

    // Now you can access the data in $receiptData array
    // Example usage:
    function generateRow($receiptData){
        $contents = '';

        // Loop through the array and access each item
        foreach($receiptData as $item) {
            $contents .= 
            '<tr>
                <td align="center">'. $item['code'] . '</td>
                <td align="center">'. $item['price'] .' </td>
                <td align="center">'. $item['quantity'] . '</td>
            </tr>';
        }
        
        return $contents;
    }

    require_once('../tcpdf/tcpdf.php');  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle('SALES INVOICE TMT FOODS');  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 7);  
    $pdf->AddPage();  
	$image = '<img src="../images/TMTFOOD.png" alt="Company Logo" width="100">';
	//<td align="right">'.$image.'</td>
    $content = '';  
    $content .= '
	
    <table border="0" cellpadding="0" cellspacing="0">
        <tr>
			
            <td align="left">
                Room EF-002 4th Flr., Sitio Grande Bldg.<br>
                409 A. Soriano Ave. Zone 69, Brgy. 656<br>
                1002 Intramuros NCR, City of Manila, 1st District, Philippines<br>
                Contact Nos.: (632) 8524-5664/(63) 917-7077978<br>
                VAT Reg. TIN: 776-902-581-00000
            </td>
            <td align="left">
            <h4 align="center">SALES INVOICE<br>No. 0001</h4>
            </td>
        </tr>
    </table>

    <p>Sold to: _____________________________________________<span style="padding-right:10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Date: _________________________________</p>

    <p>Address: _____________________________________________ D.R No.: _____________________________</p>
    <p>       : _____________________________________________ P.O./S.O. No.: _____________________________</p>
    <p>TIN No.: __________________ Business Style: ________________________ Terms: ___________________</p>
    <table border="0" cellspacing="0" cellpadding="3">  
        <tr>  
            <th width="5%"  align="center"><b>Code</b></th>
            <th width="60%"  align="center"><b>Price</b></th>
            <th width="8%"  align="center"><b>Quantity</b></th>
        </tr>
    ';  
    $content .= generateRow($receiptData);  
    $content .= '</table>';  
    $pdf->writeHTML($content);  
    $pdf->Output('TMT.pdf', 'I');
} else {
    // Handle case when receiptData key is not present in $_POST array
    echo "Error: No receipt data received.";
}
?>
