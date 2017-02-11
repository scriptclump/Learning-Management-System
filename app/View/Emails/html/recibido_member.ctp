<?php
  $url = Router::url(array(
    'controller' => 'alerts',
    'action' => 'edit',
    $alert_id,
  ), true);
?>
<p>
<?php echo __('
iCargoBox ha recibido un paquete que ha sido agregado a su Casillero. Para ver su contenido, Por favor haga <a href="%s" target="_blank">Click Aquí</a> para ingresar a su cuenta de iCargoBox. La descripción de los productos se encuentra bajo “Mis Pedidos Recibidos”
Opciones
1. Si no espera ningún producto adicional, Por favor ingrese a “Mis Pedidos Recibidos” y confirme en “Despachar” por cada producto que necesite consolidar en un solo paquete. Al consolidar su paquete se le enviara un email para estar en contacto con usted en todo el procedimiento hasta su destino final.
2. Si está esperando algún producto adicional, no necesita hacer ningún procedimiento. Le dejaremos saber en cuanto lo recibamos.', $url); ?>
</p>
<br />
<br />
<?php echo __('Gracias')?>,<br />
<?php echo __('Equipo')?><br />
<?php echo __('iCargoBox')?>