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
				$_SESSION['success'] = 'Production updated successfully';	
					//search from product needs
					//search from leave record database
					// Assuming $rowsWithSameId contains the rows fetched from the production table
					// Assuming $similarMaterials contains the similar records' ids from the raw_materials table

					// Fetching data from product_needs table
					$sqlProductNeeds = "SELECT item_need, loads FROM product_needs WHERE id = '$id'";
					$resultProductNeeds = $conn->query($sqlProductNeeds);
					$productNeeds = [];
					while ($row = $resultProductNeeds->fetch_assoc()) {
						$productNeeds[] = $row;
					}

					// Fetching data from production table
					$sqlProduction = "SELECT material_code FROM production";
					$resultProduction = $conn->query($sqlProduction);
					$productionMaterials = [];
					while ($row = $resultProduction->fetch_assoc()) {
						$productionMaterials[] = $row['material_code'];
					}

					// Updating raw_materials table
					foreach ($productNeeds as $product) {
						$itemNeed = $product['item_need'];
						$loads = $product['loads'];

						foreach ($productionMaterials as $materialCode) {
							// Fetching loads from raw_materials table
							$sqlLoadFetch = "SELECT id, loads FROM raw_materials WHERE material_code = '$materialCode'";
							$resultLoadFetch = $conn->query($sqlLoadFetch);
							while ($row = $resultLoadFetch->fetch_assoc()) {
								$rawMaterialId = $row['id'];
								$rawMaterialLoad = $row['loads'];
								
								// Calculate updated load
								$updatedLoad = $rawMaterialLoad - $loads;
								
								// Update material_usage in raw_materials table
								$sqlUpdateLoad = "UPDATE raw_materials SET material_usage = '$updatedLoad' WHERE id = '$rawMaterialId'";
								$conn->query($sqlUpdateLoad);
							}
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