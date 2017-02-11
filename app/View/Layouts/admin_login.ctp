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

$cakeDescription = __d('cake_dev', 'Administrator');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?> login
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->fetch('meta');
	?>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:300,200,100' rel='stylesheet' type='text/css'>

   <!-- Bootstrap core CSS -->
   <?php echo $this->Html->css("/back_end/js/bootstrap/dist/css/bootstrap"); ?>
   <?php echo $this->Html->css("/back_end/fonts/font-awesome-4/css/font-awesome.min"); ?>

   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!--[if lt IE 9]>
    <?php echo $this->Html->script("/back_end/js/html5shiv"); ?>
	<?php echo $this->Html->script("/back_end/js/respond.min"); ?>
   <![endif]-->

   <!-- Custom styles for this template -->
   <?php echo $this->Html->css("/back_end/css/style"); ?>

</head>
<body class="texture">

<div id="cl-wrapper" class="login-container">
   <div class="middle-login">
   		<?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>
      <?php //echo $this->element('sql_dump'); ?>
      <div class="text-center out-links"><a href="#">Copyright &copy; <?=date('Y')?>. All Rights Reserved.</a></div>
   </div>
</div>




<?php echo $this->Html->script("/back_end/js/jquery"); ?>
<script type="text/javascript">
$(function(){
  $("#cl-wrapper").css({opacity:1,'margin-left':0});
});
</script>
<?php echo $this->Html->script("/back_end/js/jquery.parsley/parsley"); ?>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<?php echo $this->Html->script("/back_end/js/behaviour/voice-commands"); ?>
<?php echo $this->Html->script("/back_end/js/bootstrap/dist/js/bootstrap.min"); ?>
</body>
</html>
