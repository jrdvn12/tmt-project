<?php
	include 'includes/session.php';
	if(isset($_POST['edit'])){
		$id = $_POST['id'];

		$selectedOption = $_POST['edit_stasus'];

		//For Preparing
		if ($selectedOption === 'Preparing') {
			$edit_stasus = $_POST['edit_stasus'];
			$sql = "UPDATE production SET production_status ='$edit_stasus'  WHERE id = '$id'";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Production updated successfully';	
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
			header('location: production');
		}

		//For Checking
		elseif ($selectedOption === 'Checking') {
			$edit_stasus = $_POST['edit_stasus'];
			$sql = "UPDATE production SET production_status ='$edit_stasus'  WHERE id = '$id'";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Production updated successfully';	
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
		}

		//For Onprocess
		elseif ($selectedOption === 'Onprocess') {
			$edit_stasus = $_POST['edit_stasus'];
			$sql = "UPDATE production SET production_status ='$edit_stasus'  WHERE id = '$id'";
			if($conn->query($sql)){
				//search from prouduction where material_code
				$sqlpr = "SELECT * FROM production WHERE id = '$id'";
				$querypr = $conn->query($sqlpr);
				$rowpr = $querypr->fetch_assoc();
				$material_code = $rowpr['material_code'];

				//search from product_needs where material_code equal to product_id material_code
				$sqlpn = "SELECT * FROM product_needs WHERE product_id = '$material_code'";
				$querypn = $conn->query($sqlpn);
				$rowpn = $querypn->fetch_assoc();
				while($rowpn = $querypn->fetch_assoc()){
					$item_need = $rowpn['item_need'];
					$loads_pn = $rowpn['loads'];
					//search from raw_materials where item_need equal to material_code
					$sqlrm = "SELECT * FROM raw_materials WHERE material_code = '$item_need'";
					$queryrm = $conn->query($sqlrm);
					$rowrm = $queryrm->fetch_assoc();
					$idrm = $rowrm['id'];
					$loads_rm = $rowrm['loads'];
					$use_loads = $rowrm['material_usage'];//0
					
					$usage_loads = $loads_pn + $use_loads;

					$dec_loads = $loads_rm - $usage_loads;

					$sqlrms = "UPDATE raw_materials SET material_usage ='$usage_loads',material_remaining ='$dec_loads'  WHERE id = '$idrm'";
					if($conn->query($sqlrms)){
						$_SESSION['success'] = 'Production updated successfully';
					}
					else{
						$_SESSION['error'] = $conn->error;
					}

					
				}	
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
		}

		//For Packaging
		elseif ($selectedOption === 'Packaging') {
			$edit_stasus = $_POST['edit_stasus'];
			$sql = "UPDATE production SET production_status ='$edit_stasus'  WHERE id = '$id'";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Production updated successfully';	
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
		}
		//For Completed
		elseif ($selectedOption === 'Completed') {
			$edit_stasus = $_POST['edit_stasus'];
			$qty = 10980;
			$sql = "UPDATE production SET production_status ='$edit_stasus', production_pieces ='$qty'  WHERE id = '$id'";
			if($conn->query($sql)){
				

				//search from prouduction where material_code
				$sqlpr = "SELECT * FROM production WHERE id = '$id'";
				$querypr = $conn->query($sqlpr);
				$rowpr = $querypr->fetch_assoc();
				$material_code = $rowpr['material_code'];
				$product_batch = $rowpr['product_batch'];

				//search from product where id equal to material_code
				$sqlp = "SELECT * FROM product WHERE id = '$material_code'";
				$queryp = $conn->query($sqlp);
				$rowp = $queryp->fetch_assoc();

				$product_number = $rowp['product_number'];
				$photo = $rowp['photo'];
				$piececode = $rowp['piececode'];
				$boxcode = $rowp['boxcode'];
				$product_name = $rowp['product_name'];
				$price = $rowp['price'];
				$qty = 10980;
				$soldstock = 0; 
				$balance = 0;
				$dateofstock = date('Y-m-d');
				$product_expiration = date('Y-m-d', strtotime('+1 year')); 

				$sqli = "INSERT INTO main_inventory (product_number, photo, batch, piececode, boxcode, product_name, price, qty, soldstock, balance, dateofstock, product_expiration) 
				VALUES ('$product_number', '$photo', '$product_batch', '$piececode', '$boxcode', '$product_name', '$price', '$qty', '$soldstock', '$balance', '$dateofstock', '$product_expiration')";
				if($conn->query($sqli)){



					$_SESSION['success'] = 'Production updated successfully';   
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
			header('location: production');
		}
        
					
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location: production');

?>