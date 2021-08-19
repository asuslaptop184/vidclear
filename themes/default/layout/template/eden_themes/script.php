{{HEADER_EDEN}}
<!---->
<div class="index_text_panel_box">
    {{HEADER_MENU_EDEN}}
    <!---->
    <div class="panel_contenido_div_2">
        <!---->
		<form class="add-script" method="POST">
			<div class="index_script">
				<div class="index_menu_1">
					<ul class="index_menu_1_ul">
						<li id="_1_id" class="index_conpe index_menu_bor">
							<?php echo $lang_admin->Banner; ?>
						</li>
						<li id="_2_id" class="index_conpe">
							<?php echo $lang_admin->ADS_script; ?>
						</li>
					</ul>
				</div>
				<!---->
				<div id="id_1_add" class="index_script_box">
					<div class="div_input_ge">
						<br>
						<div class="title_text_general">
							<h6><?php echo $lang_admin->box_ads_1; ?></h6>
						</div>
						<textarea type="text" class="js-auto-size gena_input index_input_1 form-control" name="ads_text_1" id="ads_text_1" placeholder="<?php echo $lang_admin->Gene_Vacio; ?>" rows="4" ><?php echo PHP_Admin_Data('34','SELECT');?></textarea>
					</div>
					<div class="div_input_ge">
						<br>
						<div class="title_text_general">
							<h6><?php echo $lang_admin->box_ads_2; ?></h6>
						</div>
						<textarea type="text" class="js-auto-size gena_input index_input_1 form-control" name="ads_text_2" id="ads_text_2" placeholder="<?php echo $lang_admin->Gene_Vacio; ?>" rows="4" ><?php echo PHP_Admin_Data('35','SELECT');?></textarea>
					</div>
					<div class="div_input_ge">
						<br>
						<div class="title_text_general">
							<h6><?php echo $lang_admin->box_ads_3; ?></h6>
						</div>
						<textarea type="text" class="js-auto-size gena_input index_input_1 form-control" name="ads_text_3" id="ads_text_3" placeholder="<?php echo $lang_admin->Gene_Vacio; ?>" rows="4" ><?php echo PHP_Admin_Data('36','SELECT');?></textarea>
					</div>
					<div class="div_input_ge">
						<br>
						<div class="title_text_general">
							<h6><?php echo $lang_admin->box_ads_4; ?></h6>
						</div>
						<textarea type="text" class="js-auto-size gena_input index_input_1 form-control" name="ads_text_4" id="ads_text_4" placeholder="<?php echo $lang_admin->Gene_Vacio; ?>" rows="4" ><?php echo PHP_Admin_Data('42','SELECT');?></textarea>
					</div>
				</div>
				<!---->
				<div id="id_2_add" class="index_script_box">
					<div class="div_input_ge">
						<div class="title_text_general">
							<h6><?php echo $lang_admin->box_ads_5; ?></h6>
						</div>
						<textarea type="text" class="js-auto-size gena_input index_input_1 form-control" name="add_text_1" id="add_text_1" placeholder="<?php echo $lang_admin->Gene_Vacio; ?>" rows="4" ><?php echo PHP_Admin_Data('37','SELECT');?></textarea>
					</div>
					<div class="div_input_ge">
						<div class="title_text_general">
							<h6><?php echo $lang_admin->box_ads_6; ?></h6>
						</div>
						<textarea type="text" class="js-auto-size gena_input index_input_1 form-control" name="add_text_2" id="add_text_2" placeholder="<?php echo $lang_admin->Gene_Vacio; ?>" rows="4" ><?php echo PHP_Admin_Data('38','SELECT');?></textarea>
					</div>
					<div class="div_input_ge">
						<div class="title_text_general">
							<h6><?php echo $lang_admin->box_ads_7; ?></h6>
						</div>
						<textarea type="text" class="js-auto-size gena_input index_input_1 form-control" name="add_text_3" id="add_text_3" placeholder="<?php echo $lang_admin->Gene_Vacio; ?>" rows="4" ><?php echo PHP_Admin_Data('39','SELECT');?></textarea>
					</div>
					<div class="div_input_ge">
						<div class="title_text_general">
							<h6><?php echo $lang_admin->box_ads_8; ?></h6>
						</div>
						<textarea type="text" class="js-auto-size gena_input index_input_1 form-control" name="add_text_4" id="add_text_4" placeholder="<?php echo $lang_admin->Gene_Vacio; ?>" rows="4" ><?php echo PHP_Admin_Data('40','SELECT');?></textarea>
					</div>
					<div class="div_input_ge">
						<div class="title_text_general">
							<h6><?php echo $lang_admin->box_ads_9; ?></h6>
						</div>
						<textarea type="text" class="js-auto-size gena_input index_input_1 form-control" name="add_text_5" id="add_text_5" placeholder="<?php echo $lang_admin->Gene_Vacio; ?>" rows="4" ><?php echo PHP_Admin_Data('41','SELECT');?></textarea>
					</div>
				</div>
				<br>
				<br>
				<div class="div_scroiy_1">
					<div id="success_load"></div>
					<div class="class_post_div">
						<button type="submit" class="button btn_1_glo">
							<span id="load_save"> <?php echo $lang_admin->C_1; ?> </span>
						</button>
					</div>
				</div>
			</div>
			<!---->
			<div id="token_web">
				<input id="token_hidden" type="hidden" name="token[mailer]" value="<?php echo $token; ?>">
			</div>
		 </form>	
		<!---->
    </div>
