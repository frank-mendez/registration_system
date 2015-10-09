<?php  
  
  $form_attributes = array('class' => 'form-horizontal', 'id' => 'create-role-form');
  echo form_open('user/create_role', $form_attributes);

?>
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">Create Role</h4>
    </div>
    <div class="modal-body">

      <div class="form-group">
        <label  class="col-sm-2 control-label">Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="name" placeholder="Role Name">
        </div>
      </div>

      <div class="form-group">
        <label  class="col-sm-2 control-label">Description</label>
        <div class="col-sm-10">
          <textarea class="form-control" name="description"></textarea>
        </div>
      </div>

    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
  </div>
</div>

<?php echo form_close(); ?>