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
       Type Raw Materials
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
                  <th>Tools</th>
                  
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM type_raw_materials";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                     
                      echo "
                        <tr>
                          
                      
                          <td>".$row['material_type']."</td>
                          
                          
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
  <?php include 'includes/type_raw_materials_modal.php'; ?>
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
    url: 'type_raw_materials_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.id').val(response.id);
      $('#material_type_edit').val(response.material_type);
      
      $('.fullname').html(response.material_type);
      $('#position_val').html(response.position);
    }
  });
}

</script>

</body>
</html>
