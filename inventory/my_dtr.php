<?php
   include 'includes/session.php';

if (isset($_POST['view'])) {
 

    
   
      function generateRow($datepicker_dtr_from, $datepicker_dtr_to, $conn, $generateby){
        $datepicker_dtr_from = $_POST['datepicker_dtr_from'];
        $datepicker_dtr_to = $_POST['datepicker_dtr_to'];
        $ids = $_POST['id'];
		$contents = '';
	 	
		//$sql = "SELECT * FROM payslip WHERE datefrom >= '$from' AND dateto <= '$to'";

        $sql = "SELECT * FROM attendance WHERE employee_id like '$ids' AND date >= '$datepicker_dtr_from' AND date<= '$datepicker_dtr_to' ";
 
        $sql = "SELECT * FROM attendance 
        WHERE employee_id = '$ids' 
        AND date BETWEEN '$datepicker_dtr_from' AND '$datepicker_dtr_to'
        ORDER BY date ASC, time_in ASC";

       

		$query = $conn->query($sql);
		//$total = 0;
		//$total1 = 0;
    $stockdates ='';
		while($row = $query->fetch_assoc()){
            if ($row['status'] == '1') {
                $status = '<span class="label label-warning pull-right">ONTIME</span>';
              } elseif ($row['status'] == '0') {
                  $status = '<span class="label label-danger pull-right">LATE</span>';
              } elseif ($row['status'] == '3') {
                $status = '<span class="label label-info pull-right">LEAVE</span>';
              } elseif ($row['status'] == '4') {
                $status = '<span class="label label-primary pull-right">DAY OFF</span>';
              } elseif ($row['status'] == '5') {
                $status = '<span class="label label-danger pull-right">ABSENT</span>';
              } else {
                  $status = '<span class="label label-primary pull-right"></span>';
              }
              $stockdate = $stockdates;
              $datefromdatabase = $row['date'];
              if($stockdate != $datefromdatabase){
                $contents .= '
                <tr>
                          
                  <td align="center">'.date('M d, Y', strtotime($row['date'])).'</td>
                  <td align="center">'.date('d', strtotime($row['date'])).'</td>
                  <td align="center">'.date('h:i A', strtotime($row['time_in'])).'</td>
                  <td align="center">'.date('h:i A', strtotime($row['time_out'])).'</td>
                  <td align="center">'.$status.'</td>
                </tr>
                ';
                $stockdates= $row['date'];
              }else{
                $contents .= '
                <tr>
                          
                  <td align="center"></td>
                  <td align="center"></td>
                  <td align="center">'.date('h:i A', strtotime($row['time_in'])).'</td>
                  <td align="center">'.date('h:i A', strtotime($row['time_out'])).'</td>
                  <td align="center">'.$status.'</td>
                </tr>
                ';
              }
			
			
		}
		//$total = $row['total_net_pay'];
		

		$contents .= '
			
            <tr>
				<td colspan="4" align="right"><b>Generate By :</b></td>
				<td align="center"><b>'.$generateby.'</b></td>
	</tr>
		';
		return $contents;
	}
		
	$id = $_POST['id'];
    $eid = $_POST['employee_id'];
    $name = $_POST['employee_name'];
    $datepicker_dtr_from = $_POST['datepicker_dtr_from'];
    $datepicker_dtr_to = $_POST['datepicker_dtr_to'];
    $generateby = $user['firstname'].' '.$user['lastname'];
    
    $look=$id;

	require_once('../tcpdf/tcpdf.php');  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle('EZ PAYROLL SYSTEM');  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 11);  
    $pdf->AddPage();  
    $content = '';  
    $content .= '
      	<h2 align="center">EZ PAYROLL SYSTEM</h2>
        <h3 align="center">Date and Time Records</h3>
      	<h4 align="center">'.date('M d, Y', strtotime($datepicker_dtr_from))." - ".date('M d, Y', strtotime($datepicker_dtr_to)).'</h4>
        <h4 align="left">'.'Employee Name : '.$generateby.'</h4>
        <h4 align="left">'.'Employee ID : '.$eid.'</h4>
      	<table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
           		<th width="20%" align="center"><b>Date</b></th>
                <th width="10%" align="center"><b>Day</b></th>
                <th width="30%" align="center"><b>Time In</b></th>
				<th width="20%" align="center"><b>Time Out</b></th> 
				<th width="20%" align="center"><b>Remarks</b></th> 
				
           </tr>  
      ';  
    $content .= generateRow($datepicker_dtr_from, $datepicker_dtr_to, $conn, $generateby);  
    $content .= '</table>';  
    $pdf->writeHTML($content);  
    $pdf->Output('dtr.pdf', 'I');
} else{
    $_SESSION['error'] = 'Fill up the form first';
}

header('location: dtr.php');
?>
