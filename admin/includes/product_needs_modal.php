<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"><b>Add New Needs</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="product_needs_add.php" >
                    <div class="form-group">
                        <label for="product_number" class="col-sm-3 control-label">Product Name</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="product_description" id="product_description">
                            <?php
                                $sql = "SELECT * FROM product";
                                $query = $conn->query($sql);
                                while($prow = $query->fetch_assoc()){
                                    echo "
                                    <option value='".$prow['id']."'>".$prow['product_name']."</option>
                                    ";
                                }
                                ?>
                            
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="casecode" class="col-sm-3 control-label">Item Need</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="item_description" id="item_description" >
                            <?php
                                $sql = "SELECT * FROM raw_materials";
                                $query = $conn->query($sql);
                                while($prow = $query->fetch_assoc()){
                                    echo "
                                    <option value='".$prow['id']."'>".$prow['material_name']."</option>
                                    ";
                                }
                                ?>
                            
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="firstname" class="col-sm-3 control-label">Loads</label>
                        <div class="col-sm-9">
                             <input type="text" class="form-control" id="loads" name="loads" required oninput="this.value = this.value.replace(/[^0-9]/g, '');">
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
                <form class="form-horizontal" method="POST" action="product_edit.php">
                    <input type="hidden" class="product_id" name="id" aria-label="Product ID">
                   
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
              <form class="form-horizontal" method="POST" action="product_needs_delete.php">
                <input type="hidden" class="id" name="id">
                <input type="hidden" class="product_id" name="product_id">
                <div class="text-center">
                    <p>DELETE PRODUCT NEEDS</p>
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


<!-- Edit -->
<div class="modal fade" id="edit_item">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"><h2 class="bold productnames"></h2></h4>

                
            
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="product_needs_edit.php" >
                    <div class="form-group">
                        <label for="product_number" class="col-sm-3 control-label">Product Name</label>
                        <div class="col-sm-9">
                        <input type="hidden" class="form-control" id="product_needs_id" name="product_needs_id" >
                            <input type="text" class="form-control" id="product_needs_name" name="product_needs_name" required readonly="TRUE">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="casecode" class="col-sm-3 control-label">Item Need</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="item_need_edit" name="item_need_edit" required readonly="TRUE">
                        </div>
                                            
                    </div>

                    <div class="form-group">
                        <label for="firstname" class="col-sm-3 control-label">Loads</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="item_loads_edit" name="item_loads_edit" required oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        </div>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-edit"></i> Save</button>
                <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
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

                        
                        <input type="hidden" class="idproduct" id="idproduct" name="ids">
                        <!-- Set a more descriptive alt attribute -->
                        <img class="imgcenter" id="profile_picture" class="img-circle" alt="Product Image" width='150px' height='200px' align='center'>
                        
                        <b><span class="view_product_number "></span> <br>
                        Piece Barcode : <span class="view_piece_baracode "> </span> <br>
                        Box Barcode : <span class="view_box_baracode "> </span> <br>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="#">
            		
                <h4><b>Inventory History</b></h4>
                <div class="form-group">
                    <div class="box-body">
                        <table id="example1" class="table table-bordered">
                            <thead>
                            <th>Piece Code</th>
                            <th>Case Code</th>
                            <th>SKU</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Sold</th>
                            <th>Balance</th>
                            <th>Date of Stock</th>
                            </thead>

                            <tbody>
                            </tbody>

                        </table>
                    </div>
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

