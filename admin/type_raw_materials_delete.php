<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM type_raw_materials WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Type Raw Materials deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: type_raw_materials');
	
?>