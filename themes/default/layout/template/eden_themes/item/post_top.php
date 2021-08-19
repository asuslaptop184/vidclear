<div class="info_post_wall">
    <div class="info_post_wall_1">
        <img src="{{IMAGE}}" />
    </div>
    <div class="info_post_wall_2">
        <div class="info_post_wall_text">
            <span>{{TITLE}}</span>
        </div>
        <div class="analytic_post_panel">
            <div class="analytic_post_panel_div">
                <?php if($load->active_post == 1){ ?>
					<div class="div_Publi_e div_private">
						<?php echo $lang_admin->gene_Publico; ?>
					</div>
				<?php }else{ ?>
					<div class="div_private">
						<?php echo $lang_admin->gene_Privado; ?>
						<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
					</div>
				<?php } ?>
                <div class="list_date_post">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                    <span>{{VIEWS}}</span>
                </div>
            </div>
            <div class="post_d_2_1_btn">
                <div class="post_d_2_1_btn_cki"><a href="{{CONFIG site_url}}/eden/articles/?details=edit&id={{ID}}"><?php echo $lang_admin->gene_edit; ?></a></div>
                <div class="post_d_2_1_btn_cki"><a href="{{URL}}" target="_blank"><?php echo $lang_admin->gene_post; ?></a></div>
            </div>
        </div>
    </div>
</div>
