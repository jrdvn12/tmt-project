<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$vendor_name = $_POST['vendor_name'];
		$company_name = $_POST['company_name'];
        $vendor_address = $_POST['vendor_address'];
        $city = $_POST['city'];
		$province = $_POST['province'];
        $zip_code = $_POST['zip_code'];
		$country = $_POST['country'];
		$phone_number = $_POST['phone_number'];
		$email_address = $_POST['email_address'];
	
        

        
		$sql = "INSERT INTO vendor (vendor_name, company_name, vendor_address, city,province,zip_code,country,phone_number,email_address) 
        VALUES ('$vendor_name', '$company_name', '$vendor_address', '$city', '$province', '$zip_code', '$country', '$phone_number', '$email_address')";
		if($conn->query($sql)){
			// AUDIT
			// audit trail mapping
			$timezone = 'Asia/Manila';
			date_default_timezone_set($timezone);
			
			$unique=$product_number;	
			$auditdate = date('Y-m-d');
			$audittime = date('H:i:s');
			$audituser = $user['firstname'].' '.$user['lastname'];
			$auditdescription = 'Added new Vendor #'.$vendor_name.$company_name.' date '.$auditdate;

			$sqlaudit = "INSERT INTO audit_trail_record (audit_date,audit_time, user, description) 
			VALUES ('$auditdate', '$audittime', '$audituser', '$auditdescription')";
			if ($conn->query($sqlaudit)) {
				$_SESSION['success'] = 'New Vendor added successfully!';
			} else {
				$_SESSION['error'] = $conn->error;
			}
			
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: vendor');

?>