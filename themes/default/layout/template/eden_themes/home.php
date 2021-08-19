{{HEADER_EDEN}}
			<!---->
			<div class="index_text_panel_box">
			{{HEADER_MENU_EDEN}}
				<!---->
				<div class="panel_contenido_div_2">
					<!---->
					<div class="div_analytic">
						<div class="div_analytic_div_1">
							<div class="title_text_general">
								<h6><?php echo $lang_admin->Estadisticas; ?></h6>
							</div>
							<div class="resultados">
								<canvas id="grafico_Visits"></canvas>
							</div>
						</div>
						<div class="div_analytic_div_2">
							<div class="div_list_wall_text_data">
								<p class="div_list_wall_text_data_p">
									<?php echo $lang_admin->Server_Space_Use; ?>
									<span><?php echo ZahlenFormatieren($CODE['BELEGT']); ?></span>
								</p>
							</div>
							<div class="div_list_wall_text_data">
								<p class="div_list_wall_text_data_p">
									<?php echo $lang_admin->Available_space; ?>
									<span><?php echo ZahlenFormatieren($CODE['FREI']); ?></span>
								</p>
							</div>
							<div class="div_list_wall_text_data">
								<p class="div_list_wall_text_data_p">
									<?php echo $lang_admin->Disk_Space; ?>
									<span><?php echo ZahlenFormatieren($CODE['INSGESAMT']); ?></span>
								</p>
							</div>
							<?php
								if ($CODE['CPU_STRING'] === -1) {
									echo '';
								}else {
									echo $CODE['CPU_STRING'];
								}
								
							?>
							<div class="div_list_wall_text_data">
								<p class="div_list_wall_text_data_p">
									<?php echo $lang_admin->Server_location; ?>
									<span><?php echo ($CODE['GEO_SERVER_INFO']['country'] == NULL)?'Error':$CODE['GEO_SERVER_INFO']['country']; ?> / <?php echo ($CODE['GEO_SERVER_INFO']['continent'] == NULL)? 'Error' :$CODE['GEO_SERVER_INFO']['continent']; ?></span>
								</p>
							</div>
							<!---->
						</div>
					</div>
					<!---->
					<div class="div_analytic_pages">
						<div class="div_analytic_pages_1">
							<?php if(count($load->list_plugins) == 0){ ?>
								<div class="class_404_me">
									<div class="class_404_me_box">
										<div class="class_404_me_box_1">
											<?php echo $lang_admin->E_404_1; ?>
										</div>
										<div class="class_404_me_box_2">
										<?php echo $lang_admin->E_404_2 ?>
										</div>
									</div>
								</div>
							<?php }else{ ?>
								{{LIST_PLUGINS}}
							<?php } ?>
						</div>
						<div class="div_analytic_pages_2">
							<?php if(count($load->post_data) == 0){ ?>
								<div class="class_404_me">
									<div class="class_404_me_box">
										<div class="class_404_me_box_1">
											<?php echo $lang_admin->E_404_1; ?>
										</div>
										<div class="class_404_me_box_2">
											<?php echo $lang_admin->E_404_3; ?>
										</div>
									</div>
								</div>
							<?php }else{ ?>
								{{LIST_POST}}
							<?php } ?>
						</div>
					</div>
			 
				 
				</div>
			</div>
<div id="token_web">
	<input id="token_hidden" type="hidden" name="token[mailer]" value="<?php echo PHP_fetchToken('mailer'); ?>">
</div> 
    <script type="text/javascript">
            $(document).ready(mostrarResultados(<?php echo date('Y');?> )); 
				var token_data = $('#token_hidden').val();
                function mostrarResultados(año){
                    $.ajax({
                        type:'POST',
                        url: '{{LINK requests.php?upload=process_graphics}}',
                        data:'año='+año,
                        success:function(data){

                            var valores = eval(data);

                            var e   = valores[0];
                            var f   = valores[1];
                            var m   = valores[2];
                            var a   = valores[3];
                            var ma  = valores[4];
                            var j   = valores[5];
                            var jl  = valores[6];
                            var ag  = valores[7];
                            var s   = valores[8];
                            var o   = valores[9];
                            var n   = valores[10];
                            var d   = valores[11];
                              
                            var Datos = {
                                    labels : ['<?php echo $lang_admin->January; ?>', '<?php echo $lang_admin->February; ?>', '<?php echo $lang_admin->March; ?>', '<?php echo $lang_admin->April; ?>', '<?php echo $lang_admin->May; ?>', '<?php echo $lang_admin->June ?>', '<?php echo $lang_admin->July ?>', '<?php echo $lang_admin->August; ?>', '<?php echo $lang_admin->September; ?>', '<?php echo $lang_admin->October; ?>', '<?php echo $lang_admin->November; ?>', '<?php echo $lang_admin->December; ?>'],
                                    datasets : [
                                        {	
                                            fillColor : '#6c82d2', //COLOR DE LAS BARRAS
                                            strokeColor : '#6c82d2', //COLOR DEL BORDE DE LAS BARRAS
                                            highlightFill : '#9bacea', //COLOR "HOVER" DE LAS BARRAS
                                            highlightStroke : '#dddddd', //COLOR "HOVER" DEL BORDE DE LAS BARRAS
                                            data : [e, f, m, a, ma, j, jl, ag, s, o, n, d]
                                         }
                                    ]
                                }
                                
                            var contexto = document.getElementById('grafico_Visits').getContext('2d');
                            window.Barra = new Chart(contexto).Bar(Datos, { responsive : true });
                        }
                    });
                    return false;
                }
    </script>			
			
{{FOOTER_EDEN}}