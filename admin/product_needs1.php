<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content    -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Product Needs
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
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
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Item Needs</th>
                            <th>Loads</th>
                            <th>Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Fetch data from database
                        $sql = "SELECT * FROM product_needs ORDER BY product_id";
                        $query = $conn->query($sql);

                        // Initialize variables for previous product_id and merged data
                        $prev_product_id = null;
                        $merged_product_name = '';
                        $merged_item_need = '';
                        $merged_loads = '';

                        // Loop through each row
                        while($row = $query->fetch_assoc()) {
                            // Check if the product_id is the same as the previous row
                            if ($row['product_id'] === $prev_product_id) {
                                // Merge product_name, item_need, and loads
                                $merged_product_name .= '<br>' . $row['product_name'];
                                $merged_item_need .= '<br>' . $row['item_need'];
                                $merged_loads .= '<br>' . $row['loads'];
                            } else {
                                // Output merged data from previous rows, if any
                                if ($prev_product_id !== null) {
                                    echo "<tr>";
                                    echo "<td>".$prev_product_id."</td>"; // Display product_id
                                    echo "<td>".$merged_product_name."</td>"; // Display merged product_name
                                    echo "<td>".$merged_item_need."</td>"; // Display merged item_need
                                    echo "<td>".$merged_loads."</td>"; // Display merged loads
                                    // Output other fields as needed
                                    echo "<td>
                                            <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$prev_product_id."'><i class='fa fa-trash'></i> Delete</button>
                                          </td>";
                                    echo "</tr>";
                                }

                                // Start merging new data for the current row
                                $prev_product_id = $row['product_id'];
                                $merged_product_name = $row['product_name'];
                                $merged_item_need = $row['item_need'];
                                $merged_loads = $row['loads'];
                            }
                        }

                        // Output the last row if there's any remaining merged data
                        if ($prev_product_id !== null) {
                            echo "<tr>";
                            echo "<td>".$prev_product_id."</td>"; // Display product_id
                            echo "<td>".$merged_product_name."</td>"; // Display merged product_name
                            echo "<td>".$merged_item_need."</td>"; // Display merged item_need
                            echo "<td>".$merged_loads."</td>"; // Display merged loads
                            // Output other fields as needed
                            echo "<td>
                                    <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$prev_product_id."'><i class='fa fa-trash'></i> Delete</button>
                                  </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    </section>   
  </div>
  <?php include 'includes/product_needs_modal.php'; ?>

  <?php include 'includes/footer.php'; ?>
 
</div>

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $(document).on('click', '.edit_item', function(e){
    e.preventDefault();
    $('#edit_item').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
  
  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });


  $('.view').click(function(e){
    e.preventDefault();
    $('#view').modal('show');
    var id = $(this).data('id');
    getRow(id);
    
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'product_need_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.id').val(response.id);
      $('#edit_product_number').val(response.id);

      
      $('.product_id').val(response.product_id);
      
      //edit 
      
      $('#product_needs_id').val(response.id);
      $('#product_needs_name').val(response.product_name);
      $('#item_need_edit').val(response.item_need);
      $('#item_loads_edit').val(response.loads);
      // delete
      $('.productname').html(response.product_name);
      $('.productnames').html(response.product_name);
      // view
      
    }
  });
}
</script>


</body>
</html>
