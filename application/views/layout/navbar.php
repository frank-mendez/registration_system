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
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog"></span> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="">Log in as <?php echo $session_data['username']; ?></a></li>
                <li role="separator" class="divider"></li>
                <li><a href="<?php echo base_url('user/logout'); ?>">Logout</a></li>
              </ul>
            </li>
          </ul>

        </div>
      </div>
    </div>