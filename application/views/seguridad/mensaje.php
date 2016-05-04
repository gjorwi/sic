<div class="alert alert-info">
	<?=$mensajes?>
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
		var heightpant=heightpant+24;
		$("#menu").css({'height':heightpant+'px'});
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
	$("#x").css({'cursor':'pointer'});
	$("#x").attr({'href':'<?=base_url()?>configuracion/inicio'});


</script>
<script>
  $('#sandbox-container .input-group.date').datepicker({
    format: "dd/mm/yyyy",
    language: "es",
    autoclose: true,
    todayHighlight: true
	})
  function guardar(){
  	$("#regusu").submit();
  }
  </script>