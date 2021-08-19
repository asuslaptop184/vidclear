<?php
	$CODE['T_VIDEO'] 	= '';
	$CODE['T_AUDIO'] 	= '';
	$CODE['T_LIST'] 	= '';
	if($CODE['VIDEO_TRUE_DATA']){
		$CODE['T_VIDEO'] = 'style="display: block;"';
	}else if($CODE['AUDIO_TRUE_DATA']){
		$CODE['T_AUDIO'] = 'style="display: block;"';
	}else if($CODE['LIST_TRUE_DATA']){
		$CODE['T_LIST']  = 'style="display: block;"';
	}  
?>
<?php
	$add_action->do_action('Hook_load_plugin_31');
?>
<div class="resulta_vide_data">
	<?php
		$add_action->do_action('Hook_load_plugin_32');
	?>
    <div class="resulta_vide_data_box_1">
		<?php
			$add_action->do_action('Hook_load_plugin_32_1');
		?>
        <a onclick="popUp=window.open('http://www.facebook.com/sharer.php?u=<?php echo $CODE['LIST_SOCIAL_MEDIA']; ?>&social=facebook','popupwindow','scrollbars=yes,width=700,height=400');popUp.focus();return false;" class="resulta_vide_div_va_icon"><img src="{{CONFIG theme_url}}/img/icon_social/social-media-facebook.png"></img><span class="cla_spa_share_ul">{{LANG Share_social}}</span></a>
		
        <a onclick="popUp=window.open('https://telegram.me/share/url?url=<?php echo $CODE['LIST_SOCIAL_MEDIA']; ?>&social=telegram&text=<?php echo $CODE['TITLE_DATA']; ?>','popupwindow','scrollbars=yes,width=700,height=400');popUp.focus();return false;" class="resulta_vide_div_va_icon"><img src="{{CONFIG theme_url}}/img/icon_social/social-media-telegram.png"></img><span class="cla_spa_share_ul">{{LANG Share_social}}</span></a>
		
        <a onclick="popUp=window.open('http://twitter.com/intent/tweet?url=<?php echo $CODE['LIST_SOCIAL_MEDIA']; ?>&social=twitter <?php echo $CODE['TITLE_DATA']; ?><?php echo $CODE['LIST_SOCIAL_MEDIA']; ?>','popupwindow','scrollbars=yes,width=700,height=400');popUp.focus();return false;" class="resulta_vide_div_va_icon"><img src="{{CONFIG theme_url}}/img/icon_social/social-media-twitter.png"></img><span class="cla_spa_share_ul">{{LANG Share_social}}</span></a>
		
        <a onclick="popUp=window.open('whatsapp://send?text=<?php echo $CODE['LIST_SOCIAL_MEDIA']; ?>&social=whatsapp','popupwindow','scrollbars=yes,width=700,height=400');popUp.focus();return false;" class="resulta_vide_div_va_icon"><img src="{{CONFIG theme_url}}/img/icon_social/social-media-whatsapp.png"></img><span class="cla_spa_share_ul">{{LANG Share_social}}</span></a>
		
        <a onclick="popUp=window.open('https://vk.com/share.php?url=<?php echo $CODE['LIST_SOCIAL_MEDIA']; ?>&social=vk&title=<?php echo $CODE['TITLE_DATA']; ?>&description=&image=','popupwindow','scrollbars=yes,width=700,height=400');popUp.focus();return false;" class="resulta_vide_div_va_icon"><img src="{{CONFIG theme_url}}/img/icon_social/social-media-vk.png"></img><span class="cla_spa_share_ul">{{LANG Share_social}}</span></a>
		<?php
			$add_action->do_action('Hook_load_plugin_32_2');
		?>
	</div>
    
    <div class="resulta_vide_data_box_2">
		<?php
			$add_action->do_action('Hook_load_plugin_33');
		?>
        <div class="resulta_vide_div_vo_img">
            <img class="resulta_vide_div_vo_iiima" src="<?php echo $CODE['THUMBNAIL_DATA']; ?>"></img>
            <br>
            <p class="resulta_vide_div_vi_text"><?php echo $CODE['TITLE_DATA']; ?></p>
        </div>
		<?php
			$add_action->do_action('Hook_load_plugin_34');
		?>
        <div class="resulta_vide_div_list_fil_box">
            <div class="resulta_vide_div_list_1">
				<?php
					$add_action->do_action('Hook_load_plugin_35');
				?>
				<?php if($CODE['VIDEO_TRUE_DATA']){ ?>
					<div id="_acvite_video" class="resulta_vide_div_list_1_btn">
						<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
							<rect x="2" y="2" width="20" height="20" rx="2.18" ry="2.18"></rect>
							<line x1="7" y1="2" x2="7" y2="22"></line>
							<line x1="17" y1="2" x2="17" y2="22"></line>
							<line x1="2" y1="12" x2="22" y2="12"></line>
							<line x1="2" y1="7" x2="7" y2="7"></line>
							<line x1="2" y1="17" x2="7" y2="17"></line>
							<line x1="17" y1="17" x2="22" y2="17"></line>
							<line x1="17" y1="7" x2="22" y2="7"></line>
						</svg>
						{{LANG d_videos}}
					</div>
				<?php } ?>
				<?php if($CODE['AUDIO_TRUE_DATA']){ ?>
					<div id="_acvite_audio" class="resulta_vide_div_list_1_btn">
						<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
							<path d="M9 18V5l12-2v13"></path>
							<circle cx="6" cy="18" r="3"></circle>
							<circle cx="18" cy="16" r="3"></circle>
						</svg>
						{{LANG d_audio}}
					</div>
				<?php } ?>
				<?php if($CODE['LIST_TRUE_DATA']){ ?>
					<div id="_acvite_list" class="resulta_vide_div_list_1_btn">
						<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
						{{LANG d_list}}
					</div>
				<?php } ?>
				<?php
					$add_action->do_action('Hook_load_plugin_36');
				?>
            </div>
			<?php
				$add_action->do_action('Hook_load_plugin_37');
			?>
            <div class="resulta_vide_div_list_2">
                <div class="list_save_url_info">
                    <div class="list_save_url_info_box">
                        <p>{{LANG Format_file}}</p>
                    </div>
                    <div class="list_save_url_info_box">
                        <p>{{LANG Quality_file}}</p>
                    </div>
                    <div class="list_save_url_info_box">
                        <p>{{LANG size_file}}</p>
                    </div>
                </div>
				<?php
					$add_action->do_action('Hook_load_plugin_38');
				?>
				<div id="t_video" <?php echo $CODE['T_VIDEO'];?>>
				<?php if($CODE['VIDEO_TRUE_DATA']){ ?>
					<?php foreach ($CODE['URLS_VIDEO_DATA'] as $indice => $Data_media) { ?>
						<?php if($Data_media[0]['size']=='ERROR' | $Data_media[0]['size']=='e' | $Data_media[0]['size']=='m' | $Data_media[0]['size']=='O' | $Data_media[0]['size']=='f' | $Data_media[0]['size']==NULL | $Data_media[0]['size']=='Unknown'){ ?>
						<?php }else{ ?>
							<div class="list_save_url_info_2">
								<div class="list_save_url_info_box">
									<p class="list_save_url_info_tetx_1"><?php echo $Data_media[0]['format']; ?></p>
								</div>
								<div class="list_save_url_info_box">
									<p><?php echo $Data_media[0]['quality']; ?></p>
								</div>
								<div class="list_save_url_info_box">
									<p><?php echo PHP_Data_file_size($Data_media[0]['size']); ?></p>
								</div>
								<div class="list_save_url_info_box">
										<?php if ($CODE['DIRECT_DOWNLOAD'] == NULL){ ?>
											<a target="_blank" class="url__blank_a" href="{{CONFIG site_url}}/download.php?url_video=<?php echo PHP_DatesCrypt('encrypt', $Data_media[0]['url']); ?>&title=<?php echo PHP_str_replace_text($CODE['TITLE_DATA'], '_'); ?>&type_format=<?php echo $Data_media[0]['format']; ?>&size_file=<?php echo $Data_media[0]['size']; ?>" download="download_file">
											<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
												<line x1="12" y1="5" x2="12" y2="19"></line>
												<polyline points="19 12 12 19 5 12"></polyline>
											</svg><span class="don_btn_sp_blo">{{LANG Download}}</span></a>
										<?php }else{ ?>
											<a target="_blank" class="url__blank_a" href="<?php echo $Data_media[0]['url']; ?>" download="download_file">
											<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
											<line x1="12" y1="5" x2="12" y2="19"></line>
											<polyline points="19 12 12 19 5 12"></polyline>
											</svg><span class="don_btn_sp_blo">{{LANG Download}}</span></a>
										<?php } ?>
								</div>
							</div>
						<?php } ?>
					<?php } ?>
				<?php } ?>
				</div>
				<div id="t_audio" <?php echo $CODE['T_AUDIO'];?>>
				<?php if($CODE['AUDIO_TRUE_DATA']){ ?>
					<?php foreach ($CODE['URLS_AUDIO_DATA'] as $indice => $Data_media) { ?>
						<?php if($Data_media[0]['size']=='ERROR' | $Data_media[0]['size']=='e' | $Data_media[0]['size']=='m' | $Data_media[0]['size']=='O' | $Data_media[0]['size']=='f' | $Data_media[0]['size']==NULL | $Data_media[0]['size']=='Unknown'){ ?>
						<?php }else{ ?>
							<div class="list_save_url_info_2">
								<div class="list_save_url_info_box">
									<p class="list_save_url_info_tetx_1"><?php echo $Data_media[0]['format']; ?></p>
								</div>
								<div class="list_save_url_info_box">
									<p><?php echo $Data_media[0]['quality']; ?></p>
								</div>
								<div class="list_save_url_info_box">
									<p><?php echo PHP_Data_file_size($Data_media[0]['size']); ?></p>
								</div>
								<div class="list_save_url_info_box">
										<?php if ($CODE['DIRECT_DOWNLOAD'] == NULL){ ?>
											<a target="_blank" class="url__blank_a" href="{{CONFIG site_url}}/download.php?url_video=<?php echo PHP_DatesCrypt('encrypt', $Data_media[0]['url']); ?>&title=<?php echo PHP_str_replace_text($CODE['TITLE_DATA'], '_'); ?>&type_format=<?php echo $Data_media[0]['format']; ?>&size_file=<?php echo $Data_media[0]['size']; ?>" download="download_file">
											<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
												<line x1="12" y1="5" x2="12" y2="19"></line>
												<polyline points="19 12 12 19 5 12"></polyline>
											</svg><span class="don_btn_sp_blo">{{LANG Download}}</span></a>
										<?php }else{ ?>
											<a target="_blank" class="url__blank_a" href="<?php echo $Data_media[0]['url']; ?>" download="download_file">
											<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
											<line x1="12" y1="5" x2="12" y2="19"></line>
											<polyline points="19 12 12 19 5 12"></polyline>
											</svg><span class="don_btn_sp_blo">{{LANG Download}}</span></a>
										<?php } ?>
								</div>
							</div>
						<?php } ?>
					<?php } ?>
				<?php } ?>
				</div>
				<div id="t_list" <?php echo $CODE['T_LIST'];?>>
				<?php if($CODE['LIST_TRUE_DATA']){ ?>
					<?php foreach ($CODE['URLS_LIST_DATA'] as $indice => $Data_media) { ?>
						<?php if($Data_media[0]['size']=='ERROR' | $Data_media[0]['size']=='e' | $Data_media[0]['size']=='m' | $Data_media[0]['size']=='O' | $Data_media[0]['size']=='f' | $Data_media[0]['size']==NULL | $Data_media[0]['size']=='Unknown'){ ?>
						<?php }else{ ?>
							<div class="list_save_url_info_2">
								<div class="list_save_url_info_box">
									<p class="list_save_url_info_tetx_1"><?php echo $Data_media[0]['format']; ?></p>
								</div>
								<div class="list_save_url_info_box">
									<p><?php echo $Data_media[0]['quality']; ?></p>
								</div>
								<div class="list_save_url_info_box">
									<p><?php echo PHP_Data_file_size($Data_media[0]['size']); ?></p>
								</div>
								<div class="list_save_url_info_box">
										<?php if ($CODE['DIRECT_DOWNLOAD'] == NULL){ ?>
											<a target="_blank" class="url__blank_a" href="{{CONFIG site_url}}/download.php?url_video=<?php echo PHP_DatesCrypt('encrypt', $Data_media[0]['url']); ?>&title=<?php echo PHP_str_replace_text($CODE['TITLE_DATA'], '_'); ?>&type_format=<?php echo $Data_media[0]['format']; ?>&size_file=<?php echo $Data_media[0]['size']; ?>" download="download_file">
											<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
												<line x1="12" y1="5" x2="12" y2="19"></line>
												<polyline points="19 12 12 19 5 12"></polyline>
											</svg><span class="don_btn_sp_blo">{{LANG Download}}</span></a>
										<?php }else{ ?>
											<a target="_blank" class="url__blank_a" href="<?php echo $Data_media[0]['url']; ?>" download="download_file">
											<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
											<line x1="12" y1="5" x2="12" y2="19"></line>
											<polyline points="19 12 12 19 5 12"></polyline>
											</svg><span class="don_btn_sp_blo">{{LANG Download}}</span></a>
										<?php } ?>
								</div>
							</div>
						<?php } ?>
					<?php } ?>
				<?php } ?>
				</div>
				<?php
					$add_action->do_action('Hook_load_plugin_39');
				?>
            </div>
			<?php echo _Decode(PHP_Admin_Data('36','SELECT'));?>
			<?php
				$add_action->do_action('Hook_load_plugin_40');
			?>
        </div>
		<?php
			$add_action->do_action('Hook_load_plugin_41');
		?>
    </div>
	<?php
		$add_action->do_action('Hook_load_plugin_42');
	?>
</div>
<?php
	$add_action->do_action('Hook_load_plugin_43');
?>
<style type="text/css">
	#t_video {
		display: none;
	}
	#t_audio {
		display: none;
	}
	#t_list {
		display: none;
	}
</style>
<?php
	$add_action->do_action('Hook_load_plugin_44');
?> 
<script type="text/javascript">
	(function($) {
		$(document).on("click", "#_acvite_video", function() {
			$("#t_audio").hide();
			$("#t_list").hide();
			$("#t_video").show();
		});
		$(document).on("click", "#_acvite_audio", function() {
		   $("#t_audio").show();
		   $("#t_list").hide();
		   $("#t_video").hide();
		});
		$(document).on("click", "#_acvite_list", function() {
		   $("#t_audio").hide();
		   $("#t_list").show();
		   $("#t_video").hide();
		});
	})(jQuery);
</script>
<?php
	$add_action->do_action('Hook_load_plugin_45');
?>