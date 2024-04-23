<?php
include 'includes/conn.php';
?>
<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add New Production</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="production_add.php" enctype="multipart/form-data">
              <div class="form-group">
                    <label for="product" class="col-sm-3 control-label">Product</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="product" id="product" required>
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
                  <label for="production_batch" class="col-sm-3 control-label">Batch</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" id="production_batch" name="production_batch" required oninput="this.value = this.value.replace(/[^0-9]/g, '');">
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
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Edit Production </b><span  class="bold batch_code"></span></h4>
              <h3></h3>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="production_edit.php">
                <input type="hidden" class="id" name="id">
                
                <div class="form-group">
                    <label for="production_status" class="col-sm-3 control-label">Current Status</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="production_status" name="production_status" required readonly="TRUE" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit_stasus" class="col-sm-3 control-label">Status</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="edit_stasus" id="edit_stasus">
                       
                        <option value="Preparing">Preparing</option>
                        <option value="Checking">Checking</option>
                        <option value="Onprocess">Onprocess</option>
                        <option value="Packaging">Packaging</option>
                        <option value="Completed">Completed</option>
                      </select>
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
              <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="production_delete.php">
                <input type="hidden" class="id" name="id">
                <div class="text-center">
                    <p>PRODUCTION DELETE</p>
                    <h3 class="bold" >PRODUCTION CODE</h3>
                    <h2 class="bold production_code"></h2>
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
