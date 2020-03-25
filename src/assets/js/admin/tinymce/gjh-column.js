( function( $ ) {
    
    /**
     * Take our Localized Choices and turn them into something TinyMCE Listbox understands
     * 
     * @param       {object} choices Choices Object from our Localized JSON
     *                               
     * @since       1.0.0
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
        
        tinymce.PluginManager.add( 'gjh_column_shortcode_script', function( editor, url ) {
            editor.addButton( 'gjh_column_shortcode', {
                text: gjh_tinymce_l10n.gjh_column_shortcode.tinymce_title,
                icon: false,
                onclick: function() {
                    editor.windowManager.open( {
                        title: gjh_tinymce_l10n.gjh_column_shortcode.tinymce_title,
                        body: [
                            {
                                type: 'listbox',
                                name: 'small',
                                label: gjh_tinymce_l10n.gjh_column_shortcode.small.label,
                                values: gjh_generate_tinymce_listbox( gjh_tinymce_l10n.gjh_column_shortcode.small.choices ),
                                value: gjh_tinymce_l10n.gjh_column_shortcode.small.default,
                            },
							{
                                type: 'listbox',
                                name: 'medium',
                                label: gjh_tinymce_l10n.gjh_column_shortcode.medium.label,
                                values: gjh_generate_tinymce_listbox( gjh_tinymce_l10n.gjh_column_shortcode.medium.choices ),
                                value: gjh_tinymce_l10n.gjh_column_shortcode.medium.default,
                            },
							{
                                type: 'listbox',
                                name: 'large',
                                label: gjh_tinymce_l10n.gjh_column_shortcode.large.label,
                                values: gjh_generate_tinymce_listbox( gjh_tinymce_l10n.gjh_column_shortcode.large.choices ),
                                value: gjh_tinymce_l10n.gjh_column_shortcode.large.default,
                            },
                        ],
                        onsubmit: function( e ) {
                            editor.insertContent( '[gjh_column' + 
                                                     ( e.data.small !== undefined ? ' small="' + e.data.small + '"' : '' ) + 
                                                     ( e.data.medium !== undefined ? ' medium="' + e.data.medium + '"' : '' ) + 
                                                     ( e.data.large !== undefined ? ' large="' + e.data.large + '"' : '' ) + 
                                                 ']' + 
                                                     gjh_tinymce_l10n.gjh_column_shortcode.placeholder_text + 
                                                 '[/gjh_column]' );
                        }

                    } ); // Editor

                } // onclick

            } ); // addButton

        } ); // Plugin Manager

    } ); // Document Ready

} )( jQuery );