	<div class="wall_index">
		<div class="wall_index_div">
			<div class="div_top_install">
				<img class="img_zhareiv" src="./install/logo_dev.png"></img>
				<p class="div_top_install_p"><span class="text_copi">creator of</span> <?php echo $name_script; ?> <span class="div_top_install_span"><?php echo $version; ?></span></p>
			</div>	
			<div class="div_meve_sroll">
				<?php 
					include('./install/steps/EULA.html');
				?>
			</div>
			<br>
			<input type="checkbox" id="agree" name="agree"> Acepta haber leído y comprendido lo anterior.
			<form action="?action=tems" method="post">
			<button type="submit" class="btn_a" id="next-terms" disabled>
				<i class="fa fa-arrow-right progress-icon" data-icon="paper-plane-o"></i> Next
			</button>
			</form>
		</div>  
	</div> 