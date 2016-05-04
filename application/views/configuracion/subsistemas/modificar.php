											<!--             INICIO CUERPO DESARROLLO                   -->
					<div align="left">
						<?php
							if ($subsistemas->est_sub=="t" || $subsistemas->est_sub=="TRUE") {
								$estatusa="selected";
								$estatusi="";
							}else{
								$estatusa="";
								$estatusi="selected";
							}
							$atributo=array('class'=>'form-horizontal','id'=>'regusu','autocomplete'=>"off");
						?>
						<?=form_open('configuracion/subsistemas/modificar',$atributo) ?>
							<fieldset>

							<!-- Form Name -->
							<legend class="subtitform lineform"><i class="fa fa-cogs iconform"></i>Modificar Subsistema<a class="hide" id="vent"><i class="fa fa-warning " title="Informacion" id="vent2" style="cursor:pointer;text-shadow:-1px 1px 1px rgba(0,0,0,0.2);color:#F0C433;margin-left:10px;"> <span class="error" style="" id="vent3">Error, Click para Ver!</span></i></a></legend>
								<!-- Prepended text-->
								<div class="form-group" style="padding:5px;">
								  <label class="col-md-3 control-label" for="prependedtext">Sistema</label>
								  <div class="col-md-6">
								        <input id="nom" readonly maxlength="30" value="<?=$subsistemas->sistema_nom_sis?>" name="nom_sis" class="form-control" placeholder="Ej. Sistema" type="text">
								    	<input type="hidden" name="sistema_id" value="<?=$subsistemas->sistema_id?>">
								    <span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Debe elegir un Sistema.</span>
								  </div>
								</div>
								<!-- Prepended text-->
								<div class="form-group" style="padding:5px;">
								  <label class="col-md-3 control-label" for="prependedtext">Subsistema</label>
								  <div class="col-md-6">
								        <input id="nom_sub" readonly maxlength="30" onkeyup="control()" value="<?= $subsistemas->nom_sub?>" name="nom_sub" class="form-control" placeholder="Ej. " type="text">
									    <span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> No se permiten n&uacute;meros.</span>
								  		<input type="hidden" id="id" name="id" value="<?=$subsistemas->id?>">
								  </div>
								</div>
								<!-- Select Basic -->
								<div class="form-group" style="padding:5px;">
								  <label class="col-md-3 control-label" for="selectbasic">Estatus</label>
								  <div class="col-md-6">
								    <select id="est_sub" name="est_sub" class="form-control">
								      <option  <?=$estatusa?> value="TRUE" >Activo</option>
								      <option  <?=$estatusi?> value="FALSE" >Inactivo</option>
								    </select>
								  </div>
								</div>
							</fieldset>
						</form>

					</div>
							
<div class="ventana" id="ventana3" style="position:fixed;">
	<div class="contventana" id="contven3" >
		<div class="bannvent" align="center" style="border-radius:10px 10px 0px 0px;overflow:hidden;background-color:#f5f5f5;position:relative;z-index:10;">
			<h4 style="float:left;margin-left:10px;font-weight:600;color:#E73C4B;">Busqueda </h4><i class="fa fa-remove fa-lg" style="cursor:pointer;margin-top:10px;margin-right:10px;color:rgba(0,0,0,0.4);float:right;" id="cerr3"></i>
		</div>
		<div class="row ajuste" style="padding-top:10px!important;background-color:white;border-bottom:1px solid rgba(0,0,0,0.1);padding-bottom:20px;box-shadow:0px 1px 10px -1px rgba(0,0,0,0.1);">
			<div class="row ajuste" style="margin-bottom:20px!important;">
				<div class="row ajuste" align="center">
					<div style="width:80%;">
					<div class="form-group">
	                    <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
	                    <input class="form-control input-md" id="system-search" name="q" placeholder="Buscar..." required>
	                    
	                </div>
				</div>
				<hr style="width:90%;border-color:rgba(0,0,0,0.1);">
				<div class="contmodal">
					<div id="no-more-tables" style="padding:5px;">
			            <table class="ajuste table-bordered table-striped table-condensed cf" >
			        		<thead class="cf">
			        			<tr>
			        				<th>Codigo</th>
			        				<th>Nombre</th>
			        				<th>Accion</th>
			        			</tr>
			        		</thead>
			        		<tbody>
			        			<tr class="remove-tr">
			        				<td data-title="Codigo">18769212</td>
			        				<td data-title="Nombre">jorwi</td>
			        				<td data-title="Accion" class="" align="center"><button class="btn btn-success" style="font-size:11px;box-shadow:-1px 2px 1px -1px #226B12;border:none;">Agregar</button></td>
			        			</tr>
			        		</tbody>
			        	</table>
	    			</div>
    			</div>
   				 </div>
			</div>
		</div>
	</div>
