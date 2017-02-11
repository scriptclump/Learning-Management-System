<?php
  $url = Router::url(array(
    'controller' => 'alerts',
    'action' => 'edit',
    $alert_id,
  ), true);
?>
<p>
<?php echo __('iCargobox ha recibido instrucciones para consolidar su paquete con los productos confirmados. Durante este proceso Nosotros haremos lo siguiente
1. Cuidadosamente empacaremos sus órdenes en una sola caja si es posible
2. Pesaremos su paquete con su contenido
3. Generamos su factura
4. Cerraremos su paquete con una cinta de seguridad especial que solo en caso tal de estar abierta debe ser recibida con la cinta de la dian.
5. Nos aseguraremos que usted reciba el mejor servicio y un precio económico por su envió.
En cuanto completemos este proceso, le enviaremos un email para que pueda realizar su pago.'); ?>
</p>
<br />
<br />
<?php echo __('Gracias')?>,<br />
<?php echo __('Equipo')?><br />
<?php echo __('iCargoBox')?>