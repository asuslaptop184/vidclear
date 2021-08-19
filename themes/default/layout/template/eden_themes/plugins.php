{{HEADER_EDEN}}
<!---->
<div class="index_text_panel_box">
    {{HEADER_MENU_EDEN}}
    <!---->
    <div class="panel_contenido_div_2">
        <!---->
        <div class="index_plugi_ex">
            <div class="index_plugi_ex_div_1">	
				<?php if(count($load->data_list_plugin) == 0){ ?>
					<div class="class_404_me">
						<div class="class_404_me_box">
							<div class="class_404_me_box_1">
								<?php echo $lang_admin->E_404_4; ?>
							</div>
							<div class="class_404_me_box_2">
								<?php echo $lang_admin->E_404_5; ?>
							</div>
						</div>
					</div>
				<?php }else{ ?>
					{{LIST_PLUGINS}}
				<?php } ?>
            </div>
            <div class="index_plugi_ex_div_2">
				<div id="drop_plugin" class="page_list_plugins_2w" enctype="multipart/form-data" ondragover="_ondragover(event)" ondrop="_ondrop(event)" ondragleave="_ondragleave(event)" ondragenter="_ondragenter(event)">
					<form id="upload" method="post" action="{{LINK requests.php?upload=upload_plugins&mailer=}}<?php echo PHP_fetchToken('mailer'); ?>">
						<div id="drop" class="drop_class_plugins" >
							<?php echo $lang_admin->Drag_here; ?>
							<img class="img_upload_icon" src="{{CONFIG theme_url}}/layout/template/eden_themes/images/dragdrop_icon_5.png" />
							<a><?php echo $lang_admin->Click_Here; ?></a>
							<input type="file" name="upl" multiple accept="zip,application/octet-stream,application/zip,application/x-zip,application/x-zip-compressed" />
						</div>
						<ul>
								<!-- The file uploads will be shown here -->
						</ul>
					</form>
				</div>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
.index_plugi_ex_div_1 {
    box-shadow: unset;
    background: transparent;
}
#upload ul li span {
    background: url("{{CONFIG theme_url}}/layout/template/eden_themes/images/upload_icons.png") no-repeat;
}
</style>
<script type="text/javascript">
	function _ondrop(e){
		 e.preventDefault();
		 fileInput.files = e.dataTransfer.files;
		 $('#drop').css("background-color", "#e8f0fe");
	}

	function _ondragenter(e){
		e.preventDefault(); 
		$('#drop').css("background-color", "#e8f0fe");
	}

	function _ondragleave(e){
		e.preventDefault();
		$('#drop').css("background-color", "#e8f0fe");
	}

	function _ondragover(e){
		e.preventDefault();
		$('#drop').css("background-color", "#ffffff");
	}
</script>	
{{FOOTER_EDEN}}
