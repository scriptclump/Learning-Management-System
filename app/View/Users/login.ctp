
<!-- page title start here -->
<div class="page_title_wrap">
	<div class="page_title_container">
    	<div class="row">
    		<div class="page_title_left">Login</div>
            <div class="page_title_right">
            	&nbsp;
            </div>
        </div>
    </div>
    <div class="page_des_container">
    	<div class="row">
        	<div class="page_des">Morbi varius nisiac cursus ullamcnec quis lacus vitae enim dapibus laorenec iaculis, metus non laoreet faucibus.</div>
        </div>
    </div>
</div>
<!-- page title end here -->
<!-- content start here -->
<div class="content_wrap">
	<div class="row">
    	<div class="inner_content_container">
    		<?php echo $this->Session->flash(); ?>
        	<div class="login_form">
        		<?php
				$inputDefaults = array(
	                'class' => 'form-horizontal',
	                'inputDefaults' => array(
	                   'label' => false,
	                   'div' => false,
	                   'error' => array(
	                        'attributes' => array('wrap' => 'span', 'class' => 'help-inline')
	                   )
	                ),
	                'url' => array('controller' => 'users', 'action' => 'login')
	            );
				echo $this->Form->create('User', $inputDefaults);
				?>
                    <div class="login_form_row">
                        <label><?=__('E-mail:*')?>:</label>
                        <?php echo $this->Form->input('User.email'); ?>
                    </div>
                    <div class="login_form_row">
                        <label><?=__('Contraseña: *')?>:</label>
                       <?php echo $this->Form->input('User.password'); ?>
                    </div>
                    <div class="login_form_row">
                        <?php echo $this->Form->end('Enviar'); ?>
                        <div class="forgot_pass"><a href="" class="btn red"><?=__('¿Olvidaste tu contraseña')?></a>
                        </div>
                    </div>
          </div>
        </div>
    </div>
</div>

<!-- Form validation -->
<script type="text/javascript">
$(document).ready(function() {
    $("#UserLoginForm").validate({
      lang: 'spanish',
        rules: {
            "data[User][email]"                   : "required",
            "data[User][password]"                : "required"
        },
        messages: {
            "data[User][email]"                   : "<?=__('Please enter the email')?>",
            "data[User][password]"                : "<?=__('Please enter the password')?>"
        }
    });
});
</script>