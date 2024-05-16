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

                      $sql = "SELECT * FROM production";
                      $query = $conn->query($sql);
                      while($row = $query->fetch_assoc()){
                        if ($row['production_status'] == 'Preparing') {
                          $status = '<span class="label label-warning pull-right">Preparing</span>';
                        } elseif ($row['production_status'] == 'Onprocess') {
                            $status = '<span class="label label-danger pull-right">Onprocess</span>';
                        } elseif ($row['production_status'] == 'Packaging') {
                          $status = '<span class="label label-info pull-right">Packaging</span>';
                        } elseif ($row['production_status'] == 'Completed') {
                          $status = '<span class="label label-info pull-right">Completed</span>';
                        } elseif ($row['production_status'] == 'Checking') {
                          $status = '<span class="label label-primary pull-right">Checking</span>';
                       
                        } else {
                            $status = '<span class="label label-primary pull-right"></span>';
                        }
                        echo "
                          <tr>
                            
                            <td>".$row['material_code']."</td>
                            
                            <td>".$row['product_name']."</td>
                            <td>".$row['product_batch']."</td>
                            <td>".$status."</td>
                            <td>".$row['production_pieces']."</td>
                            <td>".$row['production_kilo']."</td>
                            <td>".date('M d, Y', strtotime($row['production_date']))."</td>
                            <td>".date('M d, Y', strtotime($row['production_expiration']))."</td> ";
                            if ($row['production_status']=="Preparing" ){
                              echo "<td>
                                      <a href='#edit' data-toggle='modal' class='btn btn-success btn-sm btn-flat' data-id='".$row['id']."' onclick='getRow(".$row['id'].")'><i class='fa fa-edit'></i> Edit</a>
                                      <a href='#delete' data-toggle='modal' class='btn btn-danger btn-sm btn-flat' data-id='".$row['id']."' onclick='getRow(".$row['id'].")'><i class='fa fa-trash'></i> Delete</a>
                                    </td>";
                              } 
                              elseif ($row['production_status']=="Completed" ){
                                echo "<td>
                                                  </td>";
                                }    else{
                              echo "<td>
                                      <a href='#edit' data-toggle='modal' class='btn btn-success btn-sm btn-flat' data-id='".$row['id']."' onclick='getRow(".$row['id'].")'><i class='fa fa-edit'></i> Edit</a>
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
