( function( $ ) {
    
    /**
     * Take our Localized Choices and turn them into something TinyMCE Listbox understands
     * 
     * @param       {object} choices Choices Object from our Localized JSON
     *                               
     * @since       {{VERSION}}
     * @returns     {Array}  Array of TinyMCE Listbox Choices
     */
    function gjh_generate_tinymce_listbox( choices ) {

        var result = [];
        
        for ( var key in choices ) {
            
            result.push( {
                text: choices[key],
                value: key
            } );
            
        }
        
        return result;
        
    }

    $( document ).ready( function() {
        
        tinymce.PluginManager.add( 'gjh_button_shortcode_script', function( editor, url ) {
            editor.addButton( 'gjh_button_shortcode', {
                text: gjh_tinymce_l10n.gjh_button_shortcode.tinymce_title,
                icon: false,
                onclick: function() {
                    editor.windowManager.open( {
                        title: gjh_tinymce_l10n.gjh_button_shortcode.tinymce_title,
                        body: [
                            {
                                type: 'textbox',
                                name: 'text',
                                label: gjh_tinymce_l10n.gjh_button_shortcode.button_text.label
                            },
                            {
                                type: 'textbox',
                                name: 'url',
                                label: gjh_tinymce_l10n.gjh_button_shortcode.button_url.label
                            },
                            {
                                type: 'listbox',
                                name: 'color',
                                label: gjh_tinymce_l10n.gjh_button_shortcode.colors.label,
                                values: gjh_generate_tinymce_listbox( gjh_tinymce_l10n.gjh_button_shortcode.colors.choices ),
                                value: gjh_tinymce_l10n.gjh_button_shortcode.colors.default,
                            },
                            {
                                type: 'listbox',
                                name: 'size',
                                label: gjh_tinymce_l10n.gjh_button_shortcode.size.label,
                                values: gjh_generate_tinymce_listbox( gjh_tinymce_l10n.gjh_button_shortcode.size.choices ),
                            },
                            {
                                type: 'checkbox',
                                name: 'hollow',
                                label: gjh_tinymce_l10n.gjh_button_shortcode.hollow.label,
                            },
                            {
                                type: 'checkbox',
                                name: 'expand',
                                label: gjh_tinymce_l10n.gjh_button_shortcode.expand.label,
                            },
                            {
                                type: 'checkbox',
                                name: 'newTab',
                                label: gjh_tinymce_l10n.gjh_button_shortcode.new_tab.label,
                            },
                        ],
                        onsubmit: function( e ) {
                            editor.insertContent( '[gjh_button' + 
                                                     ( e.data.url !== undefined && e.data.url !== '' ? ' url="' + e.data.url + '"' : '' ) + 
                                                     ( e.data.color !== undefined ? ' color="' + e.data.color + '"' : '' ) + 
                                                     ( e.data.size !== undefined && e.data.size !== '' ? ' size="' + e.data.size + '"' : '' ) + 
                                                     ( e.data.hollow !== undefined && e.data.hollow !== false ? ' hollow="' + e.data.hollow + '"' : '' ) + 
                                                     ( e.data.expand !== undefined && e.data.expand !== false ? ' expand="' + e.data.expand + '"' : '' ) + 
                                                     ( e.data.newTab !== undefined && e.data.newTab !== false ? ' new_tab="' + e.data.newTab + '"' : '' ) + 
                                                 ']' + 
                                                     ( e.data.text !== undefined ? e.data.text : '' ) + 
                                                 '[/gjh_button]' );
                        }

                    } ); // Editor

                } // onclick

            } ); // addButton

        } ); // Plugin Manager

    } ); // Document Ready

} )( jQuery );