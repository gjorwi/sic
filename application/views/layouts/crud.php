<div class="col-sm-9"  style="padding:0px;margin:0px;">
	<div style="background-color:rgba(0,0,0,0.01);">
		<div style="overflow:hidden;position:relative;z-index:9;background-color:#eee;padding:2px;box-shadow:0px 2px 5px -1px rgba(0,0,0,0.08);">
			<div class="minimenu" onclick="minimenu()" style="cursor:pointer;background-color:#B2FF6E;padding-right:10px;margin-top:1px;margin-bottom:1px;">
				<i class="fa fa-bars" style="margin-right:5px;"></i>MENU
			</div>
			<div style="float:right;">
				<i class="fa fa-floppy-o crud desact" id="g" title="Guardar" name="guardar" onclick=""></i>
				<i class="fa fa-search crud desact" id="s" title="Buscar" onclick="" ></i>
				<i class="fa fa-remove crud desact" id="e" title="Eliminar" ></i>
			</div>
		</div>
		<div style="background-color:rgba(0,0,0,0);">
			<div style="padding:20px;overflow:auto;background-color:rgba(0,0,0,0.2);" id="content">
				<div align="center" style="background-color:rgba(255,255,255,1);box-shadow:2px 2px 5px -1px rgba(0,0,0,0.15);padding:10px;">
					<div align="right" style="color:black;"><a id="x" onclick="cerrar()"><i title="Cerrar" class="fa fa-remove" style="color:rgba(0,0,0,0.2);"></i></a></div>

<script type="text/javascript">
	function minimenu(){
		//alert("hola");
		$("#contmenumin").removeClass('revereventminimenu1');
		$("#contmenumin").addClass('eventminimenu1');
		$("#menu").removeClass('revereventminimenu');
		$("#menu").addClass('eventminimenu');
	}
	function reversa(){
		//alert("hola");
		$("#menu").removeClass('eventminimenu');
		$("#menu").addClass('revereventminimenu');
		$("#contmenumin").removeClass('eventminimenu1');
		$("#contmenumin").addClass('revereventminimenu1');
		
	}
	<?php
		if (isset($crud)) {
	?>
			var mod=0;
			var array=<?php echo $crud;?>;
			//alert(array);
			for (var i = 0; i < array.length; i++) {
				//alert("#"+array[i]+"1");
				if (array[i]=="registrar") {
					$("#g").removeClass("desact");
					$("#g").attr("onclick","guardar()");
				};
				if (array[i]=="buscar") {
					$("#s").removeClass("desact");
					$("#s").attr("onclick","buscar()");
				};
				if (array[i]=="eliminar") {
					$("#e").removeClass("desact");
					$("#e").attr("onclick","pregunta()");
				};
				if (array[i]=="modificar") {
					mod=1;
				};
			};
	<?php
		};
	?>

</script>
