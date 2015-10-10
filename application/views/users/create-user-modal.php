<?php  
  
  $form_attributes = array('class' => 'form-horizontal', 'id' => 'create-user-form');
  echo form_open('user/create_user', $form_attributes);

?>
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">Create User</h4>
    </div>
    <div class="modal-body">

      <div class="alert alert-danger alert-dismissible fade in hidden" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4>Oh snap! You got an error!</h4>
        <p class="message"></p>
      </div>


      <div class="form-group">
        <label  class="col-sm-2 control-label">Username</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="username" placeholder="username">
        </div>
      </div>

      <div class="form-group">
        <label  class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="password">
        </div>
      </div>

      <div class="form-group">
        <label  class="col-sm-2 control-label">Confirm Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="confirm_password">
        </div>
      </div>

      <div class="form-group">
        <label  class="col-sm-2 control-label">First Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="first_name" placeholder="First Name">
        </div>
      </div>

      <div class="form-group">
        <label  class="col-sm-2 control-label">Last Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="last_name" placeholder="Last Name">
        </div>
      </div>

      <div class="form-group">
        <label  class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="email" placeholder="Email">
        </div>
      </div>

      <div class="form-group">
        <label  class="col-sm-2 control-label">Address</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="address" placeholder="Address">
        </div>
      </div>

      <div class="form-group">
        <label  class="col-sm-2 control-label">Phone</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="phone_num" placeholder="Phone">
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
      <button type="submit" class="btn btn-primary">Create</button>
    </div>
  </div>
</div>

<?php echo form_close(); ?>