<div class="page_title_wrap">
  <div class="page_title_container">
    <div class="row">
      <div class="page_title_left"><?=__('REGISTRO');?></div>
      <div class="page_title_right"> </div>
    </div>
  </div>
</div>
<div class="content_wrap">
  <div class="row">
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
        'url' => array('controller' => 'Users', 'action' => 'register')
      );
      echo $this->Form->create('User', $inputDefaults);
    ?>
    <div class="inner_content_container">
      <div class="payment_row">
        <div class="payment_left">
          <div class="payment_left_box">
              <span><small>1.</small><?=__('Información Personal')?></span>
              </div>
          </div>
          <div class="payment_right">
            <table cellspacing="0" cellpadding="0" border="0" class="register_table">
              <tbody>
                <tr style="display:none;">
                  <td width="22%"><?=__('Username')?>: *</td>
                  <td width="43%"><?php echo $this->Form->input('username', array('type' => 'text' )); ?></td>
                  <td width="35%">&nbsp;</td>
                </tr>
                <tr>
                  <td width="22%"><?=__('E-mail')?>: *</td>
                  <td width="43%"><?php echo $this->Form->input('email', array('type' => 'email' )); ?></td>
                  <td width="35%">&nbsp;</td>
                </tr>
                <tr>
                  <td><?=__('Contraseña')?>: *</td>
                  <td><?php echo $this->Form->input('password', array('type' => 'password' )); ?></td>
                  <td class="cmt"><?=__('4 - 10 Números y / o Letras')?></td>
                </tr>
                <tr>
                  <td><?=__('Repetir Contraseña')?>: *</td>
                  <td><?php echo $this->Form->input('re_password', array('type' => 'password' )); ?></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><?=__('Nombres')?>: *</td>
                  <td><?php echo $this->Form->input('Profile.fname', array('type' => 'text' )); ?></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><?=__('Apellidos')?>: *</td>
                  <td><?php echo $this->Form->input('Profile.lname', array('type' => 'text' )); ?></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><?=__('Fecha de Nacimiento')?>: *</td>
                  <td><?php echo $this->Form->input('Profile.dob', array( 'placeholder' => 'Select Date', 'class' => 'date', 'type' => 'text' )); ?></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><?=__('Telefono fijo')?>: *</td>
                  <td><?php echo $this->Form->input('Profile.land_phone', array('type' => 'text' )); ?></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><?=__('Celular')?>: *</td>
                  <td><?php echo $this->Form->input('Profile.cell_phone', array('type' => 'text' )); ?></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><?=__('Referido por')?>:</td>
                  <td><?php echo $this->Form->input('Profile.reffered_by', array('type' => 'text' )); ?></td>
                  <td class="cmt"><?=__('* Si alguien lo refirió a iCargoBox, por favor coloque la dirección de correo electrónico de esa persona para que reciban $10.00 USD')?></td>
                </tr>
              </tbody>
          </table>
        </div>
      </div>
      <div class="payment_row">
        <div class="payment_left">
            <div class="payment_left_box">
                <span><small>2.</small><?=__('Dirección de entrega')?></span>
              </div>
          </div>
          <div class="payment_right last">
              <table cellspacing="0" cellpadding="0" border="0" class="register_table">
                <tbody><tr>
                  <td width="22%" class="textarea"><?=__('Dirección de')?><br><?=__('correspondencia')?>: *</td>
                  <td width="43%"><?php echo $this->Form->input('Profile.address_correspondence_to', array( 'type' => 'textarea' )); ?></td>
                  <td width="35%">&nbsp;</td>
                </tr>
                <tr>
                  <td><?=__('Ciudad')?>: *</td>
                  <td><?php echo $this->Form->input('Profile.city_id', array(
                            'options' => $cities,
                            'empty' => '(choose one)'
                        )); ?>
                  </td>
                  <td width="35%">&nbsp;</td>
                </tr>
                <tr>
                  <td><?=__('Departamento')?>:</td>
                  <td><?php echo $this->Form->input('Profile.department_id', array(
                                'options' => array(),
                                'empty' => '(choose one)'
                            )); ?>
                  </td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td class="grey_bg"><?=__('¿Cuál es la respuesta')?>: *</td>
                  <td class="grey_bg pay_text_box">
                    <?php
                    $captcha_settings['model']='User';
                    $captcha_settings['field']='security_code';
                    $captcha_settings['type']='math';
                    $this->Captcha->render($captcha_settings);
                    ?></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><a href="<?=BASE_URL?>"><input type="button" class="btn red" value="CANCELAR"></a></td>
                  <td><input type="submit" value="ACEPTAR" name=""></td>
                  <td>&nbsp;</td>
                </tr>
              </tbody></table>
          </div>
      </div>
    </div>
    <?php echo $this->Form->end(); ?>
  </div>
