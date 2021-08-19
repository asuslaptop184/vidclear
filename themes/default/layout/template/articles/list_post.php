<?php
	$add_action->do_action('Hook_load_plugin_70');
?>
<a class="post_page_list_div_link" href="{{CONFIG site_url}}/articles/post/{{LINK}}">
	<div class="post_page_list_div main-post" data-id="{{ID}}">
		<div class="post_page_list_div_1">
			<img src="{{IMAGE}}" />
		</div>
		<div class="post_page_list_div_2">
			<?php
				$add_action->do_action('Hook_load_plugin_71');
			?>
			<div class="post_div_1_list">{{TIME}}</div>
			<div class="post_div_2_list">{{TITLE}}</div>
			<div class="post_div_3_list">{{DESCRIPTION}}</div>
		</div>
	</div>
</a>
<?php
	$add_action->do_action('Hook_load_plugin_72');
?>