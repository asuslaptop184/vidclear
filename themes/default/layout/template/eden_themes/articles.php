{{HEADER_EDEN}}
<!---->
<div class="index_text_panel_box">
    {{HEADER_MENU_EDEN}}
    <!---->
    <div class="panel_contenido_div_2">
        <!---->
        <div class="index_wall_conte_acti">
			<br />
			<div class="index_wall_conte_acti_1">
				<div class="index_search">
					<div class="index_search_icon">
						<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
							<circle cx="11" cy="11" r="8"></circle>
							<line x1="21" y1="21" x2="16.65" y2="16.65"></line>
						</svg>
					</div>
					<div class="index_search_box">
						<input type="text" id="data_search" name="search" class="search_input index_input_1 form-control" placeholder="<?php echo $lang_admin->C_10; ?>" autocomplete="off"/>
						<div class='search_dropdown hidden'></div>
					</div>
				</div>
				<!---->
				<a class="a_btn_2_pos" href="{{CONFIG site_url}}/eden/articles/?details=new">
					<div class="btn_2_pos">
						<span><?php echo $lang_admin->C_8; ?></span>
						<div class="btn_2_pos_icon">
							<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
								<line x1="12" y1="5" x2="12" y2="19"></line>
								<line x1="5" y1="12" x2="19" y2="12"></line>
							</svg>
						</div>
					</div>
				</a>
			</div>
			<br />
			<?php if(count($load->data_list_articles) == 0){ ?>
				<div class="class_404_me">
					<div class="class_404_me_box">
						<div class="class_404_me_box_1">
							<?php echo $lang_admin->E_404_1; ?>
						</div>
						<div class="class_404_me_box_2">
							<?php echo $lang_admin->E_404_6; ?>
						</div>
					</div>
				</div>
			<?php }else{ ?>
				{{LIST_ARTICLES}}
				<div id="load_post"></div>
				<div id="more_posts" class="more_btnnn">
					<span class="more_btnnn_text"><?php echo $lang_admin->C_9; ?></span>
					<div class="more_btnnn_icon">
						<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg>
					</div>
				</div>
			<?php } ?>
			<div id="token_web">
				<input id="token_hidden" type="hidden" name="token[mailer]" value="<?php echo PHP_fetchToken('mailer'); ?>" />
            </div>
		</div>
    </div>
</div>

<script type="text/javascript">


(function($) {
	$('#data_search').keyup(function(event) {
		var token_data = $('#token_hidden').val();
		var search_value = $(this).val();
		var search_dropdown = $('.search_dropdown');
		if (search_value == '') {
			search_dropdown.addClass('hidden');
			search_dropdown.empty();
			return false;
		} else {
			search_dropdown.removeClass('hidden');
		}
		$.post('{{LINK requests.php?upload=search_post&mailer=}}'+token_data, {search: search_value}, function(data, textStatus, xhr) {
			if (data.status == 200) {
				search_dropdown.html(data.html);
				$('#token_hidden').val(data.token_web);
			} else {
				search_dropdown.addClass('hidden');
				search_dropdown.empty();
				$('#token_hidden').val(data.token_web);
				return false;
			}
		});
	});
	jQuery(document).click(function(event){
		if (!(jQuery(event.target).closest('.search_dropdown').length)) {
			jQuery('.search_dropdown').addClass('hidden');
		}
	});	
	
	
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
      $.post('{{LINK requests.php?upload=load_posts&mailer=}}'+ token_data,data_obj, function(data, textStatus, xhr) {
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
