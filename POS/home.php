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
                            <div class="box-body" id="receiptContent">
                                <!-- Replace this comment with the provided HTML code -->
                                
                                <div><center><h3>Receipt</h3></center></div>
                                <div class="table-responsive" style="height:400px;overflow-y: scroll;">
                                    <table class="table table-striped table-hover">
                                        <tr>
                                            <th style="padding-right: 20px;">Image</th>
                                            <th style="padding-right: 20px;">Description</th>
                                            <th style="padding-right: 20px;">Stock</th>
                                            <th>Amount</th>
                                        </tr>
                                        <tbody class="js-items">
                                        <!-- This tbody will contain dynamically added items -->
                                        </tbody>
                                    </table>
                                </div>
                                <div class="js-gtotal alert alert-success" style="font-size:25px; font-weight:bold;">Total: ₱0.00</div>

                        <div class="text-center"> <!-- Wrapping the buttons in a div with the text-center class -->
                            <button class="btn btn-success my-2 w-100" onclick="invoice_no()"><i class='fa fa-plus'></i> New</button>
                            <a href='#check' data-toggle='modal' class='btn btn-primary'><i class='fa fa-check-circle-o'></i> Checkout</a>
                            &nbsp;
                            <button class="btn btn-danger my-2 w-100" onclick="clearReceipt()"><i class='fa fa-trash'></i> Clear All</button>
                        </div> 
                    </div>

            </div>

            </section>
            <?php include 'includes/footer.php'; ?>
            <?php include 'includes/checkout_modal.php'; ?>
            <?php } else { include 'includes/autorize.php'; }?>
        </div>
    </div>
    <?php include 'includes/scripts.php'; ?>


    <script>
function invoice_no(){
    
    var randomNumber= rand(1, 100);
    
                $('#receiptContent').append(randomNumber);
}
function getRow(id) {
    $.ajax({
        type: 'POST',
        url: 'product_row.php',
        data: { id: id },
        dataType: 'json',
        success: function(response) {
            // Check if the product already exists in the receipt
            var existingProduct = $("#receiptContent p[data-product-id='" + response.id + "']");
            if (existingProduct.length > 0) {
                // If the product exists, update its quantity and price
                var quantity = parseInt(existingProduct.attr('data-quantity')) + 1;
                existingProduct.attr('data-quantity', quantity);
                var totalPrice = quantity * response.price;
               
                existingProduct.text(response.product_name + " (x" + quantity +"): ₱ " + totalPrice.toFixed(2));
            } else {
                // If the product does not exist, add it to the receipt
                var itemHtml = "<p data-product-id='" + response.id + "' data-quantity='1'>" + response.product_name + ": ₱ " + response.price + "</p>";
                $('#receiptContent').append(itemHtml);
            }
            // Recalculate the total
            calculateTotal();
            // Clear search box and refocus
            $('#searchInput').val('');
            $('#searchInput').focus();
        }
    });
}

/////////////////
function clearReceipt() {
        // Clear the content of the receipt
        document.getElementById("receiptContent").innerHTML = "";
        // Update the total display to show 0.00
        document.getElementById("totalDisplay").innerHTML = "<strong>Total: ₱ 0.00</strong>";
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
 
        
        // Function to update the receipt section with product details
        function updateReceipt(productDetails) {
            var receiptContent = document.getElementById("receiptContent");
            var itemHtml = "<p>" + productDetails.product_name + ": ₱ " + productDetails.price + "</p>";  
            receiptContent.insertAdjacentHTML('beforeend', itemHtml);
            calculateTotal();
            calculateCheckoutTotal(); // Update the total checkout amount
            document.getElementById("searchInput").focus();
        }

        // When the modal is shown
        $('#check').on('shown.bs.modal', function() {
            calculateCheckoutTotal();
        });


        
    </script>
</body>
</html>