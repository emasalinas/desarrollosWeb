 $(document).ready(function(){ 
 
 	mSelectBackground();
	
	$(window).resize(function(){
		mSelectBackground();
	});
});

var mSelectBackground = function(){
	
	var vWidth 		= $(document).width(),
		vHeight 	= $(document).height();
		vRatio		=  vWidth / vHeight;
			
	if(vRatio >= 1.8){
		$('#pageContent').css('background-image', 'url("./publicMVC/img/backgroundArt.png")'); 
		$('.titleCD img').css('width', '70%');
		$('.logotypeBand img').css('max-width', '50%');
		$('.logotypeBand').css('text-align', 'center');
		$('.logotypeBand').css('width', '30%');
		
		$('.iconSector').show();
	}else if(vRatio > 0.85 && vRatio < 1.8){
		
		$('#pageContent').css('background-image', 'url("./publicMVC/img/backgroundArt.png")'); 
		$('.titleCD img').css('width', '70%');
		$('.logotypeBand img').css('max-width', '50%');
		$('.logotypeBand').css('text-align', 'right');
		$('.logotypeBand').css('width', '35%');
		
		$('.iconSector').show();
		
	}else if(vRatio <= 0.85){
		$('#pageContent').css('background-image', 'url("./publicMVC/img/backgroundMobile.png")');
		$('.titleCD img').css('width', '95%'); 
		$('.logotypeBand img').css('max-width', '100%');
		
		$('.iconSector').hide();
	};
	
};