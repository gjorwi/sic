											<!--             INICIO CUERPO DESARROLLO                   -->
					<div align="left">
							<legend class="subtitform lineform" align="left"><i class="fa fa-legal iconform" ></i>Auditoría</legend>
						<div class="row ajuste" style="padding-top:10px!important;background-color:white;padding-bottom:20px;">
							<div class="row ajuste" style="margin-bottom:20px!important;">
								<div class="row ajuste" align="center">
									<div style="width:80%;">
									<div class="form-group">
					                    <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
					                    <input class="form-control input-md" id="system-search" name="q" placeholder="Buscar..." required>
					                    
					                    <input class="form-control input-md" id="system-search1" onkeyup="search2()" disabled style="margin-top:10px;" name="q" placeholder="Buscar..." required>
					                    
					                </div>
								</div>
								<hr style="width:90%;border-color:rgba(0,0,0,0.1);">
								<div class="">
								<div id="no-more-tables"  style="">
						            <table class="ajuste table-bordered table-striped table-condensed cf" >
						        		<thead class="cf">
						        			<tr>
						        				<th>ID</th>
						        				<th>Cedula</th>
						        				<th>Nombre</th>
						        				<th>Modulo</th>
						        				<th>Menu</th>
						        				<th>Accion</th>
						        				<th>Resultado</th>
						        				<th>Fecha</th>
						        				<!--<th>Detalle</th>-->
						        			</tr>
						        		</thead>
						        		<tbody>
						        			<tr class="remove-tr" >
						        				
						        			</tr>
						        		</tbody>
						        	</table>
				    			</div>
				    			</div>
				   				 </div>
							</div>
						</div>

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

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$("#g").addClass("desact");
	$("#s").addClass("desact");
	$("#e").addClass("desact");
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
	buscar_auditoria();
	function buscar_auditoria(){
		$.ajax({
		url : "<?=base_url()?>jquery/auditoria_busqueda",
		type: "POST",
		data : {valor:"TRUE"},
		success: function(data, textStatus, jqXHR)
		{
			//alert(data);
			obj = jQuery.parseJSON( data );
			var count=obj.cedula.length;
			//alert(count);
			$('.remove-tr').remove();
			var cont=0;
			for (i=0;i<count;i++){
				//alert(obj.id[i]);
				//alert(obj.cedula[i]);
				//alert(obj.nombres[i]);
				//alert(obj.apellidos[i]);
				cont++;
				$('.cf tbody').append('<tr class="remove-tr"><td data-title="ID" style="font-size:10px;">'+cont+'</td><td data-title="Cedula" style="font-size:10px;">'+obj.cedula[i]+'</td><td data-title="Nombre" style="font-size:10px;">'+obj.nombre[i]+'</td><td data-title="Modulo" style="font-size:10px;">'+obj.modulo[i]+'</td><td data-title="Menu" style="font-size:10px;">'+obj.menu[i]+'</td><td data-title="Accion" style="font-size:10px;">'+obj.accion[i]+'</td><td data-title="Resultado" style="font-size:10px;">'+obj.result[i]+'</td><td data-title="Fecha" style="font-size:10px;">'+obj.fecha[i]+'</td></tr>');
		   	}
		},
		error: function (jqXHR, textStatus, errorThrown)
		{
		    alert("error11");
		}
		});
	}
	$(document).ready(function() {
    	var activeSystemClass = $('.list-group-item.active');

	    //something is entered in search form
	    $('#system-search').keyup( function() {
	    	var inp=$('#system-search').val();
	    	if (inp=='') {
	    		$('#system-search1').attr('disabled','disabled');
	    		$('#system-search1').val('');
	    	}else{
	    		$('#system-search1').val('');
	    		$('#system-search1').removeAttr('disabled');
	    	};
	       var that = this;
	        // affect all table rows on in systems table
	        var tableBody = $('.cf tbody');
	        var tableRowsClass = $('.cf tbody tr');
	        $('.puntero').removeClass('puntero');
	        $('.search-sf').remove();
	        tableRowsClass.each( function(i, val) {
	        
	            //Lower text for case insensitive
	            var rowText = $(val).text().toLowerCase();
	            var inputText = $(that).val().toLowerCase();
	           

	            if( rowText.indexOf( inputText ) == -1 )
	            {
	                //hide rows
	                tableRowsClass.eq(i).hide();
	                tableRowsClass.eq(i).addClass('puntero');
	                
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
		$('#system-search1').keyup( function() {
			var that = this;
	       var inp2=$('#system-search1').val();
	       var inp=$('#system-search').val();
		   
		        // affect all table rows on in systems table
		        var tableBody = $('.cf tbody');
		        var tableRowsClass = $('.cf tbody tr');
		        $('.search-sf').remove();
		        tableRowsClass.each( function(i, val) {
		        
		            //Lower text for case insensitive
		            var rowText = $(val).text().toLowerCase();
		            var inputText = $(that).val().toLowerCase();
		            if (tableRowsClass.eq(i).css("display")=='none' && tableRowsClass.eq(i).hasClass("puntero")) {

		            }else{
			            if( rowText.indexOf( inputText ) == -1 )
			            {
			                //hide rows
			                tableRowsClass.eq(i).hide();
			                
			            }
			            else
			            {

		            		$('.search-sf').remove();
		                	tableRowsClass.eq(i).show();
		            	};
		                
		            };
		        });
		        //all tr elements are hidden
		        if(tableRowsClass.children(':visible').length == 0)
		        {
		            tableBody.append('<tr class="search-sf"><td class="text-muted" colspan="6">No se encontro el valor ingresado...</td></tr>');
		        }
	        
	    });
	});
	function search2(){
		//alert("hola");
		//alert('nose');
	       
	}
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
 </script>
