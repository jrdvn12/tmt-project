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
              <h4 class="modal-title"><b>Add New Type Raw Materials</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="type_raw_materials_add.php" enctype="multipart/form-data">
              

                <div class="form-group">
                    <label for="material_type" class="col-sm-3 control-label">Material Type </label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="material_type" name="material_type" required>
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
              <h4 class="modal-title"><b>Edit Type Raw Material</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="type_raw_materials_edit.php">
                <input type="hidden" class="id" name="id">
                 

                  <div class="form-group">
                      <label for="material_type_edit" class="col-sm-3 control-label">Material Type </label>

                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="material_type_edit" name="material_type_edit" required>
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
              <form class="form-horizontal" method="POST" action="type_raw_materials_delete.php">
                <input type="hidden" class="id" name="id">
                <div class="text-center">
                    <p>TYPE RAW MATERIAL DELETE</p>
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


