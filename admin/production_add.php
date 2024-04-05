<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
        $product = $_POST['product'];
        $production_batch = $_POST['production_batch'];
        $datecreated = date('Y-m-d');
       
        // SEARCH FROM PRODUCT AND GET ID OF PRODUCT

        $sproduct = "SELECT * FROM product WHERE id = '$product'";
        $qproduct  = $conn->query($sproduct);
        $rproduct = $qproduct ->fetch_assoc();
        $product_id= $rproduct['id'];

        // SEARCH FROM PRODUCT AND GET ID OF PRODUCT
        $spproduct = "SELECT * FROM product_needs WHERE product_id = '$product_id'";
        $qpproduct  = $conn->query($spproduct);
        $rpproduct = $qpproduct ->fetch_assoc();
        $pproduct_id= $rpproduct['id'];

        $material_code = $rpproduct['product_id'];
        $product_name = $rproduct['product_name'];
        $product_batch = $production_batch;
        $production_status = "Preparing";
        $production_pieces = 0;
        $production_kilo =0;
        $production_date = $datecreated;
        $production_expiration =   date('Y-m-d', strtotime('+12 months'));


		$sql = "INSERT INTO production (material_code, product_name,product_batch,production_status, production_pieces, production_kilo,production_date,production_expiration) 
        VALUES ('$material_code', '$product_name', '$product_batch','$production_status','$production_pieces', '$production_kilo', '$production_date', '$production_expiration')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'New production added successfully!';
			
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: production.php');

?>