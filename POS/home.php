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
                                    <input type="text" id="searchInput" class="form-control" placeholder="Search..." onkeydown="searchAndAddToReceipt(event)">
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
        <div class="box-body" id="receiptContent" style="height: 560px; overflow-y: scroll;">
            <!-- Receipt content will be added here -->
        </div>
        <div class="box-footer clearfix">
            <div class="pull-left">
                <div class="js-gtotal alert alert-success" id="totalDisplay" style="font-size:25px; font-weight:bold;">Total: ₱0.00</div>
            </div>
            <div class="pull-right">
                <a href='#check' data-toggle='modal' class='btn btn-primary' onclick='calculateAndDisplayTotal()'><i class='fa fa-check-circle-o'></i> Checkout</a>
                <button class="btn btn-danger my-2 w-100" onclick="clearReceipt()"><i class='fa fa-trash'></i> Clear All</button>
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
            var existingProduct = $("#receiptContent .card[data-product-id='" + response.id + "']");
            if (existingProduct.length > 0) {
                // If the product exists, update its quantity and price
                var quantityElement = existingProduct.find('.quantity');
                var quantity = parseInt(quantityElement.val()) + 1;
                quantityElement.val(quantity);
                var totalPrice = quantity * response.price;
                var totalDisplay = existingProduct.find('.total-price');
                totalDisplay.text("Total: ₱" + totalPrice.toFixed(2));

                // Set focus on the quantity input field
                quantityElement.focus();
            } else {
                // If the product does not exist, add it to the receipt
                var imageSrc = response.photo ? '../images/' + response.photo : '../images/noproduct.jpg';
                var itemHtml = `
                    <div class="card" data-product-id="${response.id}" data-quantity="1" tabindex="0">
                        <div class="card-body text-center"> <!-- Center-align the card body content -->
                            <img src="${imageSrc}" width="150px" height="200px" align="center">
                            <p>${response.product_number} Price: ₱${response.price}</p>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <button class="btn btn-sm btn-danger remove-product">-</button>
                                </span>
                                <input type="text" class="form-control text-center quantity" value="1" readonly> <!-- Center-align the quantity textbox -->
                                <span class="input-group-btn">
                                    <button class="btn btn-sm btn-danger add-product">+</button>
                                </span>
                            </div>
                            <div class="total-price">Total: ₱${response.price}</div>
                        </div>
                    </div>`;
                $('#receiptContent').append(itemHtml);

                // Set focus on the quantity input field
                $('#receiptContent .card').last().find('.quantity').focus();
            }
            
            // Recalculate the total
            calculateTotal();
            // Clear search box and refocus
            $('#searchInput').val('');
            $('#searchInput').focus();
        }
    });
}

// Function to maintain focus when user clicks "more"
$('.more-button').click(function() {
    $('#searchInput').focus();
});


//////////////////
function searchAndAddToReceipt(event) {
    if (event.key === 'Enter') {
        var searchInput = document.getElementById("searchInput");
        var searchedItem = searchInput.value.trim().toUpperCase();
        
        // Filter products and add to receipt
        var products = document.querySelectorAll(".productRow");
        for (var i = 0; i < products.length; i++) {
            var product = products[i].querySelector(".card-body").innerText.toUpperCase();
            if (product.includes(searchedItem)) {
                addToReceipt(products[i].innerHTML);
            }
        }
        
        // Clear search input
        searchInput.value = '';
    }
}

function addToReceipt(item) {
    var receiptContent = document.getElementById('receiptContent');
    
    // Create a new div element for the item
    var newItem = document.createElement('div');
    newItem.innerHTML = item;
    
    // Append the new item to the receipt content
    receiptContent.appendChild(newItem);
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