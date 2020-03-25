( function( $ ) {

    $( document ).ready( function() {
        
        tinymce.PluginManager.add( 'gjh_row_shortcode_script', function( editor, url ) {
            editor.addButton( 'gjh_row_shortcode', {
                text: gjh_tinymce_l10n.gjh_row_shortcode.tinymce_title,
                icon: false,
				onclick: function() {
                    editor.windowManager.open( {
                        title: gjh_tinymce_l10n.gjh_row_shortcode.tinymce_title,
                        body: [
                            {
                                type: 'checkbox',
                                name: 'equalizer',
                                label: gjh_tinymce_l10n.gjh_row_shortcode.equalizer.label,
                            },
                        ],
                        onsubmit: function( e ) {
                            editor.insertContent( '[gjh_row' + 
												 	( e.data.equalizer === true ? ' equalizer=1' : '' ) + 
												 ']' + 
										 		gjh_tinymce_l10n.gjh_row_shortcode.placeholder_text + 
										 '[/gjh_row]' );
                        }

                    } ); // Editor

                }, // onclick

            } ); // addButton

        } ); // Plugin Manager

    } ); // Document Ready

} )( jQuery );