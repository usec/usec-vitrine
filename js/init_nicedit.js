
bkLib.onDomLoaded(function() {
	var myNicEditor = new nicEditor(({fullPanel : true, onSave : save, iconsPath : 'js/nicEditorIcons.gif'}));
	myNicEditor.setPanel('myNicPanel');
	myNicEditor.addInstance('content');
});


function save(content, id, instance)
{
	savePage();
}


