<div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="../" class="navbar-brand">You Company Name</a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
            <li>
              <a href="<?php echo base_url('user/user_table'); ?>">Users</a>
            </li>
            <li>
              <a href="<?php echo base_url('user/role'); ?>">Roles</a>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="http://builtwithbootstrap.com/" target="_blank">Log in as</a></li>
            <li><a href="<?php echo base_url('user/logout'); ?>">Logout</a></li>
          </ul>

        </div>
      </div>
    </div>