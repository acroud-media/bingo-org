(function($) {
	tinymce.PluginManager.add( 'widgetShortcode', function( editor, url ) {
		var items = [];
		$.each( widgetShortcode.widgets, function( i, v ){
			var item = {
				'text' : v.title,
				'body': {
					'type': v.title
				},
				'onclick' : function(){
					editor.insertContent( '[toplist id="' + v.id + '"]' );
				}
			};
			items.push( item );
		} );

		editor.addButton( 'widgetShortcode', {
			title: widgetShortcode.title,
			type : 'menubutton',
			image : widgetShortcode.image,
			menu : items
		});
	});
})(jQuery);