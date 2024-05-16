<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content    -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Main Inventory
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User</li>
      </ol> -->
    </section>
    <!-- Main content -->

              <?php include 'includes/barcode.php';
                if($_SERVER['REQUEST_METHOD'] == 'POST')
                {
                  if(isset($_POST['clear']))
                  {
                    if(file_exists('barcode.jpg'))
                      unlink('barcode.jpg');
                  }else{

                    $text = trim($_POST['text']);
                    $barcode = new Barcode();
              
                    $barcode->generate($text);
                  }
                }
              ?>
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
                  
                  <th>Product ID</th>
                  <th>Photo</th>
                  <th>Batch</th>
                  <th>Piece Code</th>
                  <th>Case Code</th>
                  <th>SKU</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Sold</th>
                  <th>Balance</th>
                  <th>Date of Stock</th>
                  <th>Date of Expiration</th>
                  <!-- <th>Tools</th> -->
                  
                </thead>

                <tbody>
                <?php
                      $sql = "SELECT 
                      id,
                      product_number,
                      photo,
                      GROUP_CONCAT(batch SEPARATOR '<br>') AS batches,
                      GROUP_CONCAT(piececode SEPARATOR '<br>') AS piececodes,
                      GROUP_CONCAT(boxcode SEPARATOR '<br>') AS boxcodes,
                      GROUP_CONCAT(product_name SEPARATOR '<br>') AS product_names,
                      GROUP_CONCAT(price SEPARATOR '<br>') AS prices,
                      GROUP_CONCAT(qty SEPARATOR '<br>') AS qtys,
                      GROUP_CONCAT(soldstock SEPARATOR '<br>') AS soldstocks,
                      GROUP_CONCAT(balance SEPARATOR '<br>') AS balances,
                      GROUP_CONCAT(dateofstock SEPARATOR '<br>') AS dateofstocks,
                      GROUP_CONCAT(product_expiration SEPARATOR '<br>') AS product_expirations
                      FROM main_inventory
                      GROUP BY product_number";
                      $query = $conn->query($sql);
                      while($row = $query->fetch_assoc()){
                          // Accessing the photo field directly within the loop
                          $image = (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/noproduct.jpg';
                          // Assuming other parts of your code remain the same
                          // For simplicity, I'll just show a part of your HTML table with modified fields
                          echo "
                          <tr>
                              <td>".$row['product_number']."</td>
                              <td>
                                  <img src='".$image."' width='150px' height='200px' align='center'><br>
                              </td>
                              <td>".$row['batches']."</td>
                              <td>".$row['piececodes']."</td>
                              <td>".$row['boxcodes']."</td>
                              <td>".$row['product_names']."</td>
                              <td>".$row['prices']."</td>
                              <td>".$row['qtys']."</td>
                              <td>".$row['soldstocks']."</td>
                              <td>".$row['balances']."</td>
                              <td>".$row['dateofstocks']."</td>
                              <td>".$row['product_expirations']."</td>
                              
                          </tr>
                          ";
                      }
                      ?>


                    <!-- 
                      <td>
                                  <button class='btn btn-primary btn-sm view btn-flat' data-id='".$row['id']."'><i class='fa fa-eye'></i> View</button>
                              </td>
                    
                    
                    <a href='#edit_photo' data-toggle='modal' class='pull-right photo' data-id='".$row['id']."'><span class='fa fa-edit'></span></a>
                      <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['id']."'><i class='fa fa-edit'></i> Edit</button>
                                <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['id']."'><i class='fa fa-trash'></i> Delete</button> -->

                </tbody>

              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
  <?php include 'includes/main_inventory_modal.php'; ?>
  <?php include 'includes/footer.php'; ?>
 
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

  $(document).on('click', '.photo', function(e){
    e.preventDefault();
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
    url: 'main_inventory_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.id').val(response.id);
      $('#edit_product_number').val(response.product_number);

      $('#edit_product_name').val(response.product_number);
      $('#edit_sku').val(response.product_name);
      $('#edit_amount').val(response.price);
      $('#edit_quantity').val(response.qty);

      // delete
      $('.productname').html(response.product_name);
      // view
      $('.view_product_number').html(response.product_name);
      $('.view_piece_baracode').html(response.piececode);
      $('.view_box_baracode').html(response.boxcode);
      $('.idproduct').val(response.photo);
      
      $('.imagelink').attr('src', response.photo);
      updateImage();
    }
  });
}
// new 

//window.onclick = function() {
    //        updateImage();
  //      };

 //JavaScript
      function generateBarcode(inputId) {
          let inputElement = document.getElementById(inputId);
          let barcodeText = inputElement.value;
          let barcodeImage = document.getElementById(inputId + 'Barcode');
          let barcodeImageUrl = generateBarcodeImage(barcodeText);
          barcodeImage.src = barcodeImageUrl;
      }

      // This function generates the barcode image URL based on the input text
      function generateBarcodeImage(text) {
          return 'barcode.php' + text;
      }

</script>


</body>
</html>