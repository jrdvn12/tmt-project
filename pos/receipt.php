<?php
    $timezone = 'Asia/Manila';
    date_default_timezone_set($timezone);
    require_once 'includes/session.php';
    include 'includes/conn.php';


 // Check if the form has been submitted
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     // Process form data and update the database

     // Set a session variable to indicate that the form has been submitted
     $_SESSION["form_submitted"] = true;

     // Redirect to another page to prevent multiple form submissions
     header("Location: success_page.php");
     exit(); // Make sure to exit after redirecting
 }

 // Check if the session variable is set to prevent multiple updates on page refresh
 if (isset($_SESSION["form_submitted"])) {
     // Database update code

     // Reset session variable to prevent multiple updates
     unset($_SESSION["form_submitted"]);
 }

// Check if the receiptData key exists in the $_POST array
if (isset($_GET['receiptData'])) {

    // Decode the JSON data to PHP array
    $receiptData = json_decode($_GET['receiptData'], true);
    $selectedVendor = json_decode($_GET['selectedVendor'], true);
    
    $date = date("F d, Y");
   /*Employee Table Search For Vendor ID*/
   $sqlv = "SELECT * FROM vendor WHERE id = '$selectedVendor'";
   $queryv = $conn->query($sqlv);
   $rowv = $queryv->fetch_assoc();
   $company_name = $rowv['company_name'];
   $vendor_address1 = $rowv['vendor_address'] .' '. $rowv['city'];
   $vendor_address2 = $rowv['province'].' '. $rowv['zip_code'].' '. $rowv['country'];
    
   $date = date("F d, Y");
   $date_sales=date('Y-m-d');
//creating invoice_id
        $dates = date("Y"); 
		$set = '1234567890';
		$rand = substr(str_shuffle($set), 0, 15); 
        $time_check = date('his');
        $time_sales = date('h:i:s A');
        $invoice_id = $dates."-".$rand."-". $time_check; 
    // Function to generate row content
    function generateRow($company_name,$vendor_address1,$vendor_address2,$receiptData,$date,$date_sales,$time_sales,$invoice_id){
        $contents = '';

        $contents .= 
        '
        <style>
    		.right-border {
        	border-right: 1px solid black;		
    		}
			.bottom-border {		
				border-bottom: 1px solid black;
			}
			
	    </style>
        
        <tr>
            <td ></td>   
        </tr>
        <tr>
            <td border="0" width="8%" align="left"><b>Sold to&nbsp;&nbsp;&nbsp;:</b></td>
           
            <td border="0" class="bottom-border" colspan="4" align="center">'.$company_name.'</td>
            
            <td border="0" width="11%" align="left"><b>Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b></td>
            <td border="0" class="bottom-border" align="center"><b>'.$date.'</b></td>
        </tr>

        <tr>
            <td border="0" width="8%" align="left"><b>Address :</b></td>
           
            <td border="0" class="bottom-border" colspan="4" align="center">'.$vendor_address1.'</td>
            
            <td border="0" width="11%" align="left"><b>D.R. No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b></td>
            <td border="0" class="bottom-border" align="center"><b></b></td>
        </tr>

        <tr>
            <th border="0" width="8%"  align="right"><b>:</b></th>       
            <td border="0" class="bottom-border" colspan="4" align="center">'.$vendor_address2.'</td>          
            <td border="0" width="11%" align="left"><b>P.O./S.O. No. :</b></td>
            <td border="0" class="bottom-border" align="center"><b></b></td>
        </tr>
        
        <tr>
            <td border="0" width="8%" align="left"><b>TIN No.&nbsp;&nbsp;:</b></td>
            <td border="0" class="bottom-border" width="27%" align="center"><b></b></td>
            <td border="0" width="11%" align="left"><b>Business Style</b></td>
            <td border="0" class="bottom-border" width="27%" align="center"><b></b></td>
            <td border="0" width="11%" align="left"><b>Terms&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b></td>
            <td border="0" class="bottom-border" width="16%" align="center"><b></b></td>
        </tr>
            
        <tr>
            <td ></td>   
        </tr>
        
        <tr>  
            <td border="1" width="10%"  align="center"><b>QUANTITY</b></td>
            <td border="1" width="10%"  align="center"><b>UNIT</b></td>
            <td border="1" width="50%"  align="center"><b>DESCRIPTION of ARTICLES</b></td>
            <td border="1" width="15%"  align="center"><b>UNIT PRICE</b></td>
            <td border="1" width="15%"  align="center"><b>AMOUNT</b></td>
        </tr>';
       

  
        // Include database connection

        // Inserting to database
        include 'includes/conn.php';
        
        foreach ($receiptData as $item) {
            $product_id = $item['product_id'];
            $product_code = $item['code'];
            $price = $item['price'];
            $qty = $item['quantity'];
            $total_amount = $item['total_amount'];
            $pid = $item['pid'];
            // Check if a record with the same invoice ID and product ID exists
            $check_sql = "SELECT * FROM sale WHERE invoice_id = '$invoice_id' AND product_id = '$product_id'";
            $check_result = $conn->query($check_sql);
        
            if ($check_result->num_rows > 0) {
                // If a record exists, update the existing record
                $update_sql = "UPDATE sale SET price = '$price', qty = '$qty', total_amount = '$total_amount', time_sales = '$time_sales', date_sales = '$date_sales' WHERE invoice_id = '$invoice_id' AND product_id = '$product_id'";
                if ($conn->query($update_sql)) {
                   
                } else {
                    $_SESSION['error'] = $conn->error;
                }
            } else {
                // If no record exists, insert a new record
                $insert_sql = "INSERT INTO sale (invoice_id, product_id, product_code, price, qty, total_amount, time_sales, date_sales) 
                                VALUES ('$invoice_id', '$product_id', '$product_code', '$price', '$qty',  '$total_amount', '$time_sales', '$date_sales')";
                if ($conn->query($insert_sql)) {


                    $asql1 =   "SELECT * FROM sale WHERE invoice_id = '$invoice_id' AND product_id = '$product_id'";
                    $aquery1 = $conn->query($asql1);
                    $arow1 = $aquery1->fetch_assoc();

                    if ($aquery1->num_rows > 0 ) {
                         // Update successful
                        // Insertion successful
                        /*main_inventory Table Search For ID*/
                        // Fetch the current quantity of the item from the main inventory
                        $sqlMainInventory = "SELECT * FROM main_inventory WHERE id = '$pid'";
                        $queryMainInventory = $conn->query($sqlMainInventory);
                        $rowMainInventory = $queryMainInventory->fetch_assoc();
                        $qtyid = $rowMainInventory['qty'];


                        
                        // Calculate the new sold stock and balance 
                        $soldstock = $rowMainInventory['soldstock'];
                        $newSoldStock = $soldstock + $qty;
                        $balance = $qtyid - $newSoldStock;

                    
                        // Update the main inventory with the new sold stock and balance
                        $sqlUpdateMainInventory = "UPDATE main_inventory SET soldstock = '$newSoldStock', balance = '$balance' WHERE id = '$pid'";
                        $conn->query($sqlUpdateMainInventory);

                    
                    }else{
                       // Insertion successful
                    /*main_inventory Table Search For ID*/
                    
                    $sqleid = "SELECT * FROM main_inventory WHERE id = '$pid'";
                    $queryeid = $conn->query($sqleid);
                    $roweid = $queryeid->fetch_assoc();

                    $qtyid = $roweid['qty'];
                    $soldstock = $roweid['soldstock'];
                    $new_sold_stock = $soldstock +  $qty;
                    $balance = $qtyid - $new_sold_stock;
                   
                    //Update main_inventory
                    $sqlUpdateLoad = "UPDATE main_inventory SET soldstock = '$new_sold_stock', balance = '$balance' WHERE id = '$pid'";
					$conn->query($sqlUpdateLoad);
                    }
                    



                } else {
                    $_SESSION['error'] = $conn->error;
                }
            }
        }
        
        
        
            // Loop through the array and access each item
        foreach($receiptData as $item) {
            /**/$contents .= 
            '
            <tr>
                <td border="1" align="center">'. $item['quantity'] . '</td>
                <td border="1" align="center">'. $item['code'] . '</td>
                <td border="1" align="center">'. $item['description'] .' </td>
                <td border="1" align="center">'. $item['price'] .' </td>
                <td border="1" align="center">'. $item['total_amount'] .' </td>
            </tr>';
          
        }

        // Add the total, payment, and change rows
        $selectedAmount = json_decode($_GET['selectedAmount'], true);
        $vat =.12;
        $vats =12;
        $lessvat = $selectedAmount *$vat;
        $anv =$selectedAmount - $lessvat;
        $vat2 =.12;

        $contents .=
        '
        <style>
    		.right-border {
        	border-right: 1px solid black;		
    		}
			.bottom-border {		
				border-bottom: 1px solid black;
			}
			
	    </style>
        <tr>
            <td border="1" width="10%" align="center"></td>
            <td border="1" width="10%" align="center"></td>
            <td border="0" width="32%" class="bottom-border" align="center"></td>
            <td border="0" width="18%" class="bottom-border" align="left">Total Sales (Vat inclusive)</td>
            <td border="1" width="15%" align="center">' . number_format($selectedAmount, 2). '</td>
            <td border="1" width="15%" align="center"></td>
        </tr>
        <tr>
            <td border="1" width="10%" align="center"></td>
            <td border="1" width="10%" align="center"></td>
            <td border="0" width="32%" class="bottom-border" align="center"></td>
            <td border="0" width="18%" class="bottom-border" align="left">Less: VAT</td>
            <td border="1" width="15%" align="center">'. number_format($selectedAmount, 2).' * '.$vats.'% = ' . number_format($lessvat, 2). '</td>
            <td border="1" width="15%" align="center"></td>
        </tr>
        <tr>
            <td border="1" width="10%" align="center"></td>
            <td border="1" width="10%" align="center"></td>
            <td border="0" width="32%" class="bottom-border" align="center"></td>
            <td border="0" width="18%" class="bottom-border" align="left">Amount Net of VAT</td>
            <td border="1" width="15%" align="center">' . number_format($anv, 2). '</td>
            <td border="1" width="15%" align="center"></td>
        </tr>
        <tr>
            <td border="1" width="10%" align="center"></td>
            <td border="1" width="10%" align="center"></td>
            <td border="0" width="32%" class="bottom-border" align="center"></td>
            <td border="0" width="18%" class="bottom-border" align="left">Add: VAT</td>
            <td border="1" width="15%" align="center">' . number_format($lessvat, 2). '</td>
            <td border="1" width="15%" align="center"></td>
        </tr>
        <tr>
            <td border="1" width="10%" align="center"></td>
            <td border="1" width="10%" align="center"></td>
            <td border="0" width="32%" class="bottom-border" align="center"></td>
            <td border="0" width="18%" class="bottom-border" align="left"><b>TOTAL AMOUNT DUE</b></td>
            <td border="1" width="15%" align="center">' . number_format($selectedAmount, 2). '</td>
            <td border="1" width="15%" align="center"></td>
        </tr>

        
        
        ';

        $contents .=
        '
        <style>
        .bottom-border {		
            border-bottom: 1px solid black;
        }
        </style>
        <tr>
            <td border="0" width="40%" align="left"><b>Received and accepted in good condition</b></td>
            <td border="0" width="5%" align="center"></td>
            <td border="0" width="25%" align="left"><b>Issued By:</b></td>
            <td border="0" width="5%" align="center"></td>
            <td border="0" width="25%" align="left"><b>Approved By:</b></td>
        </tr>
       
        <tr>
            <td border="0" width="40%" class="bottom-border" align="left"><b></b></td>
            <td border="0" width="5%"  align="center"></td>
            <td border="0" width="25%" class="bottom-border" align="left"><b></b></td>
            <td border="0" width="5%"  align="center"></td>
            <td border="0" width="25%" class="bottom-border" align="left"><b></b></td>
        </tr>
        <tr>
            <td border="0" width="40%" align="center"><b>Customer Signature Over Printed Name</b></td>
            <td border="0" width="5%"  align="center"></td>
            <td border="0" width="25%" align="left"></td>
            <td border="0" width="5%"  align="center"></td>
            <td border="0" width="25%" align="left"></td>
        </tr>

        <tr>
            <td border="0" width="40%" align="left">100 Bkits. (50x3)0001-2500</td>
            <td border="0" width="10%"  align="center"></td>
            <td border="0" width="40%" align="left">This Document is not valid for claims of Input Taxes.</td>
            
        </tr>
        <tr>
            <td border="0" width="30%" align="left">BIR ATP No. OCN:</td>
            <td border="0" width="25%" align="left">* Date of ATP:</td>
          
        </tr>

        <tr>
            <td border="0" width="30%" align="left"><b>ROYGBIV OFFSET PRINTING INC. </b></td>
        </tr>

        <tr>
            <td border="0" width="55%" align="left">57K Betty Go Belmonte St., cor. E. Rodriguez Ave., Quezon City<br>TIN: 007-324-761-00000 Printers Accreditation No. 040MP201900000000021<br>Date of Accreditation: March 7, 2019 Date of Expiration: March 6, 2024 <br>
            </td>
        </tr>
        
        
        ';
        
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
    //$pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 7);  

    // Add the customer copy page 
    $pdf->AddPage();
    $image = '<img src="../images/TMTFOOD.png" alt="Company Logo" width="120">';
    //$image = 'LOGO';
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
            <th border="0" width="30%" colspan="1" rowspan="2" align="center"><br><br>'.$image.'</th>
            <th border="0" width="45%" colspan="2" rowspan="2" align="left"><br><br>
                Room EF-002 4th Flr., Sitio Grande Bldg.<br>
                409 A. Soriano Ave. Zone 69, Brgy. 656<br>
                1002 Intramuros NCR, City of Manila, 1st District, Philippines<br>
                Contact Nos.: (632) 8524-5664/(63) 917-7077978<br>
                VAT Reg. TIN: 776-902-581-00000
            </th>
            <th border="0" width="29%" colspan="3"align="left" >           
                <h1><b>SALES INVOICE</b></h1>
            </th> 
        </tr>
        <tr>
            <th width="6%" border="0"  colspan="1" align="left">          
                <h2><b>NO.</b></h2>
            </th>
            <th border="0" width="14%" class="bottom-border" colspan="1"  align="left">          
                <h2></h2>
            </th>
        </tr>
    ';  

    $content .= generateRow($company_name,$vendor_address1,$vendor_address2,$receiptData,$date,$date_sales,$time_sales,$invoice_id);  
    $content .= '</table>';  
    $pdf->writeHTML($content);  

    // Add the company copy page
    $pdf->AddPage();
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
            <th border="0" width="30%" colspan="1" rowspan="2" align="center"><br><br>'.$image.'</th>
            <th border="0" width="45%" colspan="2" rowspan="2" align="left"><br><br>
                Room EF-002 4th Flr., Sitio Grande Bldg.<br>
                409 A. Soriano Ave. Zone 69, Brgy. 656<br>
                1002 Intramuros NCR, City of Manila, 1st District, Philippines<br>
                Contact Nos.: (632) 8524-5664/(63) 917-7077978<br>
                VAT Reg. TIN: 776-902-581-00000
            </th>
            <th border="0" width="29%" colspan="3"align="left" >           
                <h1><b>SALES INVOICE</b></h1>
            </th> 
        </tr>
        <tr>
            <th width="6%" border="0"  colspan="1" align="left">          
                <h2><b>NO.</b></h2>
            </th>
            <th border="0" width="14%" class="bottom-border" colspan="1"  align="left">          
                <h4>'.$invoice_id.'</h4>
            </th>
        </tr>
    ';  

    $content .= generateRow($company_name,$vendor_address1,$vendor_address2,$receiptData,$date,$date_sales,$time_sales,$invoice_id);  
    $content .= '</table>';  
    $pdf->writeHTML($content);  

    // Output the PDF
    $pdf->Output('TMT.pdf', 'I');
}else {
    // Handle case when receiptData key is not present in $_POST array
    echo "Error: No receipt data received.";
}


?>

<script>
  // Disable page reload
  window.onbeforeunload = function() {
        return "Reloading is disabled on this website.";
    };
</script>