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
					<a class="btn_a_ste" href="{{CONFIG site_url}}/eden/settings">
						<div class="btn_a_ste_box">
							<div class="btn_a_ste_box_ic">
								<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="15 18 9 12 15 6"></polyline></svg>
							</div>
							<span class="text_vieoa_v"><?php echo $lang_admin->Gene_Volver_page; ?></span>
						</div>
					</a>
					<div class="title_text_general">
						<h4><?php echo $lang_admin->Settings_26; ?></h4>
					</div>
					<br>
					<div class="wall_confi_div">
						<div class="wall_confi_div_dlow">
							<div class="title_text_general">
								<h5>SMTP or mail:</h5>
							</div>
							<div class="text_informe">
								<a target="_blank" href="https://github.com/PHPMailer/PHPMailer"><?php echo $lang_admin->Security_14; ?></a>
							</div>
						</div>
						<div class="wall_confi_div_ine">
							<div class="index_form_line">
								<div class="bootstrap-tagit-wrapper">
									<input type="text" class="gena_input index_input_1 form-control" name="smtp_or_mail" id="smtp_or_mail" value="<?php echo $options_launcher['smtp_or_mail']; ?>" placeholder="<?php echo $lang_admin->Gene_Vacio; ?>" />
								</div>
							</div>
						</div>
					</div>					
					<!---->
					<br>
					<div class="wall_confi_div">
						<div class="wall_confi_div_dlow">
							<div class="title_text_general">
								<h5>SMTP host:</h5>
							</div>
						</div>
						<div class="wall_confi_div_ine">
							<div class="index_form_line">
								<div class="bootstrap-tagit-wrapper">
									<input type="text" class="gena_input index_input_1 form-control" name="smtp_host" id="smtp_host" value="<?php echo $options_launcher['smtp_host']; ?>" placeholder="<?php echo $lang_admin->Gene_Vacio; ?>" />
								</div>
							</div>
						</div>
					</div>					
					<!---->
					<br>
					<div class="wall_confi_div">
						<div class="wall_confi_div_dlow">
							<div class="title_text_general">
								<h5>SMTP username:</h5>
							</div>
						</div>
						<div class="wall_confi_div_ine">
							<div class="index_form_line">
								<div class="bootstrap-tagit-wrapper">
									<input type="text" class="gena_input index_input_1 form-control" name="smtp_username" id="smtp_username" value="<?php echo $options_launcher['smtp_username']; ?>" placeholder="<?php echo $lang_admin->Gene_Vacio; ?>" />
								</div>
							</div>
						</div>
					</div>					
					<!---->
					<br>
					<div class="wall_confi_div">
						<div class="wall_confi_div_dlow">
							<div class="title_text_general">
								<h5>SMTP password:</h5>
							</div>
						</div>
						<div class="wall_confi_div_ine">
							<div class="index_form_line">
								<div class="bootstrap-tagit-wrapper">
									<input type="text" class="gena_input index_input_1 form-control" name="smtp_password" id="smtp_password" value="<?php echo $options_launcher['smtp_password']; ?>" placeholder="<?php echo $lang_admin->Gene_Vacio; ?>" />
								</div>
							</div>
						</div>
					</div>					
					<!---->
					<br>
					<div class="wall_confi_div">
						<div class="wall_confi_div_dlow">
							<div class="title_text_general">
								<h5>SMTP encryption:</h5>
							</div>
						</div>
						<div class="wall_confi_div_ine">
							<div class="index_form_line">
								<div class="bootstrap-tagit-wrapper">
									<input type="text" class="gena_input index_input_1 form-control" name="smtp_encryption" id="smtp_encryption" value="<?php echo $options_launcher['smtp_encryption']; ?>" placeholder="<?php echo $lang_admin->Gene_Vacio; ?>" />
								</div>
							</div>
						</div>
					</div>
					<!---->
					<br>
					<div class="wall_confi_div">
						<div class="wall_confi_div_dlow">
							<div class="title_text_general">
								<h5>SMTP port:</h5>
							</div>
						</div>
						<div class="wall_confi_div_ine">
							<div class="index_form_line">
								<div class="bootstrap-tagit-wrapper">
									<input type="text" class="gena_input index_input_1 form-control" name="smtp_port" id="smtp_port" value="<?php echo $options_launcher['smtp_port']; ?>" placeholder="<?php echo $lang_admin->Gene_Vacio; ?>" />
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
        <!--s-->
    </div>
</div>
{{JS_DATA}}
{{FOOTER_EDEN}}

