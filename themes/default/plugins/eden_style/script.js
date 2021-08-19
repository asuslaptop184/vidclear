


function success_load(menje, text_s, type){
	
	if(type == 200){
		var status_load = '<div class="index_wat_box">'+
						'<div class="index_wat_box_1">'+
							'<div class="index_wat_box_icon">'+
							'<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="20 6 9 17 4 12"></polyline></svg>'+
						'</div>'+
					'</div>'+
					'<div class="index_wat_box_text">'+
						''+ menje +''+
						'<div class="text_informe">'+
							''+ text_s +''+
						'</div>'+
					'</div>'+
				'</div>';
	}else{
		var status_load = '<div class="index_wat_box">'+
						'<div class="index_wat_box_1">'+
							'<div class="erro_r_icon index_wat_box_icon">'+
							'<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">'+
								'<line x1="18" y1="6" x2="6" y2="18"></line>'+
								'<line x1="6" y1="6" x2="18" y2="18"></line>'+
							'</svg>'+
						'</div>'+
					'</div>'+
					'<div class="index_wat_box_text">'+
						''+ menje +''+
						'<div class="text_informe">'+
							''+ text_s +''+
						'</div>'+
					'</div>'+
				'</div>';
	}			
	return status_load;
	
}

function maxLength(id, max_Length, max_characters) {
	var maxLength = max_Length;
	$(id).keyup(function() {
	  var textlen = $(this).val().length;
	  $(max_characters).text(textlen);
	  
		if ( maxLength > textlen){
			$("#publications_box_user").css("box-shadow", "0 2px 4px 0 rgba(0,0,0,.4)");
			$("#publications_box_user").css("border", "0px");
			$(max_characters).css("display", "block");
			$("#btn_post_feed__profile_user").css("display", "block");
			$("#btn_post_feed__profile_user_no").css("display", "block");
			$("#publications_box_icon_upload_img").css("display", "none");
			$("#publications_box_icon_emojis_img").css("display", "block");
			$(id).attr('maxlength',maxLength);
			if ( maxLength > textlen){
				$(max_characters).css("background", "#fbbc03");
			}else{
				$(max_characters).css("background", "#ea4335");
			}
		}else{
			$(max_characters).css("background", "#ea4335");
			$("#btn_post_feed__profile_user").css("display", "none");
			$("#delete_image_post").css("display", "none");
			$("#btn_post_feed__profile_user_no").css("display", "none");
			$("#output_image_feed").css("display", "none");
			$("#publications_box_user").css("box-shadow", "none");
			$("#publications_box_icon_upload_img").css("display", "block");
			$("#publications_box_icon_emojis_img").css("display", "none");
			$("#publications_box_user").css("border", "1px solid #dedede");
		}
	  
	});
}

