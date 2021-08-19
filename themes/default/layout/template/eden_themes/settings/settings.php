{{HEADER_EDEN}}
<!---->
<div class="index_text_panel_box">
    {{HEADER_MENU_EDEN}}
    <!---->
    <div class="panel_contenido_div_2">
        <!--s-->
		<form class="ap-settings" method="POST">
			<div class="index_wall_confi">
				<div class="index_wall_confi_box">
					<div class="title_text_general">
						<h4><?php echo $lang_admin->title_settings; ?></h4>
					</div>
					<br>
					<div class="wall_confi_div">
						<div class="wall_confi_div_dlow">
							<div class="title_text_general">
								<h5><?php echo $lang_admin->Settings_1; ?></h5>
							</div>
							<div class="text_informe">
								<?php echo $lang_admin->Settings_2; ?>
							</div>
						</div>
						<div class="wall_confi_div_ine">
							<div class="index_form_line">
								<div class="bootstrap-tagit-wrapper">
									<input type="text" id="title_site" class="gena_input index_input_1 form-control" name="title_site" value="<?php echo PHP_Admin_Data('3','SELECT');?>" placeholder="{{LANG Writes_data}}" />
								</div>
							</div>
						</div>
					</div>					
					<!---->
					<div class="wall_confi_div">
						<div class="wall_confi_div_dlow">
							<div class="title_text_general">
								<h5><?php echo $lang_admin->Settings_3; ?></h5>
							</div>
							<div class="text_informe">
								<?php echo $lang_admin->Settings_4; ?>
							</div>
						</div>
						<div class="wall_confi_div_ine">
							<div class="index_form_line">
								<div class="bootstrap-tagit-wrapper">
									<textarea type="text" id="description_site" class="gena_input index_input_1 form-control" name="description_site" placeholder="{{LANG Writes_data}}" rows="4"><?php echo PHP_Admin_Data('7','SELECT');?></textarea>
								</div>
							</div>
						</div>
					</div>
					<!---->
					<div class="wall_confi_div">
						<div class="wall_confi_div_dlow">
							<div class="title_text_general">
								<h5><?php echo $lang_admin->Settings_30; ?></h5>
							</div>
							<div class="text_informe">
								<?php echo $lang_admin->Settings_31; ?>
							</div>
						</div>
						<div class="wall_confi_div_ine">
							<div class="index_form_line">
								<div class="bootstrap-tagit-wrapper">
									<div class="div_tags_text" style="
										background: #fdfdfd;
										border: 0;
										border-bottom: 1px solid #e8e8e8f7;
										font-size: 15px;
										border-radius: 3px 3px 0px 0px !important;
									">
										<input id="article-tags" type="text" class="form-control" name="keywords" value="<?php echo PHP_Admin_Data('33','SELECT');?>" />
									</div>
								</div>
							</div>
						</div>
					</div>
					<!---->
					<div class="wall_confi_div">
						<div class="wall_confi_div_dlow">
							<div class="title_text_general">
								<h5><?php echo $lang_admin->Settings_5; ?></h5>
							</div>
							<div class="text_informe">
								<?php echo $lang_admin->Settings_6; ?>
							</div>
						</div>
						<div class="wall_confi_div_ine">
							<div class="index_form_line">
								<div class="bootstrap-tagit-wrapper">
									<input type="text" id="name_site" class="gena_input index_input_1 form-control" name="name_site" value="<?php echo PHP_Admin_Data('4','SELECT');?>" placeholder="{{LANG Writes_data}}" />
								</div>
							</div>
						</div>
					</div>
					<!---->
					<div class="wall_confi_div">
						<div class="wall_confi_div_dlow">
							<div class="title_text_general">
								<h5><?php echo $lang_admin->Settings_7; ?></h5>
							</div>
							<div class="text_informe">
								<?php echo $lang_admin->Settings_8; ?>
							</div>
						</div>
						<div class="wall_confi_div_ine">
							<div class="index_form_line">
								<div class="text_informe">
									facebook
								</div>
								<div class="bootstrap-tagit-wrapper">
									<input type="text" id="facebook_site" class="gena_input index_input_1 form-control" name="facebook_site" value="<?php echo PHP_Admin_Data('16','SELECT');?>" placeholder="https://www.facebook.com" />
								</div>
								<div class="text_informe">
									twitter
								</div>
								<div class="bootstrap-tagit-wrapper">
									<input type="text" id="twitter_site" class="gena_input index_input_1 form-control" name="twitter_site" value="<?php echo PHP_Admin_Data('17','SELECT');?>" placeholder="https://www.twitter.com/@user" />
								</div>
							</div>
						</div>
					</div>
					<!---->
					<div class="wall_confi_div">
						<div class="wall_confi_div_dlow">
							<div class="title_text_general">
								<h5><?php echo $lang_admin->Settings_9; ?></h5>
							</div>
							<div class="text_informe">
								<?php echo $lang_admin->Settings_10; ?>
							</div>
						</div>
						<div class="wall_confi_div_ine">
							<div class="text_informe">
								<?php echo $lang_admin->Settings_11; ?>
							</div>
							<div class="div_opciones_ge">
								<div class="die_se_r3 el-radio">
									<span class="margin-r"><?php echo $lang_admin->Gene_on; ?></span>
									<input type="radio" name="blogs_site" id="1_5" value="on" <?php echo ($options_launcher['articles_active'] == 'on') ? 'checked': '';?>>
									<label class="el-radio-style" for="1_5"></label>
								</div>
								<div class="die_se_r3 el-radio">
									<span class="margin-r"><?php echo $lang_admin->Gene_off; ?></span>
									<input type="radio" name="blogs_site" id="1_6" value="off" <?php echo ($options_launcher['articles_active']== 'off') ? 'checked': '';?>>
									<label class="el-radio-style" for="1_6"></label>
								</div>
								 
							</div>
						</div>
					</div>
					<!---->
					<br>
					<div class="wall_confi_div">
						<div class="wall_confi_div_dlow">
							<div class="title_text_general">
								<h5><?php echo $lang_admin->Settings_12; ?></h5>
							</div>
							<div class="text_informe">
								<?php echo $lang_admin->Settings_13; ?>
							</div>
						</div>
						<div class="wall_confi_div_ine">
							<div class="text_informe">
								<?php echo $lang_admin->Settings_11; ?>
							</div>
							<div class="div_opciones_ge">
								<div class="die_se_r3 el-radio">
									<span class="margin-r"><?php echo $lang_admin->Gene_on; ?></span>
									<input type="radio" name="comments_active" id="1_7" value="on" <?php echo ($options_launcher['comments_active'] == 'on') ? 'checked': '';?>>
									<label class="el-radio-style" for="1_7"></label>
								</div>
								<div class="die_se_r3 el-radio">
									<span class="margin-r"><?php echo $lang_admin->Gene_off; ?></span>
									<input type="radio" name="comments_active" id="1_8" value="off" <?php echo ($options_launcher['comments_active'] == 'off') ? 'checked': '';?>>
									<label class="el-radio-style" for="1_8"></label>
								</div>
								 
							</div>
						</div>
					</div>
					<!---->
					<br>
					<div class="wall_confi_div">
						<div class="wall_confi_div_dlow">
							<div class="title_text_general">
								<h5><?php echo $lang_admin->dev_text; ?></h5>
							</div>
							<div class="text_informe">
								<?php echo $lang_admin->dev_note; ?>
							</div>
						</div>
						<div class="wall_confi_div_ine">
							<div class="text_informe">
								<?php echo $lang_admin->Settings_11; ?>
							</div>
							<div class="div_opciones_ge">
								<div class="die_se_r3 el-radio">
									<span class="margin-r"><?php echo $lang_admin->Gene_on; ?></span>
									<input type="radio" name="dev_all" id="dev_all_1" value="on" <?php echo ($options_launcher['dev_all'] == 'on') ? 'checked': '';?>>
									<label class="el-radio-style" for="dev_all_1"></label>
								</div>
								<div class="die_se_r3 el-radio">
									<span class="margin-r"><?php echo $lang_admin->Gene_off; ?></span>
									<input type="radio" name="dev_all" id="dev_all_2" value="off" <?php echo ($options_launcher['dev_all'] == 'off') ? 'checked': '';?>>
									<label class="el-radio-style" for="dev_all_2"></label>
								</div>
							</div>
						</div>
					</div>
					<br>
					<!---->
					<div class="wall_confi_div">
						<div class="wall_confi_div_dlow">
							<div class="title_text_general">
								<h5><?php echo $lang_admin->Settings_14; ?></h5>
							</div>
							<div class="text_informe">
								<?php echo $lang_admin->Settings_15; ?>
							</div>
						</div>
						<div class="wall_confi_div_ine">
							<div class="index_form_line">
								<div class="text_informe">
									<?php echo $lang_admin->Settings_16; ?>
								</div>
								<div class="bootstrap-tagit-wrapper">
									<input type="text" id="google_analytics" class="gena_input index_input_1 form-control" name="google_analytics" value="<?php echo $options_launcher['google_analytics']; ?>" placeholder="<?php echo $lang_admin->Gene_Vacio; ?>" />
								</div>
							</div>
						</div>
					</div>
					<!----->
					<div class="wall_confi_div">
						<div class="wall_confi_div_dlow">
							<div class="title_text_general">
								<h5><?php echo $lang_admin->Settings_17; ?></h5>
							</div>
							<div class="text_informe">
								<?php echo $lang_admin->Settings_18; ?>
							</div>
						</div>
						<div class="wall_confi_div_ine">
							<div class="index_form_line">
								<div class="div_flex_input_config col-sm-12">
									<div class="text_informe">
										<?php echo $lang_admin->Gene_vista_previa; ?>
									</div>
									<img class="img_f_ap" src="<?php echo $config['site_url']; ?>/themes/default/img/logo.png"></img>
									<br>
									<br>
									<input type="file" id="image_logo" name="image_logo">	
								</div>
							</div>
						</div>
					</div>
					<!----->
					<div class="wall_confi_div">
						<div class="wall_confi_div_dlow">
							<div class="title_text_general">
								<h5><?php echo $lang_admin->Settings_28; ?></h5>
							</div>
							<div class="text_informe">
								<?php echo $lang_admin->Settings_29; ?>
							</div>
						</div>
						<div class="wall_confi_div_ine">
							<div class="index_form_line">
								<div class="div_flex_input_config col-sm-12">
									<div class="text_informe">
										<?php echo $lang_admin->Gene_vista_previa; ?>
									</div>
									<img class="img_f_ap" src="<?php echo $config['site_url']; ?>/themes/default/img/logo_m.png"></img>
									<br>
									<br>
									<input type="file" id="mobile_icon" name="mobile_icon">	
								</div>
							</div>
						</div>
					</div>
					<!----->
					<div class="wall_confi_div">
						<div class="wall_confi_div_dlow">
							<div class="title_text_general">
								<h5><?php echo $lang_admin->Settings_19; ?></h5>
							</div>
							<div class="text_informe">
								<?php echo $lang_admin->Settings_20; ?>
							</div>
						</div>
						<div class="wall_confi_div_ine">
							<div class="index_form_line">
								<div class="div_flex_input_config col-sm-12">
									<br>
									<div class="text_informe">
										<?php echo $lang_admin->Gene_vista_previa; ?>
									</div>
									<img class="img_f_ap" src="<?php echo $config['site_url']; ?>/themes/default/img/favicon.png"></img>
									<br>
									<br>
									<input type="file" id="image_icon" name="image_icon">	
								</div>
							</div>
						</div>
					</div>
					<!----->
					<div class="wall_confi_div">
						<div class="wall_confi_div_dlow">
							<div class="title_text_general">
								<h5><?php echo $lang_admin->Settings_21; ?></h5>
							</div>
							<div class="text_informe">
								<?php echo $lang_admin->Settings_22; ?>
							</div>
						</div>
						<div class="wall_confi_div_ine">
							<div class="index_form_line">
								<br>
								<div class="text_informe">
									<?php echo $lang_admin->Gene_Selecciona_2; ?>
								</div>
								<div class="float_gene_l dl-list-type">
									<select id="type" name="lang_site" style="display: none;">
										<option value="<?php echo PHP_Admin_Data('11','SELECT'); ?>" selected><?php echo PHP_Admin_Data('11','SELECT'); ?></option>
										<option value="english">English</option>
										<option value="spanish">Spanish</option>			
										<option value="french">French</option>		
										<option value="italian">Italian</option>		
										<option value="russian">Russian</option>		
										<option value="turkish">Turkish</option>		
										<option value="chinese">Chinese</option>		
										<option value="portuguese">Portuguese</option>			
										<option value="german">German</option>	 
									</select>
									<div class="nice-select" tabindex="0">
										<span class="current" style="text-transform: capitalize;"><?php echo PHP_Admin_Data('11','SELECT'); ?></span>
										<ul class="list">
											<li data-value="english" class="option selected">English</li>
											<li data-value="spanish" class="option selected">Spanish</li>
											<li data-value="french" class="option selected">French</li>
											<li data-value="italian" class="option selected">Italian</li>
											<li data-value="russian" class="option selected">Russian</li>
											<li data-value="turkish" class="option selected">Turkish</li>
											<li data-value="chinese" class="option selected">Chinese</li>
											<li data-value="portuguese" class="option selected">Portuguese</li>
											<li data-value="german" class="option selected">German</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!----->
					<br>
					<div class="index_let_div">
						<div class="title_text_general">
							<h5><?php echo $lang_admin->Gene_opciones; ?></h5>
						</div>
						 
						<div class="dil_btn btn_1_upl btn_1_glo">
							<a class="a_btn_bla" href="{{CONFIG site_url}}/eden/settings/?pages=terms_of_use" style="
								margin-left: 0;
								display: flex;
							">	
								<?php echo $lang_admin->Settings_23; ?>
							<div class="btn_1_glo_icon">
								<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="9 18 15 12 9 6"></polyline></svg>
							</div>
							</a>
						</div>
						<div class="dil_btn btn_1_upl btn_1_glo">
							<a class="a_btn_bla" href="{{CONFIG site_url}}/eden/settings/?pages=privacy_policy" style="
								margin-left: 0;
								display: flex;
							">	
								<?php echo $lang_admin->Settings_24; ?>
							<div class="btn_1_glo_icon">
								<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="9 18 15 12 9 6"></polyline></svg>
							</div>
							</a>
						</div>
						<div class="dil_btn btn_1_upl btn_1_glo">
							<a class="a_btn_bla" href="{{CONFIG site_url}}/eden/settings/?pages=copyright" style="
								margin-left: 0;
								display: flex;
							">	
								<?php echo $lang_admin->Settings_25; ?>
							<div class="btn_1_glo_icon">
								<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="9 18 15 12 9 6"></polyline></svg>
							</div>
							</a>
						</div>
						<div class="dil_btn btn_1_upl btn_1_glo">
							<a class="a_btn_bla" href="{{CONFIG site_url}}/eden/settings/?pages=phpmailer" style="
								margin-left: 0;
								display: flex;
							">								
								<?php echo $lang_admin->Settings_26; ?>
								<div class="btn_1_glo_icon">
									<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="9 18 15 12 9 6"></polyline></svg>
								</div>
							</a>
						</div>
					</div>
					<br />
					<br />
					<!---->
					<div id="success_load"></div>
					<div class="class_post_div">
						<button type="submit" class="button btn_1_glo">
							<span id="load_save">
								<?php echo $lang_admin->C_1; ?>
							</span>	
						</button>
						<!-- version: update_1.1.4.10 -->
						<?php if($options_launcher['dev_all'] == 'off'){ ?>
							<div class="dil_btn btn_1_upl btn_1_glo" style="margin-left: 0;">
								<a class="a_btn_bla" href="{{CONFIG site_url}}/eden/settings/?pages=password" style="
									margin-left: 0;
									display: flex;
								">	
									<?php echo $lang_admin->Settings_27; ?>
								<div class="btn_1_glo_icon">
									<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
										<rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
										<path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
									</svg>
								</div>
								</a>
							</div>
						<?php } ?>	
					</div>
				</div>
			</div>
			<div id="token_web">
				<input id="token_hidden" type="hidden" name="token[mailer]" value="<?php echo PHP_fetchToken('mailer'); ?>" />
            </div>
		</form>
        <!--s-->
    </div>
</div>
{{JS_DATA}}
{{FOOTER_EDEN}}