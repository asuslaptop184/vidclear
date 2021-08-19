<?php
	$add_action->do_action('Hook_load_plugin_3');
?>

<div id="page" class="page">
<?php
	$add_action->do_action('Hook_load_plugin_4');
?>
    <section class="section_home">
		<?php
			$add_action->do_action('Hook_load_plugin_5');
		?>
        <div id="content_page">  
			<div class="dise_top_bg_1_dad">		
				<div class="dise_top_bg_1">
					<?php
						$add_action->do_action('Hook_load_plugin_6');
					?>
					{{INCLUDE_HEADER}}
					<?php
						$add_action->do_action('Hook_load_plugin_7');
					?>
					<div class="box_input_he_top">
						<h3><?php echo $CODE['TEXT_TOP_HEADER_TITLE']; ?></h3>
						
						<form class="data_url_load" method="POST">
							<?php
								$add_action->do_action('Hook_load_plugin_8_1');
							?>
							<div class="analit_box_inpt">
								<div class="bar_proge_input_div">	
									<input class="input_data_load_css" type="text" placeholder="{{LANG Enter_url}}" name="data_urls" id="data_urls" value="<?php echo $CODE['URL_DATA_LOAD']; ?>" autocomplete="off">
									<input id="data_key" type="hidden" name="data_key" value="yes">
									<?php
										$add_action->do_action('Hook_load_plugin_8_1_1');
									?>
									<div id="loader_progress" class="bar_Progress"></div>
								</div>
								
								<?php
									$add_action->do_action('Hook_load_plugin_8_2');
								?>
								<button id="data_load" class="class_btn_inpu_load" type="submit">
									<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="9 18 15 12 9 6"></polyline>
									</svg>
								</button>
								<?php
									$add_action->do_action('Hook_load_plugin_8_3');
								?>
							</div>
							
							<?php
								$add_action->do_action('Hook_load_plugin_8_4');
							?>
							<div id="token_web">
								<input id="token_hidden" type="hidden" name="token[mailer]" value="{{TOKEN_S}}">
							</div>
						</form>	
						<div id="data_load_img" class="data_load_img_div" style="display: none;">
							<img src="{{CONFIG theme_url}}/img/loading2.gif" alt="{{LANG loader_input}}"></img>
							<span>{{LANG loader_input}}</span>
						</div>
						<div>
							<?php echo _Decode(PHP_Admin_Data('34','SELECT'));?>
						</div>
						
						<?php
							$add_action->do_action('Hook_load_plugin_10');
						?>
						<div id="error_alert" class="men_error_w_te" style="display: none;">
							<img class="men_error_w_te_img" src="{{CONFIG theme_url}}/img/video_error_load_64.png" alt="{{LANG error_url_input}}"></img>
							<p class="men_error_w_te_p">
								{{LANG error_url_input}}
							</p>
						</div>
						<?php
							$add_action->do_action('Hook_load_plugin_11');
						?>
						
						<div id="server_alert" class="men_error_w_te" style="display: none;">
							<img class="men_error_w_te_img" src="{{CONFIG theme_url}}/img/servidor_64.png" alt="{{LANG error_server_input}}"></img>
							<p class="men_error_w_te_p">
								{{LANG error_server_input}}
							</p>
						</div>
						<?php
							$add_action->do_action('Hook_load_plugin_11_1');
						?>
						<div id="list_results_data"></div>
						<?php
							$add_action->do_action('Hook_load_plugin_12');
						?>
						
						<?php
							$add_action->do_action('Hook_load_plugin_8');
						?>
						<?php
							$add_action->do_action('Hook_load_plugin_46');
						?>
						<?php if($CODE['LOAD_DATA_MEDIAS']){ ?>
						<div class="text_div_Supported_site">
							<h3 class="text_div_Supported_site_h">{{LANG Supported_Sites}}</h3>
							<p class="supported_site"><?php echo websites_supported(); ?></p>
							<p class="text_div_Supported_site_p">{{LANG Supported_Sites_text}}</p>
						</div>
						<?php
							$add_action->do_action('Hook_load_plugin_47');
						?>
						
						<div id="list_media" class="list_media_css_heade_top">
							<?php if($load->load_plugin >= 1){ ?>
								{{LOAD_DATA_MEDIAS}}
								<div id="load_media"></div>
								<?php if ($load->list_media < $load->load_true): ?>
									<div id="more_media">
										<p class="more_media_p">{{LANG More_media}}</p>
										<div class="more_media_btn">
											<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="6 9 12 15 18 9"></polyline></svg>
										</div>
									</div>
								<?php endif; ?>
							<?php } ?>
						</div>
						<?php } ?>
						<?php
							$add_action->do_action('Hook_load_plugin_9');
						?>
					</div>
					<?php
						$add_action->do_action('Hook_load_plugin_13');
					?>
					
				</div>    
			</div> 
			
			<?php
				$add_action->do_action('Hook_load_plugin_14');
			?>
			<div class="dise_men_css_box_dad">
				<?php
					$add_action->do_action('Hook_load_plugin_15');
				?>
				<div class="dise_men_css_box">
					<?php if($CODE['PLATFORM_CONTENT_ACTIVE'] == NULL){ ?>
						<p class="dise_men_css_box_text">{{LANG How_to_download}}</p>
						<?php
							$add_action->do_action('Hook_load_plugin_16');
						?>
						<div class="div_use_info_web_box">
							
							<div class="div_use_info_web_box_1">
								<div class="div_use_info_web_box_1_img">
									<img src="{{CONFIG theme_url}}/img/arrow.png" alt="{{LANG text_1}}"></img>
								</div>
								<p>{{LANG text_1}}</p>
								<span>{{LANG text_2}}</span>
							</div>
							
							<div class="div_use_info_web_box_1">
								<div class="div_use_info_web_box_1_img">
									<img src="{{CONFIG theme_url}}/img/search.png" alt="{{LANG text_3}}"></img>
								</div>
								<p>{{LANG text_3}}</p>
								<span>{{LANG text_4}}</span>
							</div>
							
							<div class="div_use_info_web_box_1">
								<div class="div_use_info_web_box_1_img">
									<img src="{{CONFIG theme_url}}/img/cloud.png" alt="{{LANG text_5}}"></img>
								</div>
								<p>{{LANG text_5}}</p>
								<span>{{LANG text_6}}</span>
							</div>
						</div>
					<?php }else{ ?>
							<p class="text_medi_1_3_cla"><?php echo $CODE['PLATFORM_CONTENT_TEXT']; ?></p>
					<?php } ?>
				</div>		
			</div>
			<?php
				$add_action->do_action('Hook_load_plugin_17');
			?>			
			<div class="bom_text_page_infoe">
				<div>
					<?php echo _Decode(PHP_Admin_Data('35','SELECT'));?>
				</div>
				<p class="bom_text_page_infoe_enca">{{LANG Features}}</p>
				<?php
							$add_action->do_action('Hook_load_plugin_18');
				?>
				<div class="bom_text_page_infoe_div_dad">
					<div class="bom_text_page_infoe_div_1">
						<div class="list_info_t_page_info">
							<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><rect x="2" y="2" width="20" height="20" rx="2.18" ry="2.18"></rect><line x1="7" y1="2" x2="7" y2="22"></line><line x1="17" y1="2" x2="17" y2="22"></line><line x1="2" y1="12" x2="22" y2="12"></line><line x1="2" y1="7" x2="7" y2="7"></line><line x1="2" y1="17" x2="7" y2="17"></line><line x1="17" y1="17" x2="22" y2="17"></line><line x1="17" y1="7" x2="22" y2="7"></line></svg>
							<span>{{LANG te_info_1}}</span>
						</div>
						<div class="list_info_t_page_info">
							<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg>
							<span>{{LANG te_info_4}}</span>
						</div>
						<div class="list_info_t_page_info">
							<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M19 16.9A5 5 0 0 0 18 7h-1.26a8 8 0 1 0-11.62 9"></path><polyline points="13 11 9 17 15 17 11 23"></polyline></svg>
							<span>{{LANG te_info_6}} 
						</div>
					</div>
					<div class="bom_text_page_infoe_div_2 bom_text_page_infoe_div_1">
						<div class="list_info_t_page_info">
							<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M9 18V5l12-2v13"></path><circle cx="6" cy="18" r="3"></circle><circle cx="18" cy="16" r="3"></circle></svg>
							<span>{{LANG te_info_2}}</span>
						</div>
						<div class="list_info_t_page_info">
							<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
							<span>{{LANG te_info_5}}</span>
						</div>
						<div class="list_info_t_page_info">
							<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="20 12 20 22 4 22 4 12"></polyline><rect x="2" y="7" width="20" height="5"></rect><line x1="12" y1="22" x2="12" y2="7"></line><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"></path><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"></path></svg>
							<span>{{LANG te_info_3}}</span>
						</div>
					</div>
					<div class="bom_text_page_infoe_div_2 bom_text_page_infoe_div_1">
						<img class="icon_w_w_b_p_img" src="{{CONFIG theme_url}}/img/limit-icon.png" alt="{{LANG Features}}"></img>
						<div class="dow_icon_holder">
							<img src="{{CONFIG theme_url}}/img/icon_pal_ar.png" alt="{{LANG Features}}"></img>
						</div>
					</div>
				</div>
				<?php
					$add_action->do_action('Hook_load_plugin_19');
				?>
			</div>
			<?php
				$add_action->do_action('Hook_load_plugin_20');
			?>
        </div>
		<?php
			$add_action->do_action('Hook_load_plugin_21');
		?>
    </section>
	<?php
		$add_action->do_action('Hook_load_plugin_22');
	?>
	{{INCLUDE_FOOTER}}
	<?php
		$add_action->do_action('Hook_load_plugin_23');
	?> 
</div>
<?php
	$add_action->do_action('Hook_load_plugin_24');
?>
<?php if($CODE['ACTIVE_SHARE']){ ?>
<script type="text/javascript">
(function($) {
	var token_data = $('#token_hidden').val();
	$.ajax({
		type: "POST",
        url: '{{LINK requests.php?upload=search_data}}',
		data: "mailer="+ token_data +"&data_urls=<?php echo $CODE['URL_DATA_LOAD']; ?>&data_key=false&Get_share=<?php echo $CODE['GET_SHARE']; ?>",
		cache: false,
		beforeSend: function() {
			$('#data_load_img').show();
		},
		success: function(data) {
			if(data.status == 200){
				$("#list_results_data").html(data.video);
				$('#data_load_img').hide();
			} else if (data.status == 400) {
				$('#error_alert').show();
				$('#data_load_img').hide();
			} else if (data.status == 203) {
				$('#server_alert').show();
				$('#data_load_img').hide();
			}	
		}
	});
})(jQuery);
</script>
<?php } ?>
<?php
	$add_action->do_action('Hook_load_plugin_25');
?>