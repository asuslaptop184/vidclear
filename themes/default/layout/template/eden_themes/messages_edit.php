{{HEADER_EDEN}}
<!---->
<div class="index_text_panel_box">
    {{HEADER_MENU_EDEN}}
    <!---->
    <div class="panel_contenido_div_2">
        <!---->
        <div class="index_plugi_ex">
            <form class="data_form" method="POST">
                <div class="index_plugi_ex_div_1" style="margin: auto;">
 
                    <br />
                    <div class="div_input_ge">
                        <div class="title_text_general">
                            <h6><?php echo $lang_admin->Email_pa; ?></h6>
                        </div>
                        <input type="text" id="form_email" class="gena_input index_input_1 form-control" name="form_email" value="{{EMAIL}}" />
                    </div>
					<div class="title_text_general">
                            <h6><?php echo $lang_admin->Name_user; ?> {{NAME}}</h6>
                            <h6><?php echo $lang_admin->key_email; ?> {{KEY}}</h6>
                    </div>
                    <br />
                    <br />
                    <br />
                    <div class="div_input_ge">
                        <div class="title_text_general">
                            <h6><?php echo $lang_admin->answer_email; ?></h6>
                        </div>
                        <textarea type="text" id="text_message" class="gena_input index_input_1 form-control" name="text_message" placeholder="{{LANG Writes_data}}" rows="4"></textarea>
                    </div>
                    <!---->
                    <br />
                    <br />
                    <!---->
                    <div id="success_load"></div>
                    <div class="class_post_div">
                        <button type="submit" class="button btn_1_glo">
                            <span id="load_save">
								<?php echo $lang_admin->C_6; ?>
                            </span>
                        </button>
                    </div>
                    <div id="token_web">
                        <input id="token_hidden" type="hidden" name="token[mailer]" value="<?php echo PHP_fetchToken('mailer'); ?>" />
                    </div>
                    <input id="id" type="hidden" name="key" value="{{KEY}}" />
                    <!---->
                </div>
 
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    (function($) {
    	tinymce.init({
    		selector: '#text_message',  // change this value according to your HTML
    		auto_focus: 'element1',
    		relative_urls: false,
    		remove_script_host: false,
    		height:350,
    		toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image  uploadImages |  preview media fullpage | forecolor backcolor emoticons',
    		plugins: [
    			'advlist autolink link image  lists charmap  preview hr anchor pagebreak spellchecker',
    			'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
    			'save table contextmenu directionality emoticons template paste textcolor'
    		]
    	});

    	var form_script 		= $('form.data_form');
    	var form 				= $(".post-media");

    	$('#article-tags').tagsinput();

    	form.on('submit', function(event) {
    		var text    = tinymce.activeEditor.getContent({format: 'raw'});
    		var message = $(".create-article-alert");
    		if (!text){
    			return false;
    		}else{
    			$("#text_message").val(text);
    		}
    	});

    	var token_data = $('#token_hidden').val();


    	form_script.ajaxForm({
    		url: '{{LINK requests.php?upload=send_message&id=}}{{ID}}',
    		beforeSend: function() {
    			form_script.find('#load_save').text("<?php echo $lang_admin->C_2; ?>");
    		},
    		success: function(data) {
    			if (data.status == 200) {
    				form_script.find('#load_save').text("<?php echo $lang_admin->C_7; ?>");
    				$('#token_hidden').val(data.token_web);
    				$("#success_load").html(success_load(data.message, data.text, data.status));
					setTimeout(function () {
						$('#success_load').hide();
					}, 2000);
					Delay_f5(function(){
						window.location.href = data.url;
					},1000);
    			}else if(data.status == 400){
    				form_script.find('#load_save').text("<?php echo $lang_admin->C_2; ?>");
    				$('#token_hidden').val(data.token_web);
    				$("#success_load").html(success_load(data.message, data.text, data.status));
					setTimeout(function () {
						$('#success_load').hide();
					}, 2000);
    			}
    		}
    	});
    })(jQuery);
</script>
{{FOOTER_EDEN}}