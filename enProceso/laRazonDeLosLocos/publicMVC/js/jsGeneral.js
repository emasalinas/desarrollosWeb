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

var mExportarTablaExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(pTable, pName) {
    if (!pTable.nodeType) pTable = document.getElementById(pTable)
    var ctx = {worksheet: pName || 'Worksheet', pTable: pTable.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})()