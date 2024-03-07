<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$product_number = $_POST['product_number'];
		//no photo upload means no image available but when someone uploads the right iumage will show
		$filename = $_FILES['photo']['name'];
		$product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_quantity = $_POST['product_quantity'];
		$soldstock = 0;
        $balance = $_POST['product_quantity'];
        $dateofstock = date('Y-m-d');;
        

        if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		$sql = "INSERT INTO main_inventory (product_number, photo, product_name, price, qty,soldstock,balance,dateofstock) 
        VALUES ('$product_number', '$filename', '$product_name', '$product_price', '$product_quantity', '$soldstock', '$balance', '$dateofstock')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'New product added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: main_inventory.php');

?>