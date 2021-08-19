{{HEADER_EDEN}}
<div class="box_page_1_ads">
	<form method="post">
		<div class="index_box_user">
			<input type="hidden" name="token[mailer]" value="<?php echo PHP_fetchToken('mailer'); ?>">
			<div class="index_div_box_1">
				<img class="index_img_64" src="{{CONFIG theme_url}}/layout/template/eden_themes/images/icon_site_32.png" />
				<h5 class="index_h5_text"><?php echo $lang_admin->Gene_login;?></h5>
			</div>
			<div class="index_div_box_2">
				<!----->
				<?php if(!empty($load->error_login)){ ?>
				<div class="index_wat_box" style="width: 100%;">
					<div class="index_wat_box_1">
						<div class="erro_r_icon index_wat_box_icon">
							<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
						</div>
					</div>
					<div class="index_wat_box_text">
						<?php echo $load->error_login; ?>
						<div class="text_informe">
							<?php echo $lang_admin->Check_login; ?>
						</div>
					</div>
				</div>
				<?php } ?>
				<br>
				<!----->				
				<div class="index_form_line">
					<label for="article-tags" class="index_text_label_1"><?php echo $lang_admin->Gene_email; ?>:</label>
					<div class="bootstrap-tagit-wrapper">
						<input type="text" class="index_input_1 form-control" id="login_data_admin_mail" name="login_data_admin_mail" placeholder="<?php echo $lang_admin->Gene_email; ?>" value="{{EMAIL}}" required/>
					</div>
				</div>
				<div class="index_form_line">
					<label for="article-tags" class="index_text_label_1"><?php echo $lang_admin->Gene_password; ?>:</label>
					<div class="bootstrap-tagit-wrapper">
						<input type="password" class="index_input_1 form-control" id="login_data_admin_pass" name="login_data_admin_pass" placeholder="<?php echo $lang_admin->Gene_password; ?>" value="" required/>
					</div>
				</div>
				<br />
				<div class="index_form_line">
					<button type="submit" class="btn_index_1 btn waves-effect">
						<div class="btn_index_1_div">
							<div class="btn_index_1_div_text">
								<span class="btn_index_1_div_text_span"><?php echo $lang_admin->Gene_login_btn; ?></span>
							</div>
							<div class="btn_index_1_div_icon">
								<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
									<line x1="5" y1="12" x2="19" y2="12"></line>
									<polyline points="12 5 19 12 12 19"></polyline>
								</svg>
							</div>
						</div>
					</button>
				</div>
				<div class="index_info_div_text_1">
					<span class="index_page_footer_1_user_text"><?php echo $lang_admin->Gene_dev; ?></span>
				</div>
			</div>
		</div>
	</form>		
</div>
