<?php
// Check if receipt data is received
if(isset($_POST['receiptData'])) {
    // Decode the JSON data
    $receiptData = json_decode($_POST['receiptData'], true);
    
    // Print the received data for debugging
    echo "<table border='1'>";
    echo "<tr><th>Code</th><th>Price</th><th>Quantity</th></tr>";
    
    // Loop through the array and access each item
    foreach($receiptData as $item) {
        echo "<tr>";
        echo "<td>" . $item['code'] . "</td>";
        echo "<td>" . $item['price'] . "</td>";
        echo "<td>" . $item['quantity'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    // If no receipt data is received, echo an error message
    echo "Error: No receipt data received.";
}
?>

