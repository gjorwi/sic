											<!--             INICIO CUERPO DESARROLLO                   -->
					<div align="left">
											<?php
							$atributo=array('class'=>'form-horizontal','id'=>'regusu','autocomplete'=>"off");
						?>
						<?=form_open('configuracion/subsistemas/registrar',$atributo) ?>
							<fieldset>

							<!-- Form Name -->
							<legend class="subtitform lineform"><i class="fa fa-cogs iconform"></i>Registro de Subsistemas<a class="hide" id="vent"><i class="fa fa-warning " title="Informacion" id="vent2" style="cursor:pointer;text-shadow:-1px 1px 1px rgba(0,0,0,0.2);color:#F0C433;margin-left:10px;"> <span class="error" style="" id="vent3">Error, Click para Ver!</span></i></a></legend>
								<!-- Prepended text-->
								<div class="form-group" style="padding:5px;">
								  <label class="col-md-3 control-label" for="prependedtext">Sistema</label>
								  <div class="col-md-6">
								    <div class="input-group">
								        <input id="nom" readonly maxlength="30" value="<?= set_value('nom_sis')?>" name="nom_sis" class="form-control" placeholder="Ej. Sistema" type="text">
								    	<span class="input-group-addon" onclick="buscar_sistema()" style="cursor:pointer;background-color:white;border-radius:0px 5px 5px 0px;"><i class="fa fa-search"></i></span>
								    	<input type="hidden" id="cod" name="sistema_id" value="<?= set_value('sistema_id')?>">
								    </div>
								    <span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> Debe elegir un Sistema.</span>
								  </div>
								</div>
								<!-- Prepended text-->
								<div class="form-group" style="padding:5px;">
								  <label class="col-md-3 control-label" for="prependedtext">Subsistema</label>
								  <div class="col-md-6">
								    <div class="input-group">
								        <input id="nom_sub" disabled maxlength="30" onkeyup="control()" value="<?= set_value('nom_sub')?>" name="nom_sub" class="form-control" placeholder="Ej. Subsistemas" type="text">
								    	<span class="input-group-addon" id="check" style="cursor:pointer;padding-left:4px;padding-right:4px;" onclick="verificar();"><div id="btnch" style="font-size:11px;">Check</div></span>
								    	
								    </div>
								    <span class="help-block" style="color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;font-size:11px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> No se permiten n&uacute;meros.</span>
								  </div>
								</div>
								<!-- Select Basic -->
								<div class="form-group" style="padding:5px;">
								  <label class="col-md-3 control-label" for="selectbasic">Estatus</label>
								  <div class="col-md-6">
								    <select id="est_sub" disabled name="est_sub" class="form-control">
								      <option selected value="TRUE" <?php echo set_select('est_sub', 'TRUE', TRUE); ?>>Activo</option>
								      <option value="FALSE" <?php echo set_select('est_sub', 'FALSE'); ?>>Inactivo</option>
								    </select>
								  </div>
								</div>
							</fieldset>
						</form>

					</div>
							
<div class="ventana" id="ventana3" style="position:fixed;">
	<div class="contventana" id="contven3" >
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
					<div id="no-more-tables" style="padding:5px;">
			            <table class="ajuste table-bordered table-striped table-condensed cf" >
			        		<thead class="cf">
			        			<tr>
			        				<th>Codigo</th>
			        				<th>Nombre</th>
			        				<th>Accion</th>
			        			</tr>
			        		</thead>
			        		<tbody>
			        			<tr class="remove-tr">
			        				<td data-title="Codigo">18769212</td>
			        				<td data-title="Nombre">jorwi</td>
			        				<td data-title="Accion" class="" align="center"><button class="btn btn-success" style="font-size:11px;box-shadow:-1px 2px 1px -1px #226B12;border:none;">Agregar</button></td>
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
		window.location.href='<?=base_url()?>configuracion/subsistemas/buscar';
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
	if ($("#nom").val()!="") {
		$("#nom_sub").removeAttr("disabled");
		$("#est_sub").removeAttr("disabled");
	};
	function control(){
		$("#check").css({'background-color':'rgba(0,0,0,0.03)','color':'#444','font-size':'12px'});
		$("#btnch").html("Check");
	}
	function buscar_sistema(){
		$.ajax({
		url : "<?=base_url()?>jquery/sistema_busqueda",
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
				$('.cf tbody').append('<tr class="remove-tr"><td data-title="Codigo">'+obj.id[i]+'<input type="hidden" id="codigo'+i+'" value="'+obj.id[i]+'"></td><td data-title="Nombre">'+obj.nom_sis[i]+'<input type="hidden" id="nombre'+i+'" value="'+obj.nom_sis[i]+'"></td><td data-title="Accion"><button class="btn btn-success" onclick="setear('+i+')">agregar</button></td></tr>');
		   	}
		},
		error: function (jqXHR, textStatus, errorThrown)
		{
		    alert("error11");
		}
		});
		$("#ventana3").fadeIn();
	}
	function setear(id){
		var codigo=$("#codigo"+id).val();
		var nombre=$("#nombre"+id).val();
		$("#cod").val(codigo);
		$("#nom").val(nombre);
		$("#nom_sub").removeAttr("disabled");
		$("#est_sub").removeAttr("disabled");
		$("#nom_sub").val("");
		$("#check").css({'background-color':'rgba(0,0,0,0.03)','color':'#444','font-size':'12px'});
		$("#btnch").html("Check");
		$("#ventana3").fadeOut();
	}

	function verificar(){
		//alert("hola");
		var sub=$("#nom_sub").val();
		//alert(sub);
		$.ajax({
		url : "<?=base_url()?>jquery/subsistema_unique",
		type: "POST",
		data : {nom_sub:sub},
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
