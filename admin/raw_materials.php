<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Raw Materials
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User</li>
      </ol> -->
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
                  
                  <th>Batch Code</th>
                  <th>Material Type</th>
                  <th>Material Name</th>
                  <th>Material Batch</th>
                  <th>Material Load</th>
                  <th>Material Usage</th>
                  <th>Material Remaining</th>
                  <th>Date Stock</th>
                  <th>Expiration</th>
                  <th>Tools</th>
                  
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, type_raw_materials.material_type AS mts FROM raw_materials  LEFT JOIN type_raw_materials ON raw_materials.material_type = type_raw_materials.id";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                     
                      echo "
                        <tr>
                          
                          <td>".$row['material_code']."</td>
                          <td>".$row['mts']."</td>
                          <td>".$row['material_name']."</td>  
                          <td>".$row['material_batch']."</td> 
                          <td>".$row['loads']."</td>
                          <td>".$row['material_usage']."</td>
                          <td>".$row['material_remaining']."</td>
                          <td>".date('M d, Y', strtotime($row['dateofstock']))."</td>
                          <td>".date('M d, Y', strtotime($row['date_expiration']))."</td>
                          
                          
                          <td>
                          <a href='#edit' data-toggle='modal' class='btn btn-success btn-sm btn-flat' data-id='".$row['id']."' onclick='getRow(".$row['id'].")'><i class='fa fa-edit'></i> Edit</a>
                          <a href='#delete' data-toggle='modal' class='btn btn-danger btn-sm btn-flat' data-id='".$row['id']."' onclick='getRow(".$row['id'].")'><i class='fa fa-trash'></i> Delete</a>

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
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/raw_materials_modal.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
  

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'raw_materials_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      //view
      $('.id').val(response.id);
      $('#material_code_edit').val(response.material_code);
      $('#material_type_edit').val(response.material_type);
      $('#material_name_edit').val(response.material_name);
      $('#material_batch_edit').val(response.material_batch); 
      $('#material_load_edit').val(response.loads);   
      $('#material_usage_edit').val(response.material_usage);   
      $('#material_remaining_edit').val(response.material_remaining);
      $('#datepicker_edit').val(response.dateofstock);      
      $('#fullname').val(response.dateofstock);
      $('#datepicker_raw_material_edit').val(response.date_expiration);
      // delete
      $('.fullname').html(response.material_name);
    
    }
  });
}

<?php
// Fetch the product batch from the production table what to put in the condition
$query = "SELECT product_batch FROM production WHERE <condition>"; // Replace <condition> with your condition to select the appropriate row
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
$product_batch = $row['product_batch'];

// Get the load from the raw_materials table
$load = $row['loads'];

// Deduct the product batch from the load to get the material usage
$material_usage = $load - $product_batch;

// Output the material usage
echo "<td>".$material_usage."</td>";
?>

</script>

</body>
</html>
