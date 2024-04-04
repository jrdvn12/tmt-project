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

		// searching the items in database of items need
		$sqlpn = "SELECT * FROM product_needs WHERE product_id = '$product_id' AND item_need = '$item_need'";
		$asql1 = "SELECT * FROM attendance WHERE time_out = '$timeoutvalue' AND date = '$date_now' AND employee_id = '$id'";
		$querypn = $conn->query($sqlpn);
		$rowpn = $querypn->fetch_assoc();
			

		//recent item needs
		if ($querypn->num_rows > 0){
			
			$idpn = $rowpn['id'];
			$prev_loads = $rowpn['loads'];
			$item_loads_add = ($prev_loads + $loads);

			$sql = "UPDATE product_needs SET loads = '$item_loads_add'  WHERE id = '$idpn'";
			if($conn->query($sql)){
				
				
			
					// AUDIT
					// audit trail mapping
					$timezone = 'Asia/Manila';
					date_default_timezone_set($timezone);
					
					$unique= $item_need;	
					$auditdate = date('Y-m-d');
					$audittime = date('H:i:s');
					$audituser = $user['firstname'].' '.$user['lastname'];
					$auditdescription = 'Product load needs updated Materials # '.$unique.' date '.$auditdate;

					$sqlaudit = "INSERT INTO audit_trail_record (audit_date,audit_time, user, description) 
					VALUES ('$auditdate', '$audittime', '$audituser', '$auditdescription')";
					if ($conn->query($sqlaudit)) {
						
						$_SESSION['success'] = 'Product load needs updated successfully';
					} else {
						$_SESSION['error'] = $conn->error;
					}
			
				
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
			
		}

		else{
			// new item needs
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
					
					$unique=$item_need;	
					$auditdate = date('Y-m-d');
					$audittime = date('H:i:s');
					$audituser = $user['firstname'].' '.$user['lastname'];
					$auditdescription = 'Added new Need Materials # '.$unique.' date '.$auditdate;

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
       
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: product_needs');

?>

			