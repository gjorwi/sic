<div class="row ajuste" id="cuerpo" style="background-color:!important;">
	<div class="" style="background-color:;padding:0px;box-shadow:1px 0px 15px -2px rgba(0,0,0,0);">
		<div class="col-sm-3 contmenumin" align="right" id="contmenumin">
			<div class="men" align="left" id="menu" >
				<div >
					<div class="banmenu text-left">
						<i class="fa fa-bars fa-lg" style="margin-right:10px;"></i>MENU SEGURIDAD
					</div>
					<div>
						<ul class="nav">
							<li class="submenu hide" id="usuarios" ><a href="<?=base_url()?>seguridad/usuarios">Usuarios <i class="fa fa-user color" ></i></a>
							</li>
							<!--
							<li class="submenu" onclick="tog(1)"><a>Geografia</a>
								<ul class="children" id="children1">
									<li><a class="shadu" href="">Estado</a></li>
									<li><a href="">Parroquia</a></li>
									<li><a href="">Municipio</a></li>
								</ul>
							</li>
							-->
							<li class="submenu hide" id="perfiles"><a href="">Perfiles <i class="fa fa-sitemap color" ></i></a></li>
							<li class="submenu hide" id="auditorias"><a href="<?=base_url()?>seguridad/auditorias">Auditoría <i class="fa fa-legal color" ></i></a></li>
							<li class="submenu menutop"><a href="<?=base_url()?>menuprincipal">Menu Principal <i class="fa fa-bars color" ></i></a></li>
							<li class="submenu menutop" ><a href="<?=base_url()?>logout">Cerrar session <i class="fa fa-sign-out color" ></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="btnminmen" style="">
				<i class="fa fa-chevron-left" style="font-size:50px;color:#B2FF6E;cursor:pointer;" onclick="reversa()"></i>
			</div>
		</div>
<script type="text/javascript">
	<?php
		if (isset($json)) {
	?>
			var array=<?php echo $json;?>;
			//alert(array);
			for (var i = 0; i < array.length; i++) {
				//alert("#"+array[i]+"1");
				$("#"+array[i]).removeClass("hide");
			};
	<?php
		};
	?>
</script>
					
