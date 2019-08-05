/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */
 var field = 'https://192.168.0.113';
 CKEDITOR.editorConfig = function(config) {
// ...
   config.filebrowserBrowseUrl = field + '/app/webroot/kcfinder/browse.php?opener=ckeditor&type=files';
   config.filebrowserImageBrowseUrl = field + '/app/webroot/kcfinder/browse.php?opener=ckeditor&type=images';
   config.filebrowserFlashBrowseUrl = field + '/app/webroot/kcfinder/browse.php?opener=ckeditor&type=flash';
   config.filebrowserUploadUrl = field + '/app/webroot/kcfinder/upload.php?opener=ckeditor&type=files';
   config.filebrowserImageUploadUrl = field + '/app/webroot/kcfinder/upload.php?opener=ckeditor&type=images';
   config.filebrowserFlashUploadUrl = field + '/app/webroot/kcfinder/upload.php?opener=ckeditor&type=flash';
// ...
};
