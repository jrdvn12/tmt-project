<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
        //key for product
        $product_id = $_POST['product_description'];
        //key for items
		$item_id = $_POST['item_description'];

        $loads = $_POST['loads'];
       
        // searching the items in database of product
                $sqlp = "SELECT * FROM product WHERE id = '$product_id'";
				$queryp = $conn->query($sqlp);
				$rowp = $queryp->fetch_assoc();
				$product_name = $rowp['product_name'];

        // searching the items in database of items need
                $sqlin = "SELECT * FROM raw_materials WHERE id = '$item_id'";
                $queryin = $conn->query($sqlin);
                $rowin = $queryin->fetch_assoc();
                $item_need = $rowin['material_name'];
        
		$sql = "INSERT INTO product_needs (product_id, product_name, item_need, loads) 
        VALUES ('$product_id', '$product_name', '$item_need', '$loads')";
		if($conn->query($sql)){
			
			$sql1 = "INSERT INTO product_needs_history (product_id, product_name, item_need, loads) 
			VALUES ('$product_id', '$product_name', '$item_need', '$loads')";
			if($conn->query($sql1)){
				
				// AUDIT
				// audit trail mapping
				$timezone = 'Asia/Manila';
				date_default_timezone_set($timezone);
				
				$unique='Hi';	
				$auditdate = date('Y-m-d');
				$audittime = date('H:i:s');
				$audituser = $user['firstname'].' '.$user['lastname'];
				$auditdescription = 'Added new Need Materials #'.$unique.' date '.$auditdate;

				$sqlaudit = "INSERT INTO audit_trail_record (audit_date,audit_time, user, description) 
				VALUES ('$auditdate', '$audittime', '$audituser', '$auditdescription')";
				if ($conn->query($sqlaudit)) {
					$_SESSION['success'] = 'New need materials added successfully!';
				} else {
					$_SESSION['error'] = $conn->error;
				}
			}
			else{
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

	header('location: product_needs');

?>

			