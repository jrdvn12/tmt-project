<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-purple sidebar-mini">
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
                    $sql = "SELECT * FROM production";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){

                      if ($row['production_status'] == 'Preparing') {
                        $status = '<span class="label label-warning pull-right">Preparing</span>';
                      } elseif ($row['production_status'] == 'Onprocess') {
                          $status = '<span class="label label-danger pull-right">Onprocess</span>';
                      } elseif ($row['production_status'] == 'Packaging') {
                        $status = '<span class="label label-info pull-right">Packaging</span>';
                      } elseif ($row['production_status'] == 'Complete') {
                        $status = '<span class="label label-primary pull-right">Complete</span>';
                      } elseif ($row['production_status'] == '5') {
                        $status = '<span class="label label-danger pull-right">absent</span>';
                      } else {
                          $status = '<span class="label label-primary pull-right"></span>';
                      }

                      $product_need = $row['material_code'];
                      $sproduct = "SELECT * FROM product_needs WHERE product_id = '$product_need'";
                      $qproduct  = $conn->query($sproduct);
                      $rproduct = $qproduct ->fetch_assoc();

                      $item_need= $rproduct['item_need'];
                      $loads= $rproduct['loads'];
                      

              

                      echo "
                        <tr>
                          
                          <td>".$row['material_code']."</td>";


                        $sqls = "SELECT * FROM product_needs ORDER BY product_id";
                        $querys = $conn->query($sqls);
                        $merged_rows = array();

                        while($rows = $querys->fetch_assoc()) {
                            $product_id = $rproduct['product_id'];
                            if (!isset($merged_rows[$product_id])) {
                                // First occurrence of this product ID, start a new row
                                $merged_rows[$product_id] = $rows;
                            } else {
                                // Already encountered this product ID, merge the data
                                $merged_rows[$product_id]['item_need'] .= '<br> ' . $rproduct['item_need'];
                                $merged_rows[$product_id]['loads'] .= '<br> ' .$rproduct['loads']; // Merge the loads, for example
                                // Merge other fields as needed
                            }
                        }
                        foreach ($merged_rows as $rproduct) {
                        
                       
                          echo "<td>".$rproduct['item_need']."</td>";
                          echo "<td>".$rproduct['loads']."</td>";
                          
                      }
                       



                          echo"
                          <td>".$row['product_name']."</td>
                          <td>".$row['product_batch']."</td>  
                          <td>".$status."</td>
                          <td>".$row['production_pieces']."</td>
                          <td>".$row['production_kilo']."</td>
                          <td>".$row['production_date']."</td>
                          <td>".$row['production_expiration']."</td>
                          
                          <td>
                          <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['id']."'><i class='fa fa-edit'></i> Edit</button>
                        
                            <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['id']."'><i class='fa fa-trash'></i> Delete</button>
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
