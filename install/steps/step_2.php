<div class="wall_index">
		<div class="wall_index_div">
			<div class="div_top_install">
				<img class="img_zhareiv" src="./install/logo_dev.png"></img>
				<p class="div_top_install_p"><span class="text_copi">creator of</span> <?php echo $name_script; ?> <span class="div_top_install_span"><?php echo $version; ?></span></p>
			</div>	
			<div class="div_meve_sroll">
				<table class="table">
				<tbody>
				  <tr>
					<td><b>tips</b></td>
					
					<td>server that uses this script is hostinger</td>
					<td><a target="_blank" href="https://www.hostg.xyz/SHi5"><font color="green" class="font_data"><i class="fa fa-check fa-fw"></i> click here</font></a></td>
				  </tr>
				  <tr>
					<td>PHP 5.5+</td>
					<td>Required PHP version 7.0 or more</td>
					<td><?php echo ($php == true) ? '<font color="green"><i class="fa fa-check fa-fw"></i> Installed</font>' : '<font color="red"><i class="fa fa-times fa-fw"></i> Not installed</font>'?></td>
				  </tr>
				  <tr>
					<td>cURL</td>
					<td>Required cURL PHP extension</td>
					<td><?php echo ($cURL == true) ? '<font color="green"><i class="fa fa-check fa-fw"></i> Installed</font>' : '<font color="red"><i class="fa fa-times fa-fw"></i> Not installed</font>'?></td>
				  </tr>
				  <tr>
					<td>MySQLi</td>
					<td>Required MySQLi PHP extension</td>
					<td><?php echo ($mysqli == true) ? '<font color="green"><i class="fa fa-check fa-fw"></i> Installed</font>' : '<font color="red"><i class="fa fa-times fa-fw"></i> Not installed</font>'?></td>
				  </tr>
				  <tr>
					<td>GD Library</td>
					<td>Required GD Library for image cropping</td>
					<td><?php echo ($gd == true) ? '<font color="green"><i class="fa fa-check fa-fw"></i> Installed</font>' : '<font color="red"><i class="fa fa-times fa-fw"></i> Not installed</font>'?></td>
				  </tr>
				  <tr>
					<td>Mbstring</td>
					<td>Required Mbstring extension for UTF-8 Strings</td>
					<td><?php echo ($mbstring == true) ? '<font color="green"><i class="fa fa-check fa-fw"></i> Installed</font>' : '<font color="red"><i class="fa fa-times fa-fw"></i> Not installed</font>'?></td>
				  </tr>
				  <tr>
					<td>ZIP</td>
					<td>Required ZIP extension for backuping data</td>
					<td><?php echo ($zip == true) ? '<font color="green"><i class="fa fa-check fa-fw"></i> Installed</font>' : '<font color="red"><i class="fa fa-times fa-fw"></i> Not installed</font>'?></td>
				  </tr>
				  <tr>
					<td>allow_url_fopen</td>
					<td>Required allow_url_fopen</td>
					<td><?php echo ($allow_url_fopen == true) ? '<font color="green"><i class="fa fa-check fa-fw"></i> Enabled</font>' : '<font color="red"><i class="fa fa-times fa-fw"></i> Disabled</font>'?></td>
				  </tr>
				  <tr>
					<td>.htaccess</td>
					<td>Required .htaccess file for script security </td>
					<td><?php echo ($is_htaccess == true) ? '<font color="green"><i class="fa fa-check fa-fw"></i> Uploaded</font>' : '<font color="red"><i class="fa fa-times fa-fw"></i> Not uploaded</font>'?></td>
				  </tr>
				  <tr>
					<td>SharePlus.sql</td>
					<td>Required SharePlus.sql for the installation  </td>
					<td><?php echo ($is_sql == true) ? '<font color="green"><i class="fa fa-check fa-fw"></i> Uploaded</font>' : '<font color="red"><i class="fa fa-times fa-fw"></i> Not uploaded</font>'?></td>
				  </tr>
				  <tr>
					<td>config.php</td>
					<td>Required config.php to be writable for the installation</td>
					<td><?php echo ($is_writable == true) ? '<font color="green"><i class="fa fa-check fa-fw"></i> Writable</font>' : '<font color="red"><i class="fa fa-times fa-fw"></i> Not writable</font>'?></td>
				  </tr>
				</tbody>
			  </table>
		  </div>
		  <a class="btn_a" href="?action=installation">start installation</a>
	 
		</div>  
	</div> 