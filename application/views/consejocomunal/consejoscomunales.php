											<!--             INICIO CUERPO DESARROLLO                   -->
					<div align="left">
											<?php
							$atributo=array('class'=>'form-horizontal','id'=>'regusu','autocomplete'=>"off");
						?>
						<?=form_open('consejocomunal/consejoscomunales/registrar',$atributo) ?>
							<fieldset>

							<!-- Form Name -->
							<legend class="subtitform lineform"><i class="fa fa-home iconform" style="font-size:20px;" ></i>Registro del Consejo Comunal<a class="hide" id="vent"><i class="fa fa-warning " title="Informacion" id="vent2" style="cursor:pointer;text-shadow:-1px 1px 1px rgba(0,0,0,0.2);color:#F0C433;margin-left:10px;"> <span class="error" style="" id="vent3">Error, Click para Ver!</span></i></a></legend>

												<!--           DATOS EMPRESA                -->

							<div class="row ajuste" style="background-color:#fff;">
								<div align="center" style="margin-top:10px;">
									<p class="titform">Datos del Consejo Comunal</p>
									<hr style="border-color:rgba(0,0,0,0.1);width:80%;margin-top:0px;">
								</div>
								<div class="col-md-6" style="background-color:;padding:0px;">
									<!-- Select Basic -->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="selectbasic">Tipo de RIF</label>
									  <div class="col-md-6">
									    <select id="tiporifcc" value="<?= set_value('tiporifcc')?>" name="tiporifcc" class="form-control">
									      <option selected <?php echo set_select('tiporifcc', '', TRUE); ?> value="">Seleccione...</option>
									      <option value="C" <?php echo set_select('tiporifcc', 'C'); ?>>Consejo Comunal</option>
									    </select>
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">RIF</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <input id="rifcc" readonly maxlength="9" onkeyup="control()" value="<?= set_value('rifcc')?>" name="rifcc" class="form-control" type="text">
									    	<span class="input-group-addon" id="check" style="cursor:pointer;padding-left:4px;padding-right:4px;" ><div id="btnch" style="font-size:11px;">Check</div></span>
									    </div>
									    <span class="help-block" style="font-size:11px;color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Permitido solo numeros.</span>
									  </div>
									</div>
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="textinput">Nombre</label>  
									  <div class="col-md-6">
									  <input id="nombrecc" readonly value="<?= set_value('nombrecc')?>" name="nombrecc" type="text" placeholder="Ej. Negro Primera" class="form-control input-md">
									  <span class="help-block" style="font-size:11px;color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Permitido solo letras.</span>
									  </div>
									</div>
								</div>
								<div class="col-md-6" style="background-color:;padding:0px;">
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="textinput">Primer Vocero</label>  
									  <div class="col-md-6">
									  <input id="personacc1" readonly value="<?= set_value('personacc1')?>" name="personacc1" type="text" placeholder="Ej. Pedro Perez" class="form-control input-md">
									  <span class="help-block" style="font-size:11px;color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Permitido solo letras.</span>
									  </div>
									</div>
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="textinput">Segundo Vocero</label>  
									  <div class="col-md-6">
									  <input id="personacc2" readonly maxlength="12" value="<?= set_value('personacc2')?>" name="personacc2" type="text" placeholder="Ej. Ramon Jose" class="form-control input-md">
									  <span class="help-block" style="font-size:11px;color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Permitido solo letras.</span>
									  </div>
									</div>
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="textinput">Tercer Vocero</label>  
									  <div class="col-md-6">
									  <input id="personacc3" readonly maxlength="12" value="<?= set_value('personacc3')?>" name="personacc3" type="text" placeholder="Ej. Javier medina" class="form-control input-md">
									  <span class="help-block" style="font-size:11px;color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Permitido solo letras.</span>
									  </div>
									</div>
									
								</div>
								
							</div>
												<!--           DATOS PERSONA                -->

							<div class="row ajuste" align="center" style="background-color:#fff;margin-top:15px;">
								<div align="center" style="margin-top:10px;">
									<p class="titform">Datos de Ubicacion</p>
									<hr style="border-color:rgba(0,0,0,0.1);width:80%;margin-top:0px;">
								</div>
								
								<div class="col-md-6" align="left" style="background-color:;padding:0px;">
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Estado</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <input id="estado" readonly maxlength="30" value="<?= set_value('estado')?>" name="estado" class="form-control" type="text">
									    	<span class="input-group-addon" id="estadosearch"  style="cursor:pointer;background-color:white;border-radius:0px 5px 5px 0px;"><i class="fa fa-search"></i></span>
									    	<input type="hidden" id="estado_id" name="estado_id" value="<?= set_value('estado_id')?>">
									    </div>
									    <span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Debe elegir un Empresa.</span>
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Municipio</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <input id="municipio" readonly maxlength="30" value="<?= set_value('municipio')?>" name="municipio" class="form-control" type="text">
									    	<span class="input-group-addon" id="municipiosearch"  style="cursor:pointer;background-color:white;border-radius:0px 5px 5px 0px;"><i class="fa fa-search"></i></span>
									    	<input type="hidden" id="municipio_id" name="municipio_id" value="<?= set_value('municipio_id')?>">
									    </div>
									    <span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Debe elegir un Empresa.</span>
									  </div>
									</div>
									
								</div>
								<div class="col-md-6" align="left" style="background-color:;padding:0px;">
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Parroquia</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <input id="parroquia" readonly maxlength="30" value="<?= set_value('parroquia')?>" name="parroquia" class="form-control" type="text">
									    	<span class="input-group-addon" id="parroquiasearch"  style="cursor:pointer;background-color:white;border-radius:0px 5px 5px 0px;"><i class="fa fa-search"></i></span>
									    	<input type="hidden" id="parroquia_id" name="parroquia_id" value="<?= set_value('parroquia_id')?>">
									    </div>
									    <span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Debe elegir un Empresa.</span>
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Sector</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <input id="sector" readonly maxlength="30" value="<?= set_value('sector')?>" name="sector" class="form-control" type="text">
									    	<span class="input-group-addon" id="sectorsearch"  style="cursor:pointer;background-color:white;border-radius:0px 5px 5px 0px;"><i class="fa fa-search"></i></span>
									    	<input type="hidden" id="sector_id" name="sector_id" value="<?= set_value('sector_id')?>">
									    </div>
									    <span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Debe elegir un Empresa.</span>
									  </div>
									</div>
								</div>
							</div>
								<!-- Select Basic -->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="selectbasic">Estatus</label>
									  <div class="col-md-6">
									    <select id="est_cco" readonly name="est_cco" class="form-control">
									      <option selected value="TRUE" <?php echo set_select('est_cco', 'TRUE', TRUE); ?>>Activo</option>
									      <option value="FALSE" <?php echo set_select('est_cco', 'FALSE'); ?>>Inactivo</option>
									    </select>
									  </div>
									</div>
								<!-- Textarea -->
									<div class="form-group" align="left" style="padding:5px;">
									  <label class="col-md-5 control-label" for="textarea">Observaciones</label>
									  <div class="col-md-5">                     
									    <textarea class="form-control" readonly id="observacionescc" value="" placeholder="Ej. Calle Polita de Lima casa 5-A" name="observacionescc"><?= set_value('observacionescc')?></textarea>
									  	<span class="help-block" style="font-size:11px;color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Este campo es opcional.</span>
									  </div>
									</div>

							</fieldset>
						</form>

					</div>
							