</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script>
$(function() {
  $( ".date" ).datepicker({
    changeMonth: true,
    changeYear: true,
    yearRange: '1960:'+ new Date().getFullYear()
  });
});
</script>

<!-- Form validation -->
<script type="text/javascript">
$(document).ready(function() {
    $("#UserRegisterForm").validate({
      lang: 'spanish',
        rules: {
            "data[User][username]"                    : "required",
            "data[User][password]"                    : {
                                                          required: true,
                                                          minlength: 4,
                                                          maxlength: 10
                                                        },
            "data[User][re_password]"                 : {
                                                          required: true,
                                                          minlength: 4,
                                                          maxlength: 10,
                                                          equalTo: "#UserPassword"
                                                        },
            "data[User][email]"                       : {
                                                          required: true,
                                                          email: true
                                                        },
            "data[Profile][fname]"                    : "required",
            "data[Profile][lname]"                    : "required",
            "data[Profile][dob]"                      : "required",
            "data[Profile][land_phone]"               : "required",
            "data[Profile][cell_phone]"               : "required",
            "data[Profile][address_correspondence_to]": "required",
            "data[Profile][city_id]"                  : "required",
            "data[Profile][department_id]"            : "required",
            "data[User][security_code]"               : "required"
        },
        messages: {
            "data[User][username]"                    : "<?=__('Please enter the username')?>",
            "data[User][password]"                    : {
                                                          required: "<?=__('Please enter the password')?>",
                                                          minlength: "<?=__('Please enter the at least 4 characters')?>",
                                                          maxlength: "<?=__('Maximum 10 characters are allowed')?>"
                                                        },
            "data[User][re_password]"                 : {
                                                          required: "<?=__('Please retype the password')?>",
                                                          minlength: "<?=__('Please enter the at least 4 characters')?>",
                                                          maxlength: "<?=__('Maximum 10 characters are allowed')?>",
                                                          equalTo: "<?=__('Please enter the same password as above')?>"
                                                        },
            "data[User][email]"                       : {
                                                          required: "<?=__('Por favor , introduce una dirección de correo electrónico válida')?>",
                                                          email: "<?=__('Please enter the correct email address')?>"
                                                        },
            "data[Profile][fname]"                    : "<?=__('Por favor ingrese su nombre')?>",
            "data[Profile][lname]"                    : "<?=__('Por favor, introduzca su apellido')?>",
            "data[Profile][dob]"                      : "<?=__('Please enter the date of birth')?>",
            "data[Profile][land_phone]"               : "<?=__('Please enter the land phone')?>",
            "data[Profile][cell_phone]"               : "<?=__('Please enter the cell phone')?>",
            "data[Profile][address_correspondence_to]": "<?=__('Please enter the correspondence address')?>",
            "data[Profile][city_id]"                  : "<?=__('Please select the city')?>",
            "data[Profile][department_id]"            : "<?=__('Please select the department')?>",
            "data[User][security_code]"               : "<?=__('Please enter the captcha code')?>"
        }
    });
});
</script>
<?php
$this->Js->get('#ProfileCityId')->event('change',
  $this->Js->request(array(
    'controller'=>'users',
    'action'=>'city_to_departmentAjax'
    ), array(
    'update'=>'#ProfileDepartmentId',
    'async' => true,
    'method' => 'post',
    'dataExpression'=>true,
    'data'=> $this->Js->serializeForm(array(
      'isForm' => true,
      'inline' => true
      ))
    ))
  );
?>