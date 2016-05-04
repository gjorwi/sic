											<!--             INICIO CUERPO DESARROLLO                   -->
					<div align="left">
											<?php
							$atributo=array('class'=>'form-horizontal','id'=>'regusu','autocomplete'=>"off");
						?>
						<?=form_open('configuracion/personas/registrar',$atributo) ?>
							<fieldset>

							<!-- Form Name -->
							<legend class="subtitform lineform" ><i class="fa fa-user iconform" ></i>Registro de datos Personales<a class="hide" id="vent"><i class="fa fa-warning " title="Informacion" id="vent2" style="cursor:pointer;text-shadow:-1px 1px 1px rgba(0,0,0,0.2);color:#F0C433;margin-left:10px;"> <span class="error" style="" id="vent3">Error, Click para Ver!</span></i></a></legend>

												<!--           DATOS PERSONA                -->

							<div class="row ajuste" style="background-color:#;">
								<div class="col-md-6" style="background-color:;padding:0px;">
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Cedula</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <input id="ced" maxlength="8"  onkeyup="control()" value="<?= set_value('cedula')?>" name="cedula" class="form-control" placeholder="Ej. 16732481" type="text">
									    	<span class="input-group-addon" id="check" style="cursor:pointer;padding-left:4px;padding-right:4px;" onclick="verificar();"><div id="btnch" style="font-size:11px;">Check</div></span>
									    </div>
									    <span class="help-block" style="font-size:11px;color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Permitido solo numeros.</span>
									  </div>
									</div>
									
									<!-- Select Basic -->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="selectbasic">Nacionalidad</label>
									  <div class="col-md-6">
									    <select id="nacionalidad" disabled value="<?= set_value('nacionalidad')?>" name="nacionalidad" class="form-control">
									      <option selected value="V">Venezolano</option>
									      <option value="E">Extrangero</option>
									    </select>
									  </div>
									</div>
									
								</div>
								<div class="col-md-6" style="background-color:;padding:0px;">
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="textinput">Nombres</label>  
									  <div class="col-md-6">
									  <input id="nombres" disabled value="<?= set_value('nombres')?>" name="nombres" type="text" placeholder="Ej. Pedro Jose" class="form-control input-md">
									  <span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Ingrese los dos nombres.</span>
									  </div>
									</div>
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="textinput">Apellidos</label>  
									  <div class="col-md-6">
									  <input id="apellidos" disabled value="<?= set_value('apellidos')?>" name="apellidos" type="text" placeholder="Ej. Garcia Sanchez" class="form-control input-md">
									  <span class="help-block" style="font-size:11px;color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Ingrese los dos apellidos.</span>
									  </div>
									</div>
									
									
								</div>
								
							</div>

												<!--           DATOS PERSONA                -->

							<div class="row ajuste" align="center" style="background-color:#f4f4f4;margin-top:15px;">
								<hr style="border-color:rgba(0,0,0,0.1);width:80%;">
								<div class="col-md-6" align="left" style="background-color:;padding:0px;">
									<!-- Select Basic -->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="selectbasic">Estado Civil</label>
									  <div class="col-md-6">
									    <select id="estcivil" disabled name="estcivil" class="form-control">
									      <option selected value="" <?php echo set_select('estcivil', '', TRUE); ?>>Seleccionar...</option>
									      <option  value="S" <?php echo set_select('estcivil', 'S'); ?>>Soltero</option>
									      <option value="C" <?php echo set_select('estcivil', 'C'); ?>>Casado</option>
									      <option value="D" <?php echo set_select('estcivil', 'D'); ?>>Divorciado</option>
									      <option value="V" <?php echo set_select('estcivil', 'V'); ?>>Viudo</option>
									      <option value="O" <?php echo set_select('estcivil', 'O'); ?>>Otro</option>
									    </select>
									  </div>
									</div>
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label"  for="textinput">Correo</label>  
									  <div class="col-md-6">
									  <input id="correo" name="correo" disabled value="<?= set_value('correo')?>" type="email" placeholder="Ej. pedro@mail.com" class="form-control input-md">
		 							   <span class="help-block" style="font-size:11px;color:rgba(0,0,0,0.3);margin:0px;padding:0px;padding-top:3px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Campo opcional.</span>
									  </div>
									</div>
								</div>
								<div class="col-md-6" align="left" style="background-color:;padding:0px;">
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="textinput">Telefono de Habitacion</label>  
									  <div class="col-md-6">
									  <input id="telefonoh" disabled onblur="formatear('telefonoh')" maxlength="12" value="<?= set_value('telefonoh')?>" name="telefonoh" type="text" placeholder="Ej. 02682527639" class="form-control input-md">
		 							  <span class="help-block" style="font-size:11px;color:rgba(0,0,0,0.3);margin:0px;padding:0px;padding-top:3px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Campo opcional.</span>
									  </div>
									</div>
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="textinput">Telefono Movil</label>  
									  <div class="col-md-6">
									  <input id="telefonom" disabled onblur="formatear('telefonom')" maxlength="12" value="<?= set_value('telefonom')?>" name="telefonom" type="text" placeholder="Ej. 04167652401" class="form-control input-md">
		 							  <span class="help-block" style="font-size:11px;color:rgba(0,0,0,0.3);margin:0px;padding:0px;padding-top:3px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Campo opcional.</span>
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
									  <label class="col-md-5 control-label" for="textinput">Fecha de Nacimiento</label>  
									  <div class="col-md-6" id="sandbox-container">
										  <div class="input-group date">
	  										<input id="fechanac" disabled type="text"  value="<?= set_value('fechanac')?>" placeholder="01-12-1988" name="fechanac" class="form-control"><span class="input-group-addon" style="cursor:pointer;background-color:white;"><i class="fa fa-calendar"></i></span>
	  										 
										  </div>
										  <span class="help-block" style="font-size:11px;color:rgba(0,0,0,0.3);margin:0px;padding:0px;padding-top:3px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Campo opcional.</span>
									  </div>
									</div>
									<!-- Select Basic -->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="selectbasic">Genero</label>
									  <div class="col-md-6">
									    <select id="sexo" disabled name="sexo" class="form-control">
									      <option selected value="" <?php echo set_select('sexo', '', TRUE); ?>>Seleccionar...</option>
									      <option value="M" <?php echo set_select('sexo', 'M'); ?>>MASCULINO</option>
									      <option value="F" <?php echo set_select('sexo', 'F'); ?>>FEMENINO</option>
									    </select>
									  </div>
									</div>	
								</div>
								<div class="col-md-6" align="left" style="background-color:;padding:0px;">
									<!-- Select Basic -->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="selectbasic">Estatus</label>
									  <div class="col-md-6">
									    <select id="estatus" disabled name="estatus" class="form-control">
									      <option selected value="TRUE" <?php echo set_select('estatus', 'TRUE', TRUE); ?>>Activo</option>
									      <option value="FALSE" <?php echo set_select('estatus', 'FALSE'); ?>>Inactivo</option>
									    </select>
									  </div>
									</div>
									<!-- Textarea -->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="textarea">Direccion</label>
									  <div class="col-md-6">                     
									    <textarea id="direccion" disabled class="form-control" value="<?= set_value('direccion')?>" placeholder="Ej. Calle Polita de Lima casa 5-A" id="textarea" name="direccion"></textarea>
									     <span class="help-block" style="font-size:11px;color:rgba(0,0,0,0.3);margin:0px;padding:0px;padding-top:3px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Campo opcional.</span>
									 	<input value="" name="id" type="hidden">
									  </div>
									</div>
									
								</div>
							</div>
							

							</fieldset>
						</form>

					</div>
							
