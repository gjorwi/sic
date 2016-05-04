											<!--             INICIO CUERPO DESARROLLO                   -->



							<div style="margin:35px;">
								<div>
									<i class="fa fa-home iconofondo" style=""></i>
								</div>
								<div>
									<p class="letrafondo" style="">CONSEJO COMUNAL</p>
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
		var widthpant=$(window).width();
		if (widthpant>767) {
			var heightpant=heightpant+24;
			$("#menu").css({'height':heightpant+'px'});
		};
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
