<div class="row ajuste" id="cuerpo" style="background-color:!important;">
	<div class="" style="background-color:;padding:0px;box-shadow:1px 0px 15px -2px rgba(0,0,0,0);">
		<div class="col-sm-3" align="right" style="overflow:hidden;padding:0px;margin:0px;position:relative;z-index:9;
box-shadow:2px 0px 5px -1px rgba(0,0,0,0.1);">
			<div class="men" align="left" id="menu" style="background-color:rgba(255,255,255,0.4);overflow:auto;">
				<div class="">
					<div class="banmenu text-left">
						<i class="fa fa-bars fa-lg" style="margin-right:10px;"></i>MENU SALA SITUACIONAL
					</div>
					<div>
						
					</div>
				</div>
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