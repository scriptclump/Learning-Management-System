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
 * @package       app.View.Layouts.Email.html
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
	<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="es"> <![endif]-->
	<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="es"> <![endif]-->
	<!--[if IE 8]>    <html class="no-js lt-ie9" lang="es"> <![endif]-->
	<!--[if gt IE 8]><!--> <html class="no-js" lang="es"> <!--<![endif]-->
	<title><?php echo $title_for_layout; ?></title>
	<meta charset="utf-8" />
	<!-- Set the viewport width to device width for mobile -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<style type="text/css">
	body{margin:0; padding:0; background:#ededed; font-size:12px; font-family:Arial, Helvetica, sans-serif; font-weight:normal; color:#373737;}
	a{text-decoration:none; color:#469AD4;}
	a:hover{text-decoration:none; color:#E14644;}
	img{border:0; margin:0;}
	p{margin:0;}
	</style>
</head>
<body>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="background:#fbfbfb; border:1px solid #afafaf;">
	  <tr>
	    <td align="center" style="padding:20px; background:#F7F7F7; border-bottom:1px solid #E7E7E7;"><a href="http://www.icargobox.com/"><img src="http://www.icargobox.com/draft/front_end/images/logo.png"></a></td>
	  </tr>
	  <tr>
	    <td style="padding:20px 20px 40px;">
	    	<?php echo $this->fetch('content'); ?>
	    	<br /><br />
	        <img src="http://www.icargobox.com/draft/front_end/images/f_logo.png">
	      </p>
	    </td>
	  </tr>
	  <tr>
	    <td align="center" style="padding:20px; background:#E8E8E8; color:#7B7B7B; font-weight: bold;">Copyright &copy; <?=date('Y')?>. All Rights Reserved.</td>
	  </tr>
	</table>
</body>
</html>