<div class="ventana" id="ventana3" style="position:fixed;">
	<div class="contventana" id="contven3" style="height:auto!important;">
		<div class="bannvent" align="center" style="border-radius:10px 10px 0px 0px;overflow:hidden;background-color:#f5f5f5;position:relative;z-index:10;">
			<h4 style="float:left;margin-left:10px;font-weight:600;color:#E73C4B;">Busqueda </h4><i class="fa fa-remove fa-lg" style="cursor:pointer;margin-top:10px;margin-right:10px;color:rgba(0,0,0,0.4);float:right;" id="cerr3"></i>
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
				<div id="btnsector" class="hide"><p><a style="cursor:default;" onclick="registrar_sector()">Registrar Nuevo sector</a></p></div>
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
<div class="ventana" id="ventana4" style="position:fixed;z-index:1000;">
	<div class="contventana" id="contven4" style="margin-top:80px;">
		<div class="bannvent" align="center" style="border-radius:10px 10px 0px 0px;overflow:hidden;background-color:#f5f5f5;position:relative;z-index:10;">
			<h4 style="float:left;margin-left:10px;font-weight:600;color:#E73C4B;">Registros del Sector </h4><i class="fa fa-remove fa-lg" style="cursor:pointer;margin-top:10px;margin-right:10px;color:rgba(0,0,0,0.4);float:right;" id="cerr4"></i>
		</div>
		<div class="row ajuste" style="overflow:auto;max-height:250px;padding-top:10px!important;background-color:white;border-bottom:1px solid rgba(0,0,0,0.1);padding-bottom:20px;box-shadow:0px 1px 10px -1px rgba(0,0,0,0.1);">
			<div class="row ajuste" style="margin-bottom:20px!important;">
				<div class="contmodal" style="background-color:;margin-top:;height:auto;overflow:hidden;">
					<!-- Prepended text-->
					<div class="form-group" align="left" style="padding:5px;margin-bottom:20px;overflow:hidden;">
					  <label class="control-label" for="prependedtext">Sector</label>
					        <input id="sectormodal" maxlength="30" onfocus="ocultar()" value="<?= set_value('sector')?>" name="sector" class="form-control" type="text">
					    <span class="help-block" style="font-size:11px;color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Permitido solo Letras.</span>
					</div>
					<div style="margin-top:20px;background-color:;">
   						<button onclick="guardar_sector()" class="btn btn-success">Guardar</button>
   					</div>
   					<div id="msjsector1" class="alert alert-danger hide" align="center" style="margin:10px;padding:5px;">
						<h5>
							El <strong>SECTOR</strong> ya se encuentra actualmente registrado.
						</h5>
					</div>
					<div id="msjsector2" class="alert alert-danger hide" align="center" style="margin:10px;padding:5px;">
						<h5>
							Debe ingresar correctamente los datos en el campo <strong>SECTOR</strong>
						</h5>
					</div>
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
		window.location.href='<?=base_url()?>consejocomunal/consejoscomunales/buscar';
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
			$('.remove-tr').remove();
			$("#btnsector").addClass("hide");
		};
		if (id==="ventana4" || id==="cerr4") {
			$("#ventana4").fadeOut();
			$("#msjsector1").addClass("hide");
			$("#msjsector2").addClass("hide");
			$("#sectormodal").val("");
			
		};
	});
	function tog(valor){
		$("#children"+valor).toggle();
	}
	$("#cerrar").removeClass("hide");
	$("#menprin").removeClass("hide");
	$("#x").css({'cursor':'pointer'});
	$("#x").attr({'href':'<?=base_url()?>consejocomunal/inicio'});


