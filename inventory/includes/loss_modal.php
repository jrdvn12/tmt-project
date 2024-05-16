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
              <h4 class="modal-title"><b>Add New Loss Product</b></h4>
            </div>
            <div class="modal-body">
            <form class="form-horizontal" method="POST" action="loss_add.php" enctype="multipart/form-data">
                <div class="form-group">
                      <label for="material_code" class="col-sm-3 control-label">Batch Code</label>

                      <div class="col-sm-9">
                              <select class="form-control" name="batch_code" id="batch_code">
                              <?php
                                $sql = "SELECT * FROM production WHERE production_status LIKE 'Completed'";
                                  $query = $conn->query($sql);
                                  while($prow = $query->fetch_assoc()){
                                      echo "
                                      <option value='' selected>- SELECT BATCH CODE -</option>
                                      <option value='".$prow['id']."'>".$prow['product_batch']."</option>
                                      ";
                                  }
                                  ?>
                              
                              </select>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="pieces" class="col-sm-3 control-label">Pieces</label>

                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="pieces" name="pieces" required>
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
              <h4 class="modal-title"><b>Edit Loss Product</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="raw_materials_edit.php">
                <input type="hidden" class="id" name="id">
                <div class="form-group">
                      <label for="material_code" class="col-sm-3 control-label">Batch Code</label>

                      <div class="col-sm-9">
                              <select class="form-control" name="batch_code" id="batch_code">
                              <option value='' selected>- SELECT BATCH CODE -</option>
                              <?php
                                $sql = "SELECT * FROM production WHERE production_status LIKE 'Completed'";
                                  $query = $conn->query($sql);
                                  while($prow = $query->fetch_assoc()){
                                      echo "
                                      <option value='' selected>- SELECT BATCH CODE -</option>
                                      <option value='".$prow['id']."'>".$prow['product_batch']."</option>
                                      ";
                                  }
                                  ?>
                              
                              </select>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="pieces" class="col-sm-3 control-label">Pieces</label>

                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="pieces" name="pieces" required>
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
              <form class="form-horizontal" method="POST" action="raw_materials_delete.php">
                <input type="hidden" class="id" name="id">
                <div class="text-center">
                    <p>RAW MATERIAL DELETE</p>
                    <h2 class="bold fullname"></h2>
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


