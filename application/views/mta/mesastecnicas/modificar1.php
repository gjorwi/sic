											<!--             INICIO CUERPO DESARROLLO                   -->
					<div align="left">
						<?php
							if ($mesatecnicas->est_mes=="t" || $mesatecnicas->est_mes=="TRUE") {
								$estatusa="selected";
								$estatusi="";
							}else{
								$estatusa="";
								$estatusi="selected";
							}

							$atributo=array('class'=>'form-horizontal','id'=>'regusu','autocomplete'=>"off");
						?>
						<?=form_open('mta/mesastecnicas/modificar',$atributo) ?>
							<fieldset>

							<!-- Form Name -->
							<legend class="subtitform lineform" style=""><i class="fa fa-tint iconform" style=""></i>Registro de Mesas tecnicas de agua<a class="hide" id="vent"><i class="fa fa-warning " title="Informacion" id="vent2" style="cursor:pointer;text-shadow:-1px 1px 1px rgba(0,0,0,0.2);color:#F0C433;margin-left:10px;"> <span class="error" style="" id="vent3">Error, Click para Ver!</span></i></a></legend>

												<!--           DATOS EMPRESA                -->

							<div class="row ajuste" style="background-color:#fff;">
								<div align="center" style="margin-top:10px;">
									<p class="titform" >Datos del Consejo Comunal</p>
									<hr style="border-color:rgba(0,0,0,0.1);width:80%;margin-top:0px;">
								</div>
								<div class="col-md-6" style="background-color:;padding:0px;">
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext" >Consejo Comunal</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <input id="nombrecc" readonly maxlength="30" value="<?=$mesatecnicas->consejocomunal_nombrecc?>" name="nombrecc" class="form-control" type="text">
									    	<span class="input-group-addon" id="consejocomunalsearch"  style="cursor:pointer;background-color:white;border-radius:0px 5px 5px 0px;"><i class="fa fa-search"></i></span>
									    	<input type="hidden" id="consejocomunal_id" name="consejocomunal_id" value="<?=$mesatecnicas->consejocomunal_id?>">
									    </div>
									    <span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Debe elegir un <strong>Consejo Comunal</strong>.</span>
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">RIF</label>
									  <div class="col-md-6">
									    <input id="rifcc" readonly maxlength="9" onkeyup="control()" value="<?=$mesatecnicas->consejocomunal_tiporifcc?>-<?=$mesatecnicas->consejocomunal_rifcc?>" name="rifcc" class="form-control" type="text">
									    <span class="help-block" style="font-size:11px;color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Permitido solo <strong>números</strong>.</span>
									  </div>
									</div>
								</div>
								<div class="col-md-6" style="background-color:;padding:0px;">
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="textinput">Primer vocero</label>  
									  <div class="col-md-6">
									  <input id="personacc1" readonly value="<?=$mesatecnicas->consejocomunal_personacc1?>" name="personacc1" type="text" placeholder="Ej. Pedro Perez" class="form-control input-md">
									  </div>
									</div>
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="textinput">Segundo vocero</label>  
									  <div class="col-md-6">
									  <input id="personacc2" readonly maxlength="12" value="<?=$mesatecnicas->consejocomunal_personacc2?>" name="personacc2" type="text" placeholder="Ej. Ramon Jose" class="form-control input-md">
									  </div>
									</div>
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="textinput">Tercer Vocero</label>  
									  <div class="col-md-6">
									  <input id="personacc3" readonly maxlength="12" value="<?=$mesatecnicas->consejocomunal_personacc3?>" name="personacc3" type="text" placeholder="Ej. Javier medina" class="form-control input-md">
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
									    
									        <input id="estado" readonly maxlength="30" value="<?=validarEntrada($mesatecnicas->estado_nom_est)?>" name="estado" class="form-control" type="text">
				
									    <span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Debe elegir un <strong>Estado</strong>.</span>
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Municipio</label>
									  <div class="col-md-6">
									  
									        <input id="municipio" readonly maxlength="30" value="<?=validarEntrada($mesatecnicas->municipio_nom_mun)?>" name="municipio" class="form-control" type="text">
		
									    <span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Debe elegir un <strong>Municipio</strong>.</span>
									  </div>
									</div>
								</div>
								<div class="col-md-6" align="left" style="background-color:;padding:0px;">
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Parroquia</label>
									  <div class="col-md-6">
								
									        <input id="parroquia" readonly maxlength="30" value="<?=validarEntrada($mesatecnicas->parroquia_nom_par)?>" name="parroquia" class="form-control" type="text">
		
								
									    <span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Debe elegir una <strong>Parroquia</strong>.</span>
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Sector</label>
									  <div class="col-md-6">
									
									        <input id="sector" readonly maxlength="30" value="<?=validarEntrada($mesatecnicas->sector_nom_sec)?>" name="sector" class="form-control" type="text">
						
									    <span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Debe elegir un <strong>Sector</strong>.</span>
									  </div>
									</div>
								</div>
							</div>

												<!--           DATOS PERSONA                -->

							<div class="row ajuste" align="center" style="background-color:#f4f4f4;margin-top:15px;">
								<div align="center" style="margin-top:10px;">
									<p class="titform">Datos de la Mesa Tecnica</p>
									<hr style="border-color:rgba(0,0,0,0.1);width:80%;margin-top:0px;">
								</div>
								<div class="col-md-6" align="left" style="background-color:;padding:0px;">
									
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">RIF</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <input id="vistarifmta" readonly maxlength="9" onkeyup="control()" value="<?=$mesatecnicas->tiporifmta?>-<?=$mesatecnicas->rifmta?>" name="vistarif" class="form-control" type="text">
									        <input id="rifmta" readonly maxlength="9" onkeyup="control()" value="<?=$mesatecnicas->rifmta?>" name="rifmta" class="form-control" type="hidden">
									        <input id="tiporifmta" readonly maxlength="9" onkeyup="control()" value="<?=$mesatecnicas->tiporifmta?>" name="tiporifmta" class="form-control" type="hidden">
									    	<span class="input-group-addon" id="check" style="cursor:pointer;padding-left:4px;padding-right:4px;" ><div id="btnch" style="font-size:11px;">Check</div></span>
									    </div>
									    <span class="help-block" style="font-size:11px;color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Permitido solo <strong>números</strong>.</span>
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Nombre</label>
									  <div class="col-md-6">
							
									        <input id="nom_mta" readonly maxlength="30" value="<?=$mesatecnicas->nom_mta?>" name="nom_mta" class="form-control" type="text">
									        <input id="id" readonly maxlength="30" value="<?=$mesatecnicas->id?>" name="id" class="form-control" type="hidden">
									    	
											
									    <span class="help-block" style="font-size:11px;color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Permitido solo <strong>letras</strong>.</span>
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Nº de Cuenta</label>
									  <div class="col-md-6">
							
									        <input id="num_cuenta" readonly maxlength="20" value="<?=$mesatecnicas->num_cuenta?>" name="num_cuenta" class="form-control" type="text">
									    	
								
									    <span class="help-block" style="font-size:11px;color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Permitido solo <strong>números</strong>.</span>
									  </div>
									</div>
									<!-- Prepended text-->
									<!--
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Empresa</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <input id="empresa" readonly maxlength="30" value="<?= set_value('empresa')?>" name="empresa" class="form-control" type="text">
									    	<span class="input-group-addon" id="empresasearch" style="cursor:pointer;background-color:white;border-radius:0px 5px 5px 0px;"><i class="fa fa-search"></i></span>
									    	<input type="hidden" id="empresa_id" name="empresa_id" value="<?= set_value('empresa_id')?>">
									    </div>
									    <span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Debe elegir un Empresa.</span>
									  </div>
									</div>
									-->
								</div>
								<div class="col-md-6" align="left" style="background-color:;padding:0px;">
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="textinput">Fecha de conformacion</label>  
									  <div class="col-md-6" id="sandbox-container">
				
	  										<input disabled type="text"  value="<?=date('d-m-Y',strtotime($mesatecnicas->fechaconform))?>" placeholder="01-01-2016" name="vistafechaconform" class="form-control">
										  	<input id="fechaconform" type="hidden"  value="<?=date('d-m-Y',strtotime($mesatecnicas->fechaconform))?>" placeholder="01-01-2016" name="fechaconform" class="form-control">
							
									  </div>
									</div>
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="textinput">Fecha de Reestructuracion</label>  
									  <div class="col-md-6" id="sandbox-container">
										  <div class="input-group date">
	  										<input id="fecharestruct" readonly type="text"  value="<?=$mesatecnicas->fecharestruct?>" placeholder="01-01-2016" name="fecharestruct" class="form-control"><span class="input-group-addon" style="cursor:pointer;background-color:white;"><i class="fa fa-calendar"></i></span>
										  </div>
									  </div>
									</div>
									
								</div>
							</div>
												<!--           DATOS PERSONA                -->

							<div class="row ajuste" align="center" style="background-color:#f4f4f4;">
								<div align="center" style="margin-top:10px;">
									<p class="titform">Datos de Representantes M.T.A</p>
									<hr style="border-color:rgba(0,0,0,0.1);width:80%;margin-top:0px;">
								</div>
								<div class="col-md-6" align="left" style="background-color:;padding:0px;">
									<?php
									$cont=0;
										foreach ($mesatecnicas as $row) {
											$persona['nomti'.$cont][$cont]=$row->persona_nombres;
											$persona['apeti'.$cont][$cont]=$row->persona_apellidos;
											$persona['idti'.$cont][$cont]=$row->persona_id;
											$cont++;
										}
									?>
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Agua potable y Saneamiento</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <input id="personati1" readonly maxlength="30" value="<?=$persona['nomti0'][0]?> <?=$persona['apeti0'][0]?>" name="personati1" class="form-control" type="text">
									    	<span class="input-group-addon" id="personati1search"  style="cursor:pointer;background-color:white;border-radius:0px 5px 5px 0px;"><i class="fa fa-search"></i></span>
									    	<input type="hidden" id="personati1_id" name="personati1_id" value="<?=$persona['idti0'][0]?>">
									    </div>
									    <span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Debe elegir una <strong>Persona</strong>.</span>
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Administracion y Finanza</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <input id="personati2" readonly maxlength="30" value="<?=$persona['nomti1'][1]?> <?=$persona['apeti1'][1]?>" name="personati2" class="form-control" type="text">
									    	<span class="input-group-addon" id="personati2search" style="cursor:pointer;background-color:white;border-radius:0px 5px 5px 0px;"><i class="fa fa-search"></i></span>
									    	<input type="hidden" id="personati2_id" name="personati2_id" value="<?=$persona['idti1'][1]?>">
									    </div>
									    <span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Debe elegir una <strong>Persona</strong>.</span>
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Contraloria social</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <input id="personati3" readonly maxlength="30" value="<?=$persona['nomti2'][2]?> <?=$persona['apeti2'][2]?>" name="personati3" class="form-control" type="text">
									    	<span class="input-group-addon" id="personati3search" style="cursor:pointer;background-color:white;border-radius:0px 5px 5px 0px;"><i class="fa fa-search"></i></span>
									    	<input type="hidden" id="personati3_id" name="personati3_id" value="<?=$persona['idti2'][2]?>">
									    </div>
									    <span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Debe elegir una <strong>Persona</strong>.</span>
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Educacion ambiental</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <input id="personati4" readonly maxlength="30" value="<?=$persona['nomti3'][3]?> <?=$persona['apeti3'][3]?>" name="personati4" class="form-control" type="text">
									    	<span class="input-group-addon" id="personati4search" style="cursor:pointer;background-color:white;border-radius:0px 5px 5px 0px;"><i class="fa fa-search"></i></span>
									    	<input type="hidden" id="personati4_id" name="personati4_id" value="<?=$persona['idti3'][3]?>">
									    </div>
									    <span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Debe elegir una <strong>Persona</strong>.</span>
									  </div>
									</div>
								</div>
								<div class="col-md-6" align="left" style="background-color:;padding:0px;">
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" style="margin-top:-10px;" for="prependedtext">Suplente <span style="color:rgba(0,0,0,0.5);">Agua potable y Saneamiento</span></label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <input id="personasup1" readonly maxlength="30" value="<?=$persona['nomti4'][4]?> <?=$persona['apeti4'][4]?>" name="personasup1" class="form-control" type="text">
									    	<span class="input-group-addon" id="personasup1search" style="cursor:pointer;background-color:white;border-radius:0px 5px 5px 0px;"><i class="fa fa-search"></i></span>
									    	<input type="hidden" id="personasup1_id" name="personasup1_id" value="<?=$persona['idti4'][4]?>">
									    </div>
									    <span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Debe elegir una <strong>Persona</strong>.</span>
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" style="margin-top:-10px;" for="prependedtext">Suplente <span style="color:rgba(0,0,0,0.5);">Administracion y Finanza</span></label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <input id="personasup2" readonly maxlength="30" value="<?=$persona['nomti5'][5]?> <?=$persona['apeti5'][5]?>" name="personasup2" class="form-control" type="text">
									    	<span class="input-group-addon" id="personasup2search" style="cursor:pointer;background-color:white;border-radius:0px 5px 5px 0px;"><i class="fa fa-search"></i></span>
									    	<input type="hidden" id="personasup2_id" name="personasup2_id" value="<?=$persona['idti5'][5]?>">
									    </div>
									    <span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Debe elegir una <strong>Persona</strong>.</span>
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" style="margin-top:-10px;" for="prependedtext">Suplente <span style="color:rgba(0,0,0,0.5);">Contraloria social</span></label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <input id="personasup3" readonly maxlength="30" value="<?=$persona['nomti6'][6]?> <?=$persona['apeti6'][6]?>" name="personasup3" class="form-control" type="text">
									    	<span class="input-group-addon" id="personasup3search" style="cursor:pointer;background-color:white;border-radius:0px 5px 5px 0px;"><i class="fa fa-search"></i></span>
									    	<input type="hidden" id="personasup3_id" name="personasup3_id" value="<?=$persona['idti6'][6]?>">
									    </div>
									    <span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Debe elegir una <strong>Persona</strong>.</span>
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" style="margin-top:-10px;" for="prependedtext">Suplente <span style="color:rgba(0,0,0,0.5);">Educacion ambienta</span></label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <input id="personasup4" readonly maxlength="30" value="<?=$persona['nomti7'][7]?> <?=$persona['apeti7'][7]?>" name="personasup4" class="form-control" type="text">
									    	<span class="input-group-addon" id="personasup4search" style="cursor:pointer;background-color:white;border-radius:0px 5px 5px 0px;"><i class="fa fa-search"></i></span>
									    	<input type="hidden" id="personasup4_id" name="personasup4_id" value="<?=$persona['idti7'][7]?>">
									    </div>
									    <span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Debe elegir una <strong>Persona</strong>.</span>
									  </div>
									</div>

								</div>
							</div>
												<!--           DATOS PERSONA                -->
							<!-- 
							<div class="row ajuste" align="center" style="background-color:#f4f4f4;">
								<div align="center" style="margin-top:10px;">
									<p class="titform">Datos del Sistema</p>
									<hr style="border-color:rgba(0,0,0,0.1);width:80%;margin-top:0px;">
								</div>
								<div class="col-md-6" align="left" style="background-color:;padding:0px;">
								
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Sistema</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <input id="sistema" readonly maxlength="30" value="<?= set_value('sistema')?>" name="sistema" class="form-control" type="text">
									    	<span class="input-group-addon" id="sistemasearch" style="cursor:pointer;background-color:white;border-radius:0px 5px 5px 0px;"><i class="fa fa-search"></i></span>
									    	<input type="hidden" id="sistema_id" name="sistema_id" value="<?= set_value('sistema_id')?>">
									    </div>
									    <span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Debe elegir un Empresa.</span>
									  </div>
									</div>
								</div>
								<div class="col-md-6" align="left" style="background-color:;padding:0px;">
									
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Subsistema</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <input id="subsistema" readonly maxlength="30" value="<?= set_value('subsistema')?>" name="subsistema" class="form-control" type="text">
									    	<span class="input-group-addon" id="subsistemasearch" style="cursor:pointer;background-color:white;border-radius:0px 5px 5px 0px;"><i class="fa fa-search"></i></span>
									    	<input type="hidden" id="subsistema_id" name="subsistema_id" value="<?= set_value('subsistema_id')?>">
									    </div>
									    <span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Debe elegir un Empresa.</span>
									  </div>
									</div>
								</div>
							</div>
							-->
								<!-- Select Basic -->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-4 control-label" for="selectbasic">Estatus</label>
									  <div class="col-md-5">
									    <select id="est_mes" readonly name="est_mes" class="form-control">
									      <option selected value="TRUE" <?php echo set_select('est_mes', 'TRUE', TRUE); ?>>Activo</option>
									      <option value="FALSE" <?php echo set_select('est_mes', 'FALSE'); ?>>Inactivo</option>
									    </select>
									  </div>
									</div>
								<!-- Textarea -->
									<div class="form-group" align="left" style="padding:5px;">
									  <label class="col-md-4 control-label" for="textarea">Observaciones</label>
									  <div class="col-md-5">                     
									    <textarea class="form-control" readonly id="observaciones" value="" placeholder="Ej. Calle Polita de Lima casa 5-A" name="observaciones"><?= set_value('observaciones')?></textarea>
									  	<span class="help-block" style="font-size:11px;color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Este campo es opcional.</span>
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
			<a id="ccomunalregistro" style="float:left;margin-top:10px;margin-left:20px;" href="<?=base_url()?>consejocomunal/consejoscomunales">Registrar Consejo Comunal</a>
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
		window.location.href='<?=base_url()?>mta/mesastecnicas/buscar';
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
	$("#x").attr({'href':'<?=base_url()?>mta/inicio'});


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
	$("#tiporifmta").change(function(){
		//alert("cambió!");
		var valor=$("#tiporifmta").val();
		if (valor!="") {
			$("#rifmta").removeAttr("readonly");
			$("#check").attr("onclick","verificar()");
		}else{
			$("#rifmta").attr("readonly","readonly");
			$("#check").attr("onclick","");
			$("#nom_mta").attr("readonly","readonly");
			$("#num_cuenta").attr("readonly","readonly");
			$("#personati1search").attr("onclick","");
			$("#personati2search").attr("onclick","");
			$("#personati3search").attr("onclick","");
			$("#personati4search").attr("onclick","");
			$("#personasup1search").attr("onclick","");
			$("#personasup2search").attr("onclick","");
			$("#personasup3search").attr("onclick","");
			$("#personasup4search").attr("onclick","");
			$("#est_mes").attr("readonly","readonly");
			$("#observaciones").attr("readonly","readonly");
		};
	});
	var count=$("#rif").val();
	$(document).ready(function(){
		$("#consejocomunalsearch").attr("onclick","buscar_varios('consejocomunal')");
		var nombrecomunal=$("#nombrecc").val();
		var tiprif=$("#tiporifmta").val();
		var mta=$("#rifmta").val();
		if (nombrecomunal!="") {
			$("#tiporifmta").removeAttr("disabled");
			if (tiprif!="") {
				$("#rifmta").removeAttr("readonly");
				$("#check").attr("onclick","verificar()");
				if (mta!="") {
					$("#nom_mta").removeAttr("readonly");
					$("#num_cuenta").removeAttr("readonly");
					$("#personati1search").attr("onclick","buscar_varios('personati1')");
					$("#personati2search").attr("onclick","buscar_varios('personati2')");
					$("#personati3search").attr("onclick","buscar_varios('personati3')");
					$("#personati4search").attr("onclick","buscar_varios('personati4')");
					$("#personasup1search").attr("onclick","buscar_varios('personasup1')");
					$("#personasup2search").attr("onclick","buscar_varios('personasup2')");
					$("#personasup3search").attr("onclick","buscar_varios('personasup3')");
					$("#personasup4search").attr("onclick","buscar_varios('personasup4')");
					$("#personati1").css({'background-color':'white'});
					$("#personati2").css({'background-color':'white'});
					$("#personati3").css({'background-color':'white'});
					$("#personati4").css({'background-color':'white'});
					$("#personasup1").css({'background-color':'white'});
					$("#personasup2").css({'background-color':'white'});
					$("#personasup3").css({'background-color':'white'});
					$("#personasup4").css({'background-color':'white'});
					$("#fechaconform").css({'background-color':'white'});
					$("#fecharestruct").css({'background-color':'white'});
					$("#est_mes").removeAttr("readonly");
					$("#observaciones").removeAttr("readonly");
				};
			};
		};

		

	});
		
	function control(){
		$("#check").css({'background-color':'rgba(0,0,0,0.03)','color':'#444','font-size':'12px'});
	    $("#btnch").html("Check");
    	$("#personati1search").attr("onclick","");
		$("#personati2search").attr("onclick","");
		$("#personati3search").attr("onclick","");
		$("#personati4search").attr("onclick","");
		$("#personasup1search").attr("onclick","");
		$("#personasup2search").attr("onclick","");
		$("#personasup3search").attr("onclick","");
		$("#personasup4search").attr("onclick","");
		$("#nom_mta").attr("readonly","readonly");
		$("#num_cuenta").attr("readonly","readonly");
		$("#est_mes").attr("readonly","readonly");
		$("#observaciones").attr("readonly","readonly");
		$("#personati1").css({'background-color':'rgba(0,0,0,0.03)'});
		$("#personati2").css({'background-color':'rgba(0,0,0,0.03)'});
		$("#personati3").css({'background-color':'rgba(0,0,0,0.03)'});
		$("#personati4").css({'background-color':'rgba(0,0,0,0.03)'});
		$("#personasup1").css({'background-color':'rgba(0,0,0,0.03)'});
		$("#personasup2").css({'background-color':'rgba(0,0,0,0.03)'});
		$("#personasup3").css({'background-color':'rgba(0,0,0,0.03)'});
		$("#personasup4").css({'background-color':'rgba(0,0,0,0.03)'});
		$("#fechaconform").css({'background-color':'rgba(0,0,0,0.03)'});
		$("#fecharestruct").css({'background-color':'rgba(0,0,0,0.03)'});
	
	}
	function buscar_varios(buscar){
		//alert(buscar);
		if (buscar=="consejocomunal") {
			var url1="ccomunal_busqueda";
			$("#ccomunalregistro").removeClass("hide");
		};
		if (buscar=="personati1" || buscar=="personati2" || buscar=="personati3" || buscar=="personati4" || buscar=="personasup1" || buscar=="personasup2" || buscar=="personasup3" || buscar=="personasup4") {
			var url1="persona_busqueda";
		};
		if (buscar=="empresa") {
			var url1="empresa_busqueda";
		};
		if (buscar=='sistema') {
			var url1="sistema_busqueda";
		};
		if (buscar=='subsistema') {

			var idsis=$("#sistema_id").val();
			//alert(idsis);
			var url1="subsistema_busqueda";
		};
		//alert(url1+" - "+id);
		$.ajax({
		url : "<?=base_url()?>jquery/"+url1,
		type: "POST",
		data : {valor:'TRUE',sistema_id:idsis},
		success: function(data, textStatus, jqXHR)
		{
			//alert(data);
			obj = jQuery.parseJSON( data );
			var count=obj.id.length;
			//alert(count);
			$('.remove-tr').remove();
			if (buscar=="consejocomunal") {
				
				$('.cf thead').append('<tr class="remove-tr"><th>Rif</th><th>Nombre</th><th>Municipio</th><th>Accion</th></tr>');
				//alert("hola");
				for (i=0;i<count;i++){
					//alert(i);
					$('.cf tbody').append('<tr class="remove-tr"><td data-title="Rif">'+obj.tiporifcc[i]+"-"+obj.rifcc[i]+'<input type="hidden" id="buscar'+i+'" value="'+buscar+'"><input type="hidden" id="rifccm'+i+'" value="'+obj.rifcc[i]+'"><input type="hidden" id="tiporifccm'+i+'" value="'+obj.tiporifcc[i]+'"></td><td data-title="Nombre">'+obj.nombrecc[i]+'<input type="hidden" id="nombreccm'+i+'" value="'+obj.nombrecc[i]+'"></td><td data-title="Municipio">'+obj.nom_mun[i]+'<input type="hidden" id="municipiom'+i+'" value="'+obj.nom_mun[i]+'"></td><td data-title="Accion" align="center"><button class="btn btn-success" onclick="setear('+i+')">agregar</button></td></tr>');
		   			$('.cf tbody').append('<input class="remove-tr" type="hidden" value="'+obj.personacc1[i]+'" id="personacc1m'+i+'">');
		   			$('.cf tbody').append('<input class="remove-tr" type="hidden" value="'+obj.personacc2[i]+'" id="personacc2m'+i+'">');
		   			$('.cf tbody').append('<input class="remove-tr" type="hidden" value="'+obj.personacc3[i]+'" id="personacc3m'+i+'">');
		   			$('.cf tbody').append('<input class="remove-tr" type="hidden" value="'+obj.nom_est[i]+'" id="nom_estm'+i+'">');
		   			$('.cf tbody').append('<input class="remove-tr" type="hidden" value="'+obj.nom_par[i]+'" id="nom_parm'+i+'">');
		   			$('.cf tbody').append('<input class="remove-tr" type="hidden" value="'+obj.nom_sec[i]+'" id="nom_secm'+i+'">');
		   			$('.cf tbody').append('<input class="remove-tr" type="hidden" value="'+obj.id[i]+'" id="idm'+i+'">');
		   		}
			};
			if (buscar=="personati1" || buscar=="personati2" || buscar=="personati3" || buscar=="personati4" || buscar=="personasup1" || buscar=="personasup2" || buscar=="personasup3" || buscar=="personasup4") {
				
				$('.cf thead').append('<tr class="remove-tr"><th>Cedula</th><th>Nombre</th><th>Apellido</th><th>Accion</th></tr>');
				//alert("hola");
				for (i=0;i<count;i++){
					//alert(i);
					$('.cf tbody').append('<tr class="remove-tr"><td data-title="Cedula">'+obj.cedula[i]+'<input type="hidden" id="buscar'+i+'" value="'+buscar+'"><input type="hidden" id="cedula'+i+'" value="'+obj.cedula[i]+'"><input type="hidden" id="idcedmodal'+i+'" value="'+obj.id[i]+'"></td><td data-title="Nombre">'+obj.nombres[i]+'<input type="hidden" id="nombres'+i+'" value="'+obj.nombres[i]+'"></td><td data-title="Apellidos">'+obj.apellidos[i]+'<input type="hidden" id="apellidos'+i+'" value="'+obj.apellidos[i]+'"></td><td data-title="Accion" align="center"><button class="btn btn-success" onclick="setear('+i+')">agregar</button></td></tr>');
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
		if (buscar=="consejocomunal") {
			var tiporifcc=$("#tiporifccm"+id).val();
			var rifcc=$("#rifccm"+id).val();
			var nombrecc=$("#nombreccm"+id).val();
			var estado=$("#nom_estm"+id).val();
			var municipio=$("#municipiom"+id).val();
			var parroquia=$("#nom_parm"+id).val();
			var sector=$("#nom_secm"+id).val();
			var personacc1=$("#personacc1m"+id).val();
			var personacc2=$("#personacc2m"+id).val();
			var personacc3=$("#personacc3m"+id).val();
			var idcomunal=$("#idm"+id).val();
			//alert(idcomunal);
			//alert(tiporifcc+"-"+rifcc+"-"+nombrecc+"-"+estado+"-"+municipio+"-"+parroquia+"-"+sector+"-"+personacc1+"-"+personacc2+"-"+personacc3);
			$("#rifcc").val(tiporifcc+rifcc);
			$("#nombrecc").val(nombrecc);
			$("#personacc1").val(personacc1);
			$("#personacc2").val(personacc2);
			$("#personacc3").val(personacc3);
			$("#estado").val(estado);
			$("#municipio").val(municipio);
			$("#parroquia").val(parroquia);
			$("#sector").val(sector);
			$("#consejocomunal_id").val(idcomunal);
			//alert($("#consejocomunal_id").val());
			$("#ventana3").fadeOut();
			$('.remove-tr').remove();
			$.ajax({
			url : "<?=base_url()?>jquery/mta_ccomunal",
			type: "POST",
			data : {ccomunal_id:idcomunal},
			success: function(data, textStatus, jqXHR)
			{
				//alert(data);
				if (data==1) {
					$("#mensaje").html('');
					$("#mensaje").append('<h4 style="font-size:14px;">Este consejo comunal ya posee una <strong>Mesa Tecnica</strong> asignada.</h4>');
					$("#ventana2").fadeIn();
					$("#tiporifmta").attr("disabled","disabled");
					$("#check").attr("onclick","");

				}else{
					$("#tiporifmta").removeAttr("disabled");
					$("#check").attr("onclick","");
				};
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
			    alert("error");
			}
			});
		};	
		if (buscar=="personati1" || buscar=="personati2" || buscar=="personati3" || buscar=="personati4" || buscar=="personasup1" || buscar=="personasup2" || buscar=="personasup3" || buscar=="personasup4") {
			var cedula=$("#cedula"+id).val();
			var idced=$("#idcedmodal"+id).val();
			var nombres=$("#nombres"+id).val();
			var apellidos=$("#apellidos"+id).val();
				$("#"+buscar+"_id").val(idced);
				$("#"+buscar+"").val(nombres+" "+apellidos);
				$("#ventana3").fadeOut();
				$('.remove-tr').remove();
				var idpersonati1=$("#personati1_id").val();
				var idpersonati2=$("#personati2_id").val();
				var idpersonati3=$("#personati3_id").val();
				var idpersonati4=$("#personati4_id").val();
				var idpersonasup1=$("#personasup1_id").val();
				var idpersonasup2=$("#personasup2_id").val();
				var idpersonasup3=$("#personasup3_id").val();
				var idpersonasup4=$("#personasup4_id").val();
				
				if (buscar=="personati1") {
					if (idpersonati1==idpersonati2 || idpersonati1==idpersonati3 || idpersonati1==idpersonati4) {
						$("#mensaje").html('');
						$("#mensaje").append('<h4 style="font-size:14px;">Este persona ya fue seleccionada.</h4>');
						$("#ventana2").fadeIn();
						$("#"+buscar).val("");
						$("#"+buscar+"_id").val("");
					};
					if (idpersonati1==idpersonasup1 || idpersonati1==idpersonasup2 || idpersonati1==idpersonasup3 || idpersonati1==idpersonasup4) {
						$("#mensaje").html('');
						$("#mensaje").append('<h4 style="font-size:14px;">Este persona ya fue seleccionada.</h4>');
						$("#ventana2").fadeIn();
						$("#"+buscar).val("");
						$("#"+buscar+"_id").val("");
					};
				};
				if (buscar=="personati2") {
					if (idpersonati2==idpersonati1 || idpersonati2==idpersonati3 || idpersonati2==idpersonati4) {
						$("#mensaje").html('');
						$("#mensaje").append('<h4 style="font-size:14px;">Este persona ya fue seleccionada.</h4>');
						$("#ventana2").fadeIn();
						$("#"+buscar).val("");
						$("#"+buscar+"_id").val("");
					};
					if (idpersonati2==idpersonasup1 || idpersonati2==idpersonasup2 || idpersonati2==idpersonasup3 || idpersonati2==idpersonasup4) {
						$("#mensaje").html('');
						$("#mensaje").append('<h4 style="font-size:14px;">Este persona ya fue seleccionada.</h4>');
						$("#ventana2").fadeIn();
						$("#"+buscar).val("");
						$("#"+buscar+"_id").val("");
					};
				};
				if (buscar=="personati3") {
					if (idpersonati3==idpersonati1 || idpersonati3==idpersonati2 || idpersonati3==idpersonati4) {
						$("#mensaje").html('');
						$("#mensaje").append('<h4 style="font-size:14px;">Este persona ya fue seleccionada.</h4>');
						$("#ventana2").fadeIn();
						$("#"+buscar).val("");
						$("#"+buscar+"_id").val("");
					};
					if (idpersonati3==idpersonasup1 || idpersonati3==idpersonasup2 || idpersonati3==idpersonasup3 || idpersonati3==idpersonasup4) {
						$("#mensaje").html('');
						$("#mensaje").append('<h4 style="font-size:14px;">Este persona ya fue seleccionada.</h4>');
						$("#ventana2").fadeIn();
						$("#"+buscar).val("");
						$("#"+buscar+"_id").val("");
					};
				};
				if (buscar=="personati4") {
					if (idpersonati4==idpersonati1 || idpersonati4==idpersonati2 || idpersonati4==idpersonati3) {
						$("#mensaje").html('');
						$("#mensaje").append('<h4 style="font-size:14px;">Este persona ya fue seleccionada.</h4>');
						$("#ventana2").fadeIn();
						$("#"+buscar).val("");
						$("#"+buscar+"_id").val("");
					};
					if (idpersonati4==idpersonasup1 || idpersonati4==idpersonasup2 || idpersonati4==idpersonasup3 || idpersonati4==idpersonasup4) {
						$("#mensaje").html('');
						$("#mensaje").append('<h4 style="font-size:14px;">Este persona ya fue seleccionada.</h4>');
						$("#ventana2").fadeIn();
						$("#"+buscar).val("");
						$("#"+buscar+"_id").val("");
					};
				};
				if (buscar=="personasup1") {
					if (idpersonasup1==idpersonasup2 || idpersonasup1==idpersonasup3 || idpersonasup1==idpersonasup4) {
						$("#mensaje").html('');
						$("#mensaje").append('<h4 style="font-size:14px;">Este persona ya fue seleccionada.</h4>');
						$("#ventana2").fadeIn();
						$("#"+buscar).val("");
						$("#"+buscar+"_id").val("");
					};
					if (idpersonasup1==idpersonati1 || idpersonasup1==idpersonati2 || idpersonasup1==idpersonati3 || idpersonasup1==idpersonati4) {
						$("#mensaje").html('');
						$("#mensaje").append('<h4 style="font-size:14px;">Este persona ya fue seleccionada.</h4>');
						$("#ventana2").fadeIn();
						$("#"+buscar).val("");
						$("#"+buscar+"_id").val("");
					};
				};
				if (buscar=="personasup2") {
					if (idpersonasup2==idpersonasup1 || idpersonasup2==idpersonasup3 || idpersonasup2==idpersonasup4) {
						$("#mensaje").html('');
						$("#mensaje").append('<h4 style="font-size:14px;">Este persona ya fue seleccionada.</h4>');
						$("#ventana2").fadeIn();
						$("#"+buscar).val("");
						$("#"+buscar+"_id").val("");
					};
					if (idpersonasup2==idpersonati1 || idpersonasup2==idpersonati2 || idpersonasup2==idpersonati3 || idpersonasup2==idpersonati4) {
						$("#mensaje").html('');
						$("#mensaje").append('<h4 style="font-size:14px;">Este persona ya fue seleccionada.</h4>');
						$("#ventana2").fadeIn();
						$("#"+buscar).val("");
						$("#"+buscar+"_id").val("");
					};
				};
				if (buscar=="personasup3") {
					if (idpersonasup3==idpersonasup1 || idpersonasup3==idpersonasup2 || idpersonasup3==idpersonasup4) {
						$("#mensaje").html('');
						$("#mensaje").append('<h4 style="font-size:14px;">Este persona ya fue seleccionada.</h4>');
						$("#ventana2").fadeIn();
						$("#"+buscar).val("");
						$("#"+buscar+"_id").val("");
					};
					if (idpersonasup3==idpersonati1 || idpersonasup3==idpersonati2 || idpersonasup3==idpersonati3 || idpersonasup3==idpersonati4) {
						$("#mensaje").html('');
						$("#mensaje").append('<h4 style="font-size:14px;">Este persona ya fue seleccionada.</h4>');
						$("#ventana2").fadeIn();
						$("#"+buscar).val("");
						$("#"+buscar+"_id").val("");
					};
				};
				if (buscar=="personasup4") {
					if (idpersonasup4==idpersonasup1 || idpersonasup4==idpersonasup2 || idpersonasup4==idpersonasup3) {
						$("#mensaje").html('');
						$("#mensaje").append('<h4 style="font-size:14px;">Este persona ya fue seleccionada.</h4>');
						$("#ventana2").fadeIn();
						$("#"+buscar).val("");
						$("#"+buscar+"_id").val("");
					};
					if (idpersonasup4==idpersonati1 || idpersonasup4==idpersonati2 || idpersonasup4==idpersonati3 || idpersonasup4==idpersonati4) {
						$("#mensaje").html('');
						$("#mensaje").append('<h4 style="font-size:14px;">Este persona ya fue seleccionada.</h4>');
						$("#ventana2").fadeIn();
						$("#"+buscar).val("");
						$("#"+buscar+"_id").val("");
					};
				};
				
		};
		if (buscar=="empresa") {
			var empresa=$("#razon"+id).val();
			var idemp=$("#idemp"+id).val();
			//alert(empresa+" - "+idemp);
			$("#empresa_id").val(idemp);
			$("#empresa").val(empresa);
			$("#ventana3").fadeOut();
			$('.remove-tr').remove();
		};
	}
	function verificar(){
		//alert("hola");
		var tip=$("#tiporifmta").val();
		var mta=$("#rifmta").val();
		//alert(mta);
		$.ajax({
		url : "<?=base_url()?>jquery/mta_unique",
		type: "POST",
		data : {rifmta:mta,tiporifmta:tip},
		success: function(data, textStatus, jqXHR)
		{
			//alert(data);
		    if (data==1) {
		    	$("#check").css({'background-color':'#E73C4B','color':'white','font-size':'11px'});
		    	$("#btnch").html("Registrado");
		    	$("#nom_mta").attr("readonly","readonly");
		    	$("#num_cuenta").attr("readonly","readonly");
		    	$("#personati1search").attr("onclick","");
				$("#personati2search").attr("onclick","");
				$("#personati3search").attr("onclick","");
				$("#personati4search").attr("onclick","");
				$("#personasup1search").attr("onclick","");
				$("#personasup2search").attr("onclick","");
				$("#personasup3search").attr("onclick","");
				$("#personasup4search").attr("onclick","");
				$("#est_mes").attr("readonly","readonly");
				$("#observaciones").attr("readonly","readonly");
		    }else{
		    	if (data==2) {
		    	$("#check").css({'background-color':'#6ECD62','color':'white','font-size':'10px'});
		    	$("#btnch").html("No Registrado");
		    	$("#nom_mta").removeAttr("readonly");
		    	$("#num_cuenta").removeAttr("readonly");
		    	$("#personati1search").attr("onclick","buscar_varios('personati1')");
				$("#personati2search").attr("onclick","buscar_varios('personati2')");
				$("#personati3search").attr("onclick","buscar_varios('personati3')");
				$("#personati4search").attr("onclick","buscar_varios('personati4')");
				$("#personasup1search").attr("onclick","buscar_varios('personasup1')");
				$("#personasup2search").attr("onclick","buscar_varios('personasup2')");
				$("#personasup3search").attr("onclick","buscar_varios('personasup3')");
				$("#personasup4search").attr("onclick","buscar_varios('personasup4')");
				$("#personati1").css({'background-color':'white'});
				$("#personati2").css({'background-color':'white'});
				$("#personati3").css({'background-color':'white'});
				$("#personati4").css({'background-color':'white'});
				$("#personasup1").css({'background-color':'white'});
				$("#personasup2").css({'background-color':'white'});
				$("#personasup3").css({'background-color':'white'});
				$("#personasup4").css({'background-color':'white'});
				$("#fechaconform").css({'background-color':'white'});
				$("#fecharestruct").css({'background-color':'white'});
				$("#est_mes").removeAttr("readonly");
				$("#observaciones").removeAttr("readonly");
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
		window.location.href='<?=base_url();?>mta/mesastecnicas/eliminar/'+id;
	}
 </script>
