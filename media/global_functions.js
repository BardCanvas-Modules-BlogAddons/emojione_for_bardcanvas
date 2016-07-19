/**
 * Global functions for the module
 *
 * @package    BardCanvas
 * @subpackage emojione_for_bardcanvas
 * @author     Alejandro Caballero - lava.caballero@gmail.com
 */

// Styles to add to tinymce
tinymce_default_css_files[tinymce_default_css_files.length]
    = $_FULL_ROOT_PATH + '/emojione_for_bardcanvas/media/global_styles~v' + $_SCRIPTS_VERSION + '.css';

// Buttons collection below the post editor
if( typeof $_POST_ADDON_FUNCTIONS == 'undefined' )
    var $_POST_ADDON_FUNCTIONS = {};

// Callback for the button below the editor
$_POST_ADDON_FUNCTIONS['emojione_for_bardcanvas'] = function($trigger, $form)
{
    var $strings = $('#emojione_for_bardcanvas_tinymce_strings');
    var _title    = $strings.find('.title').text();
    
    var editor_id = $form.find('textarea.tinymce').attr('id');
    var editor    = tinymce.get(editor_id);
    
    var url        = $_FULL_ROOT_PATH + '/emojione_for_bardcanvas/wp-emoji-one/popup.php';
    var plugin_url = $_FULL_ROOT_PATH + '/emojione_for_bardcanvas/wp-emoji-one/';
    
    editor.windowManager.open({
        title:  _title,
        url:    url,
        width:  630,
        height: 350
    }, {
        plugin_url: plugin_url
    });
};
