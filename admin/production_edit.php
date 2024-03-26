<?php
	include 'includes/session.php';
	if(isset($_POST['edit'])){
		$id = $_POST['id'];
        
        $edit_stasus = $_POST['edit_stasus'];
		$sql = "UPDATE production SET production_status ='$edit_stasus'  WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Production updated successfully';	
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location: production');

?>