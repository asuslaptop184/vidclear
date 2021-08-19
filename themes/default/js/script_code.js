(function($){

	var form_ap_settings = $('form.data_url_load');
	var Html_bar = '<span class="bar_ProgressInner" id="loaderprogress" style="width: 0%;" aria-valuenow="0">'+
											'<span class="bar_progressPokes">'+
												'<div class="bar_progressPokesInner">0%</div>'+
											'</span>'+
										'</span>'; 
		
	form_ap_settings.ajaxForm({
		url: Ajax_Requests_File()+'?upload=search_data',
		beforeSend: function() {
			$("#loader_progress").show();
			var data_urls = $("#data_urls").val().trim();
			if (data_urls == "") {
				$("#loader_progress").hide();
			}else{
				$("#loader_progress").append(Html_bar)
				var value = 0;
				function barAnim(){
					value += 5;
					$( "#loaderprogress" ).css( "width", value + "%" ).attr( "aria-valuenow", value );
					$(".bar_progressPokesInner").html( value+"%");						
					if ( value == 50 || value == 85 ) { 
						return setTimeout(barAnim, 2000); 
					}
						return value >= 90 || setTimeout(barAnim, 50);
					}
				setTimeout(barAnim, 1000);
			}	
			$('#data_load_img').show();
			$("#list_results_data").hide();
			$('#server_alert').hide();
			$('#error_alert').hide();
		},
		success: function(data) {
			if (data.status == 200) {
				$(".bar_progressPokesInner").html("100%");
				$("#loaderprogress").css({"width":"100%"});
				$('#loader_progress').fadeIn('fast', function() {
				$("#loaderprogress").remove();
				$(this).delay(2500).slideUp(400, function() {
						$(this).hide();
					});
				});
				$('#data_urls').css({
					'background': "linear-gradient(270deg, #ffffff 5%, #daf8ff70 20%)",
					'border': "1px solid #59b1fd"
				});
				$('#server_alert').hide();
				$('#data_load_img').hide();
				$('#error_alert').hide();
				$("#list_results_data").html(data.video).show();
				$('#token_web').html('<input id="token_hidden" type="hidden" name="token[mailer]" value="' + data.token_web + '">');
			} else if (data.status == 400) {
				$("#loaderprogress").remove();
				$("#loader_progress").hide();
				$('#server_alert').hide();
				$("#list_results_data").hide();
				$('#error_alert').show();
				$('#data_load_img').hide();
				$('#token_web').html('<input id="token_hidden" type="hidden" name="token[mailer]" value="' + data.token_web + '">');
				$('#data_urls').css({
					'border': "1px solid #fd5970"
				});
			} else if (data.status == 203) {
				$("#loaderprogress").remove();
				$("#loader_progress").hide();
				$('#server_alert').show();
				$('#data_load_img').hide();
				$("#list_results_data").hide();
				$('#token_web').html('<input id="token_hidden" type="hidden" name="token[mailer]" value="' + data.token_web + '">');
				$('#data_urls').css({
					'border': "1px solid #fd5970"
				});
			} 
		}
	});
	
	var sort_comments_by = 2;
	$('#more_media').on('click', function(event) {
		event.preventDefault();
		var last_id  = $('.main-media:last').attr('data-id');
		var token_data = $('#token_hidden').val();
	 
		var data_obj = {
			last_id: last_id,
			sort_by:sort_comments_by
		};

      if (sort_comments_by == 1) {
        var comment_ids      = [];
        $('.main-media').each(function(index, el) {
          comment_ids.push($(el).attr('data-id'));
        });

        data_obj['comment'] = comment_ids.join()      
      }
      $.post(Ajax_Requests_File()+'?upload=load_media&mailer='+ token_data,data_obj, function(data, textStatus, xhr) {
        if (data.status == 200) {
			$('#load_media').before(data.comment);
		  	$('#token_web').html('<input id="token_hidden" type="hidden" name="token[mailer]" value="' + data.token_web + '">');
			$('#loading').hide();
			if (data.load_true == data.load_all){
				$('#more_media').hide();
			} 
        } else if(data.status == 404) {
			$('#more_media').hide();
        }else{
			$('#more_media').hide();
		}
      });      
	});
	
	$(".ima_gess_icon").mouseenter(function(){
		$(this).addClass("icon_media_b").delay(1000).queue(function(){
			$(this).removeClass("icon_media_b").dequeue();
		});	
	});	
	
})(jQuery);

document.addEventListener('DOMContentLoaded', function(e) {
    if (getCookie('cookie_site').length > 0) {
        document.getElementById('cookie-bar-bottom').style.display = 'none';
    }
    document.getElementById('cookie-hide').addEventListener('click', function(e) {
        createCookie('cookie_site', true, 1);
        $('#cookie-bar-bottom').hide();
    })
});

var createCookie = function(name, value, days) {
    var expires;
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    } else {
        expires = "";
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}

function getCookie(c_name) {
    if (document.cookie.length > 0) {
        c_start = document.cookie.indexOf(c_name + "=");
        if (c_start != -1) {
            c_start = c_start + c_name.length + 1;
            c_end = document.cookie.indexOf(";", c_start);
            if (c_end == -1) {
                c_end = document.cookie.length;
            }
            return unescape(document.cookie.substring(c_start, c_end));
        }
    }
    return "";
}