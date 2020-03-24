( function( $ ) {

    $( document ).ready( function() {
        
        tinymce.PluginManager.add( 'gjh_slider_shortcode_script', function( editor, url ) {
            editor.addButton( 'gjh_slider_shortcode', {
                text: gjh_tinymce_l10n.gjh_slider_shortcode.tinymce_title,
                icon: false,
                onclick: function() {
                    editor.windowManager.open( {
                        title: gjh_tinymce_l10n.gjh_slider_shortcode.tinymce_title,
                        body: [
                            {
                                type: 'textbox',
                                name: 'slider_screenreader_title',
                                label: gjh_tinymce_l10n.gjh_slider_shortcode.slider_screenreader_title.label
                            },
                        ],
                        onsubmit: function( e ) {
                            editor.insertContent( '[gjh_slider' + 
                                                     ( e.data.slider_screenreader_title !== undefined && e.data.slider_screenreader_title !== '' ? ' slider_screenreader_title="' + e.data.slider_screenreader_title + '"' : '' ) +  
                                                 ']' + 
                                                 gjh_tinymce_l10n.gjh_slider_shortcode.placeholder + 
                                                 '[/gjh_slider]' );
                        }

                    } ); // Editor

                } // onclick

            } ); // addButton

        } ); // Plugin Manager

    } ); // Document Ready

} )( jQuery );