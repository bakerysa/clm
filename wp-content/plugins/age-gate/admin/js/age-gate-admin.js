!function(t){"use strict";jQuery(document).ready(function(t){jQuery(".colour-picker").wpColorPicker(),jQuery(".upload_image_button").on("click",function(e){var i,a,n=t(e.target).data("option"),o=wp.media.model.settings.post.id,l=t('.image_attachment_id[data-option="'+n+'"]').val();if(e.preventDefault(),i)return i.uploader.uploader.param("post_id",l),void i.open();wp.media.model.settings.post.id=l,(i=wp.media.frames.file_frame=wp.media({title:"Select a image to upload",button:{text:"Use this image"},multiple:!1})).on("select",function(){a=i.state().get("selection").first().toJSON(),t('.image-preview[data-option="'+n+'"]').attr("src",a.url).css("width","auto"),t('.image_attachment_id[data-option="'+n+'"]').val(a.id),wp.media.model.settings.post.id=o}),i.open()}),jQuery("a.add_media").on("click",function(){wp.media.model.settings.post.id=wp_media_post_id}),jQuery(".remove-image").on("click",function(){var e=t(event.target).data("option");t('.image-preview[data-option="'+e+'"]').attr("src",""),t('.image_attachment_id[data-option="'+e+'"]').val("")}),t('[data-action="link-modal"]').on("click",function(e){e.preventDefault(),wpActiveEditor=!0,wpLink.open("wpwrap"),wpLink.textarea=t("body"),t("#wp-link-wrap.has-text-field .wp-link-text-field").css("display","none"),t("#wp-link .link-target label").css({display:"none"}),t("#wp-link-submit").addClass("age-gate-custom")}),t("#wp-link-submit").on("click",function(e){if(e.preventDefault(),!t(e.target).hasClass("age-gate-custom"))return!1;var i,a,n,o="";return i=t(".query-results li.selected").find(".item-title").text(),a=wpLink.getAttrs(),t("#ag_linkhref").val(a.href),t("#ag_linktitle").val(i),n={title:i,url:a.href,target:!!a.target},o+="<p><strong>"+(i||"Custom")+"</strong> ("+n.url+")</p>",t(".link-container").html(o),t('[data-action="remove-link"]').length||t('[data-action="link-modal"]').after('<button type="button" class="button remove" data-action="remove-link">Remove link</button>'),!0}),t("body").on("click",'[data-action="remove-link"]',function(e){e.preventDefault(),t(".link-container").empty(),t("#ag_linkhref").val(""),t("#ag_linktitle").val(""),t(e.target).remove()}),t("body").on("click","[data-disabled]",function(t){return!1}),jQuery(document).on("wplink-close",function(e){t("#wp-link-wrap.has-text-field .wp-link-text-field").css("display","block"),t("#wp-link .link-target label").css({display:"inline"}),t("#wp-link-submit").removeClass("age-gate-custom")})})}(jQuery);