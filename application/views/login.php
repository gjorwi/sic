<div class="row ajuste banner2" id="bann2">
	<div class="container banner3" align="center">
		<?php
			if(!isset($mensajes)){		
			echo '<p class="mensaje" style="font-weight:100;">Bienvenidos al Sistema Integral Corporativo</p>';
			}
			else{
			echo '<p class="mensaje evento"><i class="fa fa-warning" style="margin-right:10px;color:#FFF22A;text-shadow:1px 1px 1px rgba(0,0,0,0.4);"></i>'.$mensajes.'</p>';				
			}
		?>
	</div>
</div>
<div class="row ajuste" id="cuerpo">
		<div class="container" align="center">
			<div class="login">
				<div class="bannlogin" align="left">
					<p class="titlogin" ><i class="fa fa-user iconlogin" style=""></i>Login Usuario</p>
				</div>
				<div class="cuerplogin">
						<?=form_open('login/logueo') ?>
						<!-- Text input-->
						<div class="form-group text-left">
						  <label class="control-label" for="usuario">Usuario</label>  
						  <div class="">
						  <input id="usuario" name="usuario" type="text" placeholder="Ej. pedro16" class="form-control input-md" value="<?= set_value('usuario') ?>" maxlength="20" autocomplete="off">

						  </div>
						</div>

						<!-- Password input-->
						<div class="form-group text-left">
						  <label class="control-label" for="password">Contraseña</label>
						  <div class="">
						    <input id="password" name="password" type="password" placeholder="Ej. 12345" class="form-control input-md" value="<?= set_value('') ?>" maxlength="20" autocomplete="off">
						    <input name="email" type="text" style="display:none;">
						  </div>
						</div>
						<hr class="separador" style="">
						<!-- Button -->
						<div class="form-group text-right" style="overflow:hidden;">
							<div class="olvcont" align="left" style="">
								<a href="">Olvidé mi Contraseña!</a>
							</div>
							<div style="float:right;">
								<button id="enviar" name="enviar" class="btn btnyo" style="font-family: 'neotericregular';">Login</button>
							</div>
						</div>
					</form>
				</div>
			</div>		
		</div>
	</div>
<!--FIN CONTENT-->
<script type="text/javascript">
	function heightcurp(){
		var heightbann=$("#bann").height();
		var heightfoot=$("#foot").height();
		var heightbann2=$("#bann2").height();
		var heightpant=(($(window).height() - heightbann) - heightfoot)-12- heightbann2;
		//alert("Altura Bann: "+heightbann+"- Altura Foot: "+heightfoot+"- Altura Pant: "+heightpant);
		//var heightmenu=(heightpant - $("#menu").height())/3;
		$("#cuerpo").css({'height':heightpant+'px'});
		//$("#menu").css({'margin-top':heightmenu+'px','margin-bottom':heightmenu+'px'});
	}
</script>