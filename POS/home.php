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
        POS
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
    <!-- Search bar -->
    <div class="form-group">
        <input type="text" id="searchInput" class="form-control" placeholder="Search..." oninput="filterProducts()">
    </div>
    <!-- Table -->
    <table id="example1" class="table table-bordered">
        <tbody id="productTableBody">
            <?php
            $sql = "SELECT * FROM product";
            $query = $conn->query($sql);
            while ($row = $query->fetch_assoc()) {
                // Accessing the photo field directly within the loop
                $image = (!empty($row['photo'])) ? '../images/' . $row['photo'] : '../images/noproduct.jpg';
                echo "
                <tr>
                    <td>
                        <div class='card text-right'> <!-- Added 'text-right' class to align the card to the right -->
                            <div class='card-body'>
                                <p> ".$row['product_number']."</p>
                                <img src='".$image."' width='100px' height='150px' align='center'><br>
                                <p> ".$row['product_name']."</p>
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
        
        
        <!-- Right side wrapper for receipt -->
        <?php include 'includes/receipt.php'; ?>
        
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
    document.getElementById("searchInput").addEventListener("keyup", function() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("example1");
        tr = table.getElementsByTagName("tr");
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
    });

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

</script>
</body>
</html>
