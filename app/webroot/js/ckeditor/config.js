/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	// 
	config.filebrowserBrowseUrl = '/cakephp/icargobox/js/kcfinder/browse.php?type=files';
    config.filebrowserImageBrowseUrl = '/cakephp/icargobox/js/kcfinder/browse.php?type=images';
    config.filebrowserFlashBrowseUrl = '/cakephp/icargobox/js/kcfinder/browse.php?type=flash';
    config.filebrowserUploadUrl = '/cakephp/icargobox/js/kcfinder/upload.php?type=files';
    config.filebrowserImageUploadUrl = '/cakephp/icargobox/js/kcfinder/upload.php?type=images';
    config.filebrowserFlashUploadUrl = '/cakephp/icargobox/js/kcfinder/upload.php?type=flash';
};
