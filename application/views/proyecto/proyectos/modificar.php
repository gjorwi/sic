											<!--             INICIO CUERPO DESARROLLO                   -->
					<div align="left">
						<?php
							if ($proyects->est_pro=="t" || $proyects->est_pro=="TRUE") {
								$estatusa="selected";
								$estatusi="";
							}else{
								$estatusa="";
								$estatusi="selected";
							}
							$tiempobd=$proyects->tiempo;
							$tiempo=explode(' ', $tiempobd);
							if ($tiempo[1]=='D') {
								$tiempod='selected';
								$tiempos='';
								$tiempom='';
							}elseif($tiempo[1]=='S'){
								$tiempod='';
								$tiempos='selected';
								$tiempom='';
							}else{
								$tiempod='';
								$tiempos='';
								$tiempom='selected';
							}
							if ($proyects->status=='EN EJECUCION') {
								$statusee='selected';
								$statuspe='';
								$statusej='';
								$statussu='';
							}elseif($proyects->status=='POR EJECUTAR'){
								$statusee='';
								$statuspe='selected';
								$statusej='';
								$statussu='';
							}elseif($proyects->status=='EJECUTADO'){
								$statusee='';
								$statuspe='';
								$statusej='selected';
								$statussu='';
							}else{
								$statusee='';
								$statuspe='';
								$statusej='';
								$statussu='selected';
							}
							$atributo=array('class'=>'form-horizontal','id'=>'regusu','autocomplete'=>"off");
						?>
						<?=form_open('proyecto/proyectos/modificar',$atributo) ?>
							<fieldset>

							<!-- Form Name -->
							<legend class="subtitform lineform" style=""><i class="fa fa-wrench iconform" style=""></i>Registro de Proyectos Comunitarios<a class="hide" id="vent"><i class="fa fa-warning " title="Informacion" id="vent2" style="cursor:pointer;text-shadow:-1px 1px 1px rgba(0,0,0,0.2);color:#F0C433;margin-left:10px;"> <span class="error" style="" id="vent3">Error, Click para Ver!</span></i></a></legend>

												<!--           DATOS EMPRESA                -->
							<div class="row ajuste" align="center" style="background-color:#fff;">
								<div align="center" style="margin-top:10px;">
									<p class="titform" >Datos de la Mesa Tecnica de Agua</p>
									<hr style="border-color:rgba(0,0,0,0.1);width:80%;margin-top:0px;">
								</div>
								<div class="col-md-6" align="left" style="background-color:;padding:0px;">
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext" >Mesa tecnicca</label>
									  <div class="col-md-6">
									        <input id="nom_mta" readonly maxlength="30" value="<?=$proyects->mesatecnica_nom_mta?>" name="nom_mta" class="form-control" type="text">
									    	<input type="hidden" id="mesatecnica_id" name="mesatecnica_id" value="<?=$proyects->mesatecnica_id?>">
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">RIF</label>
									  <div class="col-md-6">
									    <input id="rifmta" readonly maxlength="9" value="<?=$proyects->mesatecnica_tiporifmta?>-<?=$proyects->mesatecnica_rifmta?>" name="rifmta" class="form-control" type="text">
									    
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Consejo Comunal</label>
									  <div class="col-md-6">
									    <input id="ccomunal" readonly name="ccomunal" class="form-control" value="<?=$proyects->mesatecnica_consejocomunal_nombrecc?>" type="text">
									    <span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);"><br><br></span>
									  </div>
									</div>
								</div>
								<div class="col-md-6" style="background-color:;padding:0px;">
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Estado</label>
									  <div class="col-md-6">
									    <input id="estado" readonly name="estado" class="form-control" value="<?=validarEntrada($proyects->mesatecnica_estado_nom_est)?>" type="text">
									    
									  </div>
									</div>
									
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Municipio</label>
									  <div class="col-md-6">
									    <input id="municipio" readonly name="municipio" class="form-control" value="<?=validarEntrada($proyects->mesatecnica_municipio_nom_mun)?>" type="text">
									    
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Sector</label>
									  <div class="col-md-6">
									    <input id="sector" readonly name="sector" class="form-control" value="<?=validarEntrada($proyects->mesatecnica_sector_nom_sec)?>" type="text">
									    
									  </div>
									</div>
								</div>
							</div>
												<!--           DATOS PERSONA                -->

							<div class="row ajuste" align="center" style="background-color:#f4f4f4;">
								<div align="center" style="margin-top:10px;">
									<p class="titform">Datos del Sistema y Subsistema</p>
									<hr style="border-color:rgba(0,0,0,0.1);width:80%;margin-top:0px;">
								</div>
								<div class="col-md-6" align="left" style="background-color:;padding:0px;">
									
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Sistema</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <input id="sistema" readonly maxlength="30" value="<?=$proyects->sistema_nom_sis?>" name="sistema" class="form-control" type="text">
									    	<span class="input-group-addon" id="sistemasearch"  style="cursor:pointer;background-color:white;border-radius:0px 5px 5px 0px;"><i class="fa fa-search"></i></span>
									    	<input type="hidden" id="sistema_id" name="sistema_id" value="<?=$proyects->sistema_id?>">
									    </div>
									    <span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Debe elegir un <strong>Sistema</strong>.</span>
									  </div>
									</div>
									
								</div>
								<div class="col-md-6" align="left" style="background-color:;padding:0px;">
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" style="margin-top:-10px;" for="prependedtext">Subsistema</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <input id="subsistema" readonly maxlength="30" value="<?=$proyects->subsistema_nom_sub?>" name="subsistema" class="form-control" type="text">
									    	<span class="input-group-addon" id="subsistemasearch" style="cursor:pointer;background-color:white;border-radius:0px 5px 5px 0px;"><i class="fa fa-search"></i></span>
									    	<input type="hidden" id="subsistema_id" name="subsistema_id" value="<?=$proyects->subsistema_id?>">
									    </div>
									    <span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Debe elegir una <strong>Persona</strong>.</span>
									  </div>
									</div>

								</div>
							</div>
							<div class="row ajuste" align="center" style="background-color:#fff;">
								<div align="center" style="margin-top:10px;">
									<p class="titform" >Datos de la Empresa</p>
									<hr style="border-color:rgba(0,0,0,0.1);width:80%;margin-top:0px;">
								</div>
								<div class="col-md-6" style="background-color:;padding:0px;">
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext" >Razon</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <input id="razon" readonly maxlength="30" value="<?=$proyects->empresa_razon?>" name="razon" class="form-control" type="text">
									    	<span class="input-group-addon" id="empresasearch" style="cursor:pointer;background-color:white;border-radius:0px 5px 5px 0px;"><i class="fa fa-search"></i></span>
									    	<input type="hidden" id="empresa_id" name="empresa_id" value="<?=$proyects->empresa_id?>">
									    </div>
									    <span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Debe elegir una <strong>Empresa</strong>.</span>
									  </div>
									</div>
									
								</div>
								<div class="col-md-6" style="background-color:;padding:0px;">
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">RIF</label>
									  <div class="col-md-6">
									    <input id="rif" readonly maxlength="9" name="rif" class="form-control" value="<?=$proyects->empresa_tiporif?>-<?=$proyects->empresa_rif?>" type="text">
									  </div>
									</div>
									
								</div>
							
							</div>
							<div class="row ajuste" align="center" style="background-color:#f4f4f4;margin-top:15px;">
								<div align="center" style="margin-top:10px;">
									<p class="titform">Datos del Proyecto</p>
									<hr style="border-color:rgba(0,0,0,0.1);width:80%;margin-top:0px;">
								</div>
								<div class="col-md-6" align="left" style="background-color:;padding:0px;">
								
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Nombre</label>
									  <div class="col-md-6">
									        <input id="nom_proyect1" readonly maxlength="30" value="<?=$proyects->nom_proyect?>" name="nom_proyect" class="form-control" type="text">
									        <input id="id" maxlength="30" value="<?=$proyects->id?>" name="id" class="form-control" type="hidden">
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Costo</label>
									  <div class="col-md-6">
									        <input id="costo" readonly maxlength="20" value="<?=revertirMonto($proyects->costo)?>" name="costo" class="form-control" type="text">
									    <span class="help-block" style="font-size:11px;color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Permitido solo <strong>Montos</strong>.</span>
									  </div>
									</div>
								</div>
								<div class="col-md-6" align="left" style="background-color:;padding:0px;">
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="textinput">Fecha</label>  
									  <div class="col-md-6" id="sandbox-container">
	  										<input id="fecha" readonly type="text"  value="<?=date('d-m-Y',strtotime($proyects->fecha))?>" placeholder="01-01-2016" name="fecha" class="form-control">
										  <span class="help-block" style="font-size:11px;color:rgba(0,0,0,0.3);display:block;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Elija una <strong>Fecha</strong>.</span>
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;padding-top:0px;">
										<div class="row ajuste">
										  <label class="col-md-5 control-label" for="prependedtext">Tiempo de ejecucion</label>
										  <div class="col-md-6" >
										  	<div class="col-md-5 tiempoa" style="padding:0px;padding-right:10px;">
										        <input id="tiempoa" readonly maxlength="2" value="<?=$tiempo[0]?>" name="tiempoa" class="form-control" min="1" step="1" type="number">
										    	<input id="tiempob" value="<?=$tiempo[1]?>" name="tiempob" class="form-control" type="hidden">
										    </div>  
										    <div class="col-md-7 tiempob" style="padding:0px;padding-left:5px;">
										    	<select id="aaa" style="font-size:12px;" disabled name="aaa" class="form-control">
											      <option selected value="D" <?=$tiempod?> >Dia</option>
											      <option value="S" <?=$tiempos?> >Semana</option>
											      <option value="M" <?=$tiempom?> >Mes</option>
											    </select>
										    </div>
										    <span class="help-block" style="font-size:11px;color:rgba(0,0,0,0.3);display:block;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Permitido solo <strong>números</strong>.</span>
										  </div>
									  	</div>
									  
									</div>

									
								</div>
							</div>
							<div class="row ajuste" align="center" style="background-color:#f4f4f4;">
								<!-- Textarea -->
								<div class="form-group" align="left" style="padding:5px;">
								  <label class="col-md-4 control-label" for="textarea">Problema</label>
								  <div class="col-md-5">                     
								    <textarea class="form-control" style="resize: none" readonly id="problema" value="" placeholder="Ej. Calle Polita de Lima casa 5-A" name="problema"><?=$proyects->problema?></textarea>
								  </div>
								</div>
								<!-- Textarea -->
								<div class="form-group" align="left" style="padding:5px;">
								  <label class="col-md-4 control-label" for="textarea">Diagnostico</label>
								  <div class="col-md-5">                     
								    <textarea class="form-control" style="resize: none" readonly id="diagnostico" value="" placeholder="Ej. Calle Polita de Lima casa 5-A" name="diagnostico"><?=$proyects->diagnostico?></textarea>
								  	<span class="help-block" style="font-size:11px;color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Este campo es opcional.</span>
								  </div>
								</div>
								<!-- Textarea -->
								<div class="form-group" align="left" style="padding:5px;">
								  <label class="col-md-4 control-label" for="textarea">Descripcion</label>
								  <div class="col-md-5">                     
								    <textarea class="form-control" style="resize: none" readonly id="descripcion" value="" placeholder="Ej. Calle Polita de Lima casa 5-A" name="descripcion"><?=$proyects->descripcion?></textarea>
								  	<span class="help-block" style="font-size:11px;color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Este campo es opcional.</span>
								  </div>
								</div>
								<!-- Textarea -->
								<div class="form-group" align="left" style="padding:5px;">
								  <label class="col-md-4 control-label" for="textarea">Beneficios</label>
								  <div class="col-md-5">                     
								    <textarea class="form-control" style="resize: none" readonly id="beneficios" value="" placeholder="Ej. Calle Polita de Lima casa 5-A" name="beneficio"><?=$proyects->beneficio?></textarea>
								  	<span class="help-block" style="font-size:11px;color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Este campo es opcional.</span>
								  </div>
								</div>
								<!-- Select Basic -->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-4 control-label" for="selectbasic">Estado del Proyecto</label>
									  <div class="col-md-5">
									    <select id="status" readonly name="status" class="form-control">
									      <option selected value="EN EJECUCION" <?=$statusee?> >EN EJECUCION</option>
									      <option value="POR EJECUTAR" <?=$statuspe?> >POR EJECUTAR</option>
									      <option value="EJECUTADO" <?=$statusej?> >EJECUTADO</option>
									      <option value="PARALIZADO" <?=$statussu?> >PARALIZADO</option>
									    </select>
									  </div>
									</div>
								<!-- Prepended text-->
								
							</div>
							
							
							<div class="row ajuste" align="center" style="background-color:#fff;padding-top:10px!important;margin-top:10px!important;">
								<!-- Prepended text-->
									<div class="form-group" style="padding:5px;" align="center">
									  <label class="col-md-4 control-label" for="prependedtext">Nº Expediente (Documento físico)</label>
									  <div class="col-md-5" align="left">
									        <input id="exp_pro" readonly maxlength="100" value="<?=$proyects->exp_pro?>" name="exp_pro" class="form-control" type="text">
									    	<span class="help-block" style="font-size:11px;color:rgba(0,0,0,0.3);margin:0px;padding:0px;padding-top:3px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Permitido <strong>letras</strong> y <strong>Números</strong>.</span>
									  </div>
									</div>
								<!-- Select Basic -->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-4 control-label" for="selectbasic">Estatus</label>
									  <div class="col-md-5">
									    <select id="est_pro" readonly name="est_pro" class="form-control">
									      <option selected value="TRUE" <?php echo set_select('est_pro', 'TRUE', TRUE); ?>>Activo</option>
									      <option value="FALSE" <?php echo set_select('est_pro', 'FALSE'); ?>>Inactivo</option>
									    </select>
									  </div>
									</div>
								<!-- Textarea -->
									<div class="form-group" align="left" style="padding:5px;">
									  <label class="col-md-4 control-label" for="textarea">Observaciones</label>
									  <div class="col-md-5">                     
									    <textarea class="form-control" readonly id="observaciones" value="" placeholder="Ej. Calle Polita de Lima casa 5-A" name="observaciones"><?=$proyects->observaciones?></textarea>
									  	<span class="help-block" style="font-size:11px;color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Este campo es opcional.</span>
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
				<div class="alert alert-info" align="center" id="mensaje" style="margin:10px;">
					
				</div>
			</div>
		</div>
	</div>
