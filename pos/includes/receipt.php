<?php
	include 'includes/session.php';

		function generateRow($conn){
			$contents = '';
			 
			//$sql = "SELECT * FROM payslip WHERE datefrom >= '$from' AND dateto <= '$to'";
	
			$sql = "SELECT * FROM main_inventory ";
	
	
			$query = $conn->query($sql);
			//$total = 0;
			//$total1 = 0;
			while($row = $query->fetch_assoc()){
				
				$contents .= '
				<tr>
				<td align="center">'.$row['product_id'].'</td>
				<td align="center">'.$row['product_number'].'</td>
				<td align="center">'.$row['qty'].'</td>
				
				<td align="center">'.number_format($row['price'], 2).'</td>
				</tr>
				';
				
			}
			//$total = $row['total_net_pay'];
			
	
			//$contents .= '
				//<tr>
					//<td colspan="3" align="right"><b>Total</b></td>
					//<td align="center"><b>'.number_format($total, 2).'</b></td>
			//	</tr>
			//';
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
		$content = '';  
		$content .= '
		<table border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td align="left">
					<img src="C:/xampp/htdocs/tmt-project/images/TMTFOOD.png" alt="Company Logo" width="100">
				</td>
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
		<table border="1" cellspacing="0" cellpadding="3">  
			<tr>  
				<th width="3%"  align="center"><b>No</b></th>
				<th width="8%"  align="center"><b>Code</b></th>
				<th width="5%"  align="center"><b>Balance</b></th>
				<th width="6%"  align="center"><b>Price</b></th>
		
			</tr>
		';  
		$content .= generateRow($conn);  
		$content .= '</table>';  
		$pdf->writeHTML($content);  
		$pdf->Output('TMT.pdf', 'I');
	

?>
