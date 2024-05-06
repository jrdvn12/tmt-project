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
        <div class="box-footer">
            <div class="pull-left">
                <div class="js-gtotal alert alert-success" id="totalDisplay" style="font-size:18px; font-weight:bold;">Total: ₱0.00</div>
            </div>
            <div class="pull-right">
                <a href='#' data-toggle='modal' class='btn btn-primary' onclick='openCheckModal()'><i class='fa fa-check-circle-o'></i> Checkout</a>
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
                        <div class="card-body text-center">
                            
                            
                                <img src="${imageSrc}" width="50px" height="100px" align="center">
                                <h3 >${response.product_number} Price : ₱${response.price}</h3>
                          
                                
                              
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <button class="btn btn-sm btn-primary remove-product">-</button>
                                </span>

                                <input type="text" class="form-control text-center quantity" value="1" readonly>
                                <span class="input-group-btn">
                                    <button class="btn btn-sm btn-primary add-product">+</button>
                                </span>
                            </div>
                            <div class="total-price">Total : ₱${response.price}</div>
                            <button class="btn btn-danger my-2 w-100 remove-item-button"><i class='fa fa-trash'></i> REMOVE ITEM</button>

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



//////////////////
//////////////////
//////////////////
function searchAndAddToReceipt(event) {
    console.log("searchAndAddToReceipt function called"); // Add this line for debugging
    if (event.key === 'Enter') {
        var searchInput = document.getElementById("searchInput");
        var searchInputId = document.getElementById("searchInput").value;
        var searchedItem = searchInput.value.trim().toUpperCase();
        
        // Filter products and add to receipt
        var products = document.querySelectorAll(".productRow");

        if(searchInput.value ===''){
            searchInput.value = '';
            filterProducts();
        }else{
            for (var i = 0; i < products.length; i++) {
                var product = products[i].querySelector(".card-body").innerText.toUpperCase();
                if (product.includes(searchedItem)) {
                    //var ids = products[i].getAttribute('data-product-id');
                    //addToReceipt(ids[i].innerHTML);
                    //addToReceipt(searchInputId); 
                    getRow(searchInputId);
                   
                }
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

 /*
 
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
}
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
        
        var card = event.target.closest('.card');
       
        console.log("Attempting to remove card element...");
      
        if (okayToRemoveCard()) {
            
            card.remove();      
            calculateTotal();
        } else {
      
        }
    }
});

function okayToRemoveCard() {
   
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