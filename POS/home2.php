<?php 
include 'includes/session.php';
include '../timezone.php'; 
include 'includes/header.php'; 
?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include 'includes/navbar.php'; ?>

        <div class="content" >
            <?php $position = $user['position']; ?>
            <?php if($position == 'Admin' ){?>
            <section class="content-header">
                <h1>
                    POINT OF SALES
                </h1>
            </section>

            <section class="content">
                <div class="row">
                    <div class="col-md-6">
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
                                    <input type="text" id="searchInput" class="form-control" placeholder="Search..." oninput="filterProducts()" onkeydown="searchAndAddToReceipt(event)">
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
                                                ?>
                                                <tr class="productRow" data-product-id="<?php echo htmlspecialchars($row['id'], ENT_QUOTES); ?>" onclick="getRow(<?php echo htmlspecialchars($row['id'], ENT_QUOTES); ?>)">
                                                    <td>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <p id="productId" style="display: none;"><?php echo htmlspecialchars($row['id'], ENT_QUOTES); ?></p> <!-- Assigned an ID here -->
                                                                <p><?php echo htmlspecialchars($row['product_number'], ENT_QUOTES); ?></p>
                                                                <img src="<?php echo htmlspecialchars($image, ENT_QUOTES); ?>" width="100px" height="150px" align="center"><br>
                                                                <p><?php echo htmlspecialchars($row['product_name'], ENT_QUOTES); ?></p>
                                                                <p><?php echo htmlspecialchars($row['piececode'], ENT_QUOTES); ?></p>
                                                                <p>Price: <?php echo htmlspecialchars($row['price'], ENT_QUOTES); ?></p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
    <div class="box box-solid" style="box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5);">
        <div class="box-header with-border">
            <h3 class="box-title">Receipt</h3>
        </div>
        <div class="box-body" id="receiptContent" style="height: 560px; overflow-y: scroll;">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Photo</th>
                <th>Product Number</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="receiptTableBody">
            <!-- Receipt items will be added here -->
        </tbody>
    </table>
</div>

        <div class="box-footer">
            <div class="pull-left">
                <div class="js-gtotal alert alert-success" id="totalDisplay" style="font-size:18px; font-weight:bold;">Total: ₱0.00</div>
            </div>
            <div class="pull-right">
                <!-- <a href='#' data-toggle='modal' class='btn btn-primary' onclick='getAllDataFromReceiptContent()'><i class='fa fa-check-circle-o'></i> Checkout</a> -->
                <a href='#' data-toggle='modal' class='btn btn-primary' onclick='openCheckModal()'><i class='fa fa-check-circle-o'></i> Checkout</a>
                <button class="btn btn-danger my-2 w-100" onclick="clearReceipt()"><i class='fa fa-trash'></i> Clear All</button>
                <button type="submit" class="btn btn-success btn-flat" name="delete" onclick='getAllDataFromReceiptContent()'><i class="fa fa-arrow-right"></i> Proceed</button>
                
            </div>
        </div>
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
  function getAllDataFromReceiptContent() {
    
    console.log("All data from receiptContent:");
}

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
            var existingRow = $("#receiptTableBody tr[data-product-id='" + response.id + "']");
            if (existingRow.length > 0) {
                // If the product exists, update its quantity and price
                var quantityCell = existingRow.find('.quantity');
                var quantity = parseInt(quantityCell.text()) + 1;
                quantityCell.text(quantity);

                var totalPriceCell = existingRow.find('.total-price');
                var totalPrice = quantity * response.price;
                totalPriceCell.text("₱" + totalPrice.toFixed(2));
            } else {
                // If the product does not exist, add a new row to the table
                var imageSrc = response.photo ? '../images/' + response.photo : '../images/noproduct.jpg';
                
                var newRow = `
                    <tr data-product-id="${response.id}">
                        <td><img src="${imageSrc}" width="80px" height="100px" align="center"></td>
                        <td>${response.product_number}</td>
                        <td>₱${response.price}</td>
                        <td class="quantity">1</td>
                        <td class="total-price">₱${response.price}</td>
                        <td><button class="btn btn-danger remove-item-button"><i class='fa fa-trash'></i> Remove</button></td>
                    </tr>`;
                $("#receiptTableBody").append(newRow);
            }
            
            // Recalculate the total
            calculateTotal();
        }
    });
}




