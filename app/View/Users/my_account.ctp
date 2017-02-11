<div class="page_title_wrap">
	<div class="page_title_container">
    	<div class="row">
    		<div class="page_title_left">PÁGINA INICIAL <span class="logo_txt">iCargoBox</span></div>
            <div class="page_title_right">
            	<ul>
                    <li><a href="<?=BASE_URL?>users/logout">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="content_wrap">
	<div class="row">
  	<div class="inner_content_container">
      <?php echo $this->element('left_sidebar'); ?>
      <div class="inner_content_right">
        <?php echo $this->Session->flash(); ?>
      	<div class="content_right_top">
              <div class="right_top_title"><h3>Pedidos Pendientes</h3></div>
              <div class="right_btn">
                  <a href="<?=BASE_URL?>alerts/description" class="btn green">vista ALERTA</a>
                  <a href="<?=BASE_URL?>alerts/add" class="btn blue">nuevo ALERTA</a>
              </div>
          </div>
          <div class="pedidos_box">
          	<div class="pedidos_box_des">Bienvenido a <strong>iCargoBox!</strong> Ahora, usted puede ordenar todos los productos que necesite alrededor del Mundo y tenerlos en su casa de una manera más Rápida y Económica.</div>
              <div class="pedidos_box_list">
              	<ul>
                  	<li><span><small>1</small></span> Compre desde la comodidad de su casa en cualquier página de internet. En la parte inferior de nuestra página inicial recomendamos algunos Websites.</li>
                      <li><span><small>2</small></span> Asegúrese de actualizar su nueva dirección de iCargoBox en la sección "Ship To:" antes de hacer su compra.</li>
                      <li><span><small>3</small></span> Utilice nuestro servicio de "ALERTA" para hacernos saber de sus nuevos pedidos. <a href="<?=BASE_URL?>alerts/add" class="btn red">nuevo ALERTA</a></li>
                      <li><span><small>4</small></span> Una vez que recibamos sus órdenes, le notificaremos paso a paso el proceso y actualizaciones de las órdenes recibidas.</li>
                      <li><span><small>5</small></span> Reciba su paquete en la puerta de su casa.</li>
                  </ul>
              </div>
          </div>
          <?php $recomended_stores = $this->requestAction('RecomendedStores/display/');
           if ( isset($recomended_stores) && ( count($recomended_stores) > 0 ) ) : ?>
                  <div class="inner_carousel_area">
                      <h3>Tiendas Recomendadas</h3>
                      <div class="carousel_box">
                          <ul class="carousel_slider">
                              <?php $i=0;
                              foreach($recomended_stores as $recomended_store): ?>
                                  <li><?php if($recomended_stores[$i]['RecomendedStore']['store_img'] != "") { ?>
                                          <a href="<?=$recomended_stores[$i]['RecomendedStore']['store_url']?>" target="_blank">
                                          <?php echo $this->Html->image('/'.$recomended_stores[$i]['RecomendedStore']['store_img'], array('alt' => h($recomended_stores[$i]['RecomendedStore']['title'])  )); ?>
                                         </a>
                                         <?php
                                         } else {
                                             echo 'No Image';
                                         } ?></li>
                              <?php $i++; endforeach; ?>
                          </ul>
                      </div>
                  </div>
          <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<?php
echo $this->Html->script(
    array(
        '/front_end/js/jquery.bxslider',
        '/front_end/js/theme-functions'
        )
    );
echo $this->Html->css(
    array(
        '/front_end/css/jquery.bxslider'
        )
    );
?>

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