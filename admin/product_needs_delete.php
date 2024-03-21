<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$product_id = $_POST['product_id'];
		$sql = "DELETE FROM product_needs WHERE product_id = '$product_id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Product Needs deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: product_needs');
	
?>