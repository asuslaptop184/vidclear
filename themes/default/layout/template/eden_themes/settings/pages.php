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
						<?php
							if($load->get_page=='terms_of_use'){
								echo  $lang_admin->Settings_23;
							}else if($load->get_page=='privacy_policy'){
								echo  $lang_admin->Settings_24;
							}else if($load->get_page=='copyright'){
								echo  $lang_admin->Settings_25;
							}
						?>
						
					</div>
					<br>
					<div class="div_input_ge">
                        <div class="title_text_general">
                            <h6><?php echo $lang_admin->gene_content; ?></h6>
                        </div>
                        <textarea type="text" id="text_textarea" class="gena_input index_input_1 form-control" name="text" rows="4">
							<?php
								if($load->get_page=='terms_of_use'){
									echo PHP_Admin_Data('12','SELECT');
								}else if($load->get_page=='privacy_policy'){
									echo PHP_Admin_Data('13','SELECT');
								}else if($load->get_page=='copyright'){
									echo PHP_Admin_Data('14','SELECT');
								}
							?>
						</textarea>
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

