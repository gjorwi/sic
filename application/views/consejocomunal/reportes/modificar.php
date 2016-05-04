											<!--             INICIO CUERPO DESARROLLO                   -->
					<div align="left">
						<?php

							$atributo=array('class'=>'form-horizontal','id'=>'regusu');
							if ($empresas->tiporif=="P") {
								$tiporifp="selected";
								$tiporifj="";
								$tiporifg="";
							}elseif ($empresas->tiporif=="J") {
								$tiporifp="";
								$tiporifj="selected";
								$tiporifg="";
							}else{
								$tiporifp="";
								$tiporifj="";
								$tiporifg="selected";
							}
							if ($empresas->est_emp=="t") {
								$estatusa="selected";
								$estatusi="";
							}else{
								$estatusa="";
								$estatusi="selected";
							}
						?>
						<?=form_open('configuracion/empresas/modificar',$atributo) ?>
							<fieldset>

							<!-- Form Name -->
							<legend class="subtitform" style="border-color:#05B1A0;"><i class="fa fa-user" style="margin-right:5px;color:#DC6161;"></i>Registro de Empresas<a class="hide" id="vent"><i class="fa fa-warning " title="Informacion" id="vent2" style="cursor:pointer;text-shadow:-1px 1px 1px rgba(0,0,0,0.2);color:#F0C433;margin-left:10px;"> <span class="error" style="" id="vent3">Error, Click para Ver!</span></i></a></legend>

												<!--           DATOS EMPRESA                -->

							<div class="row ajuste" style="background-color:#;">
								<div class="col-md-6" style="background-color:;padding:0px;">
									<!-- Select Basic -->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="selectbasic">Tipo de RIF</label>
									  <div class="col-md-6">
									    <select id="tiporif" disabled class="form-control">
									       <option selected value="">Seleccione...</option>
									      <option value="P" <?=$tiporifp?> >Personal</option>
									      <option value="J" <?=$tiporifj?> >Juridico</option>
									      <option value="G" <?=$tiporifg?> >Gubernamental</option>
									    </select>
									    <input type="hidden" value="<?=$empresas->tiporif?>" name="tiporif">
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">RIF</label>
									  <div class="col-md-6">
									        <input id="rif" readonly maxlength="9" value="<?=$empresas->rif?>" onkeyup="control()" name="rif" class="form-control" type="text">
									  </div>
									</div>
									
								</div>
								<div class="col-md-6" style="background-color:;padding:0px;">
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="textinput">Razon</label>  
									  <div class="col-md-6">
									  <input id="razon" name="razon" type="text" value="<?=$empresas->razon?>" placeholder="Ej. " class="form-control input-md">
									  </div>
									</div>
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="textinput">Fax</label>  
									  <div class="col-md-6">
									  <input id="fax"  onblur="formatear('fax')" value="<?=$empresas->fax?>" maxlength="12" name="fax" type="text" placeholder="Ej. " class="form-control input-md">

									  </div>
									</div>
									
									
								</div>
								
							</div>

												<!--           DATOS PERSONA                -->

							<div class="row ajuste" align="center" style="background-color:#f4f4f4;margin-top:15px;">
								<hr style="border-color:rgba(0,0,0,0.1);width:80%;">
								<div class="col-md-6" align="left" style="background-color:;padding:0px;">
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label"  for="textinput">Tipo</label>  
									  <div class="col-md-6">
									  <input id="tipo"  name="tipo"  type="text" value="<?=$empresas->tipo?>" placeholder="Ej. pedro@mail.com" class="form-control input-md">
		 
									  </div>
									</div>
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label"  for="textinput">Correo</label>  
									  <div class="col-md-6">
									  <input id="correo"  name="correo" value="<?=$empresas->correo?>" type="email" placeholder="Ej. pedro@mail.com" class="form-control input-md">
		 
									  </div>
									</div>
								</div>
								<div class="col-md-6" align="left" style="background-color:;padding:0px;">
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="textinput">Telefono de Habitacion</label>  
									  <div class="col-md-6">
									  <input id="telefonoh"  onblur="formatear('telefonoh')" value="<?=$empresas->telefonoh?>" maxlength="12"  name="telefonoh" type="text" placeholder="Ej. 02682527639" class="form-control input-md">
		 
									  </div>
									</div>
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="textinput">Telefono Movil</label>  
									  <div class="col-md-6">
									  <input id="telefonom"  onblur="formatear('telefonom')" value="<?=$empresas->telefonom?>" maxlength="12"  name="telefonom" type="text" placeholder="Ej. 04167652401" class="form-control input-md">
		 
									  </div>
									</div>
									
								</div>
							</div>
												<!--           DATOS PERSONA                -->

							<div class="row ajuste" align="center" style="background-color:#f4f4f4;margin-top:15px;">
								<hr style="border-color:rgba(0,0,0,0.1);width:80%;">
								<div class="col-md-6" align="left" style="background-color:;padding:0px;">
									<!-- Textarea -->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="textarea">Direccion</label>
									  <div class="col-md-6">                     
									    <textarea class="form-control" id="direccion" placeholder="Ej. Calle Polita de Lima casa 5-A" name="direccion"><?=$empresas->direccion?></textarea>
									 	<input id="id" value="<?=$empresas->id?>"  name="id" type="hidden">
									  </div>
									</div>
									
							
								</div>
								<div class="col-md-6" align="left" style="background-color:;padding:0px;">
									<!-- Select Basic -->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="selectbasic">Estatus</label>
									  <div class="col-md-6">
									    <select id="estatus"  name="est_emp" class="form-control">
									      <option value="TRUE" <?=$estatusa?> >Activo</option>
									      <option value="FALSE" <?=$estatusi?> >Inactivo</option>
									    </select>
									  </div>
									</div>
							</div>
							</div>
								<!-- Textarea -->
									<div class="form-group" align="left" style="padding:5px;">
									  <label class="col-md-5 control-label" for="textarea">Observaciones</label>
									  <div class="col-md-5">                     
									    <textarea class="form-control"  id="observaciones" placeholder="Ej. Calle Polita de Lima casa 5-A" id="textarea" name="observaciones"><?=$empresas->observaciones?></textarea>
									  </div>
									</div>

							</fieldset>
						</form>

					</div>
							
