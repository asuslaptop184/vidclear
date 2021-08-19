<div class="index_plugi_box">
    <div class="index_plugi_box_1">
        <div class="index_plugi_box_1_icon">
            <img src="{{ICON}}" />
        </div>
        <div class="index_plugi_text_div">
            <span class="index_plugi_text_div_1">{{TITLE}}</span>
			
			<?php if($load->active_plugin == 1){ ?>
				<span class="index_plugi_text_div_2"><?php echo $lang_admin->Gene_on; ?></span>
			<?php }else{ ?>
				<span class="index_text_pl_des index_plugi_text_div_2"><?php echo $lang_admin->Gene_off; ?></span>
			<?php } ?>
        </div>
    </div>
    <div class="index_plugi_box_2">
        <div class="index_pi_div">
            <p class="index_pi_div_text">
                <span><?php echo $lang_admin->Version_plugin; ?></span>
                {{VERSION}}
            </p>
        </div>
		<a class="a_btn_bla" href="{{CONFIG site_url}}/eden/plugins/?details={{KEY}}">
			<div class="dil_btn btn_1_upl btn_1_glo">
				<?php echo $lang_admin->Gene_Settings; ?>	
				<div class="btn_1_glo_icon">
					<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="9 18 15 12 9 6"></polyline></svg>
				</div>
			</div>
		</a>
    </div>
</div>
<br>