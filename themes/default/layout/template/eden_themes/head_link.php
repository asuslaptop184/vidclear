<link type="text/css" rel="stylesheet" href="{{CONFIG theme_url}}/plugins/bootstrap/css/bootstrap.min.css?n=<?php echo time(); ?>">
<link type="text/css" rel="stylesheet" href="{{CONFIG theme_url}}/plugins/eden_style/main.css?n=<?php echo time(); ?>">
<link type="text/css" rel="stylesheet" href="{{CONFIG theme_url}}/plugins/eden_style/css_class.css?n=<?php echo time(); ?>">
<link type="text/css" rel="stylesheet" href="{{CONFIG theme_url}}/plugins/eden_style/checkbox.min.css?n=<?php echo time(); ?>">
<link type="text/css" rel="stylesheet" href="{{CONFIG theme_url}}/plugins/eden_style/upload.css?n=<?php echo time(); ?>">

<?php if(!empty($_COOKIE["mode_dack"]) == 'on') { ?>
	<link class="on_dack <?php echo (empty($_COOKIE["mode_dack"]) == 'on')? ' ': 'dark';  ?>" type="text/css" rel="stylesheet" href="{{CONFIG theme_url}}/plugins/eden_style/night.css?n=<?php echo time(); ?>">
<?php } ?>


<script type="text/javascript" src="{{CONFIG theme_url}}/js/jquery.min.js"></script>
<script type="text/javascript" src="{{CONFIG theme_url}}/js/jquery.form.min.js"></script>
<script type="text/javascript" src="{{CONFIG theme_url}}/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{CONFIG theme_url}}/plugins/bootstrap-tagsinput/src/bootstrap-tagsinput.js"></script>
<script type="text/javascript" src="{{CONFIG theme_url}}/plugins/eden_style/script.js"></script>
<script type="text/javascript" src="{{CONFIG theme_url}}/plugins/eden_style/select.js"></script>
<script type="text/javascript" src="{{CONFIG theme_url}}/plugins/eden_style/jquery.textarea_autosize.min.js"></script>
<script type="text/javascript" src="{{CONFIG theme_url}}/plugins/eden_style/js.cookie.min.js"></script>
<script type="text/javascript" src="{{CONFIG theme_url}}/plugins/tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="{{CONFIG theme_url}}/plugins/chartJS/Chart.min.js"></script>
<link rel="preload" href="{{CONFIG theme_url}}/font/proximanova-light.woff2" as="font" type="font/woff2" crossorigin="anonymous" data-head-react="true"/>
<link rel="preload" href="{{CONFIG theme_url}}/font/proximanova-regular.woff2" as="font" type="font/woff2" crossorigin="anonymous" data-head-react="true"/>
<link rel="preload" href="{{CONFIG theme_url}}/font/proximanova-semibold.woff2" as="font" type="font/woff2" crossorigin="anonymous" data-head-react="true"/>

<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<meta http-equiv="pragma" content="no-cache">

<style data-head-react="true">
	@font-face{
		font-family:'Proxima Nova';
		font-weight:300;font-display:swap;font-style:normal;
		src:url({{CONFIG theme_url}}/font/proximanova-light.woff2) format("woff2"),url({{CONFIG theme_url}}/font/proximanova-light.woff) format("woff"),url({{CONFIG theme_url}}/font/proximanova-light.ttf) format("truetype")}@font-face{font-family:'Proxima Nova';font-weight:400;font-display:swap;font-style:normal;
		src:url({{CONFIG theme_url}}/font/proximanova-regular.woff2) format("woff2"),url({{CONFIG theme_url}}/font/proximanova-regular.woff) format("woff"),url({{CONFIG theme_url}}/font/proximanova-regular.ttf) format("truetype")}@font-face{font-family:'Proxima Nova';font-weight:600;font-display:swap;font-style:normal;
		src:url({{CONFIG theme_url}}/font/proximanova-semibold.woff2) format("woff2"),url({{CONFIG theme_url}}/font/proximanova-semibold.woff) format("woff"),url({{CONFIG theme_url}}/font/proximanova-semibold.ttf) format("truetype")}
</style>
<script type="text/javascript">
	var Delay_f5 = (function(){
		var timer = 0;
		return function(callback, ms){
			clearTimeout (timer);
			timer = setTimeout(callback, ms);
		};
	})();
</script>
 