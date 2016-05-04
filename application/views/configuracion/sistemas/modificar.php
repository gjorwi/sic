											<!--             INICIO CUERPO DESARROLLO                   -->
					<div align="left">
						<?php

							if ($sistemas->est_sis=="t" || $sistemas->est_sis=="TRUE") {
								$estatusa="selected";
								$estatusi="";
							}else{
								$estatusa="";
								$estatusi="selected";
							}
							$atributo=array('class'=>'form-horizontal','id'=>'regusu');
						?>
						<?=form_open('configuracion/sistemas/modificar',$atributo) ?>
							<fieldset>

							<!-- Form Name -->
							<legend class="subtitform lineform" ><i class="fa fa-cog iconform"></i>Modificar Sistema<a class="hide" id="vent"><i class="fa fa-warning " title="Informacion" id="vent2" style="cursor:pointer;text-shadow:-1px 1px 1px rgba(0,0,0,0.2);color:#F0C433;margin-left:10px;"> <span class="error" style="" id="vent3">Error, Click para Ver!</span></i></a></legend>

								<!-- Prepended text-->
								<div class="form-group" style="padding:5px;">
								  <label class="col-md-3 control-label" for="prependedtext">Nombre</label>
								  <div class="col-md-6">
						
								        <input id="nom_sis" value="<?=$sistemas->nom_sis?>" readonly name="nom_sis" class="form-control" placeholder="Ej. " type="text">
								    	<input value="<?=$sistemas->id?>" type="hidden" name="id" id="id" >
								   
								  </div>
								</div>
								<!-- Select Basic -->
								<div class="form-group" style="padding:5px;">
								  <label class="col-md-3 control-label" for="selectbasic">Estatus</label>
								  <div class="col-md-6">
								    <select id="est_sis" name="est_sis" class="form-control">
								      <option <?=$estatusa?>  value="TRUE" >Activo</option>
								      <option <?=$estatusi?>  value="FALSE" >Inactivo</option>
								    </select>
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
					<h4>¿Esta seguro de eliminar este Sistema?</h4>
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
		window.location.href='<?=base_url()?>configuracion/sistemas/buscar';
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
	function guardar(){
	  	$("#regusu").submit();
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

	function pregunta(){
		
		$("#ventana2").fadeIn();
		
	}
	function eliminar(){
		var id=$("#id").val();
		//alert(id);
		window.location.href='<?=base_url();?>configuracion/sistemas/eliminar/'+id;
	}
 </script>
