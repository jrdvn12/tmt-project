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
        Production
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
                  
                  <th>Material Code</th>

                  <th>Material Needs</th>
                  <th>Material Loads</th>
                  <th>Name</th>
                  <th>Batch</th>
                  <th>Status</th>
                  <th>Pieces</th>
                  <th>Kilo</th>
                  <th>Date</th>
                  <th>Expiration</th>
                 

                  <th>Tools</th>
                  
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, product_needs.product_id AS pnid, production.id AS mcid FROM production LEFT JOIN product_needs  ON production.material_code=product_needs.product_id ORDER BY product_needs.product_id";
                    $query = $conn->query($sql);
                    $merged_rows = array();

                    while($row = $query->fetch_assoc()) {
                        $product_id = $row['product_id'];
                        if (!isset($merged_rows[$product_id])) {
                            // First occurrence of this product ID, start a new row
                            $merged_rows[$product_id] = $row;
                        } else {
                            // Already encountered this product ID, merge the data
                            $merged_rows[$product_id]['item_need'] .= '<br> ' . $row['item_need'];
                            $merged_rows[$product_id]['loads'] .= '<br> ' .$row['loads']; // Merge the loads, for example SUM(loads) AS total_loads,
                            // Merge other fields as needed
                        }
                    }

                    // Output merged rows
                    foreach ($merged_rows as $row) {
                      if ($row['production_status'] == 'Preparing') {
                        $status = '<span class="label label-warning pull-right">Preparing</span>';
                      } elseif ($row['production_status'] == 'Onprocess') {
                          $status = '<span class="label label-danger pull-right">Onprocess</span>';
                      } elseif ($row['production_status'] == 'Packaging') {
                        $status = '<span class="label label-info pull-right">Packaging</span>';
                      } elseif ($row['production_status'] == 'Completed') {
                        $status = '<span class="label label-info pull-right">Packaging</span>';
                      } elseif ($row['production_status'] == 'Checking') {
                        $status = '<span class="label label-primary pull-right">Checking</span>';
                      } elseif ($row['production_status'] == '5') {
                        $status = '<span class="label label-danger pull-right">absent</span>';
                      } else {
                          $status = '<span class="label label-primary pull-right"></span>';
                      }
                        echo "<tr>";
                       // echo "<td>".$row['product_id']."</td>";
                        echo "<td>".$row['material_code']."</td>";
                        echo "<td>".$row['item_need']."</td>";
                        echo "<td>".$row['loads']."</td>";
                     
                        echo "<td>".$row['product_name']."</td>";
                        
                        echo "<td>".$row['product_batch']."</td>  ";
                        echo "<td>".$status."</td>";
                        echo "<td>".$row['production_pieces']."</td>";

                        echo "<td>".$row['production_kilo']."</td>";
                        echo "<td>".date('M d, Y', strtotime($row['production_date']))."</td>";
                        echo "<td>".date('M d, Y', strtotime($row['production_expiration']))."</td>";
                        
                        if ($row['production_status']=="Preparing" ){
                        echo "<td>
                                <a href='#edit' data-toggle='modal' class='btn btn-success btn-sm btn-flat' data-id='".$row['mcid']."' onclick='getRow(".$row['mcid'].")'><i class='fa fa-edit'></i> Edit</a>
                                <a href='#delete' data-toggle='modal' class='btn btn-danger btn-sm btn-flat' data-id='".$row['mcid']."' onclick='getRow(".$row['mcid'].")'><i class='fa fa-trash'></i> Delete</a>
                              </td>";
                        }    else{
                        echo "<td>
                                <a href='#edit' data-toggle='modal' class='btn btn-success btn-sm btn-flat' data-id='".$row['mcid']."' onclick='getRow(".$row['mcid'].")'><i class='fa fa-edit'></i> Edit</a>
                              </td>";
                        }
                             
                                
                            
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
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/production_modal.php'; ?>
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
  $('.edit_user_password').click(function(e){
    e.preventDefault();
    $('#edit_user_password').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.photo', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'production_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.id').val(response.id);

      // view
      
      $('#production_status').val(response.production_status);
      $('.batch_code').html(response.product_batch);
      // delete
      
      $('.production_code').val(response.id);
      $('.production_code').html(response.product_batch);
    }
  });
}
</script>
</body>
</html>
