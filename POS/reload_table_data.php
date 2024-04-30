<?php
// Include necessary files and configurations
include 'includes/session.php'; // Include database connection file

// Check if the search text is provided
if (isset($_POST['searchText'])) {
    // Sanitize the search input to prevent SQL injection
    $searchText = mysqli_real_escape_string($conn, $_POST['searchText']);

    // Construct SQL query to fetch table data based on the search input
    $sql = "SELECT * FROM main_inventory WHERE product_name LIKE '%$searchText%'"; // Example query, adjust as needed

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if there are any rows returned
    if ($result) {
        // Start building the HTML table
        $html = '<table id="example1" class="table table-bordered">
                    <tbody id="productTableBody">';

        // Loop through the results and construct HTML table rows
        while ($row = mysqli_fetch_assoc($result)) {
            // Append HTML table row for each result
            $html .= '<tr>
                          <td>
                              <div class="card">
                                  <div class="card-body">
                                      <p>'.$row['product_number'].'</p>
                                      <!-- Include other product details here -->
                                  </div>
                              </div>
                          </td>
                      </tr>';
        }

        // Close the table tags
        $html .= '</tbody></table>';

        // Output the HTML table
        echo $html;
    } else {
        // Query execution failed
        echo "Error executing query: " . mysqli_error($conn);
    }
} else {
    // Search text not provided
    echo "Search text not provided.";
}

// Close the database connection
mysqli_close($conn);
?>
