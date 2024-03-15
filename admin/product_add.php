<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$product_number = $_POST['product_number'];
		//no photo upload means no image available but when someone uploads, the right image will show.
		$filename = $_FILES['photo']['name'];
		$product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_quantity = $_POST['product_quantity'];
		
        $dateofstock = date('Y-m-d');;
        

        if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		$sql = "INSERT INTO product (product_number, photo, product_name, price,dateofstock) 
        VALUES ('$product_number', '$filename', '$product_name', '$product_price', '$dateofstock')";
		if($conn->query($sql)){
			// AUDIT
			// audit trail mapping
			$timezone = 'Asia/Manila';
			date_default_timezone_set($timezone);
			
			$unique=$product_number;	
			$auditdate = date('Y-m-d');
			$audittime = date('H:i:s');
			$audituser = $user['firstname'].' '.$user['lastname'];
			$auditdescription = 'Added new Product #'.$unique.' date '.$auditdate;

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

	header('location: product.php');

?>