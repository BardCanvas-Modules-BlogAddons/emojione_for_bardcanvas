
tinymce.PluginManager.add('wp_emoji_one', function(ed, url)
{
    var $strings = $('#emojione_for_bardcanvas_tinymce_strings');
    var _title    = $strings.find('.title').text();
    var _button   = $strings.find('.button').text();
    
    ed.addCommand('wp_emoji_one', function()
    {
        var width  = $(window).width();
        var height = $(window).height();
        if( width  > 630 ) width  = 630;
        if( height > 350 ) height = 350;
        
        ed.windowManager.open({
            url:    $_FULL_ROOT_PATH + '/emojione_for_bardcanvas/wp-emoji-one/popup.php',
            title:  _title,
            width:  width,
            height: height
        }, {
            plugin_url : url // Plugin absolute URL
        });
    });
    
    // Register example button
    ed.addButton('wp_emoji_one',
        {
        title: _button,
        cmd:   'wp_emoji_one',
        image: $_FULL_ROOT_PATH + '/emojione_for_bardcanvas/wp-emoji-one/icons/1F600.png'
    });
});
