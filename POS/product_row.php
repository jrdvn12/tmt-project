<?php 
    include 'includes/session.php';
    
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $sql = "SELECT * FROM main_inventory WHERE product_id = '$id' AND balance != 0 ORDER BY product_expiration ASC LIMIT 1";
        $query = $conn->query($sql);
        
        if ($query->num_rows > 0) {
            $row = $query->fetch_assoc(); // Fetch only one row
            echo json_encode($row);
        } else {
            echo json_encode(array("message" => "No data found."));
            
        }
    }
?>
