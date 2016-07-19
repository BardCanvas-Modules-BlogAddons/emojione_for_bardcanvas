<?php
/**
 * Ported from wp-emoji-one/
 *
 * @package    BardCanvas
 * @subpackage emojione_for_bardcanvas
 * @author     Alejandro Caballero - lava.caballero@gmail.com
 *             
 * @var module $current_module
 */

use hng2_base\module;

include __DIR__ . "/../../config.php";
include __DIR__ . "/../../includes/bootstrap.inc";
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?= $current_module->language->popup->title ?></title>
	<link rel='stylesheet' id='wp_emoji-css'  href='css/wp-emoji-one-style~v<?= $config->scripts_version ?>.css' type='text/css' media='all' />
	<base target="_self" />

	<script language="javascript" type="text/javascript" src="js/InsertEmoji~v<?= $config->scripts_version ?>.js"></script>
</head>
<body id="link" data-disabled-onload="tinyMCEPopup.executeOnLoad('init();');document.body.style.display='';" data-disabled-style="display: none">

	<form action="#">
	
  <input id="tab1" type="radio" name="tabs" checked>
  <label for="tab1" title="<?= $current_module->language->popup->tabs->people ?>"><img src="img/smiley.png" alt="" /></label>
  <input id="tab2" type="radio" name="tabs">
  <label for="tab2" title="<?= $current_module->language->popup->tabs->nature ?>"><img src="img/flower.png" alt="" /></label>
  <input id="tab3" type="radio" name="tabs">
  <label for="tab3" title="<?= $current_module->language->popup->tabs->food ?>"><img src="img/apple.png" alt="" /></label>
  <input id="tab4" type="radio" name="tabs">
  <label for="tab4" title="<?= $current_module->language->popup->tabs->celebration ?>"><img src="img/bow.png" alt="" /></label>
  <input id="tab5" type="radio" name="tabs">
  <label for="tab5" title="<?= $current_module->language->popup->tabs->activity ?>"><img src="img/swim.png" alt="" /></label>
    <input id="tab6" type="radio" name="tabs">
    <label for="tab6" title="<?= $current_module->language->popup->tabs->travel ?>"><img src="img/car.png" alt="" /></label>
  <input id="tab7" type="radio" name="tabs">
  <label for="tab7" title="<?= $current_module->language->popup->tabs->objects ?>"><img src="img/clock.png" alt="" /></label>
  <hr><br />

	<?php //declaring path to icons 
		// $dir = plugin_dir_url( __FILE__ ).'/icons/'; 
	?>

    <span class="size-box">
		<label for="icon-size"><?= $current_module->language->popup->size_box->size ?></label>
            <select name="size" id="iconsize">
                <option value="16" selected="selected">16</option>
                <option value="18">18</option>
                <option value="24">24</option>
                <option value="32">32</option>
                <option value="64">64</option>
            </select>
            <em><?= $current_module->language->popup->size_box->info ?></em><br/>
	</span>
      
      <? include __DIR__ . "/popup_emoji_listings.inc"; ?>
      
</form>
<div style="float: right; margin:5px 35px 0 0;">
    <input type="button" id="cancel" name="cancel" value="<?= $language->cancel ?>" onclick="tinyMCEPopup.close();" />
</div>

    <script type="text/javascript">
        //<![CDATA[
        var wpemojionedomain = "<?= $config->full_root_path ?>/<?= $current_module->name ?>/wp-emoji-one/";
        
        function saveSize() {
            var opt = document.getElementById("iconsize");
            var si = opt.selectedIndex;
            window.sessionStorage.setItem("emojiSize", si);
        }

        function saveCategory() {
            var category = document.getElementsByName("tabs");
            for (var x = 0; x < category.length; x++) {
                if (category[x].checked) {
                    var ci = x;
                }
            }
            window.sessionStorage.setItem("emojiCategory", ci);
        }

        var size = document.getElementById("iconsize");
        var category = document.getElementsByName("tabs");

        size.addEventListener("change", saveSize, false);
        for (var x = 0; x < category.length; x++)
            category[x].addEventListener("change", saveCategory, false);

        window.onload = function() {
            var sizeIndex = window.sessionStorage.getItem("emojiSize");
            var categoryIndex = window.sessionStorage.getItem("emojiCategory");
            if (sizeIndex) {
                //var sizeSelect = document.getElementById("iconsize");
                size.selectedIndex = sizeIndex;
            }
            var tabIndex = "tab" + (parseInt(categoryIndex) + 1);
            if (categoryIndex) {
                var tab = document.getElementById(tabIndex);
                tab.checked = true;
            }
        };

        window.onunload = function () {
            size.removeEventListener("change", saveSize, false);
            for (var x = 0; x < category.length; x++)
                category[x].removeEventListener("change", saveCategory, false);
        };
        //]]>
    </script>

</body>
</html>
