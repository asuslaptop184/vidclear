	<div class="wall_index">
		<div class="wall_index_div">
			<div class="div_top_install">
				<img class="img_zhareiv" src="./install/logo_dev.png"></img>
				<p class="div_top_install_p"><span class="text_copi">creator of</span> <?php echo $name_script; ?> <span class="div_top_install_span"><?php echo $version; ?></span></p>
			</div>	
			<div class="cen_db">
				<br>
				<p class="wall_info_p">Installation</p>
				<br>
				<br>
				<form enctype="multipart/form-data" method="post" action="?action=upload" charset="UTF-8" >
					<p class="text_p">DB host:</p>
					<input class="input__text_search_home" type="text" name="host" id="host" placeholder="host">
					<p class="text_p">Database username:</p>
					<input class="input__text_search_home" type="text" name="username" id="username" placeholder="username">
					<p class="text_p">Database password:</p>
					<input class="input__text_search_home" type="text" name="password" id="password" placeholder="password">
					<p class="text_p">Database name:</p>
					<input class="input__text_search_home" type="text" name="name" id="name" placeholder="name">
					<p class="text_p">Site url:</p>
					<input class="input__text_search_home" type="text" name="web" id="web" placeholder="Http:// od Https://siteurl.com">
					<br>
					<input class="btn_a" type="submit" Value="Save data"></input>
				</form>	 				
			</div>
			<br>
		</div>  		
	</div>  