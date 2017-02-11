<div class="page_title_wrap">
	<div class="page_title_container">
    	<div class="row">
    		<div class="page_title_left"><?php echo $contact_us['Cmspage']['title'];?></div>
        </div>
    </div>
    <div class="page_des_container">
    	<div class="row">
        	<div class="page_des"><?=__('No dude en ponerse en contacto con nosotros.')?></div>
        </div>
    </div>
</div>
<!-- page title end here -->
<!-- content start here -->
<div class="content_wrap">
	<div class="content_container">
		<div class="row">
			<div class="content_left">
	        	<div class="inner_content">
	        		<?php echo $contact_us['Cmspage']['body'];?>
			    	<div class="contact_form">
			    		<?php
						echo $this->Session->flash();
						$inputDefaults = array(
							'class' => 'form-horizontal',
							'inputDefaults' => array(
								'label' => false,
								'div' => false,
								'error' => array(
								'attributes' => array('wrap' => 'span', 'class' => 'help-inline')
								)
							),
							'url' => array('controller' => 'ContactUs', 'action' => 'index')
						);
						echo $this->Form->create('ContactUs', $inputDefaults);
						?>
						<div class="contact_form_row">
			                <div class="contact_form_col">
								<?php echo $this->Form->input('fname', array( 'label' => __('Nombre: *') )); ?>
							</div>
							<div class="contact_form_col right">
			                	<?php echo $this->Form->input('lname', array( 'label' => __('Apellido: *') )); ?>
			                </div>
						</div>
						<div class="contact_form_row">
			                <div class="contact_form_col">
			                	<?php echo $this->Form->input('email', array( 'label' => __('E-mail: *'), 'type' => 'email' )); ?>
			                </div>
			                <div class="contact_form_col right">
			                	<?php echo $this->Form->input('phone', array( 'label' => __('Número de Teléfono: *') )); ?>
			                </div>
			            </div>
			            <div class="contact_form_row">
			               <?php echo $this->Form->input('enquiry', array( 'type' => 'textarea', 'label' => __('Consulta: *') )); ?>
			            </div>
			            <div class="contact_form_row">
			            	<?php
			            	$captcha_settings['model']='ContactUs';
							$captcha_settings['field']='security_code';
							$captcha_settings['type']='math';
							$this->Captcha->render($captcha_settings);?>
			            </div>
						<?php echo $this->Form->end('Enviar'); ?>
			      	</div>
	        	</div>
	        </div>
			<?php echo $this->element('right_sidebar'); ?>
		</div>
	</div>
</div>
<?php
echo $this->Html->css(
    array(
        '/front_end/jquery_validate/css/screen'
        )
    );
echo $this->Html->script(
    array(
        '/front_end/jquery_validate/jquery.validate.min',
        '/front_end/jquery_validate/localization/messages_es'
        )
    );
?>
<script type="text/javascript">
$(document).ready(function() {
    $("#ContactUsIndexForm").validate({
    	lang: 'spanish',
        rules: {
            "data[ContactUs][fname]": "required",
            "data[ContactUs][lname]": "required",
            "data[ContactUs][email]": {
                required: true,
                email: true
            },
            "data[ContactUs][phone]": "required",
            "data[ContactUs][enquiry]": "required"
        },
        messages: {
            "data[ContactUs][fname]": "<?=__('Por favor ingrese su nombre')?>",
            "data[ContactUs][lname]": "<?=__('Por favor, introduzca su apellido')?>",
            "data[ContactUs][email]": "<?=__('Por favor , introduce una dirección de correo electrónico válida')?>",
            "data[ContactUs][phone]": "<?=__('Por favor, introduzca su número de teléfono')?>",
            "data[ContactUs][enquiry]": "<?=__('Por favor escriba su consulta')?>"
        }
    });
});
</script>