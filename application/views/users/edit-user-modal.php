<?php  
  
  $form_attributes = array('class' => 'form-horizontal', 'id' => 'edit-user-form');
  echo form_open('user/update_user', $form_attributes);

?>
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">Update User</h4>
    </div>
    <div class="modal-body">

  
      <input type="hidden" value="<?php echo $user_id; ?>">

      <div class="form-group">
        <label  class="col-sm-2 control-label">Username</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="username" readonly="" value="<?php echo $username; ?>">
        </div>
      </div>

      <div class="form-group">
        <label  class="col-sm-2 control-label">First Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="first_name" value="<?php echo $first_name; ?>">
        </div>
      </div>

      <div class="form-group">
        <label  class="col-sm-2 control-label">Last Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="last_name" value="<?php echo $last_name; ?>">
        </div>
      </div>

      <div class="form-group">
        <label  class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
        </div>
      </div>

      <div class="form-group">
        <label  class="col-sm-2 control-label">Address</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
        </div>
      </div>

      <div class="form-group">
        <label  class="col-sm-2 control-label">Phone</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="phone_num" value="<?php echo $phone_num; ?>">
        </div>
      </div>

      <div class="form-group">
        <label  class="col-sm-2 control-label">Role</label>
        <div class="col-sm-10">
          <select class="form-control" name="role_id">
            <?php echo $role_dropdown; ?>
          </select>
        </div>
      </div>


    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Save Changes</button>
    </div>
  </div>
</div>

<?php echo form_close(); ?>