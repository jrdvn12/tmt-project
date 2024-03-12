<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"><b>Add New Product</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="main_inventory_add.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="product_number" class="col-sm-3 control-label">Product Number</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="product_number" name="product_number" required placeholder="Enter product number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="photo" class="col-sm-3 control-label">Photo</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" id="photo" name="photo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="casecode" class="col-sm-3 control-label">Case Code</label>
                        <div class="col-sm-9">
                            <input autocomplete="off" value="<?=$_POST['text'] ?? ''?>" name="text" class="form-control" id="casecode" name="casecode" required placeholder="Enter case code">
                        </div>
                    </div>
                    <div class="form-group" method="post" enctype="multipart/form-data">
                        <label for="piececode" class="col-sm-3 control-label">Piece Code</label>
                        <div class="col-sm-9">
                            <input autocomplete="off" value="<?=$_POST['text'] ?? ''?>" name="text" class="form-control" id="piececode" name="piececode" required placeholder="Enter piece code">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="product_name" class="col-sm-3 control-label">Product Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="product_name" name="product_name" required placeholder="Enter product name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="product_price" class="col-sm-3 control-label">Product Price</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="product_price" name="product_price" required placeholder="Enter product price">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="product_quantity" class="col-sm-3 control-label">Product Quantity</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="product_quantity" name="product_quantity" required placeholder="Enter product quantity">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"><b><span class="date"></span>  <span class="product_name"></span></b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="main_inventory_edit.php">
                    <input type="hidden" class="product_id" name="id" aria-label="Product ID">
                    <div class="form-group">
                        <label for="edit_product_number" class="col-sm-3 control-label">Product Number</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_product_number" name="product_number" required aria-required="true" placeholder="Enter product number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_sku" class="col-sm-3 control-label">SKU</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_sku" name="sku" required aria-required="true" placeholder="Enter SKU">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_amount" class="col-sm-3 control-label">Amount</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_amount" name="amount" required aria-required="true" placeholder="Enter amount">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_quantity" class="col-sm-3 control-label">Quantity</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_quantity" name="quantity" required aria-required="true" placeholder="Enter quantity">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="main_inventory_delete.php">
                <input type="hidden" class="id" name="id">
                <div class="text-center">
                    <p>PRODUCT DELETE</p>
                    <h2 class="bold productname"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Update Photo -->
<div class="modal fade" id="edit_photo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="fullname"></span></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="user_photo.php" enctype="multipart/form-data">
                <input type="hidden" class="id" name="id">
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- View -->
<div class="modal fade" id="view">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title">
                 

                    <?php  
                    $look =20;
                    $sql = "SELECT * FROM main_inventory WHERE id LIKE '$look'";
                    $query = $conn->query($sql);

                    while($row = $query->fetch_assoc()) {
                        $image = (!empty($row['photo'])) ? '../images/' . $row['photo'] : '../images/noproduct.jpg';
                        echo "<img src='" . $image . "' width='150px' height='200px' align='center'><br>";
                    }
                    ?>

                <br>
              <b>Product Name <br>
              <b><span class="view_product_number "></span> <br>
              Piece Barcode : <span class="view_piece_baracode "> </span> <br>
              Box Barcode : <span class="view_box_baracode "> </span> <br>
              
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="#">
            		<input type="hidden" id="id" name="id">
                <h4><b>Transaction History</b></h4>
                <div class="form-group">
                  <label for="audit_description" class="col-sm-2 control-label"></label> 
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <textarea class="form-control" id="audit_description" name="audit_description" readonly style="height: 300px;resize:none;"></textarea>
                    </div>
                </div>

               

          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	
            	</form>
          	</div>
        </div>
    </div>
</div>


