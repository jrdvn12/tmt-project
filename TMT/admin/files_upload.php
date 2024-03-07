<?php
include 'includes/session.php';

if(isset($_POST["add"])) {

// Enable error reporting for debugging purposes
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["f_upload"])) {
    $file = $_FILES["f_upload"];

    // Check if file was uploaded without errors
    if ($file["error"] == 0) {
        $filename = $file["name"];
        $tmpFilePath = $file["tmp_name"];

        // Check if file is a CSV file
        $fileType = pathinfo($filename, PATHINFO_EXTENSION);
        if ($fileType == "csv") {
            // Specify the directory where you want to save the uploaded file
            $uploadDirectory = "uploads/";

            // Generate a unique name for the file
            $newFilePath = $uploadDirectory . uniqid() . '_' . $filename;

            // Move the uploaded file to the specified directory
            if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                // Read CSV file and insert data into database
                $file = fopen($newFilePath, "r");
                if ($file !== false) {
                    while (($data = fgetcsv($file)) !== false) {
                        // Assuming your CSV file columns are in the order: employee_id, date, time_in, status, time_out, num_hr, num_ot
                        $sql = "INSERT INTO attendance (employee_id, date, time_in, status, time_out, num_hr, num_ot) 
                            VALUES ('" . $data[0] . "', '" . $data[1] . "', '" . $data[2] . "', '" . $data[3] . "', '" . $data[4] . "', '" . $data[5] . "', '" . $data[6] . "')";

                        // Execute SQL query
                        $result = $conn->query($sql);

                        // Check for errors
                        if (!$result) {
                            echo "Error inserting data: " . $conn->error;
                        }
                    }
                    fclose($file);
                    echo "Data inserted successfully.";
                } else {
                    echo "Error reading CSV file.";
                }
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "Only CSV files are allowed.";
        }
    } else {
        echo "Error uploading file: " . $file["error"];
    }
}


    
}
?>