//////////////////
//////////////////
//////////////////
function searchAndAddToReceipt(event) {
    console.log("searchAndAddToReceipt function called"); // Add this line for debugging
    if (event.key === 'Enter') {
        var searchInput = document.getElementById("searchInput");
        var searchedItem = searchInput.value.trim().toUpperCase();
        
        // Filter products and add to receipt
        var products = document.querySelectorAll(".productRow");

        if (searchInput.value === '') {
            searchInput.value = '';
            filterProducts();
        } else {
            var found = false; // Flag to track if a product has been found
            for (var i = 0; i < products.length; i++) {
                var product = products[i].querySelector(".card-body").innerText.toUpperCase();
                if (product.includes(searchedItem)) {
                    var productId = products[i].getAttribute('data-product-id'); // Retrieve product ID
                    getRow(productId);
                    found = true; // Set flag to true indicating a product has been found
                    break; // Exit the loop after adding the first matching product
                }
            }
            // If no product was found, you can handle it here
            if (!found) {
                console.log("No matching product found.");
                searchInput.value = '';
                filterProducts();
            }
        }
        
        // Clear search input
        searchInput.value = '';
        filterProducts();
    }
}





/////////////////
function clearReceipt() {
        // Clear the content of the receipt
        document.getElementById("receiptContent").innerHTML = "";
        // Update the total display to show 0.00
        document.getElementById("totalDisplay").innerHTML = "<strong>Total : ₱ 0.00</strong>";

 
    }

///////////////////////
function calculateTotal() {
    var receiptItems = document.querySelectorAll("#receiptContent .total-price");
    var total = 0;
    for (var i = 0; i < receiptItems.length; i++) {
        var price = parseFloat(receiptItems[i].textContent.split("₱")[1]); // Extract price from each item
        total += price;
    }
    // Display the total amount in the totalDisplay div
    var totalDisplay = document.getElementById("totalDisplay");
    totalDisplay.textContent = "Total: ₱" + total.toFixed(2);
    
    var checkoutTotal = document.getElementById("checkoutTotal");
    checkoutTotal.textContent =  total.toFixed(2);
    
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

 
 
 // Function to maintain focus when user clicks "more"
$('.more-button').click(function() {
    $('#searchInput').focus();
});

 function addToReceipt(item) {
    var receiptContent = document.getElementById('receiptContent');
    
    // Create a new div element for the item
    var newItem = document.createElement('div');
    newItem.innerHTML = item;
    
    // Append the new item to the receipt content
    receiptContent.appendChild(newItem);
}/*
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
        });*/

//new
function openCheckModal() {
        // Clear the value of the input field with id "amount"
        document.getElementById("total_amount_gross").value = "";

        // Open the modal
        $('#check').modal('show');
    }



        // Add an event listener to the "REMOVE ITEM" button
document.addEventListener('click', function(event) {
    if (event.target && event.target.classList.contains('remove-item-button')) {
        var row = event.target.closest('tr');
        var productId = row.getAttribute('data-product-id');
        
        console.log("Attempting to remove row element...");

        if (okayToRemoveRow()) {
            row.remove();
            calculateTotal();
        }
    }
});

function okayToRemoveRow() {
    return confirm("Are you sure you want to remove this item?");
}




// Add event listener for removing a product
document.addEventListener('click', function(event) {
    if (event.target && event.target.classList.contains('remove-product')) {
        var quantityInput = event.target.parentElement.nextElementSibling;
        var quantity = parseInt(quantityInput.value);
        if (quantity > 1) {
            quantityInput.value = quantity - 1;
            // Recalculate total
            calculateTotal();
        }
    }
});

// Add event listener for adding a product
document.addEventListener('click', function(event) {
    if (event.target && event.target.classList.contains('add-product')) {
        var quantityInput = event.target.parentElement.previousElementSibling;
        var quantity = parseInt(quantityInput.value);
        quantityInput.value = quantity + 1;
        // Recalculate total
        calculateTotal();
    }
});
    </script>
</body>
</html>