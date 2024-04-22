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
       Vendors
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
                  
                  <th>Vendor ID</th>
                  <th>Name</th>
                  <th>Company</th>
                  <th>Address</th>
                  <th>City</th>
                  <th>Province</th>
                  <th>ZIP Code</th>
                  <th>Country</th>
                  <th>Phone Number</th>
                  <th>Email Address</th>

                  <th>Tools</th>
                  
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM vendor";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                     
                      echo "
                        <tr>
                          
                          <td>".$row['id']."</td>
                          <td>".$row['vendor_name']."</td>
                          <td>".$row['company_name']."</td>  
                          <td>".$row['vendor_address']."</td>
                          <td>".$row['city']."</td>
                          <td>".$row['province']."</td>
                          <td>".$row['zip_code']."</td>
                          <td>".$row['country']."</td>
                          <td>".$row['phone_number']."</td>
                          <td>".$row['email_address']."</td>

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
  <?php include 'includes/vendor_modal.php'; ?>
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
    url: 'vendor_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.id').val(response.id);

      //edit
      $('.vendor_name').html(response.vendor_name);
      $('.vendor_id').val(response.id);
      $('#edit_vendor_name').val(response.vendor_name);
      $('#edit_company_name').val(response.company_name);
      $('#edit_vendor_address').val(response.vendor_address);
      $('#edit_city').val(response.city);
      $('#edit_province').val(response.province);
      $('#edit_zip_code').val(response.zip_code);
      $('#edit_country').val(response.country);
      $('#edit_phone_number').val(response.phone_number);
      $('#edit_email_address').val(response.email_address);

      //delete
      $('.del_vendor_name').html(response.vendor_name);
     
    }
  });
}
</script>
</body>
</html>
