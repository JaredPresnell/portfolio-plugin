jQuery(document).ready( function($){
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		$(".portfolio_tag").on('click',function(e){
	 		// find parent group, find description specific to the group
	 		var group = $(this).parent();
	 		var tag = group.find(".portfolio_tag_description");
			tag.css('opacity','1');
			tag.css('z-index','2');
			$(".portfolio_modal_hide").css('z-index','1');
	 	});

		$(".portfolio_modal_hide").on('click',function(){
			$(".portfolio_modal_hide").css('z-index','-9');
			$(".portfolio_tag_description").css('opacity','0');	
			$(".portfolio_tag_description").delay(500)
			.queue(function(next){
				$(this).css('z-index','-1')	;
				next();
			});
		});
	}
	
 
});
