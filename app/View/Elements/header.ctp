<!-- header start here -->
<div class="header_area">
    <div class="header_wrap">
        <div class="row">
            <div class="logo"><a href="<?=BASE_URL?>"><?php echo $this->Html->image('/front_end/images/logo.png', array('alt' => ''));?></a></div>
            <div class="header_right">
                <?php if (!$this->Session->read('Auth.User')) { ?>
                    <div class="top_nav">
                        <ul>
                            <li><a href="<?=BASE_URL?>register">Regístrate</a></li>
                            <li><a href="<?=BASE_URL?>login">Ingresar a mi Cuenta</a></li>
                        </ul>
                    </div>
                    <div class="header_bottom">
                        <ul>
                            <li class="sign_up"><a href="<?=BASE_URL?>register">Sign Up</a></li>
                            <li><a href="<?=BASE_URL?>login"><?php echo $this->Html->image('/front_end/images/top_right_icon.png', array('alt' => ''));?></a></li>
                        </ul>
                    </div>
                <?php } else{ ?>
                    <div class="top_nav">
                        <ul>
                            <li><a href="<?=BASE_URL?>users/my_account">My Account</a></li>
                            <li><a href="<?=BASE_URL?>users/logout">Logout</a></li>
                        </ul>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="nav_wrap">
        <div class="row">
            <div class="nav_bar">
                <div class="main_nav">
                    <ul>
                        <li><a href="<?=BASE_URL?>">Inicio</a></li>
                        <?php
                        $ids = array('2', '3', '4', '5', '6');
                        $header_menu = $this->requestAction(
                                array('controller' => 'Cmspages', 'action' => 'menu'),
                                array('ids' => $ids )
                            );
                        if ( count($header_menu) ) :
                            foreach ($header_menu as $key => $value):
                        ?>
                                <li><a href="<?=BASE_URL.$header_menu[$key]['Cmspage']['slug']?>"><?=$header_menu[$key]['Cmspage']['title']?></a></li>
                        <?php
                            endforeach;
                        ?>
                        <?php
                        endif;
                        ?>
                    </ul>
                </div>
                <div class="social_icon">
                    <ul>
                        <li><a href="https://www.facebook.com/icargobox" target="_blank"><?php echo $this->Html->image('/front_end/images/facebook.png', array('alt' => ''));?></a></li>
                        <li><a href="https://twitter.com/icargobox" target="_blank"><?php echo $this->Html->image('/front_end/images/twitter.png', array('alt' => ''));?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- header end here -->