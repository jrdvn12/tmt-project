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
        Main Raw Materials
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
                  
                  <th>Material Type</th>
                  <th>Batch</th>
                  <th>Name</th>
                  <th>Kilo</th>
                  <th>Usage</th>
                  <th>Total</th>
                  <th>Date Stock</th>
                  <th>Expiration</th>
                  
                </thead>
                <tbody>
                <?php
              $sql = "SELECT 
                          mts,
                          REPLACE(GROUP_CONCAT(material_batch), ',', '<br>') AS material_batches,
                          REPLACE(GROUP_CONCAT(material_name), ',', '<br>') AS material_names,
                          REPLACE(GROUP_CONCAT(loads), ',', '<br>') AS total_loads,
                          REPLACE(GROUP_CONCAT(material_usage), ',', '<br>') AS total_usage,
                          REPLACE(GROUP_CONCAT(material_remaining), ',', '<br>') AS total_remaining,
                          REPLACE(GROUP_CONCAT(DATE_FORMAT(dateofstock, '%b %d %Y')), ',', '<br>\n') AS stock_dates,
                          REPLACE(GROUP_CONCAT(DATE_FORMAT(date_expiration, '%b %d %Y')), ',', '<br>\n') AS expiration_dates
                          FROM 
                              (SELECT 
                                  raw_materials.*, 
                                  type_raw_materials.material_type AS mts 
                              FROM 
                                  raw_materials  
                              LEFT JOIN 
                                  type_raw_materials ON raw_materials.material_type = type_raw_materials.id) AS subquery
                          GROUP BY 
                              mts";

                          $query = $conn->query($sql);
                          while($row = $query->fetch_assoc()){
                              echo "
                              <tr>
                                  <td>".$row['mts']."</td>
                                  <td>".$row['material_batches']."</td>
                                  <td>".$row['material_names']."</td>  
                                  <td>".$row['total_loads']."</td>
                                  <td>".$row['total_usage']."</td>
                                  <td>".$row['total_remaining']."</td>
                                  <td>".$row['stock_dates']."</td>
                                  <td>".$row['expiration_dates']."</td>
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
  <?php include 'includes/user_modal.php'; ?>
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
    url: 'user_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.id').val(response.id);
      $('#edit_username').val(response.username);
      $('#edit_firstname').val(response.firstname);
      $('#edit_lastname').val(response.lastname);
      $('#edit_password').val(response.password); 
      $('.del_employee_name').html(response.firstname+' '+response.lastname);   
      $('.fullname').html(response.firstname+' '+response.lastname);
      $('#position_val').html(response.position);
    }
  });
}
</script>
</body>
</html>
