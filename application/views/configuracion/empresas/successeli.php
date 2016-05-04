<div style="position:relative;">
<div class="exito"><i class="fa fa-check-circle" style="font-size:130px;"></i></div>
<div style="color:#6ECD62;"><h1>Eliminaci&oacute;n Exitosa!...</h1></div>
<div style="margin-top:10px;margin-bottom:20px;"><h2>Redireccionando!...</h2></div>
<div style="margin-bottom:20px;"><i class="fa fa-cog fa-spin fa-5x" style="color:#ddd;text-shadow:0px 0px 1px rgba(0,0,0,0.5);"></i></div>
</div>
</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
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
	function explode(){
	  window.location.href='<?=base_url()?>configuracion/empresas/buscar';
	}
	setTimeout(explode, 4000);
</script>
