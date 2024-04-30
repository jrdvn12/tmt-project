<?php include 'includes/session.php'; ?>
<?php 
  include '../timezone.php'; 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition  sidebar-mini">
  <div class="wrapper">

  	<?php include 'includes/navbar.php'; ?>
    
  <!-- Content Wrapper. Contains page content -->
  
  <div class="content">
    <!-- Content Header (Page header) -->
    <?php $position = $user['position']; ?>
    <?php if($position == 'Admin' ){?>
    <section class="content-header">
      <h1>
        POINT OF SALES
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-9">
          <!-- Your existing content goes here -->
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
                                  echo "
                                  <option value='".$prow['id']."'>".$prow['vendor_name']."</option>
                                  ";
                              }
                            ?>
                  </select>
                </div>   
                <!-- Search bar -->
                <div class="input-group">        
                    <input type="text" id="searchInput" class="form-control" placeholder="Search..." oninput="filterProducts()">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                </div>                                     
          </div>


                  <!-- Table -->
                  <!-- Border around the table -->
                <div style="border: 2px solid #ccc; padding: 5px;">
                  <div style="max-height: 700px; overflow-y: auto;">
                      <table id="example1" class="table table-bordered">
                          <tbody id="productTableBody">
                              <?php
                              $sql = "SELECT * FROM main_inventory";
                              $query = $conn->query($sql);
                              while ($row = $query->fetch_assoc()) {
                                  // Accessing the photo field directly within the loop
                                  $image = (!empty($row['photo'])) ? '../images/' . $row['photo'] : '../images/noproduct.jpg';
                                  echo "
                                  <tr class='productRow' onclick='redirectToProductDetails(" . $row['id'] . ")'>
                                      <td>
                                          <div class='card'>
                                              <div class='card-body'>
                                                  <p> ".$row['product_number']."</p>
                                                  <img src='".$image."' width='100px' height='150px' align='center'><br>
                                                  <p> ".$row['product_name']."</p>
                                                  <p> ".$row['piececode']."</p>
                                                  <p>Price: ".$row['price']."</p>
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
        
        
        <!-- Right side wrapper for receipt -->
        <div class="col-md-3"> <!-- Change the width from col-md-3 to col-md-4 -->
            <div class="box box-solid" style="box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5);">
              <div class="box-header with-border">
                <h3 class="box-title">Receipt</h3>
              </div>
              <div class="box-body" id="receiptContent">
                <!-- Receipt content will be added here -->
              </div>
            </div>
          </div>
        
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include 'includes/footer.php'; ?>
</div>
<!-- ./wrapper -->
<?php
}else{
 include 'includes/autorize.php';
}?>

<?php include 'includes/scripts.php'; ?>
<script>
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
            td = tr[i].getElementsByTagName("td")[0]; // Assuming the product info is in the first td of each row
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
        // Simulate an AJAX request to fetch product details
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "get_product_details.php?id=" + productId, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Parse the JSON response
                var productDetails = JSON.parse(xhr.responseText);

                // Update the receipt section with the product details
                updateReceipt(productDetails);

                // Reapply focus to the search input field
                document.getElementById("searchInput").focus();
            }
        };
        xhr.send();
    }

    // Function to update the receipt section with product details
    function updateReceipt(productDetails) {
        // Assuming the receipt section has a div with id "receiptContent"
        var receiptContent = document.getElementById("receiptContent");

        // Create HTML markup for the product item
        var itemHtml = "<p>" + productDetails.product_name + ": $" + productDetails.price + "</p>";

        // Append the product item to the receipt
        receiptContent.insertAdjacentHTML('beforeend', itemHtml);

        // Calculate and update the total price
        calculateTotal();
    }

    // Function to calculate the total price in the receipt
    function calculateTotal() {
        // Calculate total price based on the items in the receipt
        var total = 0;
        var receiptItems = document.querySelectorAll("#receiptContent p");
        receiptItems.forEach(function(item) {
            var price = parseFloat(item.textContent.split(": $")[1]);
            total += price;
        });

        // Display total in the receipt section
        var receiptContent = document.getElementById("receiptContent");
        var totalHtml = "<hr><p>Total: $" + total.toFixed(2) + "</p>";
        receiptContent.innerHTML += totalHtml;
    }
</script>
</body>
</html>
