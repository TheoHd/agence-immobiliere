		$(document).ready(function(){
			$(".contenu_article").css({height:0, opacity:0}).hide(1);
			$(".p_infos").click(function(e){
				var $this = $(this);
				e.preventDefault();
				$this.each(function(){
					var $num = $this.data("num")
					if($("#" + $num).css('height') == "0px"){
						$("#" + $num).show(1).animate({height:	'24.6vw', opacity:1}, 500);
					}else{
						$("#" + $num).animate({height:0, opacity:0}, 500).hide(1);
					}
				});
			});
		});	