<div class="index_wall_conte_acti_2 main-post" data-id="{{ID}}">
    <div class="line_lesr_box">
		<!--div class="img_tei_hover">
			<img class="img_tei_hover_img" src="{{IMAGE}}"/>
		</div-->
        <div class="line_lesr_box_1">
            <p class="line_lesr_box_1_text">
                <span class="limite_line_text">{{TITLE}}</span>
                <span class="line_lesr_box_1_text_s">{{TAGS}}</span>
            </p>
			<?php if($load->active == 0){ ?>
			<div class="div_lis_post_prive">
				<span class="div_lis_post_prive_te">Privado</span>
				<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
			</div>
			<?php } ?>
        </div>
        <div class="line_lesr_box_2">
            <span class="line_lesr_box_2_s">{{CATEGORY}}</span>
        </div>
        <div class="line_lesr_box_3">
            <div class="line_lesr_box_3_div">
				<a href="{{CONFIG site_url}}/eden/articles/?details=edit&id={{ID}}">
					<div class="line_lesr_box_3_div_i">
						<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
							<path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
							<path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
						</svg>
					</div>
				</a>
            </div>
            <div class="line_lesr_box_3_div">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                    <circle cx="12" cy="12" r="3"></circle>
                </svg>
                <span>{{VIEWS}}</span>
            </div>
            <div class="line_lesr_box_3_div">
                <span>{{TIME}}</span>
            </div>
        </div>
    </div>
</div>
