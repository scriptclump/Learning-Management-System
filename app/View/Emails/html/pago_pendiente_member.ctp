<?php
  $url = Router::url(array(
    'controller' => 'alerts',
    'action' => 'edit',
    $alert_id,
  ), true);
?>
<p>
<?php echo __('
	Su caja ha sido consolidada y está lista para enviar. Por favor haga <a href="%s" target="_blank">Click Aquí</a> para que ingrese a su cuenta de iCargoBox y haga su pago.
Nota Importante* Si usted está usando la opción de depósito bancario, por favor asegúrese de confirmar en la parte de ALERTA DE PAGO. Después de que cancele su pedido para asegurarnos que no se efectué ningún retraso en su entrega.', $url); ?>
</p>
<br />
<br />
<?php echo __('Gracias')?>,<br />
<?php echo __('Equipo')?><br />
<?php echo __('iCargoBox')?>