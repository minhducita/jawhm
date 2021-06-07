var DivDialog = {
	init : function(ed) {
		var dom = ed.dom, f = document.forms[0], n = ed.selection.getNode();

		f.width.value = dom.getStyle(n,'width') || '';

		f.paddingTB.value =dom.getStyle(n,'padding-top') || dom.getStyle(n,'padding') || '';
		f.paddingTB.value = f.paddingTB.value.substring(0,f.paddingTB.value.indexOf('px'));
		
		f.paddingLR.value = dom.getStyle(n,'padding-left') || dom.getStyle(n,'padding') || '';
		f.paddingLR.value = f.paddingLR.value.substring(0,f.paddingLR.value.indexOf('px'));
		
		f.background.value = dom.getStyle(n,'background-image');
		f.background.value = f.background.value.replace(/^url\(["']?/, '').replace(/["']?\)$/, '');
		
		selectByValue(f, 'width2',f.width.value.indexOf('%') != -1 ? '%' : 'px');
		
		if(f.width.value.indexOf('%') != -1 && f.width.value != '' )
		{
			f.width.value = f.width.value.substring(0,f.width.value.indexOf('%'));
		}
		else
		{
			f.width.value = f.width.value.substring(0,f.width.value.indexOf('px'));
		}
		
		f.content.value = ed.selection.getContent() || '';
		f.content.value = (f.content.value).replace(/(<div([^>]+)>)/,'').replace(/(<\/[div]([^>]+)>)$/,'');

		
	},

	update : function() {
		var ed = tinyMCEPopup.editor, h, f = document.forms[0], st = '', text;

		d = '<div class="mceItemVisualAid"';

		if (f.width.value) {
			st += ' width:' + f.width.value + (f.width2.value == '%' ? '%' : 'px') + ';';
		}

		if (f.paddingTB.value) {
			st += ' padding-top: ' + f.paddingTB.value + 'px; padding-bottom:' + f.paddingTB.value + 'px;';
		}

		if (f.paddingLR.value) {
			st += ' padding-left: ' + f.paddingLR.value + 'px; padding-right:' + f.paddingLR.value + 'px;';
		}

		if (f.background.value) {
			st += ' background-image: url(\'' + f.background.value + '\');';
		}

		if (ed.settings.inline_styles)
			d += ' style="' + tinymce.trim(st) + '"';
			
		if(f.content.value)
		{
			text = f.content.value;
		}
		else
		{
			text = '<p style="text-align:left;">Insert content here</p>';
		}

		d += ' >'+ text +'</div>';

		ed.execCommand("mceInsertContent", false, d);
		tinyMCEPopup.close();
	}
};

tinyMCEPopup.requireLangPack();
tinyMCEPopup.onInit.add(DivDialog.init, DivDialog);
