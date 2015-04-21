jQuery(document).ready(function(){
	"use strict";
		
	/* ---------------------------------------------------------------------- */
	/*	Sticky header
	/* ---------------------------------------------------------------------- */
	if($('.mt-headbar').length){
		// grab the initial top offset of the navigation 
		var stickyNavTop = $('.mt-headbar').offset().top;
		// our function that decides weather the navigation bar should have "fixed" css position or not.
		var stickyNav = function(){
			var scrollTop = $(window).scrollTop(); // our current vertical position from the top
			// if we've scrolled more than the navigation, change its position to fixed to stick to top,
			// otherwise change it back to relative
			if (scrollTop > stickyNavTop) { 
				$('.mt-headbar').addClass('kf_sticky');
			} else {
				$('.mt-headbar').removeClass('kf_sticky'); 
			}
		};
		stickyNav();
		// and run it again every time you scroll
		$(window).scroll(function() {
			stickyNav();
		});
	}
});

$(document).ready(function(){ 		
	$('#txtOrigen').on('change', function showUser() {
		
		var vValue = $('#txtOrigen').val();
		
		if(vValue == 0) {
			document.getElementById("txtDestino").innerHTML = "<option value='0'>Seleccione una ciudad de origen para ver los destinos</option>";
			return;
		} else { 
			if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else {
				// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {	
					if(xmlhttp.responseText == 'NOK'){
						document.getElementById("txtDestino").innerHTML = "<option value='0'>No hay destinos disponibles para el origen seleccionado</option>";
						return;
					}else{;
						document.getElementById("txtDestino").innerHTML = xmlhttp.responseText;
					}
				}
			}
			xmlhttp.open("GET","./filter/data/citys/"+vValue,true);
			xmlhttp.send();
		}
	});
});

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