<?php 
include 'includes/session.php';
include '../timezone.php'; 
include 'includes/header.php'; 
?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include 'includes/navbar.php'; ?>

        <div class="content">
            <?php $position = $user['position']; ?>
            <?php if($position == 'Admin' ){?>
            <section class="content-header">
                <h1>
                    POINT OF SALES
                </h1>
            </section>

            <section class="content">
                <div class="row">
                    <div class="col-md-9">
                        <?php
                        if(isset($_SESSION['error'])){
                            echo "
                                <div class='alert alert-danger alert-dismissible'>
                                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                    <h4><i class='icon fa fa-warning'></i> Error!</h4>
                                    ".$_SESSION['error']."
                                </div>
                            ";
                            unset($_SESSION['error']);
                        }
                        if(isset($_SESSION['success'])){
                            echo "
                                <div class='alert alert-success alert-dismissible'>
                                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                    <h4><i class='icon fa fa-check'></i> Success!</h4>
                                    ".$_SESSION['success']."
                                </div>
                            ";
                            unset($_SESSION['success']);
                        }
                        ?>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="vendor_name" class="col-sm-2 control-label">Vendor Name</label>
                                <div class="col-sm-3">
                                    <select class="form-control" name="vendor_name" id="vendor_name" required>
                                        <?php
                                            $sql = "SELECT * FROM vendor";
                                            $query = $conn->query($sql);
                                            while($prow = $query->fetch_assoc()){
                                                echo "<option value='".$prow['id']."'>".$prow['vendor_name']."</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                
                                <div class="input-group">        
                                    <input type="text" id="searchInput" class="form-control" placeholder="Search..." oninput="filterProducts()">
                                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                </div>                                     
                            </div>

                            <div style="border: 2px solid #ccc; padding: 5px;">
                                <div style="max-height: 700px; overflow-y: auto;">
                                    <table id="example1" class="table table-bordered">
                                        <tbody id="productTableBody">
                                            <?php
                                            $sql = "SELECT * FROM product";
                                            $query = $conn->query($sql);
                                            while ($row = $query->fetch_assoc()) {
                                                $image = (!empty($row['photo'])) ? '../images/' . $row['photo'] : '../images/noproduct.jpg';
                                                echo "
                                                    <tr class='productRow' onclick='getRow(" . $row['id'] . ")'>
                                                        <td>
                                                            <div class='card'>
                                                                <div class='card-body'>
                                                                    <p>" . $row['product_number'] . "</p>
                                                                    <img src='" . $image . "' width='100px' height='150px' align='center'><br>
                                                                    <p>" . $row['product_name'] . "</p>
                                                                    <p>" . $row['piececode'] . "</p>
                                                                    <p>Price: " . $row['price'] . "</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                ";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="box box-solid" style="box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5);">
                            <div class="box-header with-border">
                                <h3 class="box-title">Receipt</h3>
                            </div>
                            <div class="box-body" id="receiptContent" style="height: 600px; overflow-y: scroll;">
                                <!-- Receipt content will be added here -->
                            </div>
                            <div class="box-footer clearfix">
                                <div class="pull-left" id="totalDisplay">
                                    <strong>Total: ₱ 0.00</strong>
                                </div>
                                <div class="pull-right">
                                    <button class="btn btn-success">Checkout</button>
                                    <button class="btn btn-info my-2 w-100" onclick="clearReceipt()">Clear All</button>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </section>
            <?php include 'includes/footer.php'; ?>
            <?php } else { include 'includes/autorize.php'; }?>
        </div>
    </div>
    <?php include 'includes/scripts.php'; ?>


<script>

function getRow(id) {
    $.ajax({
        type: 'POST',
        url: 'product_row.php',
        data: { id: id },
        dataType: 'json',
        success: function(response) {
            $('.id').val(response.id);

            //edit
            $('.vendor_name').html(response.vendor_name);

            $('#edit_email_address').val(response.email_address);

            // Update the receipt content with the product details
            var receiptContent = document.getElementById("receiptContent");
            var itemHtml = "<p>" + response.product_number + ": ₱ " + response.price + "</p>";
            receiptContent.insertAdjacentHTML('beforeend', itemHtml);

            

            // Clear search box and refocus
            document.getElementById("searchInput").value = "";
            document.getElementById("searchInput").focus();
        }

    });
}
/////////////////

$(document).ready(function() {
    // Add event listener to the search input
    $('#searchInput').on('input', function() {
        // Call a function to reload the table data
        reloadTableData();
    });
});

function reloadTableData() {
    // Perform AJAX request to reload the table data
    $.ajax({
        type: 'POST',
        url: 'reload_table_data.php', // Replace 'reload_table_data.php' with the appropriate URL
        data: { searchText: $('#searchInput').val() }, // Send the search input value to the server
        dataType: 'html', // Assuming the server returns HTML for the table
        success: function(response) {
            // Update the table with the new data
            $('#example1').html(response);
        },
        error: function(xhr, status, error) {
            // Handle any errors that occur during the AJAX request
            console.error(xhr.responseText);
        }
    });
}

///////////////////////
function calculateTotal() {
    var receiptItems = document.querySelectorAll("#receiptContent p");
    var total = 0;
    for (var i = 0; i < receiptItems.length; i++) {
        var price = parseFloat(receiptItems[i].textContent.split("₱")[1]); // Extract price from each item
        total += price;
    }
    // Display the total amount in the receipt
    var totalDisplay = document.getElementById("totalDisplay");
    totalDisplay.textContent = "Total: ₱" + total.toFixed(2);
}



        // JavaScript for filtering table rows
        function filterProducts() {
            // Declare variables
            var input, filter, table, tbody, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("example1");
            tbody = document.getElementById("productTableBody");
            tr = tbody.getElementsByClassName("productRow");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        // Focus the search input field when the page loads
        window.onload = function() {
            document.getElementById("searchInput").focus();
        };

        // Function to handle product click event
        function redirectToProductDetails(productId) {

          $_SESSION['success'] = 'Vendor updated successfully';
            document.getElementById("searchInput").focus();

            var xhr = new XMLHttpRequest();
            xhr.open("GET", "product_row.php?id=" + productId, true);
           
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var productDetails = JSON.parse(xhr.responseText);
                    
                    updateReceipt(productDetails);
                    document.getElementById("searchInput").focus();
                }
            };
            xhr.send();
        }

        // Function to update the receipt section with product details
        function updateReceipt(productDetails) {
            var receiptContent = document.getElementById("receiptContent");
            var itemHtml = "<p>" + productDetails.product_name + ": ₱ " + productDetails.price + "</p>";  
            receiptContent.insertAdjacentHTML('beforeend', itemHtml);
            calculateTotal();
            document.getElementById("searchInput").focus();
        }
 
        // Function to calculate the total price in the receipt
        function calculateTotal() {
            var total = 0;
            var receiptItems = document.querySelectorAll("#receiptContent p");
            receiptItems.forEach(function(item) {
                var price = parseFloat(item.textContent.split(": $")[1]);
                total += price;
            });
            var receiptContent = document.getElementById("receiptContent");
            var totalHtml = "<hr><p>Total: ₱ " + total.toFixed(2) + "</p>";
            receiptContent.innerHTML += totalHtml;
        }

    function clearReceipt() {
        // Clear the content of the receipt
        document.getElementById("receiptContent").innerHTML = "";
        // Update the total display to show 0.00
        document.getElementById("totalDisplay").innerHTML = "<strong>Total: ₱ 0.00</strong>";
    }

    var voidCodes = <?php echo json_encode($void_codes); ?>;

    function clearReceipt() {
        var code = prompt("Are you sure you want to clear all items in the list??!!");

        // Check if the code matches
        if (code === null || code.trim() === '') {
            return; // User canceled or entered empty code
        } else if (voidCodes.includes(code.trim())) {
            ITEMS = [];
            refresh_items_display();
            setTimeout(function () {
                location.reload();
            }, 100);
        } else {
            alert("Incorrect code. Items not removed.");
        }

    }

    </script>
</body>
</html>
