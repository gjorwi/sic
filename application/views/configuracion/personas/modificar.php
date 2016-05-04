											<!--             INICIO CUERPO DESARROLLO                   -->
					<div align="left">
						<?php
							$fechanac=date("d-m-Y",strtotime($personas->fechanac));
							$fechaing=date("d-m-Y",strtotime($personas->fechaing));
							if ($personas->est_prs=="t" ||$personas->est_prs=="TRUE") {

								$estatusa="selected";
								$estatusi="";
							}else{
								$estatusa="";
								$estatusi="selected";
							};
							if ($personas->nacionalidad=="V") {
								$nacionalidadv="selected";
								$nacionalidade="";
							}else{
								$nacionalidadv="";
								$nacionalidade="selected";
							};
							if ($personas->estcivil=="S") {
								$civils="selected";
								$civilc="";
								$civild="";
								$civilv="";
								$civilo="";
							}elseif($personas->estcivil=="C"){
								$civils="";
								$civilc="selected";
								$civild="";
								$civilv="";
								$civilo="";
							}elseif($personas->estcivil=="D"){
								$civils="";
								$civilc="";
								$civild="selected";
								$civilv="";
								$civilo="";
							}elseif($personas->estcivil=="V"){
								$civils="";
								$civilc="";
								$civild="";
								$civilv="selected";
								$civilo="";
							}else{
								$civils="";
								$civilc="";
								$civild="";
								$civilv="";
								$civilo="selected";
							};
							if ($personas->sexo=="M") {
								$sexom="selected";
								$sexof="";
							}else{
								$sexom="";
								$sexof="selected";
							}
							$atributo=array('class'=>'form-horizontal formulario','id'=>'regusu');
						?>
						<?=form_open('configuracion/personas/modificar',$atributo) ?>
							<fieldset>

							<!-- Form Name -->
							<legend class="subtitform lineform"><i class="fa fa-user iconform"></i>Modificar datos Personales<a class="hide" id="vent"><i class="fa fa-warning " title="Informacion" id="vent2" style="cursor:pointer;text-shadow:-1px 1px 1px rgba(0,0,0,0.2);color:#F0C433;margin-left:10px;"> <span style="color:red;font-size:14px;" id="vent3">Error, Click para Ver!</span></i></a></legend>

												<!--           DATOS PERSONA                -->

							<div class="row ajuste" style="background-color:#;">
								<div class="col-md-6" style="background-color:;padding:0px;">
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Cedula</label>
									  <div class="col-md-6">
									    
									        <input readonly id="ced" maxlength="8" value="<?=$personas->cedula?>" name="cedula" class="form-control " placeholder="Ej. 16732481" type="text">
									    
									  </div>
									</div>
									
									<!-- Select Basic -->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="selectbasic">Nacionalidad</label>
									  <div class="col-md-6">
									    <select id="selectbasic" name="nacionalidad" class="form-control ">
									      <option <?=$nacionalidadv?> value="V">Venezolano</option>
									      <option <?=$nacionalidade?> value="E">Extrangero</option>
									    </select>
									  </div>
									</div>
									
								</div>
								<div class="col-md-6" style="background-color:;padding:0px;">
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="textinput">Nombres</label>  
									  <div class="col-md-6">
									  <input id="textinput"  value="<?=$personas->nombres?>" name="nombres" type="text" placeholder="Ej. Pedro Jose" class="form-control input-md ">
									  </div>
									</div>
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="textinput">Apellidos</label>  
									  <div class="col-md-6">
									  <input id="textinput" value="<?=$personas->apellidos?>" name="apellidos" type="text" placeholder="Ej. Garcia Sanchez" class="form-control input-md ">

									  </div>
									</div>
									
									
								</div>
								
							</div>

												<!--           DATOS PERSONA                -->

							<div class="row ajuste" align="center" style="background-color:#f4f4f4;margin-top:15px;">
								<hr style="border-color:rgba(0,0,0,0.1);width:80%;">
								<div class="col-md-6" style="background-color:;padding:0px;">
									<!-- Select Basic -->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="selectbasic">Estado Civil</label>
									  <div class="col-md-6">
									    <select id="selectbasic" name="estcivil" class="form-control ">
									      <option value="">Seleccionar...</option>
									      <option value="S" <?=$civils?> >Soltero</option>
									      <option value="C" <?=$civilc?> >Casado</option>
									      <option value="D" <?=$civild?> >Divorciado</option>
									      <option value="V" <?=$civilv?> >Viudo</option>
									      <option value="O" <?=$civilo?> >Otro</option>
									    </select>
									  </div>
									</div>
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label"  for="textinput">Correo</label>  
									  <div class="col-md-6">
									  <input id="textinput" name="correo"  value="<?=$personas->correo?>" type="email" placeholder="Ej. pedro@mail.com" class="form-control input-md ">
		 
									  </div>
									</div>
								</div>
								<div class="col-md-6" style="background-color:;padding:0px;">
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="textinput">Telefono de Habitacion</label>  
									  <div class="col-md-6">
									  <input id="tel2" onblur="formatear('tel2')" maxlength="12" value="<?=$personas->telefonoh?>" name="telefonoh" type="text" placeholder="Ej. 02682527639" class="form-control input-md ">
		 
									  </div>
									</div>
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="textinput">Telefono Movil</label>  
									  <div class="col-md-6">
									  <input id="tel" onblur="formatear('tel')" maxlength="12" value="<?=$personas->telefonom?>" name="telefonom" type="text" placeholder="Ej. 04167652401" class="form-control input-md ">
		 
									  </div>
									</div>
									
								</div>
							</div>
												<!--           DATOS PERSONA                -->

							<div class="row ajuste" align="center" style="background-color:#f4f4f4;margin-top:15px;">
								<hr style="border-color:rgba(0,0,0,0.1);width:80%;">
								<div class="col-md-6" style="background-color:;padding:0px;">
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="textinput">Fecha de Nacimiento</label>  
									  <div class="col-md-6" id="sandbox-container">
										  <div class="input-group date">
	  										<input readonly="readonly" type="text"  value="<?=$fechanac?>" placeholder="01-12-1988" name="fechanac" class="form-control "><span class="input-group-addon " style="cursor:pointer;background-color:white;"><i class="fa fa-calendar"></i></span>
										  </div>
									  </div>
									</div>
									<!-- Select Basic -->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="selectbasic">Genero</label>
									  <div class="col-md-6">
									    <select id="sexo" disabled name="sexo" class="form-control">
									      <option value="" >Seleccionar...</option>
									      <option value="M" <?=$sexom?>  >MASCULINO</option>
									      <option value="F" <?=$sexof?>  >FEMENINO</option>
									    </select>
									  </div>
									</div>
									
								</div>
								<div class="col-md-6" style="background-color:;padding:0px;">
									<!-- Select Basic -->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="selectbasic">Estatus</label>

									  <div class="col-md-6">
									    <select id="selectbasic" name="estatus" class="form-control ">
									      <option value="TRUE" <?=$estatusa?>>Activo</option>
									      <option value="FALSE" <?=$estatusi?>>Inactivo</option>
									    </select>
									  </div>
									</div>
									<!-- Textarea -->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="textarea">Direccion</label>
									  <div class="col-md-6">                     
									    <textarea class="form-control " value="" placeholder="Ej. Calle Polita de Lima casa 5-A" id="textarea" name="direccion"><?=$personas->direccion?></textarea>
									  	<input value="<?=$personas->id?>" name="id" id="id" type="hidden">
									  </div>
									</div>
									
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
					<h4>¿Esta seguro de eliminar esta Persona?</h4>
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
		window.location.href='<?=base_url()?>configuracion/personas/buscar';
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
		if (id==="ventana" || id==="cerr" || id==="ventana2") {
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
	$(document).ready(function(){
		var cedula=$("#ced").val();
		//alert(cedula);
		if (cedula!="") {
			$("#nacionalidad").removeAttr("disabled");
			$("#nombres").removeAttr("disabled");
			$("#apellidos").removeAttr("disabled");
			$("#estcivil").removeAttr("disabled");
			$("#correo").removeAttr("disabled");
			$("#telefonoh").removeAttr("disabled");
			$("#telefonom").removeAttr("disabled");
			$("#fechanac").removeAttr("disabled");
			$("#sexo").removeAttr("disabled");
			$("#estatus").removeAttr("disabled");
			$("#direccion").removeAttr("disabled");

		};
	
	});
	function pregunta(){
		
		$("#ventana2").fadeIn();
		
	}
	function eliminar(){
		var id=$("#id").val();
		//alert(id);
		window.location.href='<?=base_url();?>configuracion/personas/eliminar/'+id;
	}
 </script>
