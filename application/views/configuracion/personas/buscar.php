
			<legend class="subtitform lineform" align="left"><i class="fa fa-search iconform" ></i>Busqueda</legend>

		<div class="row ajuste" align="center" style="padding-top:10px!important;background-color:;border-bottom:1px solid rgba(0,0,0,0.1);padding-bottom:20px;">
				<div style="width:80%;">
					<div class="form-group">
	                    <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
	                    <input class="form-control input-md" id="system-search" name="q" placeholder="Buscar..." required>
	                    
	                </div>
	                <div class="reset"><a href="" style="color:#FFC487;">Resetear Todas las Asistencias</a></div>
				</div>
			<hr style="width:90%;border-color:rgba(0,0,0,0.1);">
				
				<div class="row ajuste">
					<div id="no-more-tables" >
			            <table class="ajuste table-bordered table-striped table-condensed cf" >
			        		<thead class="cf">
			        			<tr>
			        				<th>Cedula</th>
			        				<th>Nombre</th>
			        				<th>Apellido</th>
			        				<th>Estatus</th>
			        				<th style="max-width:70px;"><div style="display:inline-block;">Asistencia</div> <a class="btnresetall" onclick="buscar_varios('resetall','')" style="cursor:pointer;color:#FFC487;">Reset All</a></th>
			        				<th>Accion</th>
			        			</tr>
			        		</thead>
			        		<tbody>
			        			<?php
			        				$inc=0;
			        				foreach ($personas as $row) {
			        				if ($row->est_prs=="t") {
			        					$estatus="Activo";
			        				}
			        				if ($row->est_prs=="f") {
			        					$estatus="Inactivo";
			        				}
			        			?>
			        			<tr>
			        				<td data-title="Cedula"><?=$row->cedula?></td>
			        				<td data-title="Nombre"><?=$row->nombres?></td>
			        				<td data-title="Apellido" class=""><?=$row->apellidos?></td>
			        				<td data-title="Estatus" class=""><?=validarEntrada($estatus)?></td>
			        				<td data-title="Asistencia" class="" style="max-width:80px;"><div style="display:inline-block;"><?=$row->asist?></div><input type="hidden" name="ced" id="reset<?=$inc?>" value="<?=$row->cedula?>"> <a class="btnreset" onclick="buscar_varios('reset',<?=$inc?>)" style="">Reset</a></td>
			        				<td data-title="Accion" class="" align="center">
			        				<button class="btn btn-success yo" id="mod" onclick="location.href='<?=base_url();?>configuracion/personas/modificar/<?=$row->id?>'" style="font-size:11px;box-shadow:-1px 2px 1px -1px #226B12;border:none;">Editar</button>

			        				</td>
			        			</tr>
			        			<?php
			        				$inc++;
			        				}

			        			?>
			        		</tbody>
			        	</table>
        			</div>
   				 </div>
			
						</div>
					</div>
				</div>
			</div><!--Siempre Base-->
		</div>
	</div>
</div>
<script type="text/javascript">

	if (mod==0) {
		$(".yo").attr("onclick","");
		//alert("hola");
		$(".yo").addClass("desac");
		$(".yo").removeClass("btn");

	}else{
		//alert(mod);
		$('.btnreset').addClass('btnreset1');
		$('.btnresetall').css({'display':'inline-block'});
	};
	
</script>
<script type="text/javascript">
	
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
		
		if (id==="vent" || id==="vent3" || id==="vent2") {
			$("#ventana").fadeIn();
		};
		if (id==="ventana" || id==="cerr" || id==="ventana2") {
			$("#ventana").fadeOut();
			$("#ventana2").fadeOut();
		};
	});

	function tog(valor){
		$("#children"+valor).toggle();
	}
	$("#cerrar").removeClass("hide");
	$("#menprin").removeClass("hide");
	$("#x").css({'cursor':'pointer'});
	function cerrar(){
		window.location.href='<?=base_url()?>configuracion/inicio';
	}

  $('#sandbox-container .input-group.date').datepicker({
    format: "dd-mm-yyyy",
    language: "es",
    autoclose: true,
    todayHighlight: true
	})
  function guardar(){
  	window.location.href='<?=base_url()?>configuracion/personas';
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
	function buscar_varios(buscar,id){
		//alert(buscar);
		if (buscar=='resetall') {
			var url1="reset_asist";
		};
		if (buscar=='reset') {
			var url1="reset_persona";
			var ced=$('#reset'+id).val();
		};
		//alert(url1+" - "+ced);
		$.ajax({
		url : "<?=base_url()?>jquery/"+url1,
		type: "POST",
		data : {valor:'TRUE',cedula:ced},
		success: function(data, textStatus, jqXHR)
		{
			//alert(data);
			if (buscar=='resetall') {
				if (data==1) {
					window.location.href='<?=base_url()?>configuracion/personas/buscar';
				}else{
					alert("no se pudo realizar el reset con Exito...");
				};
			};
			if (buscar=='reset') {
				if (data==1) {
					window.location.href='<?=base_url()?>configuracion/personas/buscar';
				}else{
					alert("no se pudo realizar el reset con Exito...");
				};
			};
			
			
		},
		error: function (jqXHR, textStatus, errorThrown)
		{
		    //alert(textStatus);
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