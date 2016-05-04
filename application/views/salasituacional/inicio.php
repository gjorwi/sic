											<!--             INICIO CUERPO DESARROLLO                   -->

						<div style="background-color:;">

							<div align="center" class="mant" style="">
								<i class="fa fa-cogs" style="font-size:200px;color:#D0D3D9;text-shadow:-2px 2px 2px rgba(0,0,0,0.5);cursor:default;"></i>
								<h1 style="color:rgba(0,0,0,0.6);font-weight:bold;">MODULO EN DESARROLLO</h1>
								<p align="justify" style="max-width:500px;">Actualmente el modulo se encuentra en <strong>DESARROLLO</strong>, por favor tenga paciencia. Gracias!...</p>	
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
	function heightcurp(){
		var heightbann=$("#bann").height();
		var heightfoot=$("#foot").height();
		var heightbann2=$("#bann2").height();
		var heightpant=((($(window).height() - heightbann) - heightfoot)-37)- heightbann2;
		//alert("Altura Bann: "+heightbann+"- Altura Foot: "+heightfoot+"- Altura Pant: "+heightpant);
		var heightmenu=((heightpant - $("#menu").height())/3)+20;

		$("#content").css({'height':heightpant+'px'});
		var heightpant=heightpant+24;
		$("#menu").css({'height':heightpant+'px'});
		var heightcuerpo=heightpant;
	}
	$(document).click(function(e){
		var id=e.target.id;
		//alert(id);
		if (id==="vent") {
			$("#ventana").fadeIn();
			var widthpant=$(window).width();
			var widthven=$("#contven").width();
			if (widthpant>=widthven) {
				var marginlr=(widthpant- widthven)/2;
				$("#contven").css({'margin-left':marginlr+'px','margin-right':marginlr+'px'});
			};
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
	$("#x").css({'opacity':'0','cursor':'default'});

</script>
