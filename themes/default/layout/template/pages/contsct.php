{{INCLUDE_HEADER}}
<div id="page" class="page">
	<section class="section_home">
		<?php
			$add_action->do_action('Hook_load_plugin_56');
		?>
		<div id="content_page">
			<?php
				$add_action->do_action('Hook_load_plugin_57');
			?>
			<div class="cl_contsct_box_div">
				<p class="cl_contsct_box_p">{{LANG Contact_Us}}</p>
				<p class="contsct_ok_su">{{LANG ok_Comentario}}</p>
				<p class="contsct_error">{{LANG Ups_Comentario}}</p>
				<div class="cl_contsct_box_div_2">
					<?php
						$add_action->do_action('Hook_load_plugin_58');
					?>
					<form class="contact-us-form" method="POST">
						<div class="form-group">
							<label class="clas_text_cont col-md-12" for="first_name">{{LANG first_name}} *</label>  
							<div class="col_md_di">
								<input id="first_name" name="first_name" type="text" class="fo_in_pi form__input form-control input-md">
							</div>
						</div>
						<div class="form-group">
							<label class="clas_text_cont col-md-12" for="last_name">{{LANG last_name}} *</label>  
							<div class="col_md_di">
								<input id="last_name" name="last_name" type="text" class="fo_in_pi form__input form-control input-md">
							</div>
						</div>
						<div class="form-group">
							<label class="clas_text_cont col-md-12" for="email">{{LANG email}} *</label>  
							<div class="col_md_di">
								<input name="email" id="email" type="text" class="fo_in_pi form__input form-control input-md">
							</div>
						</div>
						<div class="form-group">
							<label class="clas_text_cont col-md-12" for="message">{{LANG message_con}} *</label>  
							<div class="col_md_di">
								<textarea name="message" id="message" rows="5" class="fo_in_pi_t form__input form-control input-md"></textarea>
							</div>
						</div>
						<div class="modal_footer_div">
							<button type="submit" name="send" id="send" tabindex="4" class="btn btn-main set_pel_mdbtn">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg> {{LANG submit}}</button>
						</div>
						<div id="token_web">
							<input id="token_hidden" type="hidden" name="token[mailer]" value="{{TOKEN_S}}">
						</div>
					</form>
					<?php
						$add_action->do_action('Hook_load_plugin_60');
					?>
				</div>
			</div>
		</div>  
	</section>
	<?php
		$add_action->do_action('Hook_load_plugin_61');
	?>
</div>
{{INCLUDE_FOOTER}}
<script type="text/javascript">
	(function($) {
		var form = $('form.contact-us-form');
		form.ajaxForm({
			url: '{{LINK requests.php?upload=comments_site}}',
			dataTyep:'json',
			beforeSend: function() {
				form.find('button').text('{{LANG please_wait}}');
			},
			success: function(data) {
				if (data.status == 200) {
					$('.contsct_ok_su').show();
					$('.contsct_error').hide();
					$('#token_web').html('<input id="token_hidden" type="hidden" name="token[mailer]" value="' + data.token_web + '">');
					form.find('button').html('{{LANG sent}}');
				} else {
					$('.contsct_error').show();
					$('.contsct_ok_su').hide();
					$('#token_web').html('<input id="token_hidden" type="hidden" name="token[mailer]" value="' + data.token_web + '">');
					form.find('button').html('{{LANG Try_again}}');
				}
				
			}
		});
	})(jQuery);
</script>