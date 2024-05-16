<?php
	include 'includes/session.php';
	if(isset($_POST['edit'])){
		$id = $_POST['id'];
        
        $material_type_edit = $_POST['material_type_edit'];
		$sql = "UPDATE type_raw_materials SET material_type ='$material_type_edit'  WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Type Raw Materials updated successfully';	
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location: type_raw_materials');

?>