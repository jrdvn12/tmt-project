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
                    <label for="material_code" class="col-sm-3 control-label">Batch Code</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="material_code" name="material_code" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="material_type" class="col-sm-3 control-label">Material Type </label>

                    <div class="col-sm-9">
                            <select class="form-control" name="material_type" id="material_type">
                            <?php
                                $sql = "SELECT * FROM type_raw_materials";
                                $query = $conn->query($sql);
                                while($prow = $query->fetch_assoc()){
                                    echo "
                                    <option value='".$prow['id']."'>".$prow['material_type']."</option>
                                    ";
                                }
                                ?>
                            
                            </select>
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
                        <input type="text" class="form-control" id="material_batch" name="material_batch" required oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                    </div>
                </div>

                <div class="form-group">
                    <label for="material_load" class="col-sm-3 control-label">Material Load</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="material_load" name="material_load" required oninput="this.value = this.value.replace(/[^0-9]/g, '');">
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
              <h4 class="modal-title"><b>Edit Raw Material</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="raw_materials_edit.php">
                <input type="hidden" class="id" name="id">
                  <div class="form-group">
                      <label for="material_code_edit" class="col-sm-3 control-label">Batch Code</label>

                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="material_code_edit" name="material_code_edit" required>
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="material_type_edit" class="col-sm-3 control-label">Material Type </label>

                     
                      <div class="col-sm-9">
                            <select class="form-control" name="material_type_edit" id="material_type_edit">
                            <?php
                                $sql = "SELECT * FROM type_raw_materials";
                                $query = $conn->query($sql);
                                while($prow = $query->fetch_assoc()){
                                    echo "
                                    <option value='".$prow['id']."'>".$prow['material_type']."</option>
                                    ";
                                }
                                ?>
                            
                            </select>
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="material_name" class="col-sm-3 control-label">Material Name</label>

                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="material_name_edit" name="material_name_edit" required>
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="material_batch_edit" class="col-sm-3 control-label">Material Batch</label>

                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="material_batch_edit" name="material_batch_edit" required>
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="material_load_edit" class="col-sm-3 control-label">Material Load</label>

                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="material_load_edit" name="material_load_edit" required>
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="material_usege_edit" class="col-sm-3 control-label">Material Usage</label>

                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="material_usege_edit" name="material_usege_edit" required>
                      </div>
                  </div>
                  
                  <div class="form-group">
                      <label for="material_remaining_edit" class="col-sm-3 control-label">Material Remaining</label>

                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="material_remaining_edit" name="material_remaining_edit" required>
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="material_expiration_edit" class="col-sm-3 control-label">Date Stock</label>

                      <div class="col-sm-9"> 
                        <div class="date">
                          <input type="text" class="form-control" id="datepicker_edit" name="material_expiration_edit" required>
                        </div>
                      </div>
                  </div> 
                  <div class="form-group">
                      <label for="datepicker_raw_material_edit" class="col-sm-3 control-label">Material Expiration</label>

                      <div class="col-sm-9"> 
                        <div class="date">
                          <input type="text" class="form-control" id="datepicker_raw_material_edit" name="datepicker_raw_material_edit" required>
                        </div>
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


