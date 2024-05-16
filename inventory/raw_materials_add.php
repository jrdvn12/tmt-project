<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$material_code = $_POST['material_code'];
		$material_type = $_POST['material_type'];
        $material_name = $_POST['material_name'];
        $material_batch = $_POST['material_batch'];
		$material_load = $_POST['material_load'];
        $date_expiration = $_POST['material_expiration'];
        $dateofstock = date('Y-m-d');
        

        
		$sql = "INSERT INTO raw_materials (material_code, material_type, material_name, material_batch,loads,dateofstock,date_expiration) 
        VALUES ('$material_code', '$material_type', '$material_name', '$material_batch', '$material_load', '$dateofstock', '$date_expiration')";
		if($conn->query($sql)){
			// AUDIT
			// audit trail mapping
			$timezone = 'Asia/Manila';
			date_default_timezone_set($timezone);
			
			$unique=$product_number;	
			$auditdate = date('Y-m-d');
			$audittime = date('H:i:s');
			$audituser = $user['firstname'].' '.$user['lastname'];
			$auditdescription = 'Added new Raw Materials #'.$unique.' date '.$auditdate;

			$sqlaudit = "INSERT INTO audit_trail_record (audit_date,audit_time, user, description) 
			VALUES ('$auditdate', '$audittime', '$audituser', '$auditdescription')";
			if ($conn->query($sqlaudit)) {
				$_SESSION['success'] = 'New product added successfully!';
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

	header('location: raw_materials');

?>