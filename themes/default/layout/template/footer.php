<?php
	$add_action->do_action('Hook_load_plugin_26');
?>
<footer class="footer_page">
	<?php
		$add_action->do_action('Hook_load_plugin_27');
	?>
	<div class="footer_page_1">
		<div class="cs_html_fooeter_box">
			<img src="{{CONFIG theme_url}}/img/logo_dev.png" alt="{{CONFIG name_site}}"></img>
		</div>
		<div class="cs_html_fooeter_box">
			<?php if(!empty($config['facebook'])){ ?>
				<a href="<?php echo $config['facebook']; ?>" target='_blank'><p><img class="icon_for_bt" src="{{CONFIG theme_url}}/img/facebook.png" alt="{{CONFIG name_site}}"/>Facebook</p></a>
			<?php } ?>
			<?php if(!empty($config['twitter'])){ ?>
				<a href="<?php echo $config['twitter']; ?>" target='_blank'><p><img class="icon_for_bt" src="{{CONFIG theme_url}}/img/twitter.png" alt="{{CONFIG name_site}}"/>Twitter</p></a>
			<?php } ?>
			<?php if($options_launcher['articles_active'] === 'on'){ ?>
				<a href="{{CONFIG site_url}}/articles"><p><img class="icon_for_bt" src="{{CONFIG theme_url}}/img/book.png" alt="{{CONFIG name_site}}"/>{{LANG blog_articles_text}}</p></a>
			<?php } ?>
		</div>
		<div class="cs_html_fooeter_box">
			<?php if($config['contsct'] === 'on'){ ?>
				<a href="{{CONFIG site_url}}/page/contsct" class="cs_html_fooeter_box_url"><p>{{LANG Contact_Us}}</p></a>
			<?php } ?>
			<a href="{{CONFIG site_url}}/sitemap.php"><p>Sitemap</p></a>
		</div>
		<div class="cs_html_fooeter_box">
			<a href="{{CONFIG site_url}}/page/privacy-policy" class="cs_html_fooeter_box_url"><p>{{LANG Privacy_Palicy}}</p></a>
			<a href="{{CONFIG site_url}}/page/terms" class="cs_html_fooeter_box_url"><p>{{LANG Terms_of_Use}}</p></a>
			<a href="{{CONFIG site_url}}/page/dmca" class="cs_html_fooeter_box_url"><p>{{LANG DMCA}}</p></a>
		</div>
	</div>
	<?php
		$add_action->do_action('Hook_load_plugin_28');
	?>
	<div class="footer_page_2">
		<p class="text_firee_bimm_forer_p">© <?php echo $options_launcher['name_script']; ?> <?php echo date('Y'); ?>. All rights reserved.</p>
        <p class="text_firee_bimm_forer_p">Developed with heart by <span><?php echo $options_launcher['developer']; ?></span>. Proudly created with PHP.</p>
	</div>
	<?php
		$add_action->do_action('Hook_load_plugin_29');
	?>
</footer>
	<?php
		$add_action->do_action('Hook_load_plugin_29_1');
	?>
<div id="cookie-bar-bottom" class="cookie-bar">
	<div class="cooke_div_bo">
		<img class="cooke_div_bo_img" src="{{CONFIG theme_url}}/img/cookie_64.png" alt="{{CONFIG name_site}}"></img>
		<span class="cl_wga_cookie_2">
			{{LANG Cookies_text}}
		</span>
	</div>
	<input id="cookie-hide" class="cookie-hide" value="{{LANG Cookies_ok}}" type="button"/>
</div>
<?php
	$add_action->do_action('Hook_load_plugin_30');
?>
<?php
	$add_action->do_action('Hook_load_plugin_30_1');
?>