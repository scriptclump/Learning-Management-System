<?php echo __('Hola %s', $fname. '&nbsp;' .$lname); ?>,<br/><br/>
<p><?php
  $url = Router::url(array(
    'controller' => 'users',
    'action' => 'activate',
    $username,
    $activation_key,
  ), true);
  echo __('Por Favor, haga clic en este link para activar su cuenta con icargobox.com: %s', $url);
?>
</p>
<br />
<br />
Gracias,<br/>
Equipo iCargoBox<br/ >