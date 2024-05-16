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
       Sales
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
            <!-- <div class="box-header with-border">
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
            </div> -->
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  
                  
                  <th>Invoice ID</th>
                  <th>Product ID</th>
                  <th>Product Code</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
                  <th>Time</th>
                  <th>Date</th>
                  <th>Tools</th>
                  
                </thead>
                <tbody>
                  <?php
                   // $sql = "SELECT * FROM sale";

                    $sql = "SELECT 
                      id,
                      invoice_id,
                      GROUP_CONCAT(product_id SEPARATOR '<br>') AS product_ids,
                      GROUP_CONCAT(product_code SEPARATOR '<br>') AS product_codes,
                      GROUP_CONCAT(price SEPARATOR '<br>') AS prices,
                      GROUP_CONCAT(qty SEPARATOR '<br>') AS qtys,
                      GROUP_CONCAT(total_amount SEPARATOR '<br>') AS total_amounts,
                      GROUP_CONCAT(time_sales SEPARATOR '<br>') AS time_saless,
                      GROUP_CONCAT(date_sales SEPARATOR '<br>') AS date_saless
                      FROM sale
                      GROUP BY invoice_id";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                     
                      echo "
                        <tr>
                          
                          <td>".$row['invoice_id']."</td>
                          <td>".$row['product_ids']."</td>
                          
                          <td>".$row['product_codes']."</td>
                          <td>".$row['prices']."</td>
                          <td>".$row['qtys']."</td>  
                          <td>".$row['total_amounts']."</td>
                          <td>".$row['time_saless']."</td>
                          <td>".$row['date_saless']."</td>

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