</script>
<script>
  $('#sandbox-container .input-group.date').datepicker({
    format: "dd-mm-yyyy",
    language: "es",
    autoclose: true,
    todayHighlight: true
	})
  function guardar(){
  	var direc=$("#direccion").val();
  	//alert(direc);
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
	function formatear(id){

		var num_sf=$("#"+id).val();
		//alert(num_sf);
		var num_cf='';
		if (num_sf.length>=11) {
			//alert("mayor a 11")
			//alert(num_sf.indexOf('-'));
			if(num_sf.indexOf('-') == -1){
				//alert("no posee -");
				num_cf=num_sf.substring(0,4)+"-";
				num_cf+=num_sf.substring(4,11);
				$("#"+id).val(num_cf);
				$("#"+id).css({'border-color':'rgba(0,0,0,0.2)'});
			}else{
				$("#"+id).css({'border-color':'rgba(0,0,0,0.2)'});
			};
			
		}else{
			if (num_sf.length==0) {
				//alert(num_sf.length);
				$("#"+id).css({'border-color':'rgba(0,0,0,0.2)'});
			}else{
				$("#"+id).css({'border-color':'#E73C4B'});
			};
			
		};

	}
	var count=$("#rifcc").val();
	$(document).ready(function(){
		var estado=$("#estado").val();
		var municipio=$("#municipio").val();
		var parroquia=$("#parroquia").val();
		var sector=$("#sector").val();
		if (estado!="") {
			$("#estadosearch").attr("onclick","buscar_ubicacion('estado')");
		};
		if (municipio!="") {
			$("#municipiosearch").attr("onclick","buscar_ubicacion('municipio')");
		};
		if (parroquia!="") {
			$("#parroquiasearch").attr("onclick","buscar_ubicacion('parroquia')");
		};
		if (sector!="") {
			$("#sectorsearch").attr("onclick","buscar_ubicacion('sector')");
		};

		var valor=$("#tiporifcc").val();
		if (valor!="") {
			$("#rifcc").removeAttr("readonly");
			$("#check").attr("onclick","verificar()");
		}else{
			$("#rifcc").attr("readonly","readonly");
			$("#check").attr("onclick","");
		};
		if (count.length==9) {

			$("#nombrecc").removeAttr("readonly");
    		$("#personacc1").removeAttr("readonly");
    		$("#personacc2").removeAttr("readonly");
    		$("#personacc3").removeAttr("readonly");
    		$("#estadosearch").attr("onclick","buscar_ubicacion('estado')");
    		$("#est_cco").removeAttr("readonly");
    		$("#observacionescc").removeAttr("readonly");
		};

	});
		
	function control(){
		var count=$("#rifcc").val();
		
		if (count.length<9) {

			$("#check").css({'background-color':'rgba(0,0,0,0.03)','color':'#444','font-size':'12px'});
			$("#btnch").html("Check");
			$("#nombrecc").attr("readonly","readonly");			    		
	    	$("#personacc1").attr("readonly","readonly");
    		$("#personacc2").attr("readonly","readonly");
    		$("#personacc3").attr("readonly","readonly");
    		$("#estadosearch").attr("onclick","");
    		$("#municipiosearch").attr("onclick","");
    		$("#parroquiasearch").attr("onclick","");
    		$("#sectorsearch").attr("onclick","");
    		$("#est_cco").attr("readonly","readonly");
    		$("#observacionescc").attr("readonly","readonly");
		};
	}
	function verificar(){
		//alert("hola");
		var rifcc=$("#rifcc").val();
		var tipcc=$("#tiporifcc").val();
		if (rifcc.length!=9) {
			alert("El rif debe contener un minimo de 9 caracteres.");
		}else{
			if (rifcc=="") {
			rifcc=1;
			};
			//alert(rifcc+tipcc);
			$.ajax({
			url : "<?=base_url()?>jquery/ccomunal_unique",
			type: "POST",
			data : {rifcc:rifcc,tiporifcc:tipcc},
			success: function(data, textStatus, jqXHR)
			{
				//alert(data);
			    if (data==1) {
			    	$("#check").css({'background-color':'#E73C4B','color':'white','font-size':'11px'});
			    	$("#btnch").html("Registrado");
			    	$("#nombrecc").attr("readonly","readonly");			    		
			    	$("#personacc1").attr("readonly","readonly");
		    		$("#personacc2").attr("readonly","readonly");
		    		$("#personacc3").attr("readonly","readonly");
		    		$("#estadosearch").attr("onclick","");
		    		$("#municipiosearch").attr("onclick","");
		    		$("#parroquiasearch").attr("onclick","");
		    		$("#sectorsearch").attr("onclick","");
		    		$("#est_cco").attr("readonly","readonly");
		    		$("#observacionescc").attr("readonly","readonly");
			    }else{
			    	if (data==2) {
			    		$("#check").css({'background-color':'#6ECD62','color':'white','font-size':'10px'});
			    		$("#btnch").html("No Registrado");
			    		$("#nombrecc").removeAttr("readonly");
			    		$("#personacc1").removeAttr("readonly");
			    		$("#personacc2").removeAttr("readonly");
			    		$("#personacc3").removeAttr("readonly");
			    		$("#estadosearch").attr("onclick","buscar_ubicacion('estado')");
			    		$("#est_cco").removeAttr("readonly");
			    		$("#observacionescc").removeAttr("readonly");
			    	}
			    	else{
			    		//alert(data);
			    		$("#check").css({'background-color':'rgba(0,0,0,0.03)','color':'#444','font-size':'12px'});
			    		$("#btnch").html("Check");
			    	};
			    };
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
			    alert("error");
			}
			});
		};
		
	}
	function ocultar(){
		$("#msjsector1").addClass("hide");
		$("#msjsector2").addClass("hide");
	}
	function guardar_sector(){
		//alert("hola");
		var parroquia=$("#parroquia_id").val();
		var sector=$("#sectormodal").val();
			//alert(parroquia+" - "+sector);
			$.ajax({
			url : "<?=base_url()?>jquery/sector_registrar",
			type: "POST",
			data : {parroquia_id:parroquia,nom_sec:sector},
			success: function(data, textStatus, jqXHR)
			{
				//alert(data);
				if (data==1) {
					$("#msjsector1").removeClass("hide");
				}else{
					if (data==2) {
						$("#ventana4").fadeOut();
						buscar_ubicacion('sector');
					}else{
						$("#msjsector2").removeClass("hide");
					};
				};
		
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
			    alert("error");
			}
			});
		
	}
	$("#tiporifcc").change(function(){
		//alert("cambió!");
		var valor=$("#tiporifcc").val();
		if (valor!="") {
			$("#rifcc").removeAttr("readonly");
			$("#check").attr("onclick","verificar()");
		}else{
			$("#rifcc").attr("readonly","readonly");
			$("#check").attr("onclick","");
		};
	});
	function buscar_ubicacion(buscar){
		//alert(buscar);
		if (buscar=="estado") {
			var url1="estado_busqueda";
		};
		if (buscar=="municipio") {
			var idestado=$("#estado_id").val();
			var url1="municipio_busqueda";

		};
		if (buscar=="parroquia") {
			var idmunicipio=$("#municipio_id").val();
			var url1="parroquia_busqueda";
		};
		if (buscar=="sector") {
			$("#btnsector").removeClass("hide");
			var idparroquia=$("#parroquia_id").val();
			var url1="sector_busqueda";
		};
		id=""+idestado+idmunicipio+idparroquia;
		//alert(url1+" - "+id);
		$.ajax({
		url : "<?=base_url()?>jquery/"+url1,
		type: "POST",
		data : {valor:'TRUE',estado_id:idestado,municipio_id:idmunicipio,parroquia_id:idparroquia},
		success: function(data, textStatus, jqXHR)
		{
			//alert(data);
			obj = jQuery.parseJSON( data );
			var count=obj.id.length;
			//alert(count);
			$('.remove-tr').remove();
			if (buscar=="estado") {

				$('.cf thead').append('<tr class="remove-tr"><th>Codigo</th><th>Estado</th><th>Accion</th></tr>');
				for (i=0;i<count;i++){
					$('.cf tbody').append('<tr class="remove-tr"><td data-title="Codigo">'+obj.id[i]+'<input type="hidden" id="buscar'+i+'" value="'+buscar+'"><input type="hidden" id="codigo'+i+'" value="'+obj.id[i]+'"></td><td data-title="Estado">'+obj.nom_est[i]+'<input type="hidden" id="estado'+i+'" value="'+obj.nom_est[i]+'"></td><td data-title="Accion" align="center"><button class="btn btn-success" onclick="setear('+i+')">agregar</button></td></tr>');
		   		}
			};
			if (buscar=="municipio") {
				$('.cf thead').append('<tr class="remove-tr"><th>Codigo</th><th>Municipio</th><th>Accion</th></tr>');
				for (i=0;i<count;i++){
					$('.cf tbody').append('<tr class="remove-tr"><td data-title="Codigo">'+obj.id[i]+'<input type="hidden" id="buscar'+i+'" value="'+buscar+'"><input type="hidden" id="codigo'+i+'" value="'+obj.id[i]+'"></td><td data-title="Municipio">'+obj.nom_mun[i]+'<input type="hidden" id="municipio'+i+'" value="'+obj.nom_mun[i]+'"></td><td data-title="Accion" align="center"><button class="btn btn-success" onclick="setear('+i+')">agregar</button></td></tr>');
		   		}
			};
			if (buscar=="parroquia") {
				$('.cf thead').append('<tr class="remove-tr"><th>Codigo</th><th>Parroquia</th><th>Accion</th></tr>');
				for (i=0;i<count;i++){
					$('.cf tbody').append('<tr class="remove-tr"><td data-title="Codigo">'+obj.id[i]+'<input type="hidden" id="buscar'+i+'" value="'+buscar+'"><input type="hidden" id="codigo'+i+'" value="'+obj.id[i]+'"></td><td data-title="Parroquia">'+obj.nom_par[i]+'<input type="hidden" id="parroquia'+i+'" value="'+obj.nom_par[i]+'"></td><td data-title="Accion" align="center"><button class="btn btn-success" onclick="setear('+i+')">agregar</button></td></tr>');
		   		}
			};
			if (buscar=="sector") {
				$('.cf thead').append('<tr class="remove-tr"><th>Codigo</th><th>Sector</th><th>Accion</th></tr>');
				for (i=0;i<count;i++){
					$('.cf tbody').append('<tr class="remove-tr"><td data-title="Codigo">'+obj.id[i]+'<input type="hidden" id="buscar'+i+'" value="'+buscar+'"><input type="hidden" id="codigo'+i+'" value="'+obj.id[i]+'"></td><td data-title="Sector">'+obj.nom_sec[i]+'<input type="hidden" id="sector'+i+'" value="'+obj.nom_sec[i]+'"></td><td data-title="Accion" align="center"><button class="btn btn-success" onclick="setear('+i+')">agregar</button></td></tr>');
		   		}
			};
		},
		error: function (jqXHR, textStatus, errorThrown)
		{
		    alert(textStatus);
		}
		});
		$("#ventana3").fadeIn();

	}
	function setear(id){
		var buscar=$("#buscar"+id).val();
		if (buscar=="estado") {
			var codigo=$("#codigo"+id).val();
			var estado=$("#estado"+id).val();
			$("#estado_id").val(codigo);
			$("#estado").val(estado);
			$("#municipiosearch").attr("onclick","buscar_ubicacion('municipio')");
    		$("#parroquiasearch").attr("onclick","");
    		$("#sectorsearch").attr("onclick","");
    		$("#municipio").val("");
    		$("#parroquia").val("");
    		$("#sector").val("");
			$("#ventana3").fadeOut();
			$('.remove-tr').remove();
		};
		if (buscar=="municipio") {
			var codigo=$("#codigo"+id).val();
			var municipio=$("#municipio"+id).val();
			$("#municipio_id").val(codigo);
			$("#municipio").val(municipio);
			$("#parroquiasearch").attr("onclick","buscar_ubicacion('parroquia')");
			$("#sectorsearch").attr("onclick","");
    		$("#parroquia").val("");
    		$("#sector").val("");
			$("#ventana3").fadeOut();
			$('.remove-tr').remove();
		};
		if (buscar=="parroquia") {
			var codigo=$("#codigo"+id).val();
			var parroquia=$("#parroquia"+id).val();
			$("#parroquia_id").val(codigo);
			$("#parroquia").val(parroquia);
			$("#sectorsearch").attr("onclick","buscar_ubicacion('sector')");
    		$("#sector").val("");
			$("#ventana3").fadeOut();
			$('.remove-tr').remove();
		};
		if (buscar=="sector") {
			var codigo=$("#codigo"+id).val();
			var sector=$("#sector"+id).val();
			$("#sector_id").val(codigo);
			$("#sector").val(sector);
			$("#ventana3").fadeOut();
			$('.remove-tr').remove();
			$("#btnsector").addClass("hide");
		};
		
	}
	$(document).ready(function() {
	    var activeSystemClass = $('.list-group-item.active');

	    //something is entered in search form
	    $('#system-search').keyup( function() {
	       var that = this;
	        // affect all table rows on in systems table
	        var tableBody = $('.cf tbody');
	        var tableRowsClass = $('.cf tbody tr');
	        $('.search-sf').remove();
	        tableRowsClass.each( function(i, val) {
	        
	            //Lower text for case insensitive
	            var rowText = $(val).text().toLowerCase();
	            var inputText = $(that).val().toLowerCase();
	           

	            if( rowText.indexOf( inputText ) == -1 )
	            {
	                //hide rows
	                tableRowsClass.eq(i).hide();
	                
	            }
	            else
	            {
	                $('.search-sf').remove();
	                tableRowsClass.eq(i).show();
	            }
	        });
	        //all tr elements are hidden
	        if(tableRowsClass.children(':visible').length == 0)
	        {
	            tableBody.append('<tr class="search-sf"><td class="text-muted" colspan="6">No se encontro el valor ingresado...</td></tr>');
	        }
	    });
	});
	function registrar_sector(){
		$("#msjsector1").addClass("hide");
		$("#msjsector2").addClass("hide");
		$("#sectormodal").val("");
		$("#ventana4").fadeIn();
	}
 </script>
