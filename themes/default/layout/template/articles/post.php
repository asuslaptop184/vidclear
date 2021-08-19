<div class="page_post_metet">
    <div class="active_categio_1">
		{{CATEGORY}}
    </div>
    <div class="title_post_div">
		<div class="dia_ww_box_list">
			<a class="dia_ww_box_a" href="{{CONFIG site_url}}">
				<div class="dia_ww_box">
					<div class="dia_ww_box_1">
						<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
					</div>
					<span class="dia_ww_box_text">{{LANG blog_home_text}} /</span>
				</div>
			</a>
			<a class="dia_ww_box_a" href="{{CONFIG site_url}}/articles">
				<div class="dia_ww_box">
					<span class="dia_ww_box_text">{{LANG blog_articles_text}} / </span>
				</div>
			</a>
		</div>
		{{TITLE}}
        <span class="tile_post_time_post">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                <circle cx="12" cy="12" r="10"></circle>
                <polyline points="12 6 12 12 16 14"></polyline>
            </svg>
            <span>{{TIME}}</span>
        </span>
    </div>
    <div class="title_post_div_text">
		<div class="title_post_div_img">
			<img src="{{IMAGE}}"/>
		</div>
		<?php
			$add_action->do_action('Hook_load_plugin_73');
		?>
		<div class="title_post_div_text_conte">
			{{TEXT}}
		</div>
    </div>
</div>
<?php
	$add_action->do_action('Hook_load_plugin_74');
?>
