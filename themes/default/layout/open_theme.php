<!DOCTYPE html>
<html lang="{{CONFIG lang_site}}">
	<?php
		$add_action->do_action('Hook_load_plugin_69');
	?>
	<head>
    {{EXTRA_TOP}}
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>{{CONTAINER_TITLE}} {{CONFIG name_site}}</title> 
	<meta name="title" content="{{CONTAINER_TITLE}}">
	<meta name="description" content="{{CONTAINER_DESC}}">
	<meta name="image" content="{{CONTAINER_IMAGE}}">
	<meta name="author" content="<?php echo $options_launcher['developer']; ?>">
	<meta name="keywords" content="{{CONTAINER_KEYWORDS}}">
	<meta property="og:title" content="{{CONTAINER_TITLE}}" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="{{CONTAINER_URL}}" />
	<meta property="og:image" content="{{CONTAINER_IMAGE}}" />
	<meta property="og:description" content="{{CONTAINER_DESC}}" />
	<meta name="twitter:title" content="{{CONTAINER_TITLE}}" />
	<meta name="twitter:description" content="{{CONTAINER_DESC}}" />
	<meta name="twitter:image" content="{{CONTAINER_IMAGE}}" />
	<meta property="og:site_name" content="{{CONTAINER_NAME}}" />
	<meta property="twitter:site" content="{{CONFIG site_url}}" />
	<meta property="twitter:card" content="website" />
	<?php
		$add_action->do_action('Hook_load_plugin_68');
	?>
 	<script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      ga('create', '<?php echo $options_launcher["google_analytics"]; ?>', 'auto');
      ga('send', 'pageview');
    </script> 
	<?php echo _Decode(PHP_Admin_Data('37','SELECT'));?>
    <link rel="shortcut icon" type="image/png" href="{{CONFIG theme_url}}/img/favicon.png"/>
	</head>
	<?php
		$add_action->do_action('Hook_load_plugin_67');
	?>
	<?php echo _Decode(PHP_Admin_Data('38','SELECT'));?>
<body>
	<?php echo _Decode(PHP_Admin_Data('39','SELECT'));?>
	<script type="text/javascript">
        function Ajax_Requests_File(){
            return "<?php echo $config['site_url']; ?>/requests.php"
		}
	</script>
	<input type="hidden" class="main_session" value="{{MAIN_URL}}">
	{{CONTAINER_CONTENT}}
    {{EXTRA_BOTTOM}}
	<?php echo _Decode(PHP_Admin_Data('40','SELECT'));?>
</body>
	<?php echo _Decode(PHP_Admin_Data('41','SELECT'));?>
	<?php
		$add_action->do_action('Hook_load_plugin_66');
	?>
</html>