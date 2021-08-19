<?php
	$icon_img = str_replace('./upload/icons/', ''.$config['site_url'].'/upload/icons/', $CODE["icon"]);
?>
<a href=" <?php echo strtolower ($config['site_url'].'/'.$CODE['url']);?>" class="main-media" data-id="{{ID}}">
	<div class="list_media_css_heade_top_div">
		<div class="div_ico_medi_a_img">
			<img class="ima_gess_icon" src="<?php echo $icon_img; ?>" alt="{{platform}}" data-adaptive-background='1'></img>
		</div>
		<span>{{platform}}</span>
	</div>
</a>			
 