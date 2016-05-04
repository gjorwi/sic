											<!--             INICIO CUERPO DESARROLLO                   -->
					<div align="left">
						<?php
							$atributo=array('class'=>'form-horizontal','id'=>'regusu','autocomplete'=>"off");
						?>
						<?=form_open('mta/reuniones/registrar',$atributo) ?>
							<fieldset>

							<!-- Form Name -->
							<legend class="subtitform lineform" style=""><i class="fa fa-file-text-o iconform" style=""></i>Registro de Recorrido Corto<a class="hide" id="vent"><i class="fa fa-warning " title="Informacion" id="vent2" style="cursor:pointer;text-shadow:-1px 1px 1px rgba(0,0,0,0.2);color:#F0C433;margin-left:10px;"> <span class="error" style="" id="vent3">Error, Click para Ver!</span></i></a></legend>

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
									    <div class="input-group">
									        <input id="nom_mta" readonly maxlength="30" value="<?= set_value('nom_mta')?>" name="nom_mta" class="form-control" type="text">
									    	<span class="input-group-addon" id="mesatecnicasearch" style="cursor:pointer;background-color:white;border-radius:0px 5px 5px 0px;"><i class="fa fa-search"></i></span>
									    	<input type="hidden" id="mesatecnica_id" name="mesatecnica_id" value="<?= set_value('mesatecnica_id')?>">
									    </div>
									    <span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Debe elegir una <strong>Mesa Tecnica</strong>.</span>
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">RIF</label>
									  <div class="col-md-6">
									    <input id="rifmta" readonly maxlength="9" value="<?= set_value('rifmta')?>" name="rifmta" class="form-control" type="text">
									    
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Consejo Comunal</label>
									  <div class="col-md-6">
									    <input id="ccomunal" readonly name="ccomunal" class="form-control" value="<?= set_value('ccomunal')?>" type="text">
									    <span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);"><br><br></span>
									  </div>
									</div>
								</div>
								<div class="col-md-6" style="background-color:;padding:0px;">
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Estado</label>
									  <div class="col-md-6">
									    <input id="estado" readonly name="estado" class="form-control" value="<?= set_value('estado')?>" type="text">
									    
									  </div>
									</div>
									
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Municipio</label>
									  <div class="col-md-6">
									    <input id="municipio" readonly name="municipio" class="form-control" value="<?= set_value('municipio')?>" type="text">
									    
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Sector</label>
									  <div class="col-md-6">
									    <input id="sector" readonly name="sector" class="form-control" value="<?= set_value('sector')?>" type="text">
									    
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
									        	<input id="objetivo" readonly maxlength="150"  value="<?= set_value('objetivo')?>" name="objetivo" class="form-control" type="text">
									    	</div>
									    </div>
									</div>
									<span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Permitido solo <strong>Letras</strong>.</span>
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
									        	<input id="lugar" readonly maxlength="150"  value="<?= set_value('lugar')?>" name="lugar" class="form-control" type="text">
									    	</div>
									    </div>
									</div>
									<span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Permitido solo <strong>Letras</strong>.</span>
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
									        	<input id="participacion" readonly maxlength="150"  value="<?= set_value('participacion')?>" name="participacion" class="form-control" type="text">
									    	</div>
									    </div>
									</div>
									<span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Permitido solo <strong>Letras</strong>.</span>
								</div>
								<div class="col-md-6" align="left" style="background-color:;padding:0px;">
								
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Hora</label>
									  <div class="col-md-6">
							
									        <input id="hora" readonly value="<?= set_value('hora')?>" placeholder="Ej. 14:30" onkeyup="mascara(this,':',patron,true)" onblur="mascara2(this)" maxlength="5" name="hora" class="form-control" type="text">
									    	
								
									    <span class="help-block" style="font-size:11px;color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Permitido solo <strong>números</strong> y formato 24 horas.</span>
									  </div>
									</div>
								</div>
								<div class="col-md-6" align="left" style="background-color:;padding:0px;">
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-4 control-label" for="textinput">Fecha</label>  
									  <div class="col-md-6" id="sandbox-container">
										  <div class="input-group date">
	  										<input id="fecha" readonly type="text" value="<?= set_value('fecha')?>" placeholder="01-01-2016" name="fecha" class="form-control"><span class="input-group-addon" style="cursor:pointer;background-color:white;"><i class="fa fa-calendar"></i></span>
										  </div>
										  <span class="help-block" style="font-size:11px;color:rgba(0,0,0,0.3);display:block;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Elija una <strong>Fecha</strong>.</span>
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
									        	<textarea class="form-control" style="resize: none" readonly id="conclusiones" value="" placeholder="Ej. Calle Polita de Lima casa 5-A" name="conclusiones"><?= set_value('conclusiones')?></textarea>
									    	</div>
									    	<span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Permitido solo <strong>Letras</strong>.</span>
									    </div>
									</div>
								</div>
							</div>
							<div class="row ajuste" align="center" style="background-color:#f4f4f4;padding-top:10px!important;">
								<!-- Textarea -->
								<div class="form-group" align="left" style="padding:5px;">
								  <label class="col-md-4 control-label" for="textarea">Compromiso(s)</label>
								  <div class="col-md-5">                     
								    <textarea class="form-control" style="resize: none" readonly id="compromiso" value="" placeholder="Ej. Calle Polita de Lima casa 5-A" name="compromiso"><?= set_value('compromiso')?></textarea>
								  	<span class="help-block" style="font-size:11px;color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Permitido solo <strong>Letras</strong>.</span>
								  </div>
								</div>
								<!-- Textarea -->
								<div class="form-group" align="left" style="padding:5px;">
								  <label class="col-md-4 control-label" for="textarea">Responasble(s)</label>
								  <div class="col-md-5">                     
								    <textarea class="form-control" style="resize: none" readonly id="responsable" value="" placeholder="Ej. Calle Polita de Lima casa 5-A" name="responsable"><?= set_value('responsable')?></textarea>
								  	<span class="help-block" style="font-size:11px;color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Permitido solo <strong>Letras</strong>.</span>
								  </div>
								</div>
								<!-- Text input-->
								<div class="form-group" style="padding:5px;">
								  <label class="col-md-4 control-label" for="textinput">Fecha de Compromiso</label>  
								  <div class="col-md-5" id="sandbox-container">
									  <div class="input-group date">
  										<input id="fechacom" readonly type="text"  value="<?= set_value('fechacom')?>" placeholder="01-01-2016" name="fechacom" class="form-control"><span class="input-group-addon" style="cursor:pointer;background-color:white;"><i class="fa fa-calendar"></i></span>
									  </div>
									  <span class="help-block" style="font-size:11px;color:rgba(0,0,0,0.3);display:block;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Elija una <strong>Fecha</strong>.</span>
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
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Persona 1</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <input id="personati1" readonly maxlength="30" value="<?= set_value('personati1')?>" name="personati1" class="form-control" type="text">
									    	<span class="input-group-addon" id="personati1search"  style="cursor:pointer;background-color:white;border-radius:0px 5px 5px 0px;"><i class="fa fa-search"></i></span>
									    	<input type="hidden" id="personati1_id" name="personati1_id" value="<?= set_value('personati1_id')?>">
									    </div>
									    <span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Debe elegir una <strong>Persona</strong>.</span>
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Persona 2</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <input id="personati2" readonly maxlength="30" value="<?= set_value('personati2')?>" name="personati2" class="form-control" type="text">
									    	<span class="input-group-addon" id="personati2search" style="cursor:pointer;background-color:white;border-radius:0px 5px 5px 0px;"><i class="fa fa-search"></i></span>
									    	<input type="hidden" id="personati2_id" name="personati2_id" value="<?= set_value('personati2_id')?>">
									    </div>
									    <span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Debe elegir una <strong>Persona</strong>.</span>
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Persona 3</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <input id="personati3" readonly maxlength="30" value="<?= set_value('personati3')?>" name="personati3" class="form-control" type="text">
									    	<span class="input-group-addon" id="personati3search" style="cursor:pointer;background-color:white;border-radius:0px 5px 5px 0px;"><i class="fa fa-search"></i></span>
									    	<input type="hidden" id="personati3_id" name="personati3_id" value="<?= set_value('personati3_id')?>">
									    </div>
									    <span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Debe elegir una <strong>Persona</strong>.</span>
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Persona 4</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <input id="personati4" readonly maxlength="30" value="<?= set_value('personati4')?>" name="personati4" class="form-control" type="text">
									    	<span class="input-group-addon" id="personati4search" style="cursor:pointer;background-color:white;border-radius:0px 5px 5px 0px;"><i class="fa fa-search"></i></span>
									    	<input type="hidden" id="personati4_id" name="personati4_id" value="<?= set_value('personati4_id')?>">
									    </div>
									    <span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Debe elegir una <strong>Persona</strong>.</span>
									  </div>
									</div>
								</div>
								<div class="col-md-6" align="left" style="background-color:;padding:0px;">
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" style="margin-top:-10px;" for="prependedtext">Persona 5</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <input id="personasup1" readonly maxlength="30" value="<?= set_value('personasup1')?>" name="personasup1" class="form-control" type="text">
									    	<span class="input-group-addon" id="personasup1search" style="cursor:pointer;background-color:white;border-radius:0px 5px 5px 0px;"><i class="fa fa-search"></i></span>
									    	<input type="hidden" id="personasup1_id" name="personasup1_id" value="<?= set_value('personasup1_id')?>">
									    </div>
									    <span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Debe elegir una <strong>Persona</strong>.</span>
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" style="margin-top:-10px;" for="prependedtext">Persona 6</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <input id="personasup2" readonly maxlength="30" value="<?= set_value('personasup2')?>" name="personasup2" class="form-control" type="text">
									    	<span class="input-group-addon" id="personasup2search" style="cursor:pointer;background-color:white;border-radius:0px 5px 5px 0px;"><i class="fa fa-search"></i></span>
									    	<input type="hidden" id="personasup2_id" name="personasup2_id" value="<?= set_value('personasup2_id')?>">
									    </div>
									    <span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Debe elegir una <strong>Persona</strong>.</span>
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" style="margin-top:-10px;" for="prependedtext">Persona 7</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <input id="personasup3" readonly maxlength="30" value="<?= set_value('personasup3')?>" name="personasup3" class="form-control" type="text">
									    	<span class="input-group-addon" id="personasup3search" style="cursor:pointer;background-color:white;border-radius:0px 5px 5px 0px;"><i class="fa fa-search"></i></span>
									    	<input type="hidden" id="personasup3_id" name="personasup3_id" value="<?= set_value('personasup3_id')?>">
									    </div>
									    <span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Debe elegir una <strong>Persona</strong>.</span>
									  </div>
									</div>
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" style="margin-top:-10px;" for="prependedtext">Persona 8</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <input id="personasup4" readonly maxlength="30" value="<?= set_value('personasup4')?>" name="personasup4" class="form-control" type="text">
									    	<span class="input-group-addon" id="personasup4search" style="cursor:pointer;background-color:white;border-radius:0px 5px 5px 0px;"><i class="fa fa-search"></i></span>
									    	<input type="hidden" id="personasup4_id" name="personasup4_id" value="<?= set_value('personasup4_id')?>">
									    </div>
									    <span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Debe elegir una <strong>Persona</strong>.</span>
									  </div>
									</div>

								</div>
							</div>
							<div class="row ajuste" align="center" style="background-color:#f4f4f4;padding-top:10px!important;margin-top:10px!important;">
								<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-4 control-label" for="prependedtext">Nº Expediente (Documento físico)</label>
									  <div class="col-md-5">
									        <input id="exp_reu" readonly maxlength="100" value="<?= set_value('exp_reu')?>" name="exp_reu" class="form-control" type="text">
									    	<span class="help-block" style="font-size:11px;color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Permitido <strong>letras</strong> y <strong>Números</strong>.</span>
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
							</div>
							</fieldset>
						</form>

					</div>
