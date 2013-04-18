/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	config.filebrowserBrowseUrl = '/js/admin/ckfinder/ckfinder.html';
	config.filebrowserImageBrowseUrl = '/js/admin/ckfinder/ckfinder.html?Type=Images';
	config.filebrowserFlashBrowseUrl = '/js/admin/ckfinder/ckfinder.html?Type=Flash';
	config.filebrowserUploadUrl = '/js/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	config.filebrowserImageUploadUrl = '/js/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	config.filebrowserFlashUploadUrl = '/js/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
};

