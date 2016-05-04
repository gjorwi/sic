											<!--             INICIO CUERPO DESARROLLO                   -->
					<div align="left">
						<?php
						if ($reunions->est_reu=='t') {
							$estatus='Activo';
						}else{
							$estatus='Inactivo';
						}

										$n=0;
										$id=0;
										foreach ($reunions as $row) {
											$nombre=explode(' ',$row->persona_nombres);
											$apellido=explode(' ',$row->persona_apellidos,1);
											if ($apellido[0]=='DE') {
												$apellido[0]=$apellido[1];
											}
											$persona[$n]['nombre']=$nombre[0].' '.$apellido[0];
											$persona[$n]['asist']=$row->persona_asist;
											$id=$n+1;
											$n++;

										}
							$atributo=array('class'=>'form-horizontal','id'=>'regusu','autocomplete'=>"off");
						?>
						<?=form_open('mta/reuniones/registrar',$atributo) ?>
							<fieldset>

							<!-- Form Name -->
							<legend class="subtitform lineform" style=""><i class="fa fa-file-text-o iconform" style=""></i>Reunion y Minuta<a class="hide" id="vent"><i class="fa fa-warning " title="Informacion" id="vent2" style="cursor:pointer;text-shadow:-1px 1px 1px rgba(0,0,0,0.2);color:#F0C433;margin-left:10px;"> <span class="error" style="" id="vent3">Error, Click para Ver!</span></i></a></legend>

												<!--           DATOS EMPRESA                -->
							<div class="row ajuste" align="center" style="background-color:#fff;">
								<div align="center" style="margin-top:10px;">
									<p class="titform" >Datos de la Mesa Tecnica de Agua</p>
									<hr style="border-color:rgba(0,0,0,0.1);width:80%;margin-top:0px;">
								</div>
								<div class="col-md-6" align="left" style="background-color:;padding:0px;">
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									<input type="hidden" value="<?=$reunions->id?>" name="id" id="id">
									  <label class="col-md-5 control-label" for="prependedtext" >Mesa tecnicca</label>
									  <div class="col-md-6">
									        <div class="ver" ><p><?=$reunions->mesatecnica_nom_mta?></p></div>
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">RIF</label>
									  <div class="col-md-6">
										<div class="ver"><p><?=$reunions->mesatecnica_tiporifmta?>-<?=$reunions->mesatecnica_rifmta?></p></div>
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Consejo Comunal</label>
									  	<div class="col-md-6">
 											<div class="ver" ><p><?=$reunions->mesatecnica_consejocomunal_nombrecc?></p></div>
 										</div>
									</div>
								</div>
								<div class="col-md-6" style="background-color:;padding:0px;">
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Estado</label>
									  <div class="col-md-6">
 										<div class="ver" ><p><?=validarEntrada($reunions->mesatecnica_estado_nom_est)?></p></div>  
									  </div>
									</div>
									
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Municipio</label>
									  <div class="col-md-6">
									    <div class="ver" ><p><?=validarEntrada($reunions->mesatecnica_municipio_nom_mun)?></p></div> 
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Sector</label>
									  <div class="col-md-6">
									    <div class="ver" ><p><?=validarEntrada($reunions->mesatecnica_sector_nom_sec)?></p></div> 
									  </div>
									</div>
								</div>
							</div>
								
							<div class="row ajuste" align="center" style="background-color:#f4f4f4;margin-top:15px;">
								<div align="center" style="margin-top:10px;">
									<p class="titform">Datos de la Minuta</p>
									<hr style="border-color:rgba(0,0,0,0.1);width:80%;margin-top:0px;">
								</div>
								<!-- Prepended text-->
								<div class="form-group" style="padding:5px;">
									<div class="row ajuste" align="center">
										<div class="col-md-8" align="left" style="float:none;background-color:;overflow:hidden;">
										  <label class="col-md-12 text-center" for="prependedtext" style="margin-left:10px;">Objetivo de la presente Reunion</label>
										</div>
									</div>  
									<div class="row ajuste" align="center">
										<div class="col-md-8" align="left" style="float:none;background-color:;overflow:hidden;">
											<div class="col-md-12" align="left">
									        	<div class="ver" ><p>- <?=$reunions->objetivo?></p></div>
									    	</div>
									    </div>
									</div>
									
								</div>
								<!-- Prepended text-->
								<div class="form-group" style="padding:5px;">
									<div class="row ajuste" align="center">
										<div class="col-md-8" align="left" style="float:none;background-color:;overflow:hidden;">
										  <label class="col-md-12 text-center" for="prependedtext" style="margin-left:10px;">Lugar del encuentro</label>
										</div>
									</div>  
									<div class="row ajuste" align="center">
										<div class="col-md-8" align="left" style="float:none;background-color:;overflow:hidden;">
											<div class="col-md-12" align="left">
									        	<div class="ver" ><p>- <?=$reunions->lugar?></p></div>
									    	</div>
									    </div>
									</div>
								</div>
								<!-- Prepended text-->
								<div class="form-group" style="padding:5px;">
									<div class="row ajuste" align="center">
										<div class="col-md-8" align="left" style="float:none;background-color:;overflow:hidden;">
										  <label class="col-md-12 text-center" for="prependedtext" style="margin-left:10px;">Por participacion social</label>
										</div>
									</div>  
									<div class="row ajuste" align="center">
										<div class="col-md-8" align="left" style="float:none;background-color:;overflow:hidden;">
											<div class="col-md-12" align="left">
									        	<div class="ver" ><p>- <?=$reunions->participacion?></p></div>
									    	</div>
									    </div>
									</div>
								</div>
								<div class="col-md-6" align="left" style="background-color:;padding:0px;">
								
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Hora</label>
									  <div class="col-md-6">
											<div class="ver" ><p><?=$reunions->hora?></p></div>
									  </div>
									</div>
								</div>
								<div class="col-md-6" align="left" style="background-color:;padding:0px;">
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-4 control-label" for="textinput">Fecha</label>  
									  <div class="col-md-6" id="sandbox-container">
										  <div class="input-group date">
	  										<div class="ver" ><p><?=formatoFecha($reunions->fecha)?></p></div>
									  </div>
									</div>
								</div>
							</div>
							<div class="row ajuste" align="center" style="background-color:#f4f4f4;">
								<!-- Prepended text-->
								<div class="form-group" style="padding:5px;margin-top:10px;">
									<div class="row ajuste" align="center">
										<div class="col-md-8" align="left" style="float:none;background-color:;overflow:hidden;">
										  <label class="col-md-12 text-center" for="prependedtext" style="margin-left:10px;">Desarrollo y Conclusiones</label>
										</div>
									</div>  
									<div class="row ajuste" align="center">
										<div class="col-md-8" align="center" style="float:none;background-color:;overflow:hidden;">
											<div class="col-md-12" align="left">
									        	<div class="ver" ><p><?=$reunions->conclusiones?></p></div>
									    	</div>
									    </div>
									</div>
								</div>
							</div>
							<div class="row ajuste" align="center" style="background-color:#f4f4f4;padding-top:10px!important;">
								<!-- Textarea -->
								<div class="form-group" align="left" style="padding:5px;">
								  <label class="col-md-4 control-label" for="textarea">Compromiso(s)</label>
								  <div class="col-md-5">                     
								  		<div class="ver" ><p><?=$reunions->compromiso?></p></div>
								  </div>
								</div>
								<!-- Textarea -->
								<div class="form-group" align="left" style="padding:5px;">
								  <label class="col-md-4 control-label" for="textarea">Responasble(s)</label>
								  <div class="col-md-5">                     
								   	<div class="ver" ><p><?=$reunions->responsable?></p></div>
								  </div>
								</div>
								<!-- Text input-->
								<div class="form-group" align="left" style="padding:5px;">
								  <label class="col-md-4 control-label" for="textinput">Fecha de Compromiso</label>  
								  <div class="col-md-5" id="sandbox-container">
									<div class="ver" ><p><?=$reunions->fechacom?></p></div>
								  </div>
								</div>
							</div>
												<!--           DATOS PERSONA                -->

							<div class="row ajuste" align="center" style="background-color:#fff;">
								<div align="center" style="margin-top:10px;">
									<p class="titform">Asistencia</p>
									<hr style="border-color:rgba(0,0,0,0.1);width:80%;margin-top:0px;">
								</div>
								<div class="col-md-6" align="left" style="background-color:;padding:0px;">
									
									<!-- Prepended text-->
									<div class="form-group hide" id="per1" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Persona 1</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <div class="ver" ><p><?=$persona[0]['nombre']?></p></div>
									    </div>
									    
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group hide" id="asist1" style="padding:5px;padding-top:0px!important;margin-top:-15px!important;">
									  <label class="col-md-5 control-label" for="prependedtext">Total asist.</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <div class="ver" ><p><?=$persona[0]['asist']?> </p></div>
									    </div>
									    
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group hide" id="per2" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Persona 2</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <div class="ver"  ><p><?=$persona[1]['nombre']?></p></div>
									    </div>
									    
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group hide" id="asist2" style="padding:5px;padding-top:0px!important;margin-top:-15px!important;">
									  <label class="col-md-5 control-label" for="prependedtext">Total asist.</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <div class="ver" ><p><?=$persona[1]['asist']?> </p></div>
									    </div>
									    
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group hide" id="per3" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Persona 3</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <div class="ver" ><p><?=$persona[2]['nombre']?></p></div>
									    </div>
									    
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group hide" id="asist3" style="padding:5px;padding-top:0px!important;margin-top:-15px!important;">
									  <label class="col-md-5 control-label" for="prependedtext">Total asist.</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <div class="ver" ><p><?=$persona[2]['asist']?> </p></div>
									    </div>
									    
									  </div>
									</div>

									<!-- Prepended text-->
									<div class="form-group hide" id="per4" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Persona 4</label>
									  <div class="col-md-6">
									    <div class="input-group">
									       <div class="ver" ><p><?=$persona[3]['nombre']?></p></div>
									    </div>
									    
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group hide" id="asist4" style="padding:5px;padding-top:0px!important;margin-top:-15px!important;">
									  <label class="col-md-5 control-label" for="prependedtext">Total asist.</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <div class="ver" ><p><?=$persona[3]['asist']?> </p></div>
									    </div>
									    
									  </div>
									</div>
								</div>
								<div class="col-md-6" align="left" style="background-color:;padding:0px;">
									<!-- Prepended text-->
									<div class="form-group hide" id="per5" style="padding:5px;">
									  <label class="col-md-5 control-label" style="margin-top:-10px;" for="prependedtext">Persona 5</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <div class="ver" ><p><?=$persona[4]['nombre']?></p></div>
									    </div>
									    
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group hide" id="asist5" style="padding:5px;padding-top:0px!important;margin-top:-15px!important;">
									  <label class="col-md-5 control-label" for="prependedtext">Total asist.</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <div class="ver" ><p><?=$persona[4]['asist']?> </p></div>
									    </div>
									    
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group hide" id="per6" style="padding:5px;">
									  <label class="col-md-5 control-label" style="margin-top:-10px;" for="prependedtext">Persona 6</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <div class="ver" ><p><?=$persona[5]['nombre']?></p></div>
									    </div>
									    
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group hide" id="asist6" style="padding:5px;padding-top:0px!important;margin-top:-15px!important;">
									  <label class="col-md-5 control-label" for="prependedtext">Total asist.</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <div class="ver" ><p><?=$persona[5]['asist']?> </p></div>
									    </div>
									    
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group hide" id="per7" style="padding:5px;">
									  <label class="col-md-5 control-label" style="margin-top:-10px;" for="prependedtext">Persona 7</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <div class="ver" ><p><?=$persona[6]['nombre']?></p></div>
									    </div>
									    
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group hide" id="asist7" style="padding:5px;padding-top:0px!important;margin-top:-15px!important;">
									  <label class="col-md-5 control-label" for="prependedtext">Total asist.</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <div class="ver" ><p><?=$persona[6]['asist']?> </p></div>
									    </div>
									    
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group hide" id="per8" style="padding:5px;">
									  <label class="col-md-5 control-label" style="margin-top:-10px;" for="prependedtext">Persona 8</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <div class="ver" ><p><?=$persona[7]['nombre']?></p></div>
									    </div>
									    
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group hide" id="asist8" style="padding:5px;padding-top:0px!important;margin-top:-15px!important;">
									  <label class="col-md-5 control-label" for="prependedtext">Total asist.</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <div class="ver" ><p><?=$persona[7]['asist']?> </p></div>
									    </div>
									    
									  </div>
									</div>
									<script type="text/javascript">
										
										for (var i = 1; i <= <?=$id?>; i++) {
											//alert("#per"+i+' - '+<?=$id?>);
											$("#per"+i).removeClass("hide");
											$("#asist"+i).removeClass("hide");
										};
										
									</script>
								</div>
							</div>
							<div class="row ajuste" align="center" style="background-color:#f4f4f4;padding-top:10px!important;margin-top:10px!important;">
								
								<!-- Textarea -->
									<div class="form-group" align="left" style="padding:5px;">
									  <label class="col-md-4 control-label" for="textarea">Observaciones</label>
									  <div class="col-md-5">                     
									    <div class="ver" ><p><?=$reunions->observaciones?></p></div>
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
		window.location.href='<?=base_url()?>mta/reuniones/buscar';
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
	$("#x").attr({'href':'<?=base_url()?>mta/inicio'});

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
		window.location.href='<?=base_url();?>mta/reuniones/eliminar/'+id;
	}
 </script>
