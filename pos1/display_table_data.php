<?php
// Check if the table data has been sent via POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tableData'])) {
    // Decode the JSON string containing the table data
    $tableData = json_decode($_POST['tableData'], true);

    // Example processing of the table data
    // In this example, we'll simply output the received data as JSON
    echo json_encode($tableData);
} else {
    // If table data is not received or if the request method is not POST, return an error
    http_response_code(400); // Bad Request
    echo json_encode(array("error" => "Table data not received."));
}
?>
