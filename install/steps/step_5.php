	<div class="wall_index">
		<div class="wall_index_div">
			<div class="div_top_install">
				<img class="img_zhareiv" src="./install/logo_dev.png"></img>
				<p class="div_top_install_p"><span class="text_copi">creator of</span> <?php echo $name_script; ?> <span class="div_top_install_span"><?php echo $version; ?></span></p>
			</div>	
			<div class="cen_db">
				<p class="wall_info_p">Administration panel information</p>
				<p class="ge3h8_98uj">
					<b>To finish, perform these last two steps</b>
					<br>
					<br>
					1. Change the default information, add your email and change the password.
					<br>
					<br>
					2. To finish delete this series of files, and we are done with the installation <br><code>db.sql</code>, <code>install.php</code> and the folder <code>./install</code>
				</p>
				<br>
				<form enctype="multipart/form-data" method="post" action="?action=admin_save" charset="UTF-8" >
				<p class="text_p">E-mail:</p>
				<input class="input__text_search_home" Value="user@mail.com" type="text" name="email" id="email" placeholder="E-mail">
				<p class="text_p">Password:</p>
				<input class="input__text_search_home" Value="123456" type="text" name="password" id="password" placeholder="Password">	
			 
				<p class="text_p">Recovery Mail:</p>
				<input class="input__text_search_home" Value="" type="text" name="email_admin_recovery" id="email_admin_recovery" placeholder="E-mail Recovery">
				<span class="cjhw_ka">Enter a different email than the administrator in case of hacking to recover your account</span>
				</div>
				<input class="btn_a" type="submit" Value="Finish installation"></input>
				</form> 
			<br>
		</div>  		
	</div> 