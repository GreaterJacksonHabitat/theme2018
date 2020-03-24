( function( $ ) {

    $( document ).ready( function() {
        
        tinymce.PluginManager.add( 'gjh_slide_shortcode_script', function( editor, url ) {
            editor.addButton( 'gjh_slide_shortcode', {
                text: gjh_tinymce_l10n.gjh_slide_shortcode.tinymce_title,
                icon: false,
                onclick: function() {
                    editor.windowManager.open( {
                        title: gjh_tinymce_l10n.gjh_slide_shortcode.tinymce_title,
                        body: [
                            {
                                type: 'checkbox',
                                name: 'slide_active',
                                label: gjh_tinymce_l10n.gjh_slide_shortcode.slide_active.label
                            },
                        ],
                        onsubmit: function( e ) {
                            editor.insertContent( '[gjh_slide' + 
                                                    ( e.data.slide_active !== undefined && e.data.slide_active !== false ? ' slide_active="' + e.data.slide_active + '"' : '' ) +
                                                 ']' + 
                                                 gjh_tinymce_l10n.gjh_slide_shortcode.placeholder + 
                                                 '[/gjh_slide]' );
                        }

                    } ); // Editor

                } // onclick

            } ); // addButton

        } ); // Plugin Manager

    } ); // Document Ready

} )( jQuery );