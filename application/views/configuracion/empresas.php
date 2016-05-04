											<!--             INICIO CUERPO DESARROLLO                   -->
					<div align="left">
											<?php
							$atributo=array('class'=>'form-horizontal','id'=>'regusu','autocomplete'=>"off");
						?>
						<?=form_open('configuracion/empresas/registrar',$atributo) ?>
							<fieldset>

							<!-- Form Name -->
							<legend class="subtitform lineform" ><i class="fa fa-building iconform"></i>Registro de Empresas<a class="hide" id="vent"><i class="fa fa-warning " title="Informacion" id="vent2" style="cursor:pointer;text-shadow:-1px 1px 1px rgba(0,0,0,0.2);color:#F0C433;margin-left:10px;"> <span class="error" style="" id="vent3">Error, Click para Ver!</span></i></a></legend>

												<!--           DATOS EMPRESA                -->

							<div class="row ajuste" style="background-color:#;">
								<div class="col-md-6" style="background-color:;padding:0px;">
									<!-- Select Basic -->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="selectbasic">Tipo de RIF</label>
									  <div class="col-md-6">
									    <select id="tiporif" value="<?= set_value('tiporif')?>" name="tiporif" class="form-control">
									       <option selected <?php echo set_select('tiporif', '', TRUE); ?> value="">Seleccione...</option>
									      <option value="P" <?php echo set_select('tiporif', 'P'); ?>>Personal</option>
									      <option value="J" <?php echo set_select('tiporif', 'J'); ?>>Juridico</option>
									      <option value="G" <?php echo set_select('tiporif', 'G'); ?>>Gubernamental</option>
									    </select>
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">RIF</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <input id="rif" readonly maxlength="9" onkeyup="control()" value="<?= set_value('rif')?>" name="rif" placeholder="Ej. 123456789" class="form-control" type="text">
									    	<span class="input-group-addon" id="check" style="cursor:pointer;padding-left:4px;padding-right:4px;" ><div id="btnch" style="font-size:11px;">Check</div></span>
									    </div>
									    <span class="help-block" style="font-size:11px;color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Permitido solo <strong>números</strong>.</span>
									  </div>
									</div>
									
								</div>
								<div class="col-md-6" style="background-color:;padding:0px;">
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="textinput">Razon</label>  
									  <div class="col-md-6">
									  <input id="razon" readonly value="<?= set_value('razon')?>" name="razon" type="text" placeholder="Ej. Empresa X" class="form-control input-md">
									  <span class="help-block" style="font-size:11px;color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Permitido solo <strong>letras</strong>.</span>
									  </div>
									</div>
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="textinput">Fax</label>  
									  <div class="col-md-6">
									  <input id="fax" readonly onblur="formatear('fax')" maxlength="12" value="<?= set_value('fax')?>" name="fax" type="text" placeholder="Ej. 0268-2526840" class="form-control input-md">
									  <span class="help-block" style="font-size:11px;color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Permitido solo <strong>números</strong>.</span>
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
									  <input id="tipo" readonly name="tipo"  value="<?= set_value('tipo')?>" type="text" placeholder="Ej. 1" class="form-control input-md">
		 
									  </div>
									</div>
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label"  for="textinput">Correo</label>  
									  <div class="col-md-6">
									  <input id="correo" readonly name="correo"  value="<?= set_value('correo')?>" type="email" placeholder="Ej. pedro@mail.com" class="form-control input-md">
		 
									  </div>
									</div>
								</div>
								<div class="col-md-6" align="left" style="background-color:;padding:0px;">
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="textinput">Telefono de Habitacion</label>  
									  <div class="col-md-6">
									  <input id="telefonoh" readonly onblur="formatear('telefonoh')"  maxlength="12" value="<?= set_value('telefonoh')?>" name="telefonoh" type="text" placeholder="Ej. 02682527639" class="form-control input-md">
		 							  <span class="help-block" style="font-size:11px;color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Permitido solo <strong>números</strong>.</span>
									  </div>
									</div>
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="textinput">Telefono Movil</label>  
									  <div class="col-md-6">
									  <input id="telefonom" readonly onblur="formatear('telefonom')" maxlength="12" value="<?= set_value('telefonom')?>" name="telefonom" type="text" placeholder="Ej. 04167652401" class="form-control input-md">
		 							  <span class="help-block" style="font-size:11px;color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Permitido solo <strong>números</strong>.</span>
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
									    <textarea class="form-control" id="direccion" value="<?= set_value('direccion')?>" readonly placeholder="Ej. Calle Polita de Lima casa 5-A" name="direccion"></textarea>
									 	<input value=""  name="id" type="hidden">
									  </div>
									</div>
									
							
								</div>
								<div class="col-md-6" align="left" style="background-color:;padding:0px;">
									<!-- Select Basic -->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="selectbasic">Estatus</label>
									  <div class="col-md-6">
									    <select id="estatus" readonly name="est_emp" class="form-control">
									      <option selected value="TRUE" <?php echo set_select('est_emp', 'TRUE', TRUE); ?>>Activo</option>
									      <option value="FALSE" <?php echo set_select('est_emp', 'FALSE'); ?>>Inactivo</option>
									    </select>
									  </div>
									</div>
							</div>
							</div>
								<!-- Textarea -->
									<div class="form-group" align="left" style="padding:5px;">
									  <label class="col-md-5 control-label" for="textarea">Observaciones</label>
									  <div class="col-md-5">                     
									    <textarea class="form-control" readonly id="observaciones" value="<?= set_value('observaciones')?>" placeholder="Ej. Calle Polita de Lima casa 5-A" id="textarea" name="observaciones"></textarea>
									  	<span class="help-block" style="font-size:11px;color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span>Campo opcional.</span>
									  </div>
									</div>

							</fieldset>
						</form>

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
	$(document).ready(function(){
		var valor=$("#tiporif").val();
		if (valor!="") {
			$("#rif").removeAttr("readonly");
			$("#check").attr("onclick","verificar()");
		}else{
			$("#rif").attr("readonly","readonly");
			$("#check").attr("onclick","");
		};
		if (count.length==9) {

			$("#fax").removeAttr("readonly");
    		$("#correo").removeAttr("readonly");
    		$("#tipo").removeAttr("readonly");
    		$("#telefonoh").removeAttr("readonly");
    		$("#telefonom").removeAttr("readonly");
    		$("#direccion").removeAttr("readonly");
    		$("#observaciones").removeAttr("readonly");
    		$("#razon").removeAttr("readonly");
    		$("#estatus").removeAttr("readonly");
		};

	});
		
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
	function verificar(){
		//alert("hola");
		var rif=$("#rif").val();
		var tip=$("#tiporif").val();
		if (rif.length!=9) {
			alert("El rif debe contener un minimo de 9 caracteres.");
		}else{
			if (rif=="") {
			rif=1;
			};
			$.ajax({
			url : "<?=base_url()?>jquery/empresa_unique",
			type: "POST",
			data : {rif:rif,tiporif:tip},
			success: function(data, textStatus, jqXHR)
			{
				//alert(data);
			    if (data==1) {
			    	$("#check").css({'background-color':'#E73C4B','color':'white','font-size':'11px'});
			    	$("#btnch").html("Registrado");
			    	$("#fax").attr("readonly","readonly");			    		
			    	$("#correo").attr("readonly","readonly");
		    		$("#tipo").attr("readonly","readonly");
		    		$("#telefonoh").attr("readonly","readonly");
		    		$("#telefonom").attr("readonly","readonly");
		    		$("#direccion").attr("readonly","readonly");
		    		$("#observaciones").attr("readonly","readonly");
		    		$("#razon").attr("readonly","readonly");
		    		$("#estatus").attr("readonly","readonly");
			    }else{
			    	if (data==2) {
			    		$("#check").css({'background-color':'#6ECD62','color':'white','font-size':'10px'});
			    		$("#btnch").html("No Registrado");
			    		$("#fax").removeAttr("readonly");
			    		$("#correo").removeAttr("readonly");
			    		$("#tipo").removeAttr("readonly");
			    		$("#telefonoh").removeAttr("readonly");
			    		$("#telefonom").removeAttr("readonly");
			    		$("#direccion").removeAttr("readonly");
			    		$("#observaciones").removeAttr("readonly");
			    		$("#razon").removeAttr("readonly");
			    		$("#estatus").removeAttr("readonly");
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
 </script>
