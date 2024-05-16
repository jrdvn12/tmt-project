<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['product_needs_id'];
        $item_need_edit = $_POST['item_need_edit'];
		$item_loads_edit = $_POST['item_loads_edit'];
        
		$sql = "UPDATE product_needs SET item_need ='$item_need_edit',loads = '$item_loads_edit'  WHERE id = '$id'";
		if($conn->query($sql)){
			
            $_SESSION['success'] = 'Product needs updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
    elseif (isset($_POST['delete'])) {

        $id = $_POST['product_needs_id'];
		$sql = "DELETE FROM product_needs WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Product needs deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
    }
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location: product_needs');

?>