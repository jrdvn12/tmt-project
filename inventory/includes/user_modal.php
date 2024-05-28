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
                <h4 class="modal-title"><b>Add New User</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="user_add.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="username" class="col-sm-3 control-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="firstname" class="col-sm-3 control-label">Firstname</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="firstname" name="firstname" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lastname" class="col-sm-3 control-label">Lastname</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lastname" name="lastname" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="passwords" name="password" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="repeat_password" class="col-sm-3 control-label">Repeat Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="repeat_password" name="repeat_password" required>
                        </div>
                        <div class="col-sm-9 col-sm-offset-3">
                            <div id="password_match_message" style="color: red;"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="photo" class="col-sm-3 control-label">Photo</label>
                        <div class="col-sm-9">
                            <input type="file" id="photo" name="photo">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="position" class="col-sm-3 control-label">Position</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="position" id="position" required>
                                <option value="" selected>- Select -</option>
                                <option value="Admin">Admin</option>
                                <option value="Supervisor">Supervisor</option>
                                <option value="Distributor Admin">Distributor Admin</option>
                                <option value="Sales">Sales</option>
                                <option value="Cashier">Cashier</option>
                                <option value="Worker">Worker</option>
                            </select>
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
                        <option selected value =" " id="position_val" disabled></option>
                        <option value="Admin">Admin</option>
                        <option value="Supervisor">Supervisor</option>
                        <option value="Distributor Admin">Distributor Admin</option>
                        <option value="Sales">Sales</option>
                        <option value="Cashier">Cashier</option>
                        <option value="Worker">Worker</option>
                       
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
                    <p>USER DELETE</p>
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

<!-- Password -->
<div class="modal fade" id="edit_user_password">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <!-- <h4 class="modal-title"><b><span class="employee_id"></span></b></h4> -->
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="user_password.php">
                    <input type="hidden" class="empid" name="id">
                    <div class="text-center">
                        <p>UPDATE USER PASSWORD</p>
                        <h2 class="bold del_employee_name"></h2>

                        <div class="form-group">
                            <label for="edit_password" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="edit_password" name="password">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="edit_repeat_password" class="col-sm-3 control-label">Repeat Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="edit_repeat_password" name="repeat_password">
                            </div>

                            <div class="col-sm-9 col-sm-offset-3">
                            <div class="text-danger" id="edit_password_match_message"></div>
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


<script>
document.addEventListener('DOMContentLoaded', function() {
    // Function to check password match for add new user modal
    var password = document.getElementById('passwords');
    var repeatPassword = document.getElementById('repeat_password');
    var message = document.getElementById('password_match_message');

    function checkPasswordMatch() {
        if (password.value !== repeatPassword.value) {
            message.textContent = 'Passwords do not match!';
            repeatPassword.setCustomValidity('Passwords do not match');
        } else {
            message.textContent = '';
            repeatPassword.setCustomValidity('');
        }
    }

    password.addEventListener('input', checkPasswordMatch);
    repeatPassword.addEventListener('input', checkPasswordMatch);

    // Function to check password match for edit user password modal
    var editPassword = document.getElementById('edit_password');
    var editRepeatPassword = document.getElementById('edit_repeat_password');
    var editMessage = document.getElementById('edit_password_match_message');

    function checkEditPasswordMatch() {
        if (editPassword.value !== editRepeatPassword.value) {
            editMessage.textContent = 'Passwords do not match!';
            editRepeatPassword.setCustomValidity('Passwords do not match');
        } else {
            editMessage.textContent = '';
            editRepeatPassword.setCustomValidity('');
        }
    }

    editPassword.addEventListener('input', checkEditPasswordMatch);
    editRepeatPassword.addEventListener('input', checkEditPasswordMatch);
});
</script>

    