</div>
 
<script type="text/javascript">



(function($) {
 
	$(document).on("click", "#_1_id", function() {
		$("#id_1_add").show();
		$("#id_2_add").hide();
		$('#_1_id').css({
					'border-bottom': "2px solid #2196F3"
				});
		$('#_2_id').css({
					'border-bottom': "2px solid #ffffff"
				});		
	});
	$(document).on("click", "#_2_id", function() {
		$("#id_2_add").show();
		$("#id_1_add").hide();
		$('#_1_id').css({
					'border-bottom': "2px solid #ffffff"
				});
		$('#_2_id').css({
					'border-bottom': "2px solid #2196F3"
				});
	}); 
 
    var form_add_script = $('form.add-script');

    form_add_script.ajaxForm({
		
        url: '{{LINK requests.php?upload=add_ads&type=script}}',
        beforeSend: function() {
            form_add_script.find('#load_save').text("<?php echo $lang_admin->C_2; ?>");
        },
        success: function(data) {
            if (data.status == 200) {
				form_add_script.find('#load_save').text("<?php echo $lang_admin->C_5; ?>");
				$("#success_load").html(success_load(data.message, data.text, data.status));
				setTimeout(function () {
					$('#success_load').hide();
    			}, 2000);
				$('#token_hidden').val(data.token_web);
            }else if(data.status == 400){
				form_add_script.find('#load_save').text("<?php echo $lang_admin->C_2; ?>");
				$("#success_load").html(success_load(data.message, data.text, data.status));
				setTimeout(function () {
					$('#success_load').hide();
    			}, 2000);
				$('#token_hidden').val(data.token_web);
			}
        }
    });
})(jQuery);
 
$('textarea.js-auto-size').textareaAutoSize();
    $(document).on('click', '.js-textarea-demo-options a', function(event) {
      link = $(this);
      linkIndex = link.index()
      textarea = $('textarea.js-auto-size');

      textarea.removeClass('single-line multiple-lines');

      if (linkIndex == 0) {
        textarea.addClass('single-line').attr('rows', 1);
      }
      else if (linkIndex == 1 || linkIndex == 2) {
        textarea.addClass('multiple-lines').attr('rows', 3);
      }

      if (linkIndex == 2) {
        textarea.val('');
      }
      else {
        textarea.val('');
      }

      textarea.trigger('input');
      textarea.focus();

      return false;
});	
</script>
{{FOOTER_EDEN}}
