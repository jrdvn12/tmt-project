<?php
// Include necessary files and configurations
include 'conn.php'; // Include database connection file

// Check if the product ID is provided and is valid
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $product_id = mysqli_real_escape_string($conn, $_GET['id']);

    // Query to retrieve product details based on the provided ID
    $query = "SELECT * FROM products WHERE id = '$product_id'";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result) {
        // Check if the product was found
        if (mysqli_num_rows($result) > 0) {
            // Fetch the product details as an associative array
            $product_details = mysqli_fetch_assoc($result);

            // Convert the product details to JSON format and output
            echo json_encode($product_details);
        } else {
            // Product not found
            echo json_encode(array('error' => 'Product not found'));
        }
    } else {
        // Error executing query
        echo json_encode(array('error' => 'Error executing query'));
    }
} else {
    // Product ID not provided or empty
    echo json_encode(array('error' => 'Product ID not provided'));
}

// Close database connection
mysqli_close($conn);
?>
