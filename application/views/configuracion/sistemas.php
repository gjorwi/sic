											<!--             INICIO CUERPO DESARROLLO                   -->
					<div align="left">
											<?php
							$atributo=array('class'=>'form-horizontal','id'=>'regusu','autocomplete'=>"off");
						?>
						<?=form_open('configuracion/sistemas/registrar',$atributo) ?>
							<fieldset>

							<!-- Form Name -->
							<legend class="subtitform lineform"><i class="fa fa-cog iconform"></i>Registro de Sistemas<a class="hide" id="vent"><i class="fa fa-warning " title="Informacion" id="vent2" style="cursor:pointer;text-shadow:-1px 1px 1px rgba(0,0,0,0.2);color:#F0C433;margin-left:10px;"> <span class="error" style="" id="vent3">Error, Click para Ver!</span></i></a></legend>

								<!-- Prepended text-->
								<div class="form-group" style="padding:5px;">
								  <label class="col-md-3 control-label" for="prependedtext">Nombre</label>
								  <div class="col-md-6">
								    <div class="input-group">
								        <input id="sistema" onkeyup="control()" value="<?= set_value('nom_sis')?>" name="nom_sis" class="form-control" placeholder="Ej. " type="text">
								    	<span class="input-group-addon" id="check" style="cursor:pointer;padding-left:4px;padding-right:4px;" onclick="verificar();"><div id="btnch" style="font-size:11px;">Check</div></span>
								    </div>
								    <span class="help-block" style="font-size:11px;color:rgba(0,0,0,0.3);margin:0px;margin-left:2px;padding:0px;padding-top:3px;"><span style="color:rgba(0,0,0,0.5);">Nota:</span> No se permiten n&uacute;meros.</span>
								  </div>
								</div>
								<!-- Select Basic -->
								<div class="form-group" style="padding:5px;">
								  <label class="col-md-3 control-label" for="selectbasic">Estatus</label>
								  <div class="col-md-6">
								    <select id="est_sis" name="est_sis" class="form-control">
								      <option selected value="TRUE" <?php echo set_select('est_sis', 'TRUE', TRUE); ?>>Activo</option>
								      <option value="FALSE" <?php echo set_select('est_sis', 'FALSE'); ?>>Inactivo</option>
								    </select>
								  </div>
								</div>
							</fieldset>
						</form>

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
	$(document).click(function(e){
		var id=e.target.id;
		//alert(id);
		if (id==="vent" || id==="vent2" || id==="vent3") {
			$("#ventana").fadeIn();
		};
		if (id==="ventana" || id==="cerr") {
			$("#ventana").fadeOut();
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
	var count=$("#rif").val();
	$(document).ready(function(){
		var valor=$("#tiporif").val();
		if (valor!="") {
			$("#rif").removeAttr("readonly");
			$("#check").attr("onclick","verificar()");
		}else{
			$("#rif").attr("readonly","readonly");
			$("#check").attr("onclick","");
		};
		if (count.length==9) {

			$("#fax").removeAttr("readonly");
    		$("#correo").removeAttr("readonly");
    		$("#tipo").removeAttr("readonly");
    		$("#telefonoh").removeAttr("readonly");
    		$("#telefonom").removeAttr("readonly");
    		$("#direccion").removeAttr("readonly");
    		$("#observaciones").removeAttr("readonly");
    		$("#razon").removeAttr("readonly");
    		$("#estatus").removeAttr("readonly");
		};

	});
	function verificar(){
		//alert("hola");
		var sis=$("#sistema").val();
		$.ajax({
		url : "<?=base_url()?>jquery/sistema_unique",
		type: "POST",
		data : {nom_sis:sis},
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
	$("#tiporif").change(function(){
		//alert("cambió!");
		var valor=$("#tiporif").val();
		if (valor!="") {
			$("#rif").removeAttr("readonly");
			$("#check").attr("onclick","verificar()");
		}else{
			$("#rif").attr("readonly","readonly");
			$("#check").attr("onclick","");
		};
	});
 </script>
