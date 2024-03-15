<?php

$barcode = $_POST['barcode'];

// File path to store scanned barcodes
$filename = 'scanned_barcodes.txt';

// Check if the barcode already exists in the file
$fileContent = file_get_contents($filename);
if (strpos($fileContent, $barcode) !== false) {
    echo "Barcode already exists: " . $barcode;
} else {
    // Save scanned barcode to the text file
    file_put_contents($filename, $barcode . PHP_EOL, FILE_APPEND);
    echo "Barcode saved: " . $barcode;
}

?>