<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-black sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content    -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header skin-yellow" >
      <h1>
        Product Needs
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
                        <tr>
                            <th>ID</th> <!-- Add this line -->
                           
                            <th>Product Name</th>
                            <th>Item Needs</th>
                            <th>Loads</th>
                            <th>Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    <?php
                    $sql = "SELECT product_id, GROUP_CONCAT(id) AS ids, GROUP_CONCAT(item_need) AS item_needs, GROUP_CONCAT(loads) AS loads 
                            FROM product_needs 
                            GROUP BY product_id";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                        $ids = explode(',', $row['ids']);
                        $item_needs = explode(',', $row['item_needs']);
                        $loads = explode(',', $row['loads']);

                        echo "
                        <tr>
                            <td>";
                        foreach ($ids as $index => $id) {
                            echo $id. "<a href='#edit_item' data-toggle='modal' class='pull-right edit_item' data-id='".$id."'><span class='fa fa-edit'></span></a> ";
//                            echo " <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$id."'><i class='fa fa-trash'></i> Delete</button>";
                            if ($index < count($ids) - 1) {
                                echo "<br>";
                            }
                        }
                        echo "</td>

                            <td>".$row['product_id']."<button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['product_id']."'><i class='fa fa-trash'></i> Delete</button></td>
                            
                            <td>";
                        foreach ($item_needs as $index => $item_need) {
                            echo $item_need;
                            if ($index < count($item_needs) - 1) {
                                echo "<br>";
                            }
                        }
                        echo "</td>

                            <td>";
                        foreach ($loads as $index => $load ) {
                            echo $load;
                            if ($index < count($loads) - 1) {
                                echo "<br>";
                            }
                        }
                      
                        echo "</td>

                        
                        
                            <td>
                                <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['product_id']."'><i class='fa fa-trash'></i> Delete</button>
                                <a href='#delete' data-toggle='modal' class='btn btn-success btn-sm btn-flat' data-id='".$row['item_needs']."' onclick='getRow(".$row['item_needs'].")'><i class='fa fa-eye'></i> View</a>
                         
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