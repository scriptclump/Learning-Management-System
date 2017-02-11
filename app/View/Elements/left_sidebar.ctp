<?php
$icargobox_address = $this->requestAction('IcargoAddresses/display');
$cities            = $this->requestAction('Cities/display');
$departments       = $this->requestAction('Departments/display');
$this->request->data = $this->requestAction('Users/display');
unset($this->request->data['User']['password']);
?>
<div class="inner_content_left">
	<h3><?=__('Su nueva Dirección icargobox')?></h3>
      <div class="left_box">
          <h4><?=__('Ship to / Envie a')?></h4>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="28%"><?=__('Name')?>:</td>
                <td colspan="3"><input name="" type="text" readonly value="<?=$icargobox_address['IcargoAddress']['name']?>" /></td>
              </tr>
              <tr>
                <td><?=__('Address 1')?>:</td>
                <td colspan="3"><input name="" type="text" readonly value="<?=$icargobox_address['IcargoAddress']['address_one']?>" /></td>
              </tr>
              <tr>
                <td><?=__('Address 2')?>:</td>
                <td colspan="3"><input name="" type="text" readonly  value="<?=$icargobox_address['IcargoAddress']['address_two']?>" /></td>
              </tr>
              <tr>
                <td><?=__('City')?>:</td>
                <td colspan="3"><input name="" type="text" readonly value="<?=$icargobox_address['IcargoAddress']['city']?>" /></td>
              </tr>
              <tr>
                <td><?=__('State')?>:</td>
                <td width="18%"><input name="" type="text" readonly value="<?=$icargobox_address['IcargoAddress']['state']?>" /></td>
                <td width="24%">Zip Code:</td>
                <td width="24%"><input name="" type="text" readonly value="<?=$icargobox_address['IcargoAddress']['zip_code']?>" /></td>
              </tr>
            </table>
      </div>
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
          'url' => array('controller' => 'Users', 'action' => 'my_account')
        );
        echo $this->Form->create('User', $inputDefaults);
        echo $this->Form->input('id');
        echo $this->Form->input('Profile.id');
      ?>
      <div class="left_box">
          <h4><?=__('Dirección de entrega')?></h4>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="28%"><?=__('Cassillero')?> #: </td>
              <td colspan="3"><strong><?=$this->request->data['User']['id']?></strong></td>
            </tr>
            <tr>
              <td width="28%"><?=__('E-mail')?>: *</td>
              <td colspan="3"><?php echo $this->Form->input('email', array( 'required' => 'required', 'type' => 'email' )); ?>
              </td>
            </tr>
            <tr>
              <td><?=__('Nombres')?>: *</td>
              <td colspan="3"><?php echo $this->Form->input('Profile.fname', array('required' => 'required' )); ?></td>
            </tr>
            <tr>
              <td><?=__('Apellidos')?>: *</td>
              <td colspan="3"><?php echo $this->Form->input('Profile.lname', array('required' => 'required' )); ?></td>
            </tr>
            <tr>
              <td class="textarea"><?=__('Dirección')?>:</td>
              <td colspan="3"><?php echo $this->Form->input('Profile.address_correspondence_to', array( 'type' => 'textarea' )); ?></td>
            </tr>
            <tr>
              <td><?=__('Cuidad')?>:</td>
              <td colspan="3"><?php
                echo $this->Form->input('Profile.city_id', array(
                    'options' => $cities,
                    'empty' => '(choose one)'
                )); ?></td>
            </tr>
            <tr>
              <td><?=__('Depto')?>:</td>
              <td colspan="3"><?php
                  echo $this->Form->input('Profile.department_id', array(
                      'options' => $departments,
                      'empty' => '(choose one)'
                  )); ?>
              </td>
            </tr>
            <tr>
              <td><?=__('Teléfono')?> #:</td>
              <td colspan="3">
                <?php echo $this->Form->input('Profile.cell_phone', array('class' => 'form-control parsley-validated', 'required' => 'required' )); ?></td>
            </tr>
            <tr>
              <td colspan="4" align="center"><input name="" type="submit" value="<?=__('Actualizar Información Personal')?>" /></td>
            </tr>
          </table>
      </div>
      <?php echo $this->Form->end(); ?>
</div>