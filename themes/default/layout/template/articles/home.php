{{INCLUDE_HEADER}}
<div id="page" class="page">
	<?php
		$add_action->do_action('Hook_load_plugin_66');
	?>
    <section class="section_home">
        <div id="content_page">
            <div class="page_box_post_fle_2">
                <div class="page_box_post_fle_2_wall">
					<?php
						$add_action->do_action('Hook_load_plugin_67');
					?>
                    <?php if($load->post_active){ ?>
                    <div class="page_box_post_fle_1">
                        <span>{{LANG blog_articles_text}}</span>
                    </div>
                    <?php } ?>
                    <div class="wall_post_le_1">
                        {{DATA_POSTS}}
                        <?php if($load->post_active){ ?>
							<?php if($load->load_plugin == 0){ ?>
								 
							<?php }else{ ?>
								<?php if (  $load->list_media < $load->load_true): ?>
									<div id="load_post"></div>
									<div id="more_posts" class="plus_more_1_span">
										<span>{{LANG load_more_post}}</span>
										<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
											<line x1="12" y1="5" x2="12" y2="19"></line>
											<line x1="5" y1="12" x2="19" y2="12"></line>
										</svg>
									</div>
								<?php endif; ?>	
							<?php } ?>
                        <?php } ?>
                    </div>
                </div>
                <!---->
                <div class="wall_post_le_2">
					<?php
						$add_action->do_action('Hook_load_plugin_68');
					?>
                    <?php if(!empty(_Decode(PHP_Admin_Data('42','SELECT')))){ ?>
                    <div class="ads_post">
                        <?php echo _Decode(PHP_Admin_Data('42','SELECT'));?>
                    </div>
                    <?php } ?>
                    <p class="text_post_auqe">{{LANG Most_popular}}</p>
                    {{POST_RELATED}}
					<?php
						$add_action->do_action('Hook_load_plugin_69');
					?>
                </div>
            </div>
        </div>
    </section>
</div>
<div id="token_web">
	<input id="token_hidden" type="hidden" name="token[mailer]" value="{{TOKEN_S}}">
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
      $.post('{{LINK requests.php?upload=load_posts&mailer=}}'+ token_data,data_obj, function(data, textStatus, xhr) {
        if (data.status == 200) {
			$('#load_post').before(data.comment);
		  	$('#token_web').html('<input id="token_hidden" type="hidden" name="token[mailer]" value="' + data.token_web + '">');
			$('#loading').hide();
			if (data.load_true == <?php echo $load->load_true; ?>){
				$('#more_posts').hide();
			}
        } else if(data.status == 404) {
			$('#more_posts').hide();
        }else{
			$('#more_posts').hide();
		}
      });      
	}); 
})(jQuery);	
</script>
{{INCLUDE_FOOTER}}
