{{HEADER_EDEN}}
<!---->
<div class="index_text_panel_box">
    {{HEADER_MENU_EDEN}}
    <!---->
    <div class="panel_contenido_div_2">
        <!--s-->
		<?php if($options_launcher['dev_all'] == 'off'){ ?>
		<form class="ap-settings" method="POST">
			<div class="index_wall_confi">
				<div class="index_wall_confi_box">
					<a class="btn_a_ste" href="{{CONFIG site_url}}/eden/settings">
						<div class="btn_a_ste_box">
							<div class="btn_a_ste_box_ic">
								<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="15 18 9 12 15 6"></polyline></svg>
							</div>
							<span class="text_vieoa_v"><?php echo $lang_admin->Gene_Volver_page; ?></span>
						</div>
					</a>
					<div class="title_text_general">
						<h4><?php echo $lang_admin->Settings_27; ?></h4>
					</div>
					<br>
					<div class="wall_confi_div">
						<div class="wall_confi_div_dlow">
							<div class="title_text_general">
								<h5><?php echo $lang_admin->Security_1; ?></h5>
							</div>
							<div class="text_informe">
								<?php echo $lang_admin->Security_2; ?>
							</div>
						</div>
						<div class="wall_confi_div_ine">
							<div class="index_form_line">
								<div class="bootstrap-tagit-wrapper">
									<input type="text" class="gena_input index_input_1 form-control" name="secret_key" id="secret_key" value="<?php echo $options_launcher['crypt_secret_key']; ?>" placeholder="<?php echo $lang_admin->Gene_Vacio; ?>" />
								</div>
							</div>
						</div>
					</div>
					<br>
					<div class="wall_confi_div">
						<div class="wall_confi_div_dlow">
							<div class="title_text_general">
								<h5><?php echo $lang_admin->Security_3; ?></h5>
							</div>
						</div>
						<div class="wall_confi_div_ine">
							<div class="index_form_line">
								<div class="bootstrap-tagit-wrapper">
									<input type="text" class="gena_input index_input_1 form-control" name="pass_key" id="pass_key" value="<?php echo $options_launcher['crypt_password']; ?>" placeholder="<?php echo $lang_admin->Gene_Vacio; ?>" />
								</div>
							</div>
						</div>
					</div>
					<br>
					<div class="title_text_general">
						<h4><?php echo $lang_admin->Security_4; ?></h4>
					</div>
					<br>
					<div class="wall_confi_div">
						<div class="wall_confi_div_dlow">
							<div class="title_text_general">
								<h5><?php echo $lang_admin->Security_5; ?></h5>
							</div>
							<div class="text_informe">
								<?php echo $lang_admin->Security_6; ?>
							</div>
						</div>
						<div class="wall_confi_div_ine">
							<div class="index_form_line">
								<div class="bootstrap-tagit-wrapper">
									<input type="text" class="gena_input index_input_1 form-control" name="mail_admin" id="mail_admin" value="<?php echo PHP_Admin_Data('24','SELECT');?>" placeholder="@" />
								</div>
							</div>
						</div>
					</div>
					<br>
					<div class="wall_confi_div">
						<div class="wall_confi_div_dlow">
							<div class="title_text_general">
								<h5><?php echo $lang_admin->Security_7; ?></h5>
							</div>
							<div class="text_informe">
								<?php echo $lang_admin->Security_8; ?>
							</div>
						</div>
						<div class="wall_confi_div_ine">
							<div class="index_form_line">
								<div class="bootstrap-tagit-wrapper">
									<input type="text" class="gena_input index_input_1 form-control" name="email_admin_recovery" id="email_admin_recovery" value="<?php echo $options_launcher['email_admin_recovery']; ?>" placeholder="@" />
								</div>
							</div>
						</div>
					</div>
					<br>
					<div class="wall_confi_div">
						<div class="wall_confi_div_dlow">
							<div class="title_text_general">
								<h5><?php echo $lang_admin->Security_9; ?></h5>
							</div>
							<div class="text_informe">
								<?php echo $lang_admin->Security_10; ?>
							</div>
						</div>
						<div class="wall_confi_div_ine">
							<div class="index_form_line">
								 
								<div class="bootstrap-tagit-wrapper">
									<input type="password" class="gena_input index_input_1 form-control" name="pass_admin" id="pass_admin" value="" placeholder="<?php echo $lang_admin->Security_11; ?>" />
								</div>
							</div>
						</div>
					</div>
					<br>
					<div class="wall_confi_div">
						<div class="wall_confi_div_dlow">
						</div>
						<div class="wall_confi_div_ine">
							<div class="index_form_line">
								 
								<div class="bootstrap-tagit-wrapper">
									<input type="password" class="gena_input index_input_1 form-control" name="new_password" id="new_password" value="" placeholder="<?php echo $lang_admin->Security_12; ?>" />
								</div>
							</div>
						</div>
					</div>
					<br>
					<div class="wall_confi_div">
						<div class="wall_confi_div_dlow">
						</div>
						<div class="wall_confi_div_ine">
							<div class="index_form_line">
								 
								<div class="bootstrap-tagit-wrapper">
									<input type="password" class="gena_input index_input_1 form-control" name="re_password" id="re_password" value="" placeholder="<?php echo $lang_admin->Security_13; ?>" />
								</div>
							</div>
						</div>
					</div>
					<!---->
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
					</div>
				</div>
			</div>
			<div id="token_web">
				<input id="token_hidden" type="hidden" name="token[mailer]" value="<?php echo PHP_fetchToken('mailer'); ?>" />
            </div>
		</form>
		<?php } ?>
        <!--s-->
    </div>
</div>
{{JS_DATA}}
{{FOOTER_EDEN}}