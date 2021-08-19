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
					<div class="div_pro_wall">
						<div class="img_div_pro">
							<img src="{{ICON}}" />
						</div>
						<div class="caja_div_pro_wall_das">
							<div class="caja_div_pro_wall_das_1">
								<div class="progress my-3 circle" style="height: 6px;">
									<div class="progress-bar circle gd-primary" data-toggle="tooltip" title="" style="width: {{ROUND}}%;" data-original-title="100%"></div>
								</div>
								<span>{{ROUND}}%</span>
							</div>
							<div class="caja_div_pro_wall_das_2">
								<span class="span_ver_div_pro_1">{{NAME}}</span>
							</div>
						</div>
					</div>
					<!----->
					<div class="title_text_general">
						<h5><?php echo $lang_admin->Estadisticas; ?></h5>
					</div>
					<br>
					<div class="index_link_admin">
						<div class="index_link_admin_div">
							<div class="index_link_admin_div_1">
								<div class="text_informe">
									<?php echo $lang_admin->Numero_red; ?>
								</div>
							</div>
							<div class="index_link_admin_div_2">
								<div class="text_informe">
									<?php echo $lang_admin->Numero_click; ?>
								</div>
							</div>
						</div>
						<div class="title_text_general">
							<h6><?php echo $lang_admin->redes_sociales; ?></h6>
						</div>
						<div class="index_link_admin_box">
							<div class="index_link_admin_box_icon">
								<img src="{{CONFIG theme_url}}/layout/template/eden_themes/images/social-media-facebook.png" />
							</div>
							<div class="con_text index_link_admin_box_1">
								Facebook
							</div>
							<div class="index_link_admin_box_2">
								{{DATA_FACEBOOK}}
							</div>
						</div>
						<div class="index_link_admin_box">
							<div class="index_link_admin_box_icon">
								<img src="{{CONFIG theme_url}}/layout/template/eden_themes/images/social-media-twitter.png" />
							</div>
							<div class="con_text index_link_admin_box_1">
								Twitter
							</div>
							<div class="index_link_admin_box_2">
								{{DATA_TWITTER}}
							</div>
						</div>
						<div class="index_link_admin_box">
							<div class="index_link_admin_box_icon">
								<img src="{{CONFIG theme_url}}/layout/template/eden_themes/images/social-media-whatsapp.png" />
							</div>
							<div class="con_text index_link_admin_box_1">
								WhapsApp
							</div>
							<div class="index_link_admin_box_2">
								{{DATA_WHATAPP}}
							</div>
						</div>
						<div class="index_link_admin_box">
							<div class="index_link_admin_box_icon">
								<img src="{{CONFIG theme_url}}/layout/template/eden_themes/images/social-media-telegram.png" />
							</div>
							<div class="con_text index_link_admin_box_1">
								Telegram
							</div>
							<div class="index_link_admin_box_2">
								{{DATA_TELEGRAM}}
							</div>
						</div>
						<div class="index_link_admin_box">
							<div class="index_link_admin_box_icon">
								<img src="{{CONFIG theme_url}}/layout/template/eden_themes/images/social-media-vk.png" />
							</div>
							<div class="con_text index_link_admin_box_1">
								VK
							</div>
							<div class="index_link_admin_box_2">
								{{DATA_VK}}
							</div>
						</div>
						<div class="index_link_admin_box">
							<div class="index_link_admin_box_icon">
								<img src="{{CONFIG theme_url}}/layout/template/eden_themes/images/world_online.png" />
							</div>
							<div class="con_text index_link_admin_box_1">
								<?php echo $lang_admin->All_vistas; ?>
							</div>
							<div class="index_link_admin_box_2">
								{{DATA_VIEWS}}
							</div>
						</div>
					</div>
					<!----->
					<br>
					<div class="title_text_general">
						<h5><?php echo $lang_admin->URL_personalizada; ?></h5>
					</div>
					<br>
					<div class="url_pages_admin">
						<div class="title_text_general">
							<h6><?php echo $lang_admin->URL_link; ?></h6>
						</div>
						<input type="text" name="url_plugin" class="gena_input index_input_1 form-control" value="{{URL}}" />
						<div class="text_informe">
							<?php echo $lang_admin->Escribe_URL; ?>
							<br> <b>{{CONFIG site_url}}/{{URL}}</b>
						</div>
					</div>
					<!----->
					<br>
					<div class="title_text_general">
						<h5><?php echo $lang_admin->Contenido_plugin; ?></h5>
					</div>
					<br>
					<div class="div_input_ge">
						<div class="title_text_general">
							<h6><?php echo $lang_admin->gene_title; ?>:</h6>
						</div>
						<div class="text_informe">
							<?php echo $lang_admin->gene_title_120; ?> 
							<br>
							<br>
							<p id="title_max_characters" class="te_oc_info_char"></p>
						</div>
						<input type="text" id="title" class="gena_input index_input_1 form-control" name="title_content" placeholder="<?php echo $lang_admin->gene_title; ?>" value="{{TITLE}}" />
					
					</div>
					<br>
					<div class="div_input_ge">
						<div class="title_text_general">
							<h6><?php echo $lang_admin->gene_description; ?>:</h6>
						</div>
						<div class="text_informe">
							<?php echo $lang_admin->gene_Descripcion_200; ?>
							<br>
							<br>
							<p id="description_max_characters" class="te_oc_info_char"></p>
						</div>
						<textarea type="text" id="description" class="gena_input index_input_1 form-control" name="description_content" placeholder="<?php echo $lang_admin->gene_description; ?>" rows="4">{{DESCRIPTION}}</textarea>
					</div>
					<br>
					<div class="title_text_general">
							<h6><?php echo $lang_admin->key_text_title; ?>:</h6>
						</div>
						<div class="text_informe">
							<?php echo $lang_admin->key_text_decs; ?> 
							<br>
							<br>
						<div class="div_tags_text">
							<input id="article-tags" type="text" class="form-control" name="keywords" value="{{KEYWORDS}}" />
						</div>
                    </div>
					<br>
 
					<div class="div_input_ge">
						<div class="title_text_general">
							<h6><?php echo $lang_admin->gene_content; ?></h6>
						</div>
						<textarea id="text_textarea" class="gena_input index_input_1 form-control" name="platform_content" placeholder="<?php echo $lang_admin->gene_content; ?>" rows="4">{{CONTENT}}</textarea>
					</div>
					<!---->
					<br>
					<br>
					<!---->
					<div id="success_load"></div>
					<div class="class_post_div">
						<button type="submit" class="button btn_1_glo">
							<span id="load_save">
								<?php echo $lang_admin->C_1; ?>
							</span>	
						</button>
						<div onclick="delete_post('{{ID}}')" class="delete_div_text dil_btn btn_1_upl btn_1_glo" style="margin-left: 0; color: #f44242;">
								<?php echo $lang_admin->plugin_eliminar; ?>
							<div class="btn_1_glo_icon">
								<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
							</div>
						</div>
					</div>
					<div id="token_web">
						<input id="token_hidden" type="hidden" name="token[mailer]" value="<?php echo PHP_fetchToken('mailer'); ?>">
					</div>
				
                <!---->
            </div>
				<div class="index_plugi_ex_div_2_2 index_plugi_ex_div_2">
					<!---->
					<div class="text_informe">
						<?php echo $lang_admin->private_plugin; ?>
					</div>
					<div class="div_opciones_ge">
						<span class="margin_t"><?php echo $lang_admin->private_plugin_btn; ?></span>
						<label class="el-switch">
							<input type="checkbox" id="active_plugin" name="active_plugin" <?php echo($load->active_plugin==1)?'checked':''; ?>/>
							<span class="el-switch-style"></span>
						</label>
					</div>
					<br />
					<div class="text_infor_post">
						<p class="text_infor_post_p">
							<?php echo $lang_admin->date_fecha_plugin; ?>
							<span>{{DATE}}</span>
						</p>
					</div>
					<br />
					<div class="text_infor_post">
						<p class="text_infor_post_p">
							<?php echo $lang_admin->Vista_page_plugin; ?>
							<span>{{DATA_PLUGIN}}</span>
						</p>
					</div>
					<br />
					<div class="text_infor_post">
						<p class="text_infor_post_p">
							<?php echo $lang_admin->Version_plugin; ?>
							<span>{{VERSION}}</span>
						</p>
					</div>
					<br />
					<div class="text_infor_post">
						<p class="text_infor_post_p">
							<?php echo $lang_admin->key_plugin; ?>
							<span>{{KEY_ID}}</span>
						</p>
					</div>
					
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

		form_script.ajaxForm({
			url: '{{LINK requests.php?upload=add_url_plugins&id=}}{{ID}}',
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
	 
	
		$("#active_plugin").on('click', function(event){
			var token_data = $('#token_hidden').val();
			var datastring = 'id={{ID}}';
			$.ajax({
				type: "POST",
				url: "{{LINK requests.php?upload=active_plugins&type=active&mailer=}}"+ token_data,
				data: datastring,
				success: function(data) {
					$('#token_hidden').val(data.token_web);	
				}
			});
			
		});
		
		
	})(jQuery);
		function delete_post(id) {
			var token_data = $('#token_key').val();
			if (!confirm('<?php echo $lang_admin->Settings_33; ?>')) {
				return false;
			}
		 
			var datastring = 'id={{ID}}';
    		$.ajax({
    			type: "POST",
    			url: "{{LINK requests.php?upload=active_plugins&type=delete&mailer=}}"+ token_data,
    			data: datastring,
    			success: function(data) {
    				$('#token_hidden').val(data.token_web);
					Delay_f5(function(){
						window.location.href = data.url;
					},1000);
    			}
    		});
		}
</script>
{{FOOTER_EDEN}}