<div class="ventana" id="ventana2">
	<div class="contventana" id="contven2">
		<div class="bannvent" align="center" style="border-radius:10px 10px 0px 0px;overflow:hidden;background-color:#f5f5f5;position:relative;z-index:10;">
			<h4 style="float:left;margin-left:10px;font-weight:600;color:#E73C4B;">Informacion </h4><i class="fa fa-remove fa-lg" style="cursor:pointer;margin-top:10px;margin-right:10px;color:rgba(0,0,0,0.4);float:right;" id="cerr2"></i>
		</div>
		<div class="row ajuste" style="padding-top:10px!important;background-color:white;border-bottom:1px solid rgba(0,0,0,0.1);padding-bottom:20px;box-shadow:0px 1px 10px -1px rgba(0,0,0,0.1);">
			<div class="row ajuste" style="margin-bottom:20px!important;">
				<div class="alert alert-info">
					<h4><?=$mensajes?></h4>
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
	function control(){
		var count=$("#ced").val();
		//alert(count.length);
		if (count.length< 8) {
			//alert(count.length);
			$("#check").css({'background-color':'rgba(0,0,0,0.03)','color':'#444','font-size':'12px'});
			$("#btnch").html("Check");
    		$("#nacionalidad").attr("disabled","disabled");
    		$("#nombres").attr("disabled","disabled");
    		$("#apellidos").attr("disabled","disabled");
    		$("#estcivil").attr("disabled","disabled");
    		$("#correo").attr("disabled","disabled");
    		$("#telefonoh").attr("disabled","disabled");
    		$("#telefonom").attr("disabled","disabled");
    		$("#fechanac").attr("disabled","disabled");
    		$("#sexo").attr("disabled","disabled");
    		$("#estatus").attr("disabled","disabled");
    		$("#direccion").attr("disabled","disabled");
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
	
	function verificar(){
		var ced=$("#ced").val();
		if (ced=="") {
			ced=1;
		};
		$.ajax({
		url : "<?=base_url()?>jquery/persona_unique",
		type: "POST",
		data : {cedula:ced},
		success: function(data, textStatus, jqXHR)
		{
			//alert(data);
		    if (data==1) {
		    	$("#check").css({'background-color':'#E73C4B','color':'white','font-size':'11px'});
		    	$("#btnch").html("Registrado");
		    	$("#nacionalidad").attr("disabled","disabled");
	    		$("#nombres").attr("disabled","disabled");
	    		$("#apellidos").attr("disabled","disabled");
	    		$("#estcivil").attr("disabled","disabled");
	    		$("#correo").attr("disabled","disabled");
	    		$("#telefonoh").attr("disabled","disabled");
	    		$("#telefonom").attr("disabled","disabled");
	    		$("#fechanac").attr("disabled","disabled");
	    		$("#sexo").attr("disabled","disabled");
	    		$("#estatus").attr("disabled","disabled");
	    		$("#direccion").attr("disabled","disabled");
		    }else{
		    	if (data==2) {
		    		$("#check").css({'background-color':'#6ECD62','color':'white','font-size':'10px'});
		    		$("#btnch").html("No Registrado");
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
	}
 </script>