</div>
<div class="ventana" id="ventana2" style="position:fixed;">
	<div class="contventana" id="contven2" style="margin-top:130px;">
		<div class="bannvent" align="center" style="border-radius:10px 10px 0px 0px;overflow:hidden;background-color:#f5f5f5;position:relative;z-index:10;">
			<h4 style="float:left;margin-left:10px;font-weight:600;color:#E73C4B;">Informacion </h4><i class="fa fa-remove fa-lg" style="cursor:pointer;margin-top:10px;margin-right:10px;color:rgba(0,0,0,0.4);float:right;" id="cerr2"></i>
		</div>
		<div class="row ajuste" style="padding-top:10px!important;background-color:white;border-bottom:1px solid rgba(0,0,0,0.1);padding-bottom:20px;box-shadow:0px 1px 10px -1px rgba(0,0,0,0.1);">
			<div class="row ajuste" style="margin-bottom:20px!important;">
				<div>
					<h4>¿Esta seguro de eliminar este Subsistema?</h4>
				</div>
				<div>
					<button class="btn btn-success" onclick="eliminar()">Si</button>
					<button id="cerrbtn" class="btn btn-danger">no</button>
				</div>
			</div>
		</div>
	</div>
</div>
											 <!--             FIN CUERPO DESARROLLO                   -->
</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function buscar(){
		window.location.href='<?=base_url()?>configuracion/subsistemas/buscar';
	}
	function heightcurp(){
		var heightbann=$("#bann").height();
		var heightfoot=$("#foot").height();
		var heightbann2=$("#bann2").height();
		var heightpant=((($(window).height() - heightbann) - heightfoot)-37)- heightbann2;
		//alert("Altura Bann: "+heightbann+"- Altura Foot: "+heightfoot+"- Altura Pant: "+heightpant);
		var heightmenu=((heightpant - $("#menu").height())/3)+20;
		$("#content").css({'height':heightpant+'px'});
		var widthpant=$(window).width();
		if (widthpant>767) {
			var heightpant=heightpant+24;
			$("#menu").css({'height':heightpant+'px'});
		};
	}
	$(document).click(function(e){
		var id=e.target.id;
		//alert(id);
		if (id==="vent" || id==="vent2" || id==="vent3") {
			$("#ventana").fadeIn();
		};
		if (id==="ventana" || id==="cerr") {
			$("#ventana").fadeOut();
		};
		if (id==="ventana3" || id==="cerr3") {
			$("#ventana3").fadeOut();
		};
		if (id==="ventana2" || id==="cerr2" || id==="cerrbtn") {
			$("#ventana2").fadeOut();
		};
	});
	function tog(valor){
		$("#children"+valor).toggle();
	}
	$("#cerrar").removeClass("hide");
	$("#menprin").removeClass("hide");
	$("#x").css({'cursor':'pointer'});
	$("#x").attr({'href':'<?=base_url()?>configuracion/inicio'});


</script>
<script>
  $('#sandbox-container .input-group.date').datepicker({
    format: "dd-mm-yyyy",
    language: "es",
    autoclose: true,
    todayHighlight: true
	})
  function guardar(){
  	$("#regusu").submit();
  }
  <?php
  if (isset($mensajes)) {
  ?>

  	$("#ventana").fadeIn();
  	$("#vent").removeClass("hide");
  	var heightpant=$(window).height();
  	var alturamodal=((heightpant - $("#contven").height())-50)/2;
  	$("#contven").css({'margin-top':alturamodal+'px','margin-bottom':alturamodal+'px'});
  <?php
  };
  ?>
  var con=0;
		$.fn.parpadear = function()
		{
			this.each(function parpadear()
			{
				if(con<6){
					$(this).fadeIn(1000).delay(500).fadeOut(1000, parpadear);
					con++;
				};
				if(con==6){
					$(this).fadeIn(500);
				};
				
			});
		}
	$("#vent").parpadear();
	con=0;
	function pregunta(){
		
		$("#ventana2").fadeIn();
		
	}
	function eliminar(){
		var id=$("#id").val();
		//alert(id);
		window.location.href='<?=base_url();?>configuracion/subsistemas/eliminar/'+id;
	}


 </script>
