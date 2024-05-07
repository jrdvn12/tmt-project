<?php 
	include 'includes/session.php';
//OR product_number = '$id' 
	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT * FROM product WHERE id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>
