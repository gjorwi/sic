		<div class="footer" align="center" id="foot" style="width:100%;background-color:;">
			<div class="container bajafooter" style="overflow:hidden;">
				<?php
					if (isset($nombres)) {
						$align="left";
						$tamaño="5";
						$height="23";
					}else{
						$align="center";
						$tamaño="6";
						$height="29";
					}
				?>
				<div class="col-sm-<?=$tamaño?> fot" align="<?=$align?>" style="min-height:<?=$height?>px;border-left:none;background-color:;">
					<p class="mensajefoot" ><i class="fa fa-copyright" style="margin-right:5px;"></i>Copyright Hidrofalc&oacute;n C.A 2015 - <a href="http://www.hidrofalcon.com" style="color:#8DAEE9;">www.hidrofalcon.com</a></p>
				</div>
				<?php
					if (isset($nombres)) {
				?>
				<div class="col-sm-3 fot resbaja" id="usu" align="left" 
					<p class="mensajefoot"><span style="font-weight:600;color:#ddd;">Usuario: </span><span style="color:rgba(255,255,255,0.8);"><?=$nombres?></span> (<span style="color:#42B958;"><?=$rol?></span>).</p>
				</div>
				<div class="col-sm-4 fot resbaja" align="left" style="border-right:none;">
					<? if (isset($ult_acc)) {?>
						<p class="mensajefoot"><span style="font-weight:600;color:#ddd;">&Uacute;ltimo Acceso: </span><span style="color:rgba(255,255,255,0.8);"><?=$ult_acc?>.</span></p>
					<?};?>
				</div>
				<?php
					}else{
				?>
					<div class="col-sm-6 fot resbaja" align="center" style="background-color:;border-left:1px solid rgba(0,0,0,0.2);">
						<img src="<?=base_url()?>/public/img/html5.png" class="imgini">
						<img src="<?=base_url()?>/public/img/css3.png" class="imgini">
						<img src="<?=base_url()?>/public/img/js.png" class="imgini">
						<img src="<?=base_url()?>/public/img/boot.png" class="imgini">
						<img src="<?=base_url()?>/public/img/php.png" class="imgini">
						<img src="<?=base_url()?>/public/img/postgresql.png" class="imgini2">
						<img src="<?=base_url()?>/public/img/codeigniter.png" class="imgini2">
					</div>
				<?php
					}
				?>
			</div>
		</div>
</body>
</html>
