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
				$_SESSION['success'] = 'Production updated successfully';	
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

					$dec_loads = $loads_rm - $loads_pn;

					$sqlrms = "UPDATE raw_materials SET material_usage ='$usage_loads',material_remaining ='$dec_loads'  WHERE id = '$idrm'";
					if($conn->query($sqlrms)){
						$_SESSION['success'] = 'Production updated successfully'.$item_need.'<br>'.$loads_pn.'<br>'.$idrm.'<br>'.$loads_rm;
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