</div>				
<div class="ventana" id="ventana3" style="position:fixed;">
	<div class="contventana" id="contven3" style="height:auto!important;">
		<div class="bannvent" align="center" style="border-radius:10px 10px 0px 0px;overflow:hidden;background-color:#f5f5f5;position:relative;z-index:10;">
			<h4 style="float:left;margin-left:10px;font-weight:600;color:#E73C4B;">Busqueda </h4>
			<a class="hide" id="ccomunalregistro" style="float:left;margin-top:10px;margin-left:20px;" href="<?=base_url()?>consejocomunal/consejoscomunales">Registrar Consejo Comunal</a>
			<i class="fa fa-remove fa-lg" style="cursor:pointer;margin-top:10px;margin-right:10px;color:rgba(0,0,0,0.4);float:right;" id="cerr3"></i>
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
<div class="ventana" id="ventana4" style="position:fixed;">
	<div class="contventana" id="contven2" style="margin-top:130px;">
		<div class="bannvent" align="center" style="border-radius:10px 10px 0px 0px;overflow:hidden;background-color:#f5f5f5;position:relative;z-index:10;">
			<h4 style="float:left;margin-left:10px;font-weight:600;color:#E73C4B;">Informacion </h4><i class="fa fa-remove fa-lg" style="cursor:pointer;margin-top:10px;margin-right:10px;color:rgba(0,0,0,0.4);float:right;" id="cerr4"></i>
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
		window.location.href='<?=base_url()?>proyecto/proyectos/buscar';
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
	function regresar(reg){
		if (reg=='') {
			$("#costo").val(reg);
			$("#costo").css({'border-color':'red'});
		}else{
			$("#costo").val(reg);
			$("#costo").css({'border-color':'rgba(0,0,0,0.1)'});
		};
	}
	function format(){
		var valcosto=$("#costo").val();
		if(valcosto.indexOf('.') != -1)
		{
		  var valcosto=valcosto.replace(/\./g, '');
		  if (valcosto.indexOf(',') != -1) {
		  	var valcosto=valcosto.replace(/\,/g, '.');
		  	var totaldecimal=parseFloat(valcosto).toFixed(2);
		  	var separar=totaldecimal.split('.');
		  	//alert("coma");
		  	if (!isFinite(separar[0]) || isNaN(separar[0] = parseFloat(separar[0])) || !isFinite(separar[1]) || isNaN(separar[1] = parseFloat(separar[1]))) {
		  		//alert("no numerico");
		  		regresar('');
		  	}else{
		  		//alert("numerico");
		  		
		  		var separar=totaldecimal.split('.');
		  		var countfor=separar[0].split('');
		  		var cantidad=countfor.length;

		  		//alert(cantidad);
			  	if (cantidad>=4) {
			  		//alert("entro");
			  		var partes=cantidad%3;
			  		//alert(partes);
			  		if (partes==0) {
			  			partes=(cantidad/3)-1;
			  			partes=parseInt(partes);
			  		}else{
			  			partes=cantidad/3;
			  			partes=parseInt(partes);
			  		};
			  		//alert(partes);
			  		var person = [];
			  		posicion=cantidad;
			  		for(var j=0;j<partes;j++){
			  			posicion=posicion-3;
			  			//alert(posicion);
						person[j] = posicion;
			  		};
			  		j=j-1;
			  		//alert(person[j]-1);
			  		var numero='';
			  		for(i=0;i<cantidad;i++){
			  			var pos=person[j]-1;
			  			//alert(i+"<->"+pos);
			  			if (i==pos) {
			  				//alert("entro en el punto");
			  				numero+=''+countfor[i]+'.';
			  				j--;
			  			}else{
			  				numero+=''+countfor[i];
			  			};	
			  			//alert(numero);
			  		};
			  		var completo=numero+','+separar[1];
			  		regresar(completo);
			  	}else{
			  		var completo=separar[0]+','+separar[1];
			  		regresar(completo);
			  	};
		  	};
		  	
		  }else{
		  	var valcosto=valcosto.replace(/\,/g, '.');
		  	var totaldecimal=parseFloat(valcosto).toFixed(2);
		  	var separar=totaldecimal.split('.');
		  	//alert("coma");
		  	if (!isFinite(separar[0]) || isNaN(separar[0] = parseFloat(separar[0])) || !isFinite(separar[1]) || isNaN(separar[1] = parseFloat(separar[1]))) {
		  		//alert("no numerico");
		  		regresar('');
		  	}else{
		  		//alert("numerico");
		  		
		  		var separar=totaldecimal.split('.');
		  		var countfor=separar[0].split('');
		  		var cantidad=countfor.length;

		  		//alert(cantidad);
			  	if (cantidad>=4) {
			  		//alert("entro");
			  		var partes=cantidad%3;
			  		//alert(partes);
			  		if (partes==0) {
			  			partes=(cantidad/3)-1;
			  			partes=parseInt(partes);
			  		}else{
			  			partes=cantidad/3;
			  			partes=parseInt(partes);
			  		};
			  		//alert(partes);
			  		var person = [];
			  		posicion=cantidad;
			  		for(var j=0;j<partes;j++){
			  			posicion=posicion-3;
			  			//alert(posicion);
						person[j] = posicion;
			  		};
			  		j=j-1;
			  		//alert(person[j]-1);
			  		var numero='';
			  		for(i=0;i<cantidad;i++){
			  			var pos=person[j]-1;
			  			//alert(i+"<->"+pos);
			  			if (i==pos) {
			  				//alert("entro en el punto");
			  				numero+=''+countfor[i]+'.';
			  				j--;
			  			}else{
			  				numero+=''+countfor[i];
			  			};	
			  			//alert(numero);
			  		};
			  		var completo=numero+','+separar[1];
			  		regresar(completo);
			  	}else{
			  		var completo=separar[0]+','+separar[1];
			  		regresar(completo);
			  	};
		  	};
		  };
	
		}else{
			if (valcosto.indexOf(',') != -1) {
				var valcosto=valcosto.replace(/\,/g, '.');
			  	var totaldecimal=parseFloat(valcosto).toFixed(2);
			  	var separar=totaldecimal.split('.');
			  	//alert("coma");
			  	if (!isFinite(separar[0]) || isNaN(separar[0] = parseFloat(separar[0])) || !isFinite(separar[1]) || isNaN(separar[1] = parseFloat(separar[1]))) {
			  		//alert("no numerico");
			  		regresar('');
			  	}else{
			  		//alert("numerico");
			  		
			  		var separar=totaldecimal.split('.');
			  		var countfor=separar[0].split('');
			  		var cantidad=countfor.length;

			  		//alert(cantidad);
				  	if (cantidad>=4) {
				  		//alert("entro");
				  		var partes=cantidad%3;
				  		//alert(partes);
				  		if (partes==0) {
				  			partes=(cantidad/3)-1;
				  			partes=parseInt(partes);
				  		}else{
				  			partes=cantidad/3;
				  			partes=parseInt(partes);
				  		};
				  		//alert(partes);
				  		var person = [];
				  		posicion=cantidad;
				  		for(var j=0;j<partes;j++){
				  			posicion=posicion-3;
				  			//alert(posicion);
							person[j] = posicion;
				  		};
				  		j=j-1;
				  		//alert(person[j]-1);
				  		var numero='';
				  		for(i=0;i<cantidad;i++){
				  			var pos=person[j]-1;
				  			//alert(i+"<->"+pos);
				  			if (i==pos) {
				  				//alert("entro en el punto");
				  				numero+=''+countfor[i]+'.';
				  				j--;
				  			}else{
				  				numero+=''+countfor[i];
				  			};	
				  			//alert(numero);
				  		};
				  		var completo=numero+','+separar[1];
				  		regresar(completo);
				  	}else{
				  		var completo=separar[0]+','+separar[1];
				  		regresar(completo);
				  	};
			  	};
			}else{
				var valcosto=valcosto.replace(/\,/g, '.');
			  	var totaldecimal=parseFloat(valcosto).toFixed(2);
			  	var separar=totaldecimal.split('.');
			  	//alert("coma");
			  	if (!isFinite(separar[0]) || isNaN(separar[0] = parseFloat(separar[0])) || !isFinite(separar[1]) || isNaN(separar[1] = parseFloat(separar[1]))) {
			  		//alert("no numerico");
			  		regresar('');
			  	}else{
			  		//alert("numerico");
			  		
			  		var separar=totaldecimal.split('.');
			  		var countfor=separar[0].split('');
			  		var cantidad=countfor.length;

			  		//alert(cantidad);
				  	if (cantidad>=4) {
				  		//alert("entro");
				  		var partes=cantidad%3;
				  		//alert(partes);
				  		if (partes==0) {
				  			partes=(cantidad/3)-1;
				  			partes=parseInt(partes);
				  		}else{
				  			partes=cantidad/3;
				  			partes=parseInt(partes);
				  		};
				  		//alert(partes);
				  		var person = [];
				  		posicion=cantidad;
				  		for(var j=0;j<partes;j++){
				  			posicion=posicion-3;
				  			//alert(posicion);
							person[j] = posicion;
				  		};
				  		j=j-1;
				  		//alert(person[j]-1);
				  		var numero='';
				  		for(i=0;i<cantidad;i++){
				  			var pos=person[j]-1;
				  			//alert(i+"<->"+pos);
				  			if (i==pos) {
				  				//alert("entro en el punto");
				  				numero+=''+countfor[i]+'.';
				  				j--;
				  			}else{
				  				numero+=''+countfor[i];
				  			};	
				  			//alert(numero);
				  		};
				  		var completo=numero+','+separar[1];
				  		regresar(completo);
				  	}else{
				  		var completo=separar[0]+','+separar[1];
				  		regresar(completo);
				  	};
			  	};
			};
		}
	}
	function formatoNumero(numero, decimales, separadorDecimal, separadorMiles) {
		//alert(numero);
    var partes, array;

    if ( !isFinite(numero) || isNaN(numero = parseFloat(numero)) ) {
        return "";
    }
    if (typeof separadorDecimal==="undefined") {
        separadorDecimal = ",";
    }
    if (typeof separadorMiles==="undefined") {
        separadorMiles = "";
    }

    // Redondeamos
    if ( !isNaN(parseInt(decimales)) ) {
        if (decimales >= 0) {
            numero = numero.toFixed(decimales);
        } else {
            numero = (
                Math.round(numero / Math.pow(10, Math.abs(decimales))) * Math.pow(10, Math.abs(decimales))
            ).toFixed();
        }
    } else {
        numero = numero.toString();
    }

    // Damos formato
    partes = numero.split(".", 2);
    array = partes[0].split("");
    for (var i=array.length-3; i>0 && array[i-1]!=="-"; i-=3) {
        array.splice(i, 0, separadorMiles);
    }
    numero = array.join("");

    if (partes.length>1) {
        numero += separadorDecimal + partes[1];
    }

    return numero;
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
		if (id==="ventana2" || id==="cerr2") {
			$("#ventana2").fadeOut();
		};
		if (id==="ventana3" || id==="cerr3") {
			$("#ventana3").fadeOut();
			$('.remove-tr').remove();
			$("#btnsector").addClass("hide");
			$("#ccomunalregistro").addClass("hide");
		};
		if (id==="ventana4" || id==="cerr4" || id==="cerrbtn") {
			$("#ventana4").fadeOut();
		};
	});
	function tog(valor){
		$("#children"+valor).toggle();
	}
	$("#cerrar").removeClass("hide");
	$("#menprin").removeClass("hide");
	$("#x").css({'cursor':'pointer'});
	$("#x").attr({'href':'<?=base_url()?>proyecto/inicio'});


