{{HEADER_EDEN}}
<!---->
<div class="index_text_panel_box">
    {{HEADER_MENU_EDEN}}
    <!---->
    <div class="panel_contenido_div_2">
        <!---->
        <div class="index_plugi_ex">
            <form class="data_form" method="POST">
                <div class="index_plugi_ex_div_1">
 
                    <br />
                    <div class="div_input_ge">
                        <div class="title_text_general">
                            <h6><?php echo $lang_admin->gene_title; ?>:</h6>
                        </div>
                        <div class="text_informe">
							<?php echo $lang_admin->gene_title_120; ?>
                            <p id="title_max_characters" class="te_oc_info_char"></p>
                        </div>
                        <input type="text" id="title" class="gena_input index_input_1 form-control" name="title" value="{{TITLE}}" placeholder="<?php echo $lang_admin->gene_title; ?>"/>
                    </div>
                    <br />
                    <div class="div_input_ge">
                        <div class="title_text_general">
                            <h6><?php echo $lang_admin->gene_description; ?>:</h6>
                        </div>
                        <div class="text_informe">
                           <?php echo $lang_admin->gene_Descripcion_200; ?>
                            <p id="description_max_characters" class="te_oc_info_char"></p>
                        </div>
                        <textarea type="text" id="description" class="gena_input index_input_1 form-control" name="description" placeholder="<?php echo $lang_admin->gene_description; ?>" rows="4">{{DESCRIPTION}}</textarea>
                    </div>
                    <br />
                    <div class="div_input_ge">
                        <div class="title_text_general">
                            <h6><?php echo $lang_admin->gene_category; ?></h6>
                        </div>

                        <div class="float_gene_l dl-list-type">
                            <select id="type" name="category" style="display: none;">
                                <?php if (!empty($load->category_db)) { ?>
									<option value="<?php echo $load->category_db; ?>" selected><?php echo $load->category_db; ?></option>
                                <?php }else{ ?>
									<option value="" selected></option>
                                <?php } ?>

                                <?php foreach ($load->category as $key => $category) { ?>
									<option value="<?php echo $category->platform; ?>"><?php echo $category->platform; ?></option>
                                <?php } ?>
									<option value="<?php echo $lang_admin->Gene_blog; ?>"><?php echo $lang_admin->Gene_blog; ?></option>
                            </select>
                            <div class="nice-select" tabindex="0">
                                <?php if (!empty($load->category_db)) { ?>
									<span class="current"><?php echo $load->category_db; ?></span>
                                <?php } else { ?>
									<span class="current"><?php echo $lang_admin->gene_selecciona; ?></span>
                                <?php } ?>
                                <ul class="list">
                                    <?php foreach ($load->category as $key => $category) { ?>
										<li data-value="<?php echo $category->platform; ?>" class="option selected"><?php echo $category->platform; ?></li>
                                    <?php } ?>
										<li data-value="<?php echo $lang_admin->Gene_blog; ?>" class="option selected"><?php echo $lang_admin->Gene_blog; ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="div_input_ge">
                        <div class="title_text_general">
                            <h6><?php echo $lang_admin->gene_content; ?>:</h6>
                        </div>
                        <textarea id="text_textarea" class="gena_input index_input_1 form-control" name="text" placeholder="<?php echo $lang_admin->gene_content; ?>" rows="4">{{CONTENT}}</textarea>
                    </div>
                    <!---->
                    <br />
                    <br />
                    <!---->
                    <div id="success_load"></div>
                    <div class="class_post_div">
                        <button type="submit" class="button btn_1_glo">
                            <span id="load_save">
								<?php if ($load->active_if) { ?>
								<?php echo $lang_admin->C_1; ?>
								<?php }else{ ?>
								<?php echo $lang_admin->C_4; ?>
								<?php } ?>
                            </span>
                        </button>
                    </div>
                    <div id="token_web">
                        <input id="token_hidden" type="hidden" name="token[mailer]" value="<?php echo PHP_fetchToken('mailer'); ?>" />
                    </div>
                    <?php if ($load->active_if) { ?>
                    <input id="id" type="hidden" name="id" value="{{ID}}" />
                    <?php } ?>
                    <!---->
                </div>
                <div class="index_plugi_ex_div_2">
                    <div class="div_upload_img preview-article-image">
                        <?php if ($load->active_if) { ?>
							<img class="img_upload_1" src="{{IMAGE}}" />
                        <?php } else { ?>
							<img class="img_upload_icon" src="{{CONFIG theme_url}}/layout/template/eden_themes/images/dragdrop_icon_5.png" />
                        <?php } ?>
                    </div>
                    <input type="file" class="hidden" id="article-image" name="image" />
                    <br />
                    <!---->
                    <?php if ($load->active_if) { ?>
                    <div class="text_informe">
                       <?php echo $lang_admin->private_post; ?>
                    </div>
                    <div class="div_opciones_ge">
                        <span class="margin_t"><?php echo $lang_admin->private_post_btn; ?></span>
                        <label class="el-switch">
                            <input type="checkbox" id="active_post" name="active_post" <?php echo ($load->active_post == 1)? 'checked' : ''; ?>/>
                            <span class="el-switch-style"></span>
                        </label>
                    </div>
                    <br />
                    <div class="text_infor_post">
                        <p class="text_infor_post_p">
                            <?php echo $lang_admin->date_fecha; ?>
                            <span>{{DATE}}</span>
                        </p>
                    </div>
                    <br />
                    <?php } ?>
					<div class="text_informe">
                       <?php echo $lang_admin->gene_tags; ?>
                    </div>
                    <div class="div_tags_text">
                        <input id="article-tags" type="text" class="form-control" name="tags" value="{{TAGS}}" />
                    </div>

                    <br />
                    <?php if ($load->active_if) { ?>
                    <div class="text_informe">
                        <?php echo $lang_admin->Gene_delete_post; ?>
                    </div>
                    <div class="delete_div">
                        <span onclick="delete_post('{{ID}}')" class="delete_div_text"><?php echo $lang_admin->Gene_delete_post; ?></span>
                    </div>
                    <?php } ?>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">


    maxLength('#title', 120, '#title_max_characters');
    maxLength('#description', 200, '#description_max_characters');

    (function($) {
    	tinymce.init({
    		selector: '#text_textarea',  // change this value according to your HTML
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

    	$(".preview-article-image").click(function (event) {
    		$("#article-image").trigger("click");
    	});
    	$("#article-image").change(function (event) {
    		var self = $(this);
    		var image_blob = false;

    		if (window.URL !== undefined) {
    			image_blob = window.URL.createObjectURL(self.prop("files")[0]);
    		} else if (window.webkitURL !== undefined) {
    			image_blob = window.webkitURL.createObjectURL(self.prop("files")[0]);
    		}

    		if (image_blob) {
    			$(".preview-article-image").html("<img id='img_upload' src='" + image_blob + "' alt='Picture'>");
    			$("#img_upload").css({
    				"width": "100%",
    				"height": "100%",
    				"border-radius": "16px",
    			});
    		}
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
    			$("#text_textarea").val(text);
    		}
    	});

    	var token_data = $('#token_hidden').val();


    	form_script.ajaxForm({
    		url: '{{LINK requests.php?upload=posts&type=<?php echo $load->type_post; ?>}}',
    		beforeSend: function() {
    			form_script.find('#load_save').text("<?php echo $lang_admin->C_2; ?>");
    		},
    		success: function(data) {
    			if (data.status == 200) {
    				form_script.find('#load_save').text("<?php echo $lang_admin->C_5; ?>");
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

    <?php if ($_GET["details"] == 'edit') { ?>
    	$("#active_post").on('click', function(event){
    		var token_data = $('#token_hidden').val();
    		var datastring = 'id={{ID}}';
    		$.ajax({
    			type: "POST",
    			url: "{{LINK requests.php?upload=posts&type=active&mailer=}}"+ token_data,
    			data: datastring,
    			success: function(data) {
    				$('#token_hidden').val(data.token_web);
    			}
    		});

    	});
		
		function delete_post(id) {
			var token_data = $('#token_key').val();
			if (!confirm('<?php echo $lang_admin->Settings_32; ?>')) {
				return false;
			}
		 
			var datastring = 'id={{ID}}';
    		$.ajax({
    			type: "POST",
    			url: "{{LINK requests.php?upload=posts&type=delete&mailer=}}"+ token_data,
    			data: datastring,
    			success: function(data) {
    				$('#token_hidden').val(data.token_web);
					Delay_f5(function(){
						window.location.href = data.url;
					},1000);
    			}
    		});
		}
		<?php } ?>
</script>
{{FOOTER_EDEN}}