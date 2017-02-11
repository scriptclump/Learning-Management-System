 <div class="cl-sidebar">
    <div class="cl-toggle"><i class="fa fa-bars"></i></div>
    <div class="cl-navblock">
      <div class="menu-space">
        <div class="content">
          <div class="sidebar-logo">
            <div class="logo">
                <a href="#">LMS</a>
            </div>
          </div>
          <ul class="cl-vnavigation">
            <li <?php echo ($this->params['controller'] == 'dashboards')? 'class="active"' : ''?> >
            <?php echo $this->Html->link('<i class="fa fa-home"></i><span>Dashboard</span>',
									    array(
									        'controller' => 'dashboards',
									        'action' => 'index'
									    ),
									    array('escape' => false)
      			); ?>
      			</li>
            <li class="parent"><?php echo $this->Html->link('<i class="fa fa-user"></i><span>User Module</span>',
                      array(
                          'controller' => 'users',
                          'action' => 'index'
                      ),
                      array('escape' => false)
               ); ?>
              <ul class="sub-menu">
                <li <?php echo ( $this->params['controller'] == 'users' && $this->params['action'] !='admin_add' && $this->params['action'] !='admin_order' )? 'class="active"' : ''?> ><?php echo $this->Html->link('<i class="fa fa-bars"></i> Users',
                      array(
                          'controller' => 'users',
                          'action' => 'index'
                      ),
                      array('escape' => false)
                 ); ?></li>
                <li <?php echo ( $this->params['controller'] == 'users' && $this->params['action'] =='admin_add' )? 'class="active"' : ''?> ><?php echo $this->Html->link('<i class="fa fa-plus-square"></i> New User',
                      array(
                          'controller' => 'users',
                          'action' => 'add'
                      ),
                      array('escape' => false)
                 ); ?>
                </li>
              </ul>
            </li>
            <li class="parent"><?php echo $this->Html->link('<i class="fa fa-file-text"></i><span>Page Module</span>',
                      array(
                          'controller' => 'cmspages',
                          'action' => 'index'
                      ),
                      array('escape' => false)
               ); ?>
              <ul class="sub-menu">
                <li <?php echo ( $this->params['controller'] == 'cmspages' && $this->params['action'] !='admin_add' && $this->params['action'] !='admin_order' )? 'class="active"' : ''?> ><?php echo $this->Html->link('<i class="fa fa-bars"></i> Pages',
                      array(
                          'controller' => 'cmspages',
                          'action' => 'index'
                      ),
                      array('escape' => false)
                 ); ?></li>
                <li <?php echo ( $this->params['controller'] == 'cmspages' && $this->params['action'] =='admin_add' )? 'class="active"' : ''?> ><?php echo $this->Html->link('<i class="fa fa-plus-square"></i> New Page',
                      array(
                          'controller' => 'cmspages',
                          'action' => 'add'
                      ),
                      array('escape' => false)
                 ); ?>
                </li>
              </ul>
            </li>
            <li class="parent"><?php echo $this->Html->link('<i class="fa fa-sitemap"></i><span>Category Module</span>',
                      array(
                          'controller' => 'categories',
                          'action' => 'index'
                      ),
                      array('escape' => false)
               ); ?>
              <ul class="sub-menu">
                <li <?php echo ( $this->params['controller'] == 'categories' && $this->params['action'] !='admin_add' && $this->params['action'] !='admin_order' )? 'class="active"' : ''?> ><?php echo $this->Html->link('<i class="fa fa-bars"></i> Categories',
                      array(
                          'controller' => 'categories',
                          'action' => 'index'
                      ),
                      array('escape' => false)
                 ); ?></li>
                <li <?php echo ( $this->params['controller'] == 'categories' && $this->params['action'] =='admin_add' )? 'class="active"' : ''?> ><?php echo $this->Html->link('<i class="fa fa-plus-square"></i> New Category',
                      array(
                          'controller' => 'categories',
                          'action' => 'add'
                      ),
                      array('escape' => false)
                 ); ?>
                </li>
              </ul>
            </li>
            <li class="parent"><?php echo $this->Html->link('<i class="fa fa-picture-o"></i><span>Sliding Banner Module</span>',
                      array(
                          'controller' => 'SlidingBanners',
                          'action' => 'index'
                      ),
                      array('escape' => false)
               ); ?>
              <ul class="sub-menu">
                <li <?php echo ( $this->params['controller'] == 'SlidingBanners' && $this->params['action'] !='admin_add' && $this->params['action'] !='admin_order' )? 'class="active"' : ''?> ><?php echo $this->Html->link('<i class="fa fa-bars"></i> Sliding Banners',
                      array(
                          'controller' => 'SlidingBanners',
                          'action' => 'index'
                      ),
                      array('escape' => false)
                 ); ?></li>
                <li <?php echo ( $this->params['controller'] == 'SlidingBanners' && $this->params['action'] =='admin_add' )? 'class="active"' : ''?> ><?php echo $this->Html->link('<i class="fa fa-plus-square"></i> New Sliding Banner',
                      array(
                          'controller' => 'SlidingBanners',
                          'action' => 'add'
                      ),
                      array('escape' => false)
                 ); ?>
                </li>
              </ul>
            </li>
            <li class="parent"><?php echo $this->Html->link('<i class="fa fa-bullhorn"></i><span>Sliding Text Module</span>',
                      array(
                          'controller' => 'sliding_texts',
                          'action' => 'index'
                      ),
                      array('escape' => false)
               ); ?>
              <ul class="sub-menu">
                <li <?php echo ( $this->params['controller'] == 'sliding_texts' && $this->params['action'] !='admin_add' && $this->params['action'] !='admin_order' )? 'class="active"' : ''?> ><?php echo $this->Html->link('<i class="fa fa-bars"></i> Sliding Texts',
                      array(
                          'controller' => 'sliding_texts',
                          'action' => 'index'
                      ),
                      array('escape' => false)
                 ); ?></li>
                <li <?php echo ( $this->params['controller'] == 'sliding_texts' && $this->params['action'] =='admin_add' )? 'class="active"' : ''?> ><?php echo $this->Html->link('<i class="fa fa-plus-square"></i> New Sliding Text',
                      array(
                          'controller' => 'sliding_texts',
                          'action' => 'add'
                      ),
                      array('escape' => false)
                 ); ?>
                </li>
              </ul>
            </li>
            <li class="parent"><?php echo $this->Html->link('<i class="fa fa-thumb-tack"></i><span>Testimonial Module</span>',
                      array(
                          'controller' => 'testimonials',
                          'action' => 'index'
                      ),
                      array('escape' => false)
               ); ?>
              <ul class="sub-menu">
                <li <?php echo ( $this->params['controller'] == 'testimonials' && $this->params['action'] !='admin_add' && $this->params['action'] !='admin_order' )? 'class="active"' : ''?> ><?php echo $this->Html->link('<i class="fa fa-bars"></i> Testimonials',
                      array(
                          'controller' => 'testimonials',
                          'action' => 'index'
                      ),
                      array('escape' => false)
                 ); ?></li>
                <li <?php echo ( $this->params['controller'] == 'testimonials' && $this->params['action'] =='admin_add' )? 'class="active"' : ''?> ><?php echo $this->Html->link('<i class="fa fa-plus-square"></i> New Testimonial',
                      array(
                          'controller' => 'testimonials',
                          'action' => 'add'
                      ),
                      array('escape' => false)
                 ); ?>
                </li>
              </ul>
            </li>
            <li class="parent"><?php echo $this->Html->link('<i class="fa fa-thumbs-up"></i><span>Recommended Store Module</span>',
                      array(
                          'controller' => 'RecomendedStores',
                          'action' => 'index'
                      ),
                      array('escape' => false)
               ); ?>
              <ul class="sub-menu">
                <li <?php echo ( $this->params['controller'] == 'RecomendedStores' && $this->params['action'] !='admin_add' && $this->params['action'] !='admin_order' )? 'class="active"' : ''?> ><?php echo $this->Html->link('<i class="fa fa-bars"></i> Recommended Stores',
                      array(
                          'controller' => 'RecomendedStores',
                          'action' => 'index'
                      ),
                      array('escape' => false)
                 ); ?></li>
                <li <?php echo ( $this->params['controller'] == 'RecomendedStores' && $this->params['action'] =='admin_add' )? 'class="active"' : ''?> ><?php echo $this->Html->link('<i class="fa fa-plus-square"></i> New Recommended Store',
                      array(
                          'controller' => 'RecomendedStores',
                          'action' => 'add'
                      ),
                      array('escape' => false)
                 ); ?>
                </li>
              </ul>
            </li>
            <li class="parent"><?php echo $this->Html->link('<i class="fa fa-envelope"></i><span>Newsletter Module</span>',
                      array(
                          'controller' => 'newsletters',
                          'action' => 'index'
                      ),
                      array('escape' => false)
               ); ?>
              <ul class="sub-menu">
                <li <?php echo ( $this->params['controller'] == 'newsletter_subscribers' && $this->params['action'] !='admin_add' && $this->params['action'] !='admin_order' )? 'class="active"' : ''?> ><?php echo $this->Html->link('<i class="fa fa-group"></i> Subscribers',
                      array(
                          'controller' => 'newsletter_subscribers',
                          'action' => 'index'
                      ),
                      array('escape' => false)
                 ); ?></li>
                <li <?php echo ( $this->params['controller'] == 'newsletter_subscribers' && $this->params['action'] =='admin_add' )? 'class="active"' : ''?> ><?php echo $this->Html->link('<i class="fa fa-plus-square"></i> New Subscriber',
                      array(
                          'controller' => 'newsletter_subscribers',
                          'action' => 'add'
                      ),
                      array('escape' => false)
                 ); ?>
                </li>
                <li <?php echo ( $this->params['controller'] == 'newsletters' && $this->params['action'] =='admin_add' )? 'class="active"' : ''?> ><?php echo $this->Html->link('<i class="fa fa-plus-square"></i> Compose Newsletter',
                      array(
                          'controller' => 'newsletters',
                          'action' => 'add'
                      ),
                      array('escape' => false)
                 ); ?>
                </li>
                <li <?php echo ( $this->params['controller'] == 'newsletters' && $this->params['action'] !='admin_add' && $this->params['action'] !='admin_order' )? 'class="active"' : ''?> ><?php echo $this->Html->link('<i class="fa fa-mail-forward"></i> Newsletters',
                      array(
                          'controller' => 'newsletters',
                          'action' => 'index'
                      ),
                      array('escape' => false)
                 ); ?></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <div class="text-right collapse-button" style="padding:7px 9px;">
        <button id="sidebar-collapse" class="btn btn-default" style=""><i style="color:#fff;" class="fa fa-angle-left"></i></button>
      </div>
    </div>
  </div>