</script>
<script>
  $('#sandbox-container .input-group.date').datepicker({
    format: "dd-mm-yyyy",
    language: "es",
    autoclose: true,
    todayHighlight: true
	})
  function guardar(){
  	//var persona=$("#personati3_id").val();
  	//alert(persona);
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
	$(document).ready(function(){
		$("#mesatecnicasearch").attr("onclick","buscar_varios('mesatecnica')");
		var nombremta=$("#nom_mta").val();
		var ssistema=$("#sistema").val();
		if (nombremta!="") {

			$("#status").removeAttr("readonly");
			$("#est_pro").removeAttr("readonly");
			$("#observaciones").removeAttr("readonly");
		};

		

	});
	function buscar_varios(buscar){
		//alert(buscar);
		if (buscar=="mesatecnica") {
			var url1="mta_busqueda";
		};
		if (buscar=="empresa") {
			var url1="empresa_busqueda";
		};
		if (buscar=="sistema") {
			var url1="sistema_busqueda";
		};
		if (buscar=="subsistema") {
			var sistemaid=$("#sistema_id").val();
			var url1="subsistema_busqueda";
		};
		//alert(url1+" - "+id);
		$.ajax({
		url : "<?=base_url()?>jquery/"+url1,
		type: "POST",
		data : {valor:'TRUE',sistema_id:sistemaid},
		success: function(data, textStatus, jqXHR)
		{
			//alert(data);
			obj = jQuery.parseJSON( data );
			var count=obj.id.length;
			//alert(count);
			$('.remove-tr').remove();
			if (buscar=="mesatecnica") {
				
				$('.cf thead').append('<tr class="remove-tr"><th>Rif</th><th>Nombre</th><th>C. Comunal</th><th>Municipio</th><th>Accion</th></tr>');
				//alert("hola");
				for (i=0;i<count;i++){
					//alert(i);
					$('.cf tbody').append('<tr class="remove-tr"><td data-title="Rif">'+obj.tiporifmta[i]+"-"+obj.rifmta[i]+'<input type="hidden" id="buscar'+i+'" value="'+buscar+'"><input type="hidden" id="idmta'+i+'" value="'+obj.id[i]+'"><input type="hidden" id="rifmtam'+i+'" value="'+obj.rifmta[i]+'"><input type="hidden" id="tiporifmtam'+i+'" value="'+obj.tiporifmta[i]+'"></td><td data-title="Nombre">'+obj.nom_mta[i]+'<input type="hidden" id="nombremtam'+i+'" value="'+obj.nom_mta[i]+'"></td><td data-title="C. Comunal">'+obj.consejocomunal[i]+'<input type="hidden" id="nombreccm'+i+'" value="'+obj.consejocomunal[i]+'"></td><td data-title="Municipio">'+obj.municipio[i]+'<input type="hidden" id="municipiom'+i+'" value="'+obj.municipio[i]+'"><input type="hidden" id="estadom'+i+'" value="'+obj.estado[i]+'"><input type="hidden" id="sectorm'+i+'" value="'+obj.sector[i]+'"></td><td data-title="Accion" align="center"><button class="btn btn-success" onclick="setear('+i+')">agregar</button></td></tr>');
		   		}
			};
			if (buscar=="empresa") {
				
				$('.cf thead').append('<tr class="remove-tr"><th>Rif</th><th>Razon</th><th>Telefono</th><th>Accion</th></tr>');
				//alert("hola");
				for (i=0;i<count;i++){
					//alert(i);
					$('.cf tbody').append('<tr class="remove-tr"><td data-title="Rif">'+obj.tiporif[i]+"-"+obj.rif[i]+'<input type="hidden" id="buscar'+i+'" value="'+buscar+'"><input type="hidden" id="idemp'+i+'" value="'+obj.id[i]+'"><input type="hidden" id="rifm'+i+'" value="'+obj.rif[i]+'"><input type="hidden" id="tiporifm'+i+'" value="'+obj.tiporif[i]+'"></td><td data-title="Razon">'+obj.razon[i]+'<input type="hidden" id="razonm'+i+'" value="'+obj.razon[i]+'"></td><td data-title="Telefono">'+obj.telefonoh[i]+'</td><td data-title="Accion" align="center"><button class="btn btn-success" onclick="setear('+i+')">agregar</button></td></tr>');
		   		}
			};
			if (buscar=="sistema") {
				
				$('.cf thead').append('<tr class="remove-tr"><th>Codigo</th><th>Sistema</th><th>Accion</th></tr>');
				//alert("hola");
				for (i=0;i<count;i++){
					//alert(i);
					$('.cf tbody').append('<tr class="remove-tr"><td data-title="Codigo">'+obj.id[i]+'<input type="hidden" id="buscar'+i+'" value="'+buscar+'"><input type="hidden" id="idsis'+i+'" value="'+obj.id[i]+'"></td><td data-title="Sistema">'+obj.nom_sis[i]+'<input type="hidden" id="nom_sism'+i+'" value="'+obj.nom_sis[i]+'"></td><td data-title="Accion" align="center"><button class="btn btn-success" onclick="setear('+i+')">agregar</button></td></tr>');
		   		}
			};
			if (buscar=="subsistema") {
				
				$('.cf thead').append('<tr class="remove-tr"><th>Codigo</th><th>Subsistema</th><th>Accion</th></tr>');
				//alert("hola");
				for (i=0;i<count;i++){
					//alert(i);
					$('.cf tbody').append('<tr class="remove-tr"><td data-title="Codigo">'+obj.id[i]+'<input type="hidden" id="buscar'+i+'" value="'+buscar+'"><input type="hidden" id="idsub'+i+'" value="'+obj.id[i]+'"></td><td data-title="Subsistema">'+obj.nom_sub[i]+'<input type="hidden" id="nom_subm'+i+'" value="'+obj.nom_sub[i]+'"></td><td data-title="Accion" align="center"><button class="btn btn-success" onclick="setear('+i+')">agregar</button></td></tr>');
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
		if (buscar=="mesatecnica") {
			var tiporifmta=$("#tiporifmtam"+id).val();
			var rifmta=$("#rifmtam"+id).val();
			var nombremta=$("#nombremtam"+id).val();
			var nombrecc=$("#nombreccm"+id).val();
			var municipio=$("#municipiom"+id).val();
			var idmta=$("#idmta"+id).val();
			var estado=$("#estadom"+id).val();
			var sector=$("#sectorm"+id).val();
			$("#rifmta").val(tiporifmta+"-"+rifmta);
			$("#nom_mta").val(nombremta);
			$("#municipio").val(municipio);
			$("#mesatecnica_id").val(idmta);
			$("#ccomunal").val(nombrecc);
			$("#estado").val(estado);
			$("#sector").val(sector);
			$("#empresasearch").attr("onclick","buscar_varios('empresa')");
			$("#razon").css({'background-color':'white'});
			$("#sistemasearch").attr("onclick","buscar_varios('sistema')");
			$("#sistema").css({'background-color':'white'});
			$("#nom_proyect").removeAttr("readonly");
			$("#tiempoa").removeAttr("readonly");
			$("#tiempob").removeAttr("disabled");
			$("#fecha").removeAttr("readonly");
			$("#costo").removeAttr("readonly");
			$("#problema").removeAttr("readonly");
			$("#diagnostico").removeAttr("readonly");
			$("#beneficios").removeAttr("readonly");
			$("#descripcion").removeAttr("readonly");
			$("#status").removeAttr("readonly");
			$("#organizacion").removeAttr("readonly");
			$("#est_pro").removeAttr("readonly");
			$("#observaciones").removeAttr("readonly");

			$("#ventana3").fadeOut();
			$('.remove-tr').remove();
		};	
		if (buscar=="empresa") {
			var empresa=$("#razonm"+id).val();
			var idemp=$("#idemp"+id).val();
			var rifemp=$("#rifm"+id).val();
			var tiporifemp=$("#tiporifm"+id).val();
			//alert(empresa+" - "+idemp);
			$("#empresa_id").val(idemp);
			$("#razon").val(empresa);
			$("#rif").val(tiporifemp+'-'+rifemp);

			$("#ventana3").fadeOut();
			$('.remove-tr').remove();
		};
		if (buscar=="sistema") {
			var sistema=$("#nom_sism"+id).val();
			var idsis=$("#idsis"+id).val();
			//alert(empresa+" - "+idemp);
			$("#sistema_id").val(idsis);
			$("#sistema").val(sistema);
			$("#subsistemasearch").attr("onclick","buscar_varios('subsistema')");
			$("#subsistema").css({'background-color':'white'});
			$("#subsistema").val('');
			$("#ventana3").fadeOut();
			$('.remove-tr').remove();

		};
		if (buscar=="subsistema") {
			var subsistema=$("#nom_subm"+id).val();
			var idsub=$("#idsub"+id).val();
			//alert(empresa+" - "+idemp);
			$("#subsistema_id").val(idsub);
			$("#subsistema").val(subsistema);
			$("#ventana3").fadeOut();
			$('.remove-tr').remove();
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
	function pregunta(){
		$("#ventana4").fadeIn();	
	}
	function eliminar(){
		var id=$("#id").val();
		//alert(id);
		window.location.href='<?=base_url();?>proyecto/proyectos/eliminar/'+id;
	}
 </script>
