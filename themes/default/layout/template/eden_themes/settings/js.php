<?php if($load->get_page=='terms_of_use' || $load->get_page=='privacy_policy' || $load->get_page=='copyright'){ ?>
<script type="text/javascript">
//-->
    (function($) {
        tinymce.init({
          selector: '#text_textarea',  // change this value according to your HTML
          auto_focus: 'element1',
          relative_urls: false,
          remove_script_host: false,
          height:500,
          toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image  uploadImages |  preview media fullpage | forecolor backcolor emoticons',
          plugins: [
              'advlist autolink link image  lists charmap  preview hr anchor pagebreak spellchecker',
              'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
              'save table contextmenu directionality emoticons template paste textcolor'
          ]
        });
//-->
		var form_ap_settings = $('form.ap-settings');
		var form = $(".ap-settings");
		 
        form.on('submit', function(event) {
            var text    = tinymce.activeEditor.getContent({format: 'raw'});
            var message = $(".create-article-alert");
            if (!text){
                return false;
            }else{
                $("#text_textarea").val(text);
            }
        });

		form_ap_settings.ajaxForm({
			url: '{{LINK requests.php?upload=ap_settings&type=<?php echo $load->get_page; ?>}}',
			beforeSend: function() {
				form_ap_settings.find('#load_save').text("<?php echo $lang_admin->C_2; ?>");
			},
			success: function(data) {
				if (data.status == 200) {
					form_ap_settings.find('#load_save').text("<?php echo $lang_admin->C_5; ?>");
					$("#success_load").html(success_load(data.message, data.text, data.status));
					setTimeout(function () {
						$('#success_load').hide();
					}, 2000);
					$('#token_hidden').val(data.token_web);
				}else if(data.status == 400){
					form_ap_settings.find('#load_save').text("<?php echo $lang_admin->C_3; ?>");
					$("#success_load").html(success_load(data.message, data.text, data.status));
					setTimeout(function () {
						$('#success_load').hide();
					}, 2000);
					$('#token_hidden').val(data.token_web);
				}
			}
		});
	})(jQuery);
</script>
<?php }else{ ?>
<script type="text/javascript">
	(function($) {
		var form_ap_settings = $('form.ap-settings');
		
		$('#article-tags').tagsinput();
		
		form_ap_settings.ajaxForm({
			url: '{{LINK requests.php?upload=ap_settings&type=<?php echo $load->get_page; ?>}}',
			beforeSend: function() {
				form_ap_settings.find('#load_save').text("<?php echo $lang_admin->C_2; ?>");
			},
			success: function(data) {
				if (data.status == 200) {
					form_ap_settings.find('#load_save').text("<?php echo $lang_admin->C_5; ?>");
					$("#success_load").html(success_load(data.message, data.text, data.status));
					setTimeout(function () {
						$('#success_load').hide();
					}, 2000);
					$('#token_hidden').val(data.token_web);
				}else if(data.status == 400){
					form_ap_settings.find('#load_save').text("<?php echo $lang_admin->C_3; ?>");
					$("#success_load").html(success_load(data.message, data.text, data.status));
					setTimeout(function () {
						$('#success_load').hide();
					}, 2000);
					$('#token_hidden').val(data.token_web);
				}
			}
		});
	})(jQuery);
</script>
<?php } ?>