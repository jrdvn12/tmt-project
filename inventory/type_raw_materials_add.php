<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
	
		$material_type = $_POST['material_type'];
       
        

        
		$sql = "INSERT INTO type_raw_materials (material_type)  VALUES ( '$material_type')";
		if($conn->query($sql)){
			// AUDIT
			// audit trail mapping
			$timezone = 'Asia/Manila';
			date_default_timezone_set($timezone);
			
			$unique=$material_type;	
			$auditdate = date('Y-m-d');
			$audittime = date('H:i:s');
			$audituser = $user['firstname'].' '.$user['lastname'];
			$auditdescription = 'Added new Type Raw Materials #'.$unique.' date '.$auditdate;

			$sqlaudit = "INSERT INTO audit_trail_record (audit_date,audit_time, user, description) 
			VALUES ('$auditdate', '$audittime', '$audituser', '$auditdescription')";
			if ($conn->query($sqlaudit)) {
				$_SESSION['success'] = 'New Type Raw Materials product added successfully!';
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

	header('location: type_raw_materials');

?>