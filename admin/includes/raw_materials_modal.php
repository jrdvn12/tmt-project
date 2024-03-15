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
              <h4 class="modal-title"><b>Add New Raw Materials</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="raw_materials_add.php" enctype="multipart/form-data">
              <div class="form-group">
                    <label for="material_code" class="col-sm-3 control-label">Material Code</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="material_code" name="material_code" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="material_type" class="col-sm-3 control-label">Material Type </label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="material_type" name="material_type" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="material_name" class="col-sm-3 control-label">Material Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="material_name" name="material_name" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="material_batch" class="col-sm-3 control-label">Material Batch</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="material_batch" name="material_batch" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="material_load" class="col-sm-3 control-label">Material Load</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="material_load" name="material_load" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="material_expiration" class="col-sm-3 control-label">Material Expiration</label>

                    <div class="col-sm-9"> 
                      <div class="date">
                        <input type="text" class="form-control" id="datepicker_add" name="material_expiration" required>
                      </div>
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
              <h4 class="modal-title"><b>Edit User</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="user_edit.php">
                <input type="hidden" class="id" name="id">
                <div class="form-group">
                    <label for="edit_username" class="col-sm-3 control-label">Username</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_username" name="username" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_firstname" class="col-sm-3 control-label">Firstname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_firstname" name="firstname">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_lastname" class="col-sm-3 control-label">Lastname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_lastname" name="lastname">
                    </div>
                </div>
                

                <div class="form-group">
                    <label for="edit_position" class="col-sm-3 control-label">Position</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="position" id="edit_position">
                        <option selected id="position_val" disabled></option>
                        <option value="Admin">Admin</option>
                        <option value="Accountant">Accountant</option>
                        <option value="Human Resources">Human Resources</option>
                       
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
              <form class="form-horizontal" method="POST" action="user_delete.php">
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


