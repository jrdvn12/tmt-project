<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['vendor_id'];
        $edit_vendor_name = $_POST['edit_vendor_name'];
		$edit_company_name = $_POST['edit_company_name'];
		$edit_vendor_address = $_POST['edit_vendor_address'];
		$edit_city = $_POST['edit_city'];
        $edit_province = $_POST['edit_province'];
        $edit_zip_code = $_POST['edit_zip_code'];
		$edit_country = $_POST['edit_country'];
        $edit_phone_number = $_POST['edit_phone_number'];
		$edit_email_address = $_POST['edit_email_address'];
     

		
		$sql = "UPDATE vendor SET vendor_name ='$edit_vendor_name',company_name = '$edit_company_name', vendor_address = '$edit_vendor_address',city ='$edit_city' 
		,province ='$edit_province',zip_code ='$edit_zip_code',country ='$edit_country',phone_number ='$edit_phone_number',email_address ='$edit_email_address' WHERE id = '$id'";
		if($conn->query($sql)){
			

			// audit trail mapping
			$timezone = 'Asia/Manila';
			date_default_timezone_set($timezone);
						
			$auditdate = date('Y-m-d');
			$audittime = date('H:i:s');
			$audituser = $user['firstname'].' '.$user['lastname'];
			$auditdescription = 'Vendor updated '.$edit_vendor_name .' date '.$auditdate;

			$sqlaudit = "INSERT INTO audit_trail_record (audit_date,audit_time, user, description) 
			VALUES ('$auditdate', '$audittime', '$audituser', '$auditdescription')";
			if ($conn->query($sqlaudit)) {
				$_SESSION['success'] = 'Vendor updated successfully';
			} else {
				$_SESSION['error'] = $conn->error;
			}
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location: vendor');

?>