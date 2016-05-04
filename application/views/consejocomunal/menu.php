<div class="row ajuste" id="cuerpo" style="background-color:!important;">
	<div class="" style="background-color:;padding:0px;box-shadow:1px 0px 15px -2px rgba(0,0,0,0);">
		<div class="col-sm-3 contmenumin" id="contmenumin" align="right" >
			<div class="men" align="left" id="menu" >
				<div class="">
					<div class="banmenu text-left">
						<i class="fa fa-bars fa-lg" style="margin-right:10px;"></i>MENU C. COMUNAL
					</div>
					<div>
						<ul class="nav">
							<li class="submenu hide" id="consejoscomunales" ><a href="<?=base_url()?>consejocomunal/consejoscomunales">Consejos Comunales <i class="fa fa-home color" style="font-size:16px;"></i></a></li>
							<li class="submenu hide" id="reportes"><a href="<?=base_url()?>mta/reportes">Reportes <i class="fa fa-building color" ></i></a></li>
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