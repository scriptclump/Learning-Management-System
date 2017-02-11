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

$cakeDescription = __d('cake_dev', 'LMS');
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8" />
<!-- Set the viewport width to device width for mobile -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title><?php echo $cakeDescription ?>: <?php echo $title_for_layout; ?></title>
<?php
echo $this->Html->meta('icon');
echo $this->fetch('meta');
if( isset($meta_key) ){
	echo $this->Html->meta( 'keywords', $meta_key);
} else {
	echo $this->Html->meta( 'keywords', 'Welcome to LMS');
}
if( isset($meta_desc) ){
	echo $this->Html->meta( 'description', $meta_desc);
} else{
	echo $this->Html->meta( 'description', 'Welcome to LMS');
}

echo $this->Html->css(
    array(
        '/front_end/css/style',
        '/front_end/css/font-awesome',
        '/front_end/css/jquery.fancybox',
        '/front_end/jquery_validate/css/screen'
        )
    );
echo $this->Html->script(
    array(
        '/front_end/js/jquery-2.1.1.min',
        '/front_end/js/selectivizr',
        '/front_end/js/jquery.fancybox',
        '/front_end/jquery_validate/jquery.validate.min',
        '/front_end/jquery_validate/localization/messages_es'
        )
    );
?>
<script type="text/javascript">
/*=========== fancyBox ===============*/
$(document).ready(function() {
    $('.fancybox').fancybox();
});
</script>
<!-- IE Fix for HTML5 Tags -->
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!-- css3-mediaqueries.js for IE8 or older -->
<!--[if lt IE 9]>
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
</head>

<body>
<?php echo $this->element('header'); ?>
<?php echo $this->fetch('content'); ?>
<?php echo $this->element('footer'); ?>
<?php
if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) echo $this->Js->writeBuffer();
// Writes cached scripts
?>
</body>
</html>
