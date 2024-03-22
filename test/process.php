<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the barcode field is set and not empty
    if(isset($_POST["barcode"]) && !empty($_POST["barcode"])) {
        $barcode = $_POST["barcode"];
        
        // Process the barcode data as needed
        // For demonstration, let's simply echo the barcode value
        echo "Scanned Barcode: " . $barcode;
    } else {
        // If barcode field is empty or not set, display an error message
        echo "No barcode scanned.";
    }
} else {
    // If request method is not POST, display an error message
    echo "Invalid request method.";
}
?>
