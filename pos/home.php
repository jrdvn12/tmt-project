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
                                <h3 class="box-title"><h1><center><b>RECEIPT</b></center></h1></h3>
                            </div>
                                <div class="box-body" id="receiptContent" style="height: 450px; overflow-y: scroll;">
                                    <table class=" table-bordered">
                                        <thead>
                                            
                                                <th style="width: 80px;">Photo</th>
                                                <th style="width: 80px;">Code</th>
                                                <th style="width: 80px;">Price</th>
                                                <th style="width: 250px;">Quantity</th>
                                                <th style="width: 100px;">Stock</th>
                                                <th style="width: 150px;">Total</th>
                                                <th style="width: 80px;">Action</th>
                                                <th class="hidden"></th>
                                           
                                        </thead>
                                            <tbody id="receiptTableBody">
                                                <!-- Receipt items will be added here -->
                                               
                                            </tbody>
                                    </table>
                                </div>

                                    <div class="box-footer">
                                        
                                            <div class="js-gtotal alert alert-success" id="totalDisplay" style="font-size:40px; font-weight:bold;">Total: ₱0.00</div>
                                        <div class="pull-left" style="width : 49%;" >
                                            <a href='#' data-toggle='modal' class='btn btn-primary' onclick='openCheckModal()' style="width : 100%; font-size:40px; font-weight:bold;"><i class='fa fa-check-circle-o'></i> Check Out</a>
                                        </div>
                                        <div class="pull-right"style="width : 49%;"  >
                                            <!-- <a href='#' data-toggle='modal' class='btn btn-primary' onclick='getAllDataFromReceiptContent()'><i class='fa fa-check-circle-o'></i> Checkout</a> -->
                                            
                                            <button class="btn btn-danger my-2 w-100" onclick="clearReceipt()" style="width : 100%;font-size:40px; font-weight:bold;"><i class='fa fa-trash'></i> Clear All</button>
                                            
                                            <!-- <a href='#' data-toggle='modal' class='btn btn-primary' id="proceedBtn"><i class='fa fa-check-circle-o'></i> Checkout</a> -->
                                            
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
// Add an event listener to the proceed button
document.addEventListener('click', function(event) {
   
    if (event.target && event.target.id === 'proceedBtn') {
        // Get the selected vendor value
        $('#total_amount_gross').focus();
        
       
     
        $('#total_amount_gross').focus();
        $('#changeAmount').text('0.00');
        $('#total_amount_gross').text('0.00');
       
          
       
            calculateTotal();
        var selectedVendor = document.getElementById('vendor_name').value;

        // Get the selected payment value
        var selectedPayment = document.getElementById('total_amount_gross').value;

        // Get the selected amount value
        var selectedAmount = document.getElementById('checkoutTotal').textContent;

        // Get the selected change value
        var selectedChange = document.getElementById('changeAmount').textContent;
        
        // Collect all data from the receipt table body
        var receiptData = [];
        var tableRows = document.querySelectorAll('#receiptTableBody tr');

        tableRows.forEach(function(row) {
            var rowData = {
                
                code: row.querySelector('td:nth-child(2)').textContent,
                price: row.querySelector('td:nth-child(3)').textContent.replace('₱', ''),
                quantity: row.querySelector('td:nth-child(4) input').value,
                total_amount: row.querySelector('td:nth-child(6)').textContent.replace('₱', ''),
                description: row.querySelector('td:nth-child(8)').textContent,
                product_id: row.querySelector('td:nth-child(9)').textContent,
                pid: row.querySelector('td:nth-child(10)').textContent,
            };
            receiptData.push(rowData);
        });

        // Now, receiptData contains all the data from the receipt table body
        // Check if the receiptData array is empty
        if(receiptData.length === 0) {
            // If receiptData is empty, display an error message
            showConsoleLogMessage("Error: No receipt data received.");
            return; // Exit the function
        }
        
        // Send the data to reciept_generate.php using AJAX
        $.ajax({
                type: 'POST',
                url: 'receipt_generate.php',
                data: { receiptData: JSON.stringify(receiptData),
                        selectedVendor: selectedVendor,
                        selectedPayment: selectedPayment,
                        selectedAmount: selectedAmount,
                        selectedChange: selectedChange,
                     },
                success: function(response) {
                    // Handle success response from the server 
                    //showConsoleLogMessage('Receipt data sent successfully');
                    //showConsoleLogMessage(response);
                    setTimeout(function() {
                        var receiptDataString = JSON.stringify(receiptData);
                        var url = 'receipt?receiptData=' + encodeURIComponent(receiptDataString) +
                            '&selectedVendor=' + encodeURIComponent(selectedVendor) +
                            '&selectedPayment=' + encodeURIComponent(selectedPayment) +
                            '&selectedAmount=' + encodeURIComponent(selectedAmount) +
                            '&selectedChange=' + encodeURIComponent(selectedChange);
                        window.open(url, '_blank');

                    }, 200);
                    $('#check').modal('hide');
                    $('#receiptTableBody').empty();
                    $('#searchInput').val('');
                    $('#searchInput').focus();
            
                    calculateTotal();

                     // 2000 milliseconds = 2 seconds
                    // Optionally, you can redirect the user or perform other actions here
                },
                error: function(xhr, status, error) {
                    // Handle error response from the server
                    showConsoleLogMessage('Error sending receipt data:', error);
                }
            });

    }
});




  function getAllDataFromReceiptContent() {
    
    console.log("All data from receiptContent:");
}