<div class="ventana" id="ventana2" style="position:fixed;">
	<div class="contventana" id="contven" style="margin-top:130px;">
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
	<div class="contventana" id="contven" style="height:auto!important;">
		<div class="bannvent" align="center" style="border-radius:10px 10px 0px 0px;overflow:hidden;background-color:#f5f5f5;position:relative;z-index:10;">
			<h4 class="subtitform" style="float:left;margin-left:10px;"><i class="fa fa-search iconform" ></i>Busqueda </h4>
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
				<hr class="lineform" style="width:90%;margin-bottom:5px;margin-top:5px;">
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
	function mascara2(f){
		var id=f.value;
		//alert(id);
		if (id.indexOf(':') != -1) {
			var sp=id.split(':');
			if (!isFinite(sp[0]) || isNaN(sp[0] = parseFloat(sp[0])) || !isFinite(sp[1]) || isNaN(sp[1] = parseFloat(sp[1]))) {
				f.value='';
			}else{
				if (sp[0]>24 || sp[1]>59) {
					f.value='';
				}else{
					if (sp[0]<10) {
						sp[0]='0'+sp[0];
					};
					if(sp[1]<10){
						sp[1]='0'+sp[1];
					};
					//alert("numero");
					f.value=sp[0]+':'+sp[1];
				};
			};
		}else{
			//alert("Sin punto");
			if (!isFinite(id) || isNaN(id = parseFloat(id))) {
				//alert("letra");
				f.value='';
			}else{
				if (id>24) {
					f.value='';
				}else{
					if (id<10) {
						id='0'+id;
					};
					//alert("numero");
					f.value=id+':00';
				};
				
			};
		};
		//alert(id);

	}
	var patron = new Array(2,2)
	function mascara(d,sep,pat,nums){
	if(d.valant != d.value){
		val = d.value
		largo = val.length
		val = val.split(sep)
		val2 = ''
		for(r=0;r<val.length;r++){
			val2 += val[r]	
		}
		if(nums){
			for(z=0;z<val2.length;z++){
				if(isNaN(val2.charAt(z))){
					letra = new RegExp(val2.charAt(z),"g")
					val2 = val2.replace(letra,"")
				}
			}
		}
		val = ''
		val3 = new Array()
		for(s=0; s<pat.length; s++){
			val3[s] = val2.substring(0,pat[s])
			val2 = val2.substr(pat[s])
		}
		for(q=0;q<val3.length; q++){
			if(q ==0){
				val = val3[q]
			}
			else{
				if(val3[q] != ""){
					val += sep + val3[q]
					}
			}
		}
		d.value = val
		d.valant = val
		}

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
	$(document).ready(function(){
		$("#mesatecnicasearch").attr("onclick","buscar_varios('mesatecnica')");
		var nombremta=$("#nom_mta").val();
		var ssistema=$("#sistema").val();
		if (nombremta!="") {
			$("#objetivo").removeAttr("readonly");
			$("#lugar").removeAttr("readonly");
			$("#participacion").removeAttr("readonly");
			$("#fecha").removeAttr("readonly");
			$("#hora").removeAttr("readonly");
			$("#exp_reu").removeAttr("readonly");
			$("#conclusiones").removeAttr("readonly");
			$("#compromiso").removeAttr("readonly");
			$("#responsable").removeAttr("readonly");
			$("#fechacom").removeAttr("readonly");
			$("#personati1search").attr("onclick","buscar_varios('personati1')");
			$("#personati1").css({'background-color':'white'});
			$("#personati2search").attr("onclick","buscar_varios('personati2')");
			$("#personati2").css({'background-color':'white'});
			$("#personati3search").attr("onclick","buscar_varios('personati3')");
			$("#personati3").css({'background-color':'white'});
			$("#personati4search").attr("onclick","buscar_varios('personati4')");
			$("#personati4").css({'background-color':'white'});
			$("#personasup1search").attr("onclick","buscar_varios('personasup1')");
			$("#personasup1").css({'background-color':'white'});
			$("#personasup2search").attr("onclick","buscar_varios('personasup2')");
			$("#personasup2").css({'background-color':'white'});
			$("#personasup3search").attr("onclick","buscar_varios('personasup3')");
			$("#personasup3").css({'background-color':'white'});
			$("#personasup4search").attr("onclick","buscar_varios('personasup4')");
			$("#personasup4").css({'background-color':'white'});
			$("#est_reu").removeAttr("readonly");
			$("#observaciones").removeAttr("readonly");
		};

		

	});
	function buscar_varios(buscar){
		//alert(buscar);
		if (buscar=="mesatecnica") {
			var url1="mta_busqueda";
		};
		if (buscar=="personati1" || buscar=="personati2" || buscar=="personati3" || buscar=="personati4" || buscar=="personasup1" || buscar=="personasup2" || buscar=="personasup3" || buscar=="personasup4") {
			var mta=$("#mesatecnica_id").val();
			var url1="persona_reunion";
		};
		//alert(url1+" - "+mta);
		$.ajax({
		url : "<?=base_url()?>jquery/"+url1,
		type: "POST",
		data : {valor:'TRUE',mesatecnica_id:mta},
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
		if (buscar=="mesatecnica") {
			var tiporifmta=$("#tiporifmtam"+id).val();
			var rifmta=$("#rifmtam"+id).val();
			var nombremta=$("#nombremtam"+id).val();
			var nombrecc=$("#nombreccm"+id).val();
			var municipio=$("#municipiom"+id).val();
			var idmta=$("#idmta"+id).val();
			var estado=$("#estadom"+id).val();
			var sector=$("#sectorm"+id).val();
			//alert(idmta);
			$("#rifmta").val(tiporifmta+"-"+rifmta);
			$("#nom_mta").val(nombremta);
			$("#municipio").val(municipio);
			$("#mesatecnica_id").val(idmta);
			$("#ccomunal").val(nombrecc);
			$("#estado").val(estado);
			$("#sector").val(sector);
			$("#objetivo").removeAttr("readonly");
			$("#lugar").removeAttr("readonly");
			$("#participacion").removeAttr("readonly");
			$("#fecha").removeAttr("readonly");
			$("#hora").removeAttr("readonly");
			$("#exp_reu").removeAttr("readonly");
			$("#conclusiones").removeAttr("readonly");
			$("#compromiso").removeAttr("readonly");
			$("#responsable").removeAttr("readonly");
			$("#fechacom").removeAttr("readonly");
			$("#personati1search").attr("onclick","buscar_varios('personati1')");
			$("#personati1").css({'background-color':'white'});
			$("#personati2search").attr("onclick","buscar_varios('personati2')");
			$("#personati2").css({'background-color':'white'});
			$("#personati3search").attr("onclick","buscar_varios('personati3')");
			$("#personati3").css({'background-color':'white'});
			$("#personati4search").attr("onclick","buscar_varios('personati4')");
			$("#personati4").css({'background-color':'white'});
			$("#personasup1search").attr("onclick","buscar_varios('personasup1')");
			$("#personasup1").css({'background-color':'white'});
			$("#personasup2search").attr("onclick","buscar_varios('personasup2')");
			$("#personasup2").css({'background-color':'white'});
			$("#personasup3search").attr("onclick","buscar_varios('personasup3')");
			$("#personasup3").css({'background-color':'white'});
			$("#personasup4search").attr("onclick","buscar_varios('personasup4')");
			$("#personasup4").css({'background-color':'white'});
			$("#est_reu").removeAttr("readonly");
			$("#observaciones").removeAttr("readonly");

			$("#ventana3").fadeOut();
			$('.remove-tr').remove();
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
 </script>
