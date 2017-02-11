 <div id="head-nav" class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-collapse">
        <ul class="nav navbar-nav navbar-right user-nav">
          <li class="dropdown profile_menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img alt="Avatar" src="<?php echo $this->webroot; ?>/back_end/images/admin-icon.png" /><span><?=$_SESSION['Auth']['Admin']['Group']['name']?></span> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="<?=BASE_URL?>" target="_blank">Visit the Website</a></li>
              <li class="divider"></li>
              <li><?php echo $this->Html->link('Dashboard',array(
                          'controller' => 'dashboards',
                          'action' => 'index'
                      )); ?>
              </li>
              <li><?php echo $this->Html->link('Settings',array(
                          'controller' => 'users',
                          'action' => 'settings/'.$_SESSION['Auth']['Admin']['id']
                      )); ?>
              </li>
              <!-- <li><a href="http://localhost/ci/current/admin/message/">Messages</a></li> -->
              <li class="divider"></li>
              <li><?php echo $this->Html->link('Sign Out',array(
                          'controller' => 'users',
                          'action' => 'admin_logout'
                      )); ?></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
</div>