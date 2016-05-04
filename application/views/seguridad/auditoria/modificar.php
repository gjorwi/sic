											<!--             INICIO CUERPO DESARROLLO                   -->
					<div align="left">
						<?php
							if ($usuarios->estatus=="t" || $usuarios->estatus=="TRUE") {
								$estatusa="selected";
								$estatusi="";
							}else{
								$estatusi="selected";
								$estatusa="";
							}
							$atributo=array('class'=>'form-horizontal','id'=>'regusu');
						?>
						<?=form_open('seguridad/usuarios/modificar',$atributo) ?>
							<fieldset>

							<!-- Form Name -->
							<legend class="subtitform lineform"><i class="fa fa-user iconform" ></i>Modificar Usuarios<a class="hide" id="vent"><i class="fa fa-warning " title="Informacion" id="vent2" style="cursor:pointer;text-shadow:-1px 1px 1px rgba(0,0,0,0.2);color:#F0C433;margin-left:10px;"> <span style="color:red;font-size:14px;" id="vent3">Error, Click para Ver!</span></i></a></legend>

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
									    
									        <input id="ced" readonly maxlength="8" value="<?=$usuarios->persona_cedula?>" name="cedula" class="form-control" placeholder="Ej. 16732481" type="text">
									    	
									    
									  </div>
									</div>
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="textinput">Id Personal</label>  
									  <div class="col-md-6">
									  <input id="persona_id" readonly  value="<?=$usuarios->persona_id?>" name="persona_id" type="text" class="form-control input-md">
									  </div>
									</div>
								</div>
								<div class="col-md-6" style="background-color:;padding:0px;">
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="textinput">Nombres</label>  
									  <div class="col-md-6">
									  <input id="nombres" readonly  value="<?=$usuarios->persona_nombres?>" name="nombres" type="text"  class="form-control input-md">
									  </div>
									</div>
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="textinput">Apellidos</label>  
									  <div class="col-md-6">
									  <input id="apellidos" readonly value="<?=$usuarios->persona_apellidos?>" name="apellidos" type="text"  class="form-control input-md">

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
									    
									        <input id="login" readonly value="<?=$usuarios->login?>" name="login" class="form-control" placeholder="Ej. Pedro06" type="text">
									    	<input id="id" name="id" value="<?=$usuarios->id?>" type="hidden">
									   
									  </div>
									</div>
									<!-- Select Basic -->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label" for="selectbasic">Estatus</label>
									  <div class="col-md-6">
									    <select id="estatus"  name="estatus" class="form-control">
									      <option <?=$estatusa?> value="TRUE">Activo</option>
									      <option <?=$estatusi?> value="FALSE">Inactivo</option>
									    </select>
									  </div>
									</div>
								</div>
								<div class="col-md-6" style="background-color:;padding:0px;">
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label"  for="textinput">Contraseña</label>  
									  <div class="col-md-6">
									  <input id="clave"  name="clave"  type="password" placeholder="Ej. 123456" class="form-control input-md">
									  </div>
									</div>
									<!-- Text input-->
									<div class="form-group" style="padding:5px;">
									  <label class="col-md-5 control-label"  for="textinput">Confirmar Contraseña</label>  
									  <div class="col-md-6">
									  <input id="rep_clave"  name="rep_clave" type="password" placeholder="Ej. 123456" class="form-control input-md">
									  
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
								<!-- Select Basic -->
								<div class="form-group" style="padding:5px;">

								  <label class="col-md-4 control-label" for="selectbasic">Perfil</label>
								  <div class="col-md-4">
								    <select id="perfile_id" name="perfile_id" class="form-control">
								   
									    <?php
									  	foreach ($perfil as $row) {
									  		if ($row->nom_prf==$usuarios->perfile_nom_prf) {
									  	?>
									  		<option value="<?=$row->id?>" selected ><?=$row->nom_prf?></option>
									  	<?php
									  		}else{
									  	?>  	  
									      <option value="<?=$row->id?>"><?=$row->nom_prf?></option>
									    <?php
									    	}
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
<div class="ventana" id="ventana1" style="position:fixed;">
	<div class="contventana" id="contven1" style="margin-top:130px;">
		<div class="bannvent" align="center" style="border-radius:10px 10px 0px 0px;overflow:hidden;background-color:#f5f5f5;position:relative;z-index:10;">
			<h4 style="float:left;margin-left:10px;font-weight:600;color:#E73C4B;">Informacion </h4><i class="fa fa-remove fa-lg" style="cursor:pointer;margin-top:10px;margin-right:10px;color:rgba(0,0,0,0.4);float:right;" id="cerr1"></i>
		</div>
		<div class="row ajuste" style="padding-top:10px!important;background-color:white;border-bottom:1px solid rgba(0,0,0,0.1);padding-bottom:20px;box-shadow:0px 1px 10px -1px rgba(0,0,0,0.1);">
			<div class="row ajuste" style="margin-bottom:20px!important;" align="center">
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
	<div class="contventana" id="contven3" style="margin-top:50px;max-height:500px;max-width:600px;">
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
				<div id="no-more-tables" style="padding:5px;">
		            <table class="ajuste table-bordered table-striped table-condensed cf" >
		        		<thead class="cf">
		        			<tr>
		        				<th>Cedula</th>
		        				<th>Usuario</th>
		        				<th>Nombre</th>
		        				<th>Apellido</th>
		        				<th>Accion</th>
		        			</tr>
		        		</thead>
		        		<tbody>
		        			<tr class="remove-tr">
		        				<td data-title="Cedula">18769212</td>
		        				<td data-title="Usuario">gjorwi</td>
		        				<td data-title="Nombre">jorwi</td>
		        				<td data-title="Apellido" class="">garcia</td>
		        				<td data-title="Accion" class="" align="center"><button class="btn btn-success" style="font-size:11px;box-shadow:-1px 2px 1px -1px #226B12;border:none;">Editar</button></td>
		        			</tr>
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
		if (id==="ventana2" || id==="cerr2") {
			$("#ventana2").fadeOut();
		};
		if (id==="ventana3" || id==="cerr3") {
			$("#ventana3").fadeOut();
		};
		if (id==="ventana1" || id==="cerr1" || id==="cerrbtn") {
			$("#ventana1").fadeOut();
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
	function buscar_persona(){
		$.ajax({
		url : "<?=base_url()?>jquery/persona_busqueda",
		type: "POST",
		data : {valor:"TRUE"},
		success: function(data, textStatus, jqXHR)
		{
			//alert(data);
			obj = jQuery.parseJSON( data );
			var count=obj.id.length;
			//alert(count);
			$('.remove-tr').remove();
			for (i=0;i<count;i++){
				//alert(obj.id[i]);
				//alert(obj.cedula[i]);
				//alert(obj.nombres[i]);
				//alert(obj.apellidos[i]);
				$('.cf tbody').append('<tr class="remove-tr"><td data-title="id personal">'+obj.id[i]+'<input type="hidden" id="id'+i+'" value="'+obj.id[i]+'"></td><td data-title="Cedula">'+obj.cedula[i]+'<input type="hidden" id="ced'+i+'" value="'+obj.cedula[i]+'"></td><td data-title="Nombres">'+obj.nombres[i]+'<input type="hidden" id="nom'+i+'" value="'+obj.nombres[i]+'"></td><td data-title="Apellidos">'+obj.apellidos[i]+'<input type="hidden" id="ape'+i+'" value="'+obj.apellidos[i]+'"></td><td data-title="Accion"><button class="btn btn-success" onclick="setear('+i+')">agregar</button></td></tr>');
		   	}
		},
		error: function (jqXHR, textStatus, errorThrown)
		{
		    alert("error11");
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
				$("#clave").removeAttr("disabled");
				$("#rep_clave").removeAttr("disabled");
				$("#estatus").removeAttr("disabled");
				$("#perfile_id").removeAttr("disabled");
				$("#check").attr("onclick","verificar()");
			};
		},
		error: function (jqXHR, textStatus, errorThrown)
		{
		    alert("error");
		}
		});
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
	function pregunta(){
		
		$("#ventana1").fadeIn();
		
	}
	function eliminar(){
		var id=$("#id").val();
		//alert(id);
		window.location.href='<?=base_url();?>seguridad/usuarios/eliminar/'+id;
	}
 </script>