<div class="ventana" id="ventana2" style="position:fixed;">
	<div class="contventana" id="contven2" style="margin-top:130px;">
		<div class="bannvent" align="center" style="border-radius:10px 10px 0px 0px;overflow:hidden;background-color:#f5f5f5;position:relative;z-index:10;">
			<h4 style="float:left;margin-left:10px;font-weight:600;color:#E73C4B;">Informacion </h4><i class="fa fa-remove fa-lg" style="cursor:pointer;margin-top:10px;margin-right:10px;color:rgba(0,0,0,0.4);float:right;" id="cerr2"></i>
		</div>
		<div class="row ajuste" style="padding-top:10px!important;background-color:white;border-bottom:1px solid rgba(0,0,0,0.1);padding-bottom:20px;box-shadow:0px 1px 10px -1px rgba(0,0,0,0.1);">
			<div class="row ajuste" style="margin-bottom:20px!important;">
				<div>
					<h4>¿Esta seguro de eliminar esta Empresa?</h4>
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
		window.location.href='<?=base_url()?>configuracion/empresas/buscar';
	}
	function heightcurp(){
		var heightbann=$("#bann").height();
		var heightfoot=$("#foot").height();
		var heightbann2=$("#bann2").height();
		var heightpant=((($(window).height() - heightbann) - heightfoot)-37)- heightbann2;
		//alert("Altura Bann: "+heightbann+"- Altura Foot: "+heightfoot+"- Altura Pant: "+heightpant);
		var heightmenu=((heightpant - $("#menu").height())/3)+20;
		$("#content").css({'height':heightpant+'px'});
		var heightpant=heightpant+24;
		$("#menu").css({'height':heightpant+'px'});
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
	var count=$("#rif").val();

		
	function control(){
		var count=$("#rif").val();
		
		if (count.length<9) {

			$("#check").css({'background-color':'rgba(0,0,0,0.03)','color':'#444','font-size':'12px'});
			$("#btnch").html("Check");
			$("#correo").attr("readonly","readonly");
    		$("#tipo").attr("readonly","readonly");
    		$("#telefonoh").attr("readonly","readonly");
    		$("#telefonom").attr("readonly","readonly");
    		$("#direccion").attr("readonly","readonly");
    		$("#observaciones").attr("readonly","readonly");
    		$("#razon").attr("readonly","readonly");
    		$("#estatus").attr("readonly","readonly");
    		$("#fax").attr("readonly","readonly");
		};
	}
	
	$("#tiporif").change(function(){
		//alert("cambió!");
		var valor=$("#tiporif").val();
		if (valor!="") {
			$("#rif").removeAttr("readonly");
			$("#check").attr("onclick","verificar()");
		}else{
			$("#rif").attr("readonly","readonly");
			$("#check").attr("onclick","");
		};
	});
	function pregunta(){
		
		$("#ventana2").fadeIn();
		
	}
	function eliminar(){
		var id=$("#id").val();
		//alert(id);
		window.location.href='<?=base_url();?>configuracion/empresas/eliminar/'+id;
	}
 </script>
