<div class="row ajuste" id="cuerpo" style="background-color:!important;">
	<div class="" style="background-color:;padding:0px;box-shadow:1px 0px 15px -2px rgba(0,0,0,0);">
		<div class="col-sm-3 contmenumin" id="contmenumin" align="right" >
			<div class="men" align="left" id="menu" style="">
				<div class="">
					<div class="banmenu text-left" >
						<i class="fa fa-bars fa-lg" style=""></i>MENU M.T.A
					</div>
					<div class="" style="overflow:hidden;">
						<ul class="nav">
							<li class="submenu hide" id="mesastecnicas" ><a href="<?=base_url()?>mta/mesastecnicas">Mesas Tecnicas <i class="fa fa-tint color" style="font-size:16px;"></i></a></li>
							<li class="submenu hide" id="reuniones" ><a href="<?=base_url()?>mta/reuniones">Reuniones y Minutas <i class="fa fa-group color" ></i></a></li>
							<li class="submenu hide" id="reportes" onclick="tog(1)"><a>Reportes<i class="fa fa-file color" ></i></a>
								<ul class="children" id="children1">
									<li><a class="shadu" href="<?=base_url()?>mta/excel/setExcelTodo">Reporte General</a></li>
									<li><a href="<?=base_url()?>mta/excel/setExcelActiva">Reporte MTA Activos</a></li>
									<li><a href="<?=base_url()?>mta/excel/setExcelInactiva">Reporte MTA Inactivos</a></li>
								</ul>
							</li>
							<li class="submenu hide"><a href="<?=base_url()?>mta/excel/setExcel">Reportes <i class="fa fa-file color" ></i></a></li>
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
<div class="ventana" id="ventana6" style="position:fixed;">
	<div class="contventana" id="contven6" style="height:auto!important;">
		<div class="bannvent" align="center" style="border-radius:10px 10px 0px 0px;overflow:hidden;background-color:#f5f5f5;position:relative;z-index:10;">
			<h4 style="float:left;margin-left:10px;font-weight:600;color:#E73C4B;">Informacion </h4><i class="fa fa-remove fa-lg" style="cursor:pointer;margin-top:10px;margin-right:10px;color:rgba(0,0,0,0.4);float:right;" id="cerr6"></i>
		</div>
		<div class="row ajuste" style="height:auto!important;padding-top:10px!important;background-color:white;border-bottom:1px solid rgba(0,0,0,0.1);padding-bottom:20px;box-shadow:0px 1px 10px -1px rgba(0,0,0,0.1);">
			<div class="row ajuste" style="margin-bottom:20px!important;">
				<div class="row ajuste" align="center">
					<div style="width:80%;">
					<div class="form-group">
	                    <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
	                    <input class="form-control input-md" id="system-search" name="q" placeholder="Buscar..." required>
	                    
	                </div>
				</div>
				<hr style="width:90%;border-color:rgba(0,0,0,0.1);margin-bottom:5px;margin-top:5px;">
				
				<div class="contmodal" style="max-height:280px!important;overflow:auto;">
					<div id="no-more-tables" style="padding:5px;">
			            <table class="ajuste table-bordered table-striped table-condensed cf" >
			        		<thead class="cf ">
			        			
			        		</thead>
			        		<tbody>
			        			
			        		</tbody>
			        	</table>
	    			</div>
    			</div>
   				 </div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$("#avisos").removeClass("hide");
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
	//alert("Entro al Alerta!");
	var val=true;
	count('ven');
	count('xven');
	function count(coun){
		$.ajax({
			url : "<?=base_url()?>jquery/count_mta_"+coun,
			type: "POST",
			data : {valor:val},
			success: function(data, textStatus, jqXHR)
			{
				obj = jQuery.parseJSON( data );
				//alert(data);
				if (coun=='ven') {
					if (obj.inactivas>0) {
						$('#val-ven').html(obj.inactivas);
						$("#aviso-ven").removeClass("hide");
					};
				};
				if (coun=='xven') {
					if (obj.xvencer>0) {
						$('#val-xven').html(obj.xvencer);
						$("#aviso-xven").removeClass("hide");
					};
				};
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
			    alert("error");
			}
		});
	}
	$(document).click(function(e){
		var id=e.target.id;
		//alert(id);
		if (id==="ventana6" || id==="cerr6") {
			$("#ventana6").fadeOut();
			$('.remove-tr').remove();
		};
	});
	function mod_ven_xven(val){
		$.ajax({
			url : "<?=base_url()?>jquery/mta_"+val,
			type: "POST",
			data : {valor:'true'},
			success: function(data, textStatus, jqXHR)
			{
				obj = jQuery.parseJSON( data );
				var count=obj.rif.length;
				//alert(data);
				$('.remove-tr').remove();
				if (val=='porvencer') {
					//alert(data);
					$('.cf thead').append('<tr class="remove-tr"><th>RIF</th><th>Nombre MTA</th><th>Municipio</th><th>Registro</th></tr>');
					//alert("hola");
					for (i=0;i<count;i++){
					//alert(i);
						$('.cf tbody').append('<tr class="remove-tr"><td data-title="RIF">'+obj.rif[i]+'</td><td data-title="Nombre MTA">'+obj.nom_mta[i]+'</td><td data-title="Municipio">'+obj.municipio[i]+'</td><td data-title="Registro">'+obj.registradao_por[i]+'</td></tr>');
		   			}
				};
				if (val=='vencidas') {
					//alert(data);
					$('.cf thead').append('<tr class="remove-tr"><th>RIF</th><th>Nombre MTA</th><th>Municipio</th><th>Registro</th></tr>');
					//alert("hola");
					for (i=0;i<count;i++){
					//alert(i);
						$('.cf tbody').append('<tr class="remove-tr"><td data-title="RIF">'+obj.rif[i]+'</td><td data-title="Nombre MTA">'+obj.nom_mta[i]+'</td><td data-title="Municipio">'+obj.municipio[i]+'</td><td data-title="Registro">'+obj.registradao_por[i]+'</td></tr>');
		   			}
				};
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
			    alert("error");
			}
		});
		$("#ventana6").fadeIn();
	}
</script>


