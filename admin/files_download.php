<?php
include 'includes/session.php';


// Get "from" and "to" dates from parameters
$fromDate = $_POST['datepicker_download_from'];
$toDate = $_POST['datepicker_download_to'];

// Fetch attendance data from your database based on date range
$sql = "SELECT * FROM attendance WHERE date BETWEEN '$fromDate' AND '$toDate'";
$result = $conn->query($sql);

// Fetch all attendance data from your database
$sql = "SELECT employee_id, date, time_in, status, time_out, num_hr, num_ot FROM attendance";
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Generate CSV file content
    $csvData = "Employee ID,Date,Time In,Status,Time Out,Hours Worked,Overtime Hours\n";
    while ($row = $result->fetch_assoc()) {
        $csvData .= $row['employee_id'] . "," . $row['date'] . "," . $row['time_in'] . "," . $row['status'] . "," . $row['time_out'] . "," . $row['num_hr'] . "," . $row['num_ot'] . "\n";
    }

    // Set headers for file download
    header("Content-type: text/csv");
    header("Content-Disposition: attachment; filename=attendance.csv");

    // Output the CSV data
    echo $csvData;
    $_SESSION['success'] = 'Attendance downloaded successfully';
} else {
   
    $_SESSION['error'] = 'No attendance data found';
   
}

// Close the database connection
$conn->close();
header('location: home.php');
?>