function invoice_no(){
    
    var randomNumber= rand(1, 100);
    
                $('#receiptContent').append(randomNumber);
}
// MODAL
function showConsoleLogMessage(message) {
    // Create a modal or a dialog box to display the console.log message
    var modalContent = 
        '<div id="consoleLogModal" class="modal" tabindex="-1" role="dialog">' +
            '<div class="modal-dialog" role="document">' +
                '<div class="modal-content">' +
                    '<div class="modal-body">' +
                        '<h1><center>' + message + '</center></h1>' +
                    '</div>' +
                    '<div class="modal-footer">' +
                        '<button id="okButton" type="button" class="btn btn-primary" data-dismiss="modal">OK</button>' +
                    '</div>' +
                '</div>' +
            '</div>' +
        '</div>';

    // Append the modal to the body 
    $('body').append(modalContent);

    // Show the modal
    $('#consoleLogModal').modal('show');

    // Set focus to the OK button after a short delay to ensure modal rendering
    setTimeout(function() {
        $('#okButton').focus();
    }, 1);

    // Remove the modal from the DOM after it is closed
    $('#consoleLogModal').on('hidden.bs.modal', function(e) {
        $(this).remove();
        // After modal is closed, focus on searchInput
        $('#searchInput').val('');
        $('#searchInput').focus();
    });
}


function getRow(id) {
    //$(this).closest('tr').find('.quantity');
    $('.quantity').focus();
    $.ajax({
        type: 'POST',
        url: 'product_row.php',
        data: { id: id },
        dataType: 'json',
        success: function(response) {
            // Check if the product already exists in the receipt
            var existingRow = $("#receiptTableBody tr[data-product-id='" + response.id + "']");
            //$("#receiptTableBody tr[data-product-id='" + response.id + "']").focus();
           
            if (existingRow.length > 0) {
                // If the product exists, update its quantity and price
                var quantityInput = existingRow.find('.quantity');
                var quantity = parseInt(quantityInput.val()) + 1;
                if (quantity <= response.balance) {
                    //$('.quantity').focus();
                    quantityInput.val(quantity);
                    var totalPriceCell = existingRow.find('.total-price');
                    var totalPrice = quantity * response.price;
                    totalPriceCell.text("₱" + totalPrice.toFixed(2));
                } else {
                    showConsoleLogMessage("Cannot add more than available stock<br>Available Stock for this Items<br>" + response.balance);
                }
            } else {
                // If the product does not exist, add a new row to the table 
                var imageSrc = response.photo ? '../images/' + response.photo : '../images/noproduct.jpg';

                var price = parseFloat(response.price);
                var newRow = `
                    <tr data-product-id="${response.id}">
                        <td style="width: 80px;"><img src="${imageSrc}" width="80px" height="100px" align="center"></td>
                        <td style="width: 80px;">${response.product_number}</td>
                        <td style="width: 80px;">₱${price.toFixed(2)}</td>
                        <td>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <button style="height: 100px;" class="btn btn-sm btn-primary decrement-quantity"><i class="fa fa-minus"></i></button>
                                </span>
                                
                                <input style="height: 100px; font-weight: bold; font-size: 30px;" type="text" class="form-control text-center quantity" value="1" oninput="this.value = this.value.replace(/[^0-9]/g, '')">


                                <span class="input-group-btn">
                                    <button style="height: 100px;" class="btn btn-sm btn-primary increment-quantity"><i class="fa fa-plus"></i></button>
                                </span>
                            </div>
                        </td>
                        <td style="font-weight: bold; font-size: 30px;">${response.balance}</td>
                        <td class="total-price">₱${price.toFixed(2)}</td>
                        <td style="width: 80px;"><button class="btn btn-danger remove-item-button"><i class='fa fa-trash'></i></button></td>
                        <td class="hidden">${response.product_name}</td>
                        <td class="hidden">${response.product_id}</td>
                        <td class="hidden">${response.id}</td>
                        </tr>`;
                        

                $("#receiptTableBody").append(newRow);
            }

            // Recalculate the total
            calculateTotal();
            // Clear search box and refocus
            $('#searchInput').val('');
            $('#searchInput').focus();

            $('.decrement-quantity').unbind('click');
            $('.increment-quantity').unbind('click');
            
            // Add event listeners for increment and decrement buttons
            $('.decrement-quantity').click(function() {
                var quantityInput = $(this).closest('tr').find('.quantity');
                var quantity = parseInt(quantityInput.val()) - 1;
                if (quantity > 0) {
                    quantityInput.val(quantity);
                    updateTotalPrice($(this).closest('tr'), quantity, response.price);
                    calculateTotal();
                }
            });

            $('.increment-quantity').click(function() {
                var quantityInput = $(this).closest('tr').find('.quantity');
                var quantity = parseInt(quantityInput.val()) + 1;
                if (quantity <= response.balance) {
                    quantityInput.val(quantity);
                    updateTotalPrice($(this).closest('tr'), quantity, response.price);
                    calculateTotal();
                } else {
                    showConsoleLogMessage("Cannot add more than available stock<br>Available Stock for this Items<br>"+ response.product_number + "<br>" + response.balance);
                }
            });

            // Add event listener for quantity input changes   
            //$('.quantity').on('input', function() {
            $('#receiptTableBody tr:last-child .quantity').on('input', function() {
                var quantity = parseInt($(this).val());
                if (!isNaN(quantity) && quantity > 0 && quantity <= response.balance) {
                    
                   
                    updateTotalPrice($(this).closest('tr'), quantity, response.price);
                    calculateTotal();
                }
                else if  (isNaN(quantity) || quantity <= 0 ) {
                    showConsoleLogMessage("Invalid quantity<br>Available Stock for this Items<br>" + response.product_number + "<br>"+ response.balance);
                    // Set the value of the quantity input field to the available balance  
                    var quantity = 1;
                    $(this).closest('tr').find(".quantity").val(quantity);
                   
                    updateTotalPrice($(this).closest('tr'), quantity, response.price);
                    calculateTotal();
                }
                else {
                   
                    showConsoleLogMessage("Exceeding stock<br>Available Stock for this Items<br>" + response.product_number + "<br>"+ response.balance);
                    // Set the value of the quantity input field to the available balance
                    $(this).closest('tr').find(".quantity").val(response.balance);
                    var quantity = response.balance;
                    updateTotalPrice($(this).closest('tr'), quantity, response.price);
                    calculateTotal();
                    
                }
            });
        }
        
    }); 
}

