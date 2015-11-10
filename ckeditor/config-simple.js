/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For the complete reference:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
//		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
//		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
	//	{ name: 'smiley' },
	{ name: 'insert', groups: [ 'smiley' ] },
//		{ name: 'forms' },
//		{ name: 'tools' },
//		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
	//	{ name: 'others' },
		//'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup','smiley' ] },
//		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align' ] },
//		{ name: 'styles' },
//		{ name: 'colors' },
	//	{ name: 'smiley' }
	];

	// Remove some buttons, provided by the standard plugins, which we don't
	// need to have in the Standard(s) toolbar.
	config.removeButtons = 'SpecialChar,HorizontalRule,Subscript,Superscript,Image,allMedias,charContainer,specialchar,Table,cke_specialchar_label_';

	// Se the most common block elements.
//	config.format_tags = 'p;h1;h2;h3;pre';

	// Make dialogs simpler.
//	config.removeDialogTabs = 'image:advanced;link:advanced';
        
    //    config.filebrowserUploadUrl = 'ckeditor/ckupload.php';
        
        

};
