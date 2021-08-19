{{HEADER_EDEN}}
<!---->
<div class="index_text_panel_box">
    {{HEADER_MENU_EDEN}}
    <!---->
    <div class="panel_contenido_div_2">
        <!---->
	
        <div class="inbox_panel">
			
			<div class="index_menu_1">
				<ul class="index_menu_1_ul">
					<li class="index_conpe index_menu_bor">
						<?php echo $lang_admin->Received; ?>
					</li>
				</ul>
			</div>
			<!---->
			<div class="inbox_panel_box_1">
				<div class="inbox_div_header_1">
					<div class="text_informe">
						<?php echo $lang_admin->Received_1; ?>
					</div>
				</div>
				<div class="inbox_div_header_2">
					<div class="text_informe">
						<?php echo $lang_admin->Received_2; ?>
					</div>
				</div>
			</div>
			<?php if(count($load->data_list_comments) == 0){ ?>
				<div class="class_404_me">
					<p><?php echo $lang_admin->not_messages; ?></p>
				</div>
			<?php }else{ ?>
				{{LIST_COMMENTS}}
				<div id="load_post"></div>
				<div id="more_posts" class="more_btnnn">
					<span class="more_btnnn_text"><?php echo $lang_admin->C_9; ?></span>
					<div class="more_btnnn_icon">
						<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg>
					</div>
				</div>
			<?php } ?>
		</div>
		<!---->
    </div>
</div>
<script type="text/javascript">
(function($) {
	var sort_comments_by = 2;
	$('#more_posts').on('click', function(event) {
		event.preventDefault();
		var last_id  = $('.main-post:last').attr('data-id');
		var token_data = $('#token_hidden').val();
	 
		var data_obj = {
			last_id: last_id,
			sort_by:sort_comments_by
		};

      if (sort_comments_by == 1) {
        var comment_ids      = [];
        $('.main-post').each(function(index, el) {
          comment_ids.push($(el).attr('data-id'));
        });

        data_obj['comment'] = comment_ids.join()      
      }
      $.post('{{LINK requests.php?upload=load_messages&mailer=}}'+ token_data,data_obj, function(data, textStatus, xhr) {
        if (data.status == 200) {
			$('#load_post').before(data.comment);
			$('#token_hidden').val(data.token_web);
			$('#loading').hide();
        } else if(data.status == 404) {
			$('#more_posts').hide();
        }else{
			$('#more_posts').hide();
		}
      });      
	}); 
})(jQuery);	
</script>
{{FOOTER_EDEN}}