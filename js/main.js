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


	//Select Unit type for editing
	$('#selectUnitSubmit').on('click',function(){
		var _selectedUnit = $('#editUnitSelect option:selected').text();
		console.log(_selectedUnit);
		$.post('/ajax/editUnitSelect.php',{
				task : 'getUnit',
				selectedUnit : _selectedUnit
			}
		)
		.error(
			function(data){
				console.log("Error retrieving Unit");
				console.log(data);
			})
		.success(
			function(data){
				console.log("Success");
				populateUnitAttributes(jQuery.parseJSON(data));
				
		});
	});

	//Populate Unit Attributes for Editing
	function populateUnitAttributes(data){
		console.log("made it");
		$('#unitHealth').val(data[0].HEALTH);
		$('#weakCurseMod').val(data[0].WEAK_CURSE_MOD);
		$('#strongCurseMod').val(data[0].STRONG_CURSE_MOD);
		$('#weakBuffMod').val(data[0].WEAK_BUFF_MOD);
		$('#strongBuffMod').val(data[0].STRONG_BUFF_MOD);
		$('#parentStructure').val(data[0].PARENT_STRUCTURE);

		var canFly = data[0].CAN_FLY;
		if(canFly === 1){
			$('#canFly').prop('checked', true);
		}else{
			$('#canFly').prop('checked', false);
		}

		var canDrive = data[0].CAN_DRIVE;
		if(canDrive === 1){
			$('#canDrive').prop('checked', true);
		}else{
			$('#canDrive').prop('checked', false);
		}

		var hasSuperpower = data[0].HAS_SUPER_POWER;
		if(hasSuperpower === 1){
			$('#hasSuperPower').prop('checked', true);
		}else{
			$('#hasSuperPower').prop('checked', false);
		}
	}

	//Save Unit Attributes to Database
	$('#submitUnitAtt').on('click', function(){
		var _unitDesc = $('#editUnitSelect option:selected').text();
		var _unitHealth = $('#unitHealth').val();
		var _weakCurseMod = $('#weakCurseMod').val();
		var _strongCurseMod = $('#strongCurseMod').val();
		var _weakBuffMod = $('#weakBuffMod').val();
		var _strongBuffMod = $('#strongBuffMod').val();
		var _parentStructure = $('#parentStructure').val();
		if ($('#canFly').is(':checked')){
			var _canFly = '1';
		}else
			var _canFly = '0';

		if ($('#canDrive').is(':checked')){
			var _canDrive = '1';
		}else
			var _canDrive = '0';

		if ($('#hasSuperPower').is(':checked')){
			var _hasSuperPower = '1';
		}else
			var _hasSuperPower = '0';
		//alert ("Unit Name: " + _unitDesc + "Unit Health: " + _unitHealth + ", Weak Curse Mod: " + _weakCurseMod + ", Strong Curse Mod: " + _strongCurseMod + ", Weak Buff Mod: " + _weakBuffMod + ", Strong Buff Mod: " + _strongBuffMod + ", Parent Structure: " + _parentStructure + ", Can Fly: " + _canFly + ", Can Drive:" + _canDrive + ", Super Power: " + _hasSuperPower);
		
		//Ajax post to save to database
		$.post('/ajax/editUnitSelect.php',{
				task : 'saveUnit',
				unitDesc : _unitDesc,
				unitHealth : _unitHealth,
				weakCurseMod : _weakCurseMod,
				strongCurseMod : _strongCurseMod,
				weakBuffMod : _weakBuffMod,
				strongBuffMod : _strongBuffMod,
				parentStructure : _parentStructure,
				canFly : _canFly,
				canDrive : _canDrive,
				hasSuperPower : _hasSuperPower
			}
		)
		.error(
			function(data){
				console.log("Error Saving Unit to database");
				console.log(data);
			})
		.success(
			function(data){
				console.log("Success Saving Unit to database");
				console.log(data);
				alert("Unit Attributes have been saved!");
				
		});

	});

});
