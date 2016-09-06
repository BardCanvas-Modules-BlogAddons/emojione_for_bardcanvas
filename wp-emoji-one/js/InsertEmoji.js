// function init() {
// 	if (tinymce.isIE) {
// 		tinymce.get('content').focus();
// 		tinymce.activeEditor.windowManager.bookmark = tinyMCE.activeEditor.selection.getBookmark();
// 	}
// 	tinyMCEPopup.resizeToInnerSize();
// }

function emojiinsert(icon) {

	var icontag = '<img src="'+wpemojionedomain+'icons/'+icon+'" height="'+document.getElementById('iconsize').value+'"'
                + '     class="emojione_image size_'+document.getElementById('iconsize').value+'">';
    
	if (parent.tinymce.isIE) {
		parent.tinymce.activeEditor.focus();
		parent.tinymce.activeEditor.selection.moveToBookmark(parent.tinymce.EditorManager.activeEditor.windowManager.bookmark);
	}
	
	parent.tinymce.execCommand('mceInsertContent', false, icontag);
	// parent.tinyMCEPopup.editor.execCommand('mceRepaint');
	parent.tinyMCE.activeEditor.windowManager.close(window);
}