function updateTotalPrice(row, quantity, price) {
    var totalPriceCell = row.find('.total-price');
    var totalPrice = quantity * price;
    totalPriceCell.text("₱" + totalPrice.toFixed(2));
}

/*function calculateTotal() {
    var total = 0;
    $('#receiptTableBody tr').each(function() {
        var totalPriceText = $(this).find('.total-price').text();
        var totalPrice = parseFloat(totalPriceText.replace('₱', ''));
        total += totalPrice;
    });
    $('#totalAmount').text("Total: ₱" + total.toFixed(2));
}*/




////////////////////// get data



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
                showConsoleLogMessage("No matching product found.");
                
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
/////////////////
/////////////////
function clearReceipt() {
    // Confirmation message before clearing receipt
    if (okayToClearReceipt()) {
        console.log("Receipt cleared successfully.");
        // Remove all rows from the table body
        $('#receiptTableBody').empty();
        // Update the total display to show 0.00
        $('#totalAmount').text("Total: ₱ 0.00");
        // Clear search input and focus on it
        $('#searchInput').val('');
        $('#searchInput').focus();

        calculateTotal();
          
    }
}

function okayToClearReceipt() {
    return confirm("Are you sure you want to clear the receipt?");
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
}
//new
function openCheckModal() {
        // Clear the value of the input field with id "amount"
        $('#total_amount_gross').value = "";
        // Open the modal
        $('#total_amount_gross').text('0.00');
        $('#total_amount_gross').focus();
        $('#check').modal('show');
        $('#changeAmount').text('0.00');
       
       // $('#searchInput').val('');
        //$('#searchInput').focus();

       // window.location.href ="reciept_generate"; 
}



        // Add an event listener to the "REMOVE ITEM" button
document.addEventListener('click', function(event) {
if (event.target && event.target.classList.contains('remove-item-button')) {
        var row = event.target.closest('tr');
        var productId = row.getAttribute('data-product-id');
        
        
        //showConsoleLogMessage("Attempting to remove row element...");
        if (okayToRemoveRow()) {
            row.remove();
            calculateTotal();
        }
    }
});

function okayToRemoveRow() {
    return confirm("Are you sure you want to remove this item?");
}


    </script>
</body>
</html>