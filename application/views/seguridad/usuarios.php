											<!--             INICIO CUERPO DESARROLLO                   -->
					<div align="left">
											<?php
							$atributo=array('class'=>'form-horizontal','id'=>'regusu','autocomplete'=>"off");
						?>
						<?=form_open('seguridad/usuarios/registrar',$atributo) ?>
							<fieldset>

							<!-- Form Name -->
							<legend class="subtitform lineform"><i class="fa fa-user iconform" ></i>Registro de Usuarios<a class="hide" id="vent"><i class="fa fa-warning " title="Informacion" id="vent2" style="cursor:pointer;text-shadow:-1px 1px 1px rgba(0,0,0,0.2);color:#F0C433;margin-left:10px;"> <span style="color:red;font-size:14px;" id="vent3">Error, Click para Ver!</span></i></a></legend>

												<!--           DATOS PERSONA                -->

							<div class="row ajuste" style="background-color:#;">
								<div align="center">
									<h4>Datos Personales</h4>
									<hr style="border-color:rgba(0,0,0,0.1);width:80%;">
								</div>
								<div class="col-md-6" style="background-color:;padding:0px;">
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Cedula</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <input id="ced" readonly maxlength="8" value="<?= set_value('cedula')?>" name="cedula" class="form-control" placeholder="Ej. 16732481" type="text">
									    	<span class="input-group-addon" onclick="buscar_varios('persona')" style="cursor:pointer;background-color:white;"><i class="fa fa-search"></i></span>
									    </div>
									    <span class="help-block" style="font-size:11px;color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Elija la <strong>Cedula</strong>.</span>
									  </div>
									</div>
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="textinput">Id Personal</label>  
									  <div class="col-md-6">
									  <input id="persona_id" readonly  value="<?= set_value('persona_id')?>" name="persona_id" type="text" class="form-control input-md">
									  </div>
									</div>
								</div>
								<div class="col-md-6" style="background-color:;padding:0px;">
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="textinput">Nombres</label>  
									  <div class="col-md-6">
									  <input id="nombres" readonly  value="<?= set_value('nombres')?>" name="nombres" type="text"  class="form-control input-md">
									  </div>
									</div>
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="textinput">Apellidos</label>  
									  <div class="col-md-6">
									  <input id="apellidos" readonly value="<?= set_value('apellidos')?>" name="apellidos" type="text"  class="form-control input-md">

									  </div>
									</div>	
								</div>
								
							</div>

												<!--           DATOS PERSONA                -->

							<div class="row ajuste" align="center" style="background-color:#f4f4f4;margin-top:15px;">
								<div align="center">
									<h4>Datos Usuario</h4>
									<hr style="border-color:rgba(0,0,0,0.1);width:80%;">
								</div>
								<div class="col-md-6" style="background-color:;padding:0px;">
									<!-- Prepended text-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="prependedtext">Usuario</label>
									  <div class="col-md-6">
									    <div class="input-group">
									        <input id="login" disabled value="<?= set_value('login')?>" onkeyup="control1()" name="login" class="form-control" placeholder="Ej. Pedro06" type="text">
									    	<span class="input-group-addon" id="check" style="cursor:pointer;padding-left:4px;padding-right:4px;" onclick=""><div id="btnch" style="font-size:11px;">Check</div></span>
									    </div>
									  </div>
									</div>
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
								</div>
								<div class="col-md-6" style="background-color:;padding:0px;">
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label"  for="textinput">Contraseña</label>  
									  <div class="col-md-6">
									  <input id="clave" disabled name="clave"  type="password" placeholder="Ej. 123456" class="form-control input-md">
									  </div>
									</div>
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label"  for="textinput">Confirmar Contraseña</label>  
									  <div class="col-md-6">
									  <input id="rep_clave" disabled name="rep_clave" type="password" placeholder="Ej. 123456" class="form-control input-md">
									  </div>
									</div>
								</div>
							</div>
												<!--           DATOS PERSONA                -->

							<div class="row ajuste" align="center" style="background-color:#f4f4f4;margin-top:15px;">
								<div align="center">
									<h4>Permiso del Usuario</h4>
									<hr style="border-color:rgba(0,0,0,0.1);width:80%;">
								</div>
								<!-- Prepended text-->
								<div class="form-group" style="padding:5px;">
								  <label class="col-md-4 control-label" for="prependedtext">Ubicacion</label>
								  <div class="col-md-4" align="left">
								    <div class="input-group">
								        <input id="perfilmta" readonly maxlength="8" value="<?= set_value('perfilmta')?>" name="perfilmta" class="form-control" type="text">
								        <input id="perfilmta_id" readonly maxlength="8" value="<?= set_value('perfilmta_id')?>" name="perfilmta_id" class="form-control"  type="hidden">
								    	<span class="input-group-addon" id="perfilmtasearch" style="cursor:pointer;background-color:white;"><i class="fa fa-search"></i></span>
								    </div>
								    <span class="help-block" style="font-size:11px;color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Elija la <strong>Ubicación</strong>.</span>
								  </div>
								</div>
								<!-- Select Basic -->
								<div class="form-group" style="padding:5px;">

								  <label class="col-md-4 control-label" for="selectbasic">Perfil</label>
								  <div class="col-md-4">
								    <select id="perfile_id" disabled name="perfile_id" class="form-control">
								   
									    <?php
									  	foreach ($perfil as $row) {
									  	?>  	  
									      <option value="<?=$row->id?>" <?php echo set_select('perfile_id',$row->id ); ?>><?=$row->nom_prf?></option>
									    <?php
											}
									    ?>
								    </select>

								  </div>
								</div>
							</div>
							</fieldset>
						</form>

					</div>
											 <!--             FIN CUERPO DESARROLLO                   -->
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
	<div class="contventana" id="contven3" style="">
		<div class="bannvent" align="center" style="border-radius:10px 10px 0px 0px;overflow:hidden;background-color:#f5f5f5;position:relative;z-index:10;">
			<h4 style="float:left;margin-left:10px;font-weight:600;color:#E73C4B;">Busqueda </h4><i class="fa fa-remove fa-lg" style="cursor:pointer;margin-top:10px;margin-right:10px;color:rgba(0,0,0,0.4);float:right;" id="cerr3"></i>
		</div>
		<div class="row ajuste" style="padding-top:10px!important;background-color:white;border-bottom:1px solid rgba(0,0,0,0.1);padding-bottom:20px;box-shadow:0px 1px 10px -1px rgba(0,0,0,0.1);">
			<div class="row ajuste" style="margin-bottom:20px!important;">
				<div class="row ajuste" align="center">
					<div style="width:80%;">
					<div class="form-group">
	                    <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
	                    <input class="form-control input-md" id="system-search" name="q" placeholder="Buscar..." required>
	                    
	                </div>
				</div>
				<hr style="width:90%;border-color:rgba(0,0,0,0.1);">
				<div class="contmodal">
				<div id="no-more-tables"  style="">
		            <table class="ajuste table-bordered table-striped table-condensed cf" >
		        		<thead class="cf">
		        			
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

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function buscar(){
		window.location.href='<?=base_url()?>seguridad/usuarios/buscar';
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
		if (id==="ventana3" || id==="cerr3") {
			$("#ventana3").fadeOut();
		};
	});

	function tog(valor){
		$("#children"+valor).toggle();
	}
	$("#cerrar").removeClass("hide");
	$("#menprin").removeClass("hide");
	$("#x").css({'cursor':'pointer'});
	function cerrar(){
		window.location.href='<?=base_url()?>seguridad/inicio';
	}

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
	function buscar_varios(busqueda){
		if (busqueda==="persona") {
			var url1="persona_busqueda";
		};
		if (busqueda==="ubicacion") {
			var url1="perfilmta_busqueda";
		};
		//alert('url : "<?=base_url()?>jquery/"'+url1);
		$.ajax({
		url : "<?=base_url()?>jquery/"+url1,
		type: "POST",
		data : {valor:"TRUE"},
		success: function(data, textStatus, jqXHR)
		{
			//alert(data);
			
				obj = jQuery.parseJSON( data );
				//alert(obj);
			if (obj!='') {
				//alert("entro en null");
				var count=obj.id.length;
				//alert(count);
			}else{
				var count=0;
			};
			
			$('.remove-tr').remove();
			if (busqueda==="persona") {
				//alert("si entro a persona");
				$('.remove-tr').remove();
				$('.cf tbody').append('<tr class="remove-tr"><th>Id</th><th>Cedula</th><th>Nombre</th><th>Apellidos</th><th>Accion</th></tr>');
				for (i=0;i<count;i++){
					//alert(obj.id[i]);
					//alert(obj.cedula[i]);
					//alert(obj.nombres[i]);
					//alert(obj.apellidos[i]);
					$('.cf tbody').append('<tr class="remove-tr"><td data-title="id personal">'+obj.id[i]+'<input type="hidden" id="id'+i+'" value="'+obj.id[i]+'"><input type="hidden" id="busqueda'+i+'" value="'+busqueda+'"></td><td data-title="Cedula">'+obj.cedula[i]+'<input type="hidden" id="ced'+i+'" value="'+obj.cedula[i]+'"></td><td data-title="Nombres">'+obj.nombres[i]+'<input type="hidden" id="nom'+i+'" value="'+obj.nombres[i]+'"></td><td data-title="Apellidos">'+obj.apellidos[i]+'<input type="hidden" id="ape'+i+'" value="'+obj.apellidos[i]+'"></td><td data-title="Accion"><button class="btn btn-success" onclick="setear('+i+')">agregar</button></td></tr>');
		   		}
			};
			if (busqueda==="ubicacion") {
				$('.remove-tr').remove();
				$('.cf thead').append('<tr class="remove-tr"><th>Cedula</th><th>Nombre</th><th>Accion</th></tr>');
				for (i=0;i<count;i++){
					//alert(obj.id[i]);
					//alert(obj.cedula[i]);
					//alert(obj.nombres[i]);
					//alert(obj.apellidos[i]);
					$('.cf tbody').append('<tr class="remove-tr"><td data-title="id personal">'+obj.id[i]+'<input type="hidden" id="idubi'+i+'" value="'+obj.id[i]+'"><input type="hidden" id="busqueda'+i+'" value="'+busqueda+'"></td><td data-title="Nombre">'+obj.nom_prf[i]+'<input type="hidden" id="nomprf'+i+'" value="'+obj.nom_prf[i]+'"></td><td data-title="Accion" align="center"><button class="btn btn-success" onclick="setear('+i+')">agregar</button></td></tr>');
		   		}
			};
			
		},
		error: function (jqXHR, textStatus, errorThrown)
		{
		    alert(errorThrown);
		}
		});
		$("#ventana3").fadeIn();
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
	function setear(id){
		var bus=$("#busqueda"+id).val();
		if (bus==="persona") {
			var idper=$("#id"+id).val();
			var cedper=$("#ced"+id).val();
			var nomper=$("#nom"+id).val();
			var apeper=$("#ape"+id).val();
			$("#persona_id").val(idper);
			$("#ced").val(cedper);
			$("#nombres").val(nomper);
			$("#apellidos").val(apeper);
			$("#ventana3").fadeOut();
			$.ajax({
				url : "<?=base_url()?>jquery/usuario_persona",
				type: "POST",
				data : {persona_id:idper},
				success: function(data, textStatus, jqXHR)
				{
					//alert(data);
					if (data==1) {
						$("#mensaje").html('');
						$("#mensaje").append('<h4 style="font-size:14px;">Este persona ya posee un usuario asignado.</h4>');
						$("#ventana2").fadeIn();
						$("#login").attr("disabled","disabled");
						$("#clave").attr("disabled","disabled");
						$("#rep_clave").attr("disabled","disabled");
						$("#estatus").attr("disabled","disabled");
						$("#perfile_id").attr("disabled","disabled");
						$("#check").attr("onclick","");

					}else{
						$("#login").removeAttr("disabled");
						$("#check").attr("onclick","verificar()");
					};
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
				    alert("error");
				}
			});
		};
		if (bus==="ubicacion") {
			var idubi=$("#idubi"+id).val();
			var nomprf=$("#nomprf"+id).val();
			$("#perfilmta").val(nomprf);
			$("#perfilmta_id").val(idubi);
			$("#ventana3").fadeOut();
		};
		
	}
	function control1(){
		//alert("hola");
		$("#check").css({'background-color':'rgba(0,0,0,0.03)','color':'#444','font-size':'12px'});
		$("#btnch").html("Check");
		$("#clave").attr("disabled","disabled");
		$("#rep_clave").attr("disabled","disabled");
		$("#estatus").attr("disabled","disabled");
		$("#perfile_id").attr("disabled","disabled");
		$("#perfilmtasearch").attr("onclick","");
	}
	function verificar(){
		var login=$("#login").val();
		//alert(login);
		if (login=="") {
			login="a";
			//alert(login+"aqui");
		};
		$.ajax({
		url : "<?=base_url()?>jquery/usuario_unique",
		type: "POST",
		data : {login:login},
		success: function(data, textStatus, jqXHR)
		{
			//alert(data);
		    if (data==1) {
		    	$("#check").css({'background-color':'#E73C4B','color':'white','font-size':'11px'});
		    	$("#btnch").html("Registrado");
		    }else{
		    	if (data==2) {
		    		$("#check").css({'background-color':'#6ECD62','color':'white','font-size':'10px'});
		    		$("#btnch").html("No Registrado");
		    		$("#clave").removeAttr("disabled");
					$("#rep_clave").removeAttr("disabled");
					$("#estatus").removeAttr("disabled");
					$("#perfile_id").removeAttr("disabled");
					$("#perfilmtasearch").attr("onclick","buscar_varios('ubicacion')");
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
