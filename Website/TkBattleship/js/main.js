//On Load
$(function() {

	//Turn Grid Off
	$('#toggleGridOff').click(function() {
		// alert ("Made It");
		$('.cell').css("border-color","transparent");	
	}); 

	//Turn Grid On
	$('#toggleGridOn').click(function() {
		// alert ("Made It");
		$('.cell').css("border","1px solid #999");	
	}); 

	//Select map
	$('#selectMap').click(function() {
		// alert ("Made It");
		var selectedMap = $('#map option:selected').text();	
		$('.mapContainer').css('background','url(images/map' + selectedMap + '.png)'); 
	}); 

	//Navigation selected content
	$('#myTab a').click(function (e) {
	  e.preventDefault()
	  $(this).tab('show')
	});

	//Navigation selected content
	$('.unitPopup').hover(function () {
		var id = $(this).attr('id');
	  $('#' + id +'Content').toggle();
	});


});
