<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Add New Product</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="main_inventory_add.php" enctype="multipart/form-data">
          		    <div class="form-group">
                        <label for="product_number" class="col-sm-3 control-label">Product Number</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="product_number" name="product_number" required>
                            </div>
                    </div>
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" name="photo" id="photo">
                    </div>
                </div>

                <div class="form-group">
                    <label for="product_name" class="col-sm-3 control-label">Product Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="product_name" name="product_name" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="product_price" class="col-sm-3 control-label">Product Price</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="product_price" name="product_price" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="product_quantity" class="col-sm-3 control-label">Product Quantity</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="product_quantity" name="product_quantity" required>
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
                    <input type="hidden" class="product_id" name="id">
                    <div class="form-group">
                        <label for="edit_product_number" class="col-sm-3 control-label">Product ID</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_product_number" name="product_number" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_sku" class="col-sm-3 control-label">SKU</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_sku" name="sku" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_amount" class="col-sm-3 control-label">Amount</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_amount" name="amount" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_quantity" class="col-sm-3 control-label">Quantity</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_quantity" name="quantity" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
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
            	<h4 class="modal-title"><b><span class="date"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="cashadvance_delete.php">
            		<input type="hidden" class="caid" name="id">
            		<div class="text-center">
	                	<p>DELETE PRODUCT</p>
	                	<h2 class="product_name bold"></h2>
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

     