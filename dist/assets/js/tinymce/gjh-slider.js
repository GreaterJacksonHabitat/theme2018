"use strict";!function(e){e(document).ready(function(){tinymce.PluginManager.add("gjh_slider_shortcode_script",function(e,t){e.addButton("gjh_slider_shortcode",{text:gjh_tinymce_l10n.gjh_slider_shortcode.tinymce_title,icon:!1,onclick:function(){e.windowManager.open({title:gjh_tinymce_l10n.gjh_slider_shortcode.tinymce_title,body:[{type:"textbox",name:"slider_screenreader_title",label:gjh_tinymce_l10n.gjh_slider_shortcode.slider_screenreader_title.label}],onsubmit:function(t){e.insertContent("[gjh_slider"+(void 0!==t.data.slider_screenreader_title&&""!==t.data.slider_screenreader_title?' slider_screenreader_title="'+t.data.slider_screenreader_title+'"':"")+"]"+gjh_tinymce_l10n.gjh_slider_shortcode.placeholder+"[/gjh_slider]")}})}})})})}(jQuery);