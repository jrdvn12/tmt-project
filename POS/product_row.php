<?php 
    include 'includes/session.php';
    // OR product_number = '$id' 
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $sql = "SELECT * FROM main_inventory WHERE product_id = '$id' ORDER BY product_expiration ASC LIMIT 1";
        $query = $conn->query($sql);
        $row = $query->fetch_assoc(); // Fetch only one row
        echo json_encode($row);
    }
?>
