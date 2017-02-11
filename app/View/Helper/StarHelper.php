<?php
/**
 * Star Helper.
 *
 * Used the generate nested representations of hierarchial data
 *
 * PHP versions 4 and 5
 *
 * Copyright (c) 2008, Andy Dawson
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright            Copyright (c) 2008, Andy Dawson
 * @link                 www.ad7six.com
 * @package              cake-base
 * @subpackage           cake-base.app.views.helpers
 * @since                v 1.0
 * @version              $Revision: 1358 $
 * @modifiedBy           $LastChangedBy: skie $
 * @lastModified         $Date: 2009-10-15 05:49:11 -0500 (Thu, 15 Oct 2009) $
 * @license              http://www.opensource.org/licenses/mit-license.php The MIT License
 */

/**
 * Star helper
 *
 * Helper to generate tree representations of MPTT or recursively nested data
 */
class StarHelper extends AppHelper {

/**
 * name property
 *
 * @var string 'Star'
 * @access public
 */
	public $name = 'Star';

/**
 * helpers variable
 *
 * @var array
 * @access public
 */
	public $helpers = array ('Html');

	/**
	 * Display the star on the page.
	 * @param  float $num nubmer of star.
	 * @return string     return the star.
	 */
	public function renderStar( $num ){
		$pos = strpos($num, '.');
		if ($pos === false) {
			$star      = $num;
			$half_star = 0;
		} else{
			$star      = intval($num);
			$half_star = 1;
		}
		$star_string = '';
		for($i=0; $i<$star; $i++){
			$star_string .= '<img src="'.$this->webroot.'/front_end/raty/img/star-on.png" />';
		}
		if( $half_star > 0 ){
			$star_string .= '<img src="'.$this->webroot.'/front_end/raty/img/star-half.png" />';
		}
		return $star_string;
	}
}
?>