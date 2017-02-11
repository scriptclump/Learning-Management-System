<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'Admin');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:300,200,100' rel='stylesheet' type='text/css'>



	<?php
		echo $this->Html->meta('icon');
		echo $this->fetch('meta');
		//echo $this->fetch('css');
		//echo $this->fetch('script');
		if( isset($meta_key) ){
			echo $this->Html->meta( 'keywords', $meta_key);
		} else {
			echo $this->Html->meta( 'keywords', 'Admin Panel');
		}
		if( isset($meta_desc) ){
			echo $this->Html->meta( 'description', $meta_desc);
		} else{
			echo $this->Html->meta( 'description', 'Admin Panel');
		}

		echo $this->Html->css(
			array(
				'/back_end/js/bootstrap/dist/css/bootstrap',
				'/back_end/js/jquery.gritter/css/jquery.gritter',
				'/back_end/fonts/font-awesome-4/css/font-awesome.min',
				'/back_end/js/jquery.nanoscroller/nanoscroller'
				)
			);?>
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<?php echo $this->Html->script("/back_end/js/html5shiv"); ?>
	<?php echo $this->Html->script("/back_end/js/respond.min"); ?>
	<![endif]-->
   <?php
		echo $this->Html->script(
			array(
				'/back_end/js/jquery'
				));
		echo $this->Html->css(
			array(
				'/back_end/js/bootstrap.switch/bootstrap-switch',
				'/back_end/js/bootstrap.datetimepicker/css/bootstrap-datetimepicker.min',
				'/back_end/js/jquery.select2/select2',
				'/back_end/js/bootstrap.slider/css/slider',
				'/back_end/js/jquery.icheck/skins/flat/green',
				'/back_end/css/style'
				)
			);
	?>
<?php echo $this->Html->script(array('/js/activate.js')); ?>
<?php echo $this->App->js(); ?>
    <script type="text/javascript">
	    $(document).ready(function(){

	      /*Switch*/
	      $('.switch').bootstrapSwitch();

	      /*DateTime Picker*/
	        $(".datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii'});

	      /*Select2*/
	        $(".select2").select2({
	          width: '100%'
	        });

	       /*Tags*/
	        $(".tags").select2({tags: 0,width: '100%'});

	       /*Slider*/
	        $('.bslider').slider();

	      /*Input & Radio Buttons*/
	        $('.icheck').iCheck({
	          checkboxClass: 'icheckbox_flat-green',
	          radioClass: 'iradio_flat-green'
	        });
	    });
	</script>
</head>
<body>
<div id="cl-wrapper">
  <?php echo $this->element('admin_left'); ?>
  <div class="container-fluid" id="pcont">
  <?php echo $this->element('admin_header'); ?>
	    <div class="cl-mcont">
	      <?php echo $this->Session->flash(); ?>
		  <?php echo $this->fetch('content'); ?>
		  <?php //echo $this->element('sql_dump'); ?>
		</div>
  </div>
</div>

<!-- Right Chat-->
<?php

echo $this->Html->script(
			array(
				'/back_end/js/jquery.cookie/jquery.cookie',
				'/back_end/js/jquery.pushmenu/js/jPushMenu',
				'/back_end/js/jquery.nanoscroller/jquery.nanoscroller',
				'/back_end/js/jquery.sparkline/jquery.sparkline.min',
				'/back_end/js/jquery.ui/jquery-ui',
				'/back_end/js/jquery.gritter/js/jquery.gritter',
				'/back_end/js/behaviour/core',
				'/back_end/js/jquery.parsley/parsley'
				)
			);
echo $this->Html->css(
			array('/back_end/js/jquery.niftymodals/css/component')
			);

echo $this->Html->script(array('/back_end/js/jquery.niftymodals/js/jquery.modalEffects')); ?>
<script type="text/javascript">
    $(document).ready(function(){
		$('.md-trigger').modalEffects();
    });
</script>
<?php
echo $this->Html->script(
			array(
				'/back_end/js/bootstrap.switch/bootstrap-switch.min',
				'/back_end/js/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min',
				'/back_end/js/jquery.select2/select2.min',
				'/back_end/js/bootstrap.slider/js/bootstrap-slider',
				'/back_end/js/jquery.icheck/icheck.min',
				'/back_end/js/behaviour/voice-commands',
				'/back_end/js/bootstrap/dist/js/bootstrap.min',
				'/back_end/js/jquery.flot/jquery.flot',
				'/back_end/js/jquery.flot/jquery.flot.pie',
				'/back_end/js/jquery.flot/jquery.flot.resize',
				'/back_end/js/jquery.flot/jquery.flot.labels')
			);
?>
<?php
	if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) echo $this->Js->writeBuffer();
	// Writes cached scripts
	?>
</body>
</html>
