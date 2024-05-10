<?php
include 'includes/session.php';
// Check if the receiptData key exists in the $_POST array
if(isset($_GET['receiptData'])) {
    // Decode the JSON data to PHP array
    $receiptData = json_decode($_GET['receiptData'], true);
    $selectedVendor = json_decode($_GET['selectedVendor'], true);
    
    $date = date("F d, Y");
   /*Employee Table Search For Vendor ID*/
   $sqlv = "SELECT * FROM vendor WHERE id = '$selectedVendor'";
   $queryv = $conn->query($sqlv);
   $rowv = $queryv->fetch_assoc();
   $company_name = $rowv['company_name'];
   $vendor_address = $rowv['vendor_address'] .' '. $rowv['city'].' '. $rowv['province'].' '. $rowv['zip_code'].' '. $rowv['country'];
    
    // Now you can access the data in $receiptData array
    // Example usage:
    function generateRow($receiptData){
        $contents = '';

        // Loop through the array and access each item
        foreach($receiptData as $item) {
            $contents .= 
            '<tr>
                <td border="1" align="center">'. $item['quantity'] . '</td>
                <td border="1" align="center">'. $item['code'] . '</td>
                <td border="1" align="center">'. $item['description'] .' </td>
                <td border="1" align="center">'. $item['price'] .' </td>
                <td border="1" align="center">'. $item['total_amount'] .' </td>
                
            </tr>';

          



        }
        $contents .=
        '<tr>
            <td border="1" align="center"></td>
            <td border="1" align="center"></td>
            <td border="1" align="right"></td>
            <td border="1" align="center"></td>
            <td border="1" align="center"> </td>
            
        </tr>';
        $selectedAmount = json_decode($_GET['selectedAmount'], true);
        $contents .=
        '<tr>
            <td border="1" align="center"></td>
            <td border="1" align="center"></td>
            <td border="1" align="right">TOTAL</td>
            <td border="1" align="center">'.number_format($selectedAmount, 2).'</td>
            <td border="1" align="center"> </td>
            
        </tr>';
        $selectedPayment = json_decode($_GET['selectedPayment'], true);
        $contents .=
        '<tr>
            <td border="1" align="center"></td>
            <td border="1" align="center"></td>
            <td border="1" align="right">PAYMENT</td>
            <td border="1" align="center">'.number_format($selectedPayment, 2).'</td>
            <td border="1" align="center"> </td>
            
        </tr>';
        $selectedChange = json_decode($_GET['selectedChange'], true);
        $contents .=
        '<tr>
            <td border="1" align="center"></td>
            <td border="1" align="center"></td>
            <td border="1" align="right">CHANGE</td>
            <td border="1" align="center">' . number_format($selectedChange, 2). '</td>
            <td border="1" align="center"> </td>
            
        </tr>';
        
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
	<style>
    		.right-border {
        	border-right: 1px solid black;
			
    		}

			.bottom-border {
				
				border-bottom: 1px solid black;
				}
			
	</style>

    <table border="0" cellspacing="0" cellpadding="3">  
        <tr>
       
            <th border="0" colspan="1" rowspan="3" align="center">LOGO</th>
            <th border="0" colspan="2" rowspan="3" align="left">
                Room EF-002 4th Flr., Sitio Grande Bldg.<br>
                409 A. Soriano Ave. Zone 69, Brgy. 656<br>
                1002 Intramuros NCR, City of Manila, 1st District, Philippines<br>
                Contact Nos.: (632) 8524-5664/(63) 917-7077978<br>
                VAT Reg. TIN: 776-902-581-00000
            </th>
            <th border="0" colspan="1" rowspan="1" align="left">
               
                
                <h2><b>SALES INVOICE</b></h2>
            
            </th>
  
           
        </tr>

        <tr>
            <th border="1" class="bottom-border" colspan="1" rowspan="1" align="left">
                
             <h2><b>NO. </b></h2>
        
        
            </th>
        </tr>


       

    </table>


    <p>Sold to: <b>'.$company_name .'</b><span style="padding-right:10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Date: '.$date.'</p>

    <p>Address: <b>'.$vendor_address .' </b>D.R No.: _____________________________</p>
    <p>       : _____________________________________________ P.O./S.O. No.: _____________________________</p>
    <p>TIN No.: __________________ Business Style: ________________________ Terms: ___________________</p>
    <table border="0" cellspacing="0" cellpadding="3">  
        <tr>  
            <th border="1" width="10%"  align="center"><b>QUANTITY</b></th>
            <th border="1" width="10%"  align="center"><b>UNIT</b></th>
            <th border="1" width="50%"  align="center"><b>DESCRIPTION of ARTICLES</b></th>
            <th border="1" width="15%"  align="center"><b>UNIT PRICE</b></th>
            <th border="1" width="15%"  align="center"><b>AMOUNT</b></th>
            
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
