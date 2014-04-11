//On Load
$(function() {
	//Start new single player game
	$('#singlePlayerButton').on('click', function(){
		$('#singlePlayerModal').slideDown();
	});

	$('#singlePlayerCloseButton').on('click', function(){
		$('#singlePlayerModal').slideUp();
	});

	//Modal map selection
	$('#mapSelect').change(function(){
		var selectedMap = $('#mapSelect option:selected').val();
		console.log("Map selected: " + selectedMap);
		$('#selectedMapPreview').attr('src', 'images/' + selectedMap + 'Preview.png');
	});

	$('#selectMapButton').on('click', function(){
		var selectedMap = $('#mapSelect option:selected').val();
		var selectedLayout = $('#layoutSelect option:selected').val();
		window.location.href = "/game.php?map=" + selectedMap + "&layout=" + selectedLayout;
	});

	//Submit new score
	$('#submitScore').on('click', function(){
		alert ("made it");
		var url = $('#scoreurl').val();
		var name = $('#scoreName').val();
		var score = $('#scoreAmount').val();
		//console.log("URL: " + url + " Name: " + name + " Score: " + score);
		updateScore(url, name, score);
	});

	function updateScore($url, $name, $score){
		//console.log("URL: " + $url + " Name: " + $name + " Score: " + $score);
		_url = $url;
		_name = $name;
		_score = $score;
		$.post('/ajax/addScore.php',{
			task : 'addScore',
			url : _url,
			name : _name,
			score : _score
			}
		)
		.error(
			function(data){
				console.log("Error adding score");
				console.log(data);
			})
		.success(
			function(data){
				console.log("Added Score!");				
				console.log(data);			
				alert(data);
		});
	}

	//Admin Side Navigation
	$('.adminSideNav').on('click', function(){
		var content = $(this).attr('id');
		$('.adminSideNav').removeClass('active');
		$('.adminContent').hide();
		$(this).addClass('active');
		$('#' + content + 'Content').show();
	});

	$('.nav').on('click', function(){
		var content = $(this).attr('id');
		$('.content').hide();
		$('#' + content + 'Content').show();
	});

	$('#register').on('click', function(){
		$('#registerContent').slideDown();
	});

	//Register a new user
	$('#registerSubmit').on('click', function(){
		var _username = $('#username').val();
		var _password = $('#password').val();
		var _repeatpassword = $('#repeatpassword').val();
		console.log("Username: " + _username + "Password: " + _password + "RepeatPassword: " + _repeatpassword);
		$.post('/ajax/registerUser.php',{
				task : 'registerUser',
				username : _username,
				password : _password,
				repeatpassword : _repeatpassword
			}
		)
		.error(
			function(data){
				console.log("Error registering user");
				console.log(data);
			})
		.success(
			function(data){
				console.log("Registration Success");				
				console.log(data);		
				if(data == "Successfully Registered!"){
					$('#registerContent').slideUp();
				}		
				alert(data);
		});
	});

	//Navigation selected content
	$('.unitPopup').hover(function () {
		var id = $(this).attr('id');
	  $('#' + id +'Content').toggle();
	});

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

	//Select Building type for editing
	$('#editBuildingSelect').change(function(){
		var _selectedBuilding = $('#editBuildingSelect option:selected').text();
		console.log(_selectedBuilding);
		$.post('/ajax/editBuildingSelect.php',{
				task : 'getBuilding',
				selectedBuilding : _selectedBuilding
			}
		)
		.error(
			function(data){
				console.log("Error retrieving Building");
				console.log(data);
			})
		.success(
			function(data){
				console.log("selectBuildingSubmit Success");
				populateBuildingAttributes(jQuery.parseJSON(data));
				
		});
	});

	//Populate Building Attributes for Editing
	function populateBuildingAttributes(data){

		console.log("made it");
		$('#buildingHealth').val(data[0].HEALTH);

		var canParent = data[0].CAN_PARENT;
		if(canParent === 1){
			$('#canParent').prop('checked', true);
		}else{
			$('#canParent').prop('checked', false);
		}
		$('#popProvided').val(data[0].POP_PROVIDED);

	}

	//Save Building Attributes to Database
	$('#submitBuildingAtt').on('click', function(){
		var _buildingName = $('#editBuildingSelect option:selected').text();
		var _buildingHealth = $('#buildingHealth').val();

		if ($('#canParent').is(':checked')){
			var _canParent = '1';
		}else
			var _canParent = '0';

		var _popProvided = $('#popProvided').val();
		//alert ("Building Name: " + _buildingName + " Building Health: " + _buildingHealth + " Can Parent: " + _canParent + " Pop Provided: " + _popProvided);
		
		//Ajax post to save to database
		$.post('ajax/editBuildingSelect.php',{
				task : 'saveBuilding',
				buildingName : _buildingName,
				buildingHealth : _buildingHealth,
				canParent : _canParent,
				popProvided : _popProvided
			}
		)
		.error(
			function(data){
				console.log("Error Saving Building to database");
				console.log(data);
			})
		.success(
			function(data){
				console.log("Success Saving Building to database");
				console.log(data);
				alert("Building Attributes have been saved!");
				
		});

	});

	//Save Building Attributes to Database
	function saveBuildingAttributes(){
		var _buildingName = $('#editBuildingSelect option:selected').text();
		var _buildingHealth = $('#buildingHealth').val();

		if ($('#canParent').is(':checked')){
			var _canParent = '1';
		}else
			var _canParent = '0';

		var _popProvided = $('#popProvided').val();
		//alert ("Building Name: " + _buildingName + " Building Health: " + _buildingHealth + " Can Parent: " + _canParent + " Pop Provided: " + _popProvided);
		
		//Ajax post to save to database
		$.post('ajax/editBuildingSelect.php',{
				task : 'saveBuilding',
				buildingName : _buildingName,
				buildingHealth : _buildingHealth,
				canParent : _canParent,
				popProvided : _popProvided
			}
		)
		.error(
			function(data){
				console.log("Error Saving Building to database");
				console.log(data);
			})
		.success(
			function(data){
				console.log("Success Saving Building to database");
				console.log(data);
				alert("Building Attributes have been saved!");
				
		});

	};

	//Select Unit type for editing
	$('#editUnitSelect').change(function(){
		var _selectedUnit = $('#editUnitSelect option:selected').text();
//		console.log(_selectedUnit);
		$.post('ajax/editUnitSelect.php',{
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
				console.log("selectUnitSubmit Success" + data);
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
		$('#airAttack').val(data[0].AIR_ATTACK);
		$('#airDefence').val(data[0].AIR_DEFENCE);
		$('#groundAttack').val(data[0].GROUND_ATTACK);
		$('#groundDefence').val(data[0].GROUND_DEFENCE);
		$('#attackRange').val(data[0].ATTACK_RANGE);
		$('#moveRange').val(data[0].MOVE_RANGE);

/*
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
*/
		var hasSuperpower = data[0].HAS_SUPER_POWER;
		if(hasSuperpower === 1){
			$('#hasSuperPower').prop('checked', true);
		}else{
			$('#hasSuperPower').prop('checked', false);
		}

	}

	$('#submitUnitAtt').on('click', function(){
		saveUnitAttributes();
	});

	//Save Unit Attributes to Database
	function saveUnitAttributes(){
		var _unitDesc = $('#editUnitSelect option:selected').text();
		var _unitHealth = $('#unitHealth').val();
		var _weakCurseMod = $('#weakCurseMod').val();
		var _strongCurseMod = $('#strongCurseMod').val();
		var _weakBuffMod = $('#weakBuffMod').val();
		var _strongBuffMod = $('#strongBuffMod').val();
		var _airAttack = $('#airAttack').val();
		var _airDefence = $('#airDefence').val();
		var _groundAttack = $('#groundAttack').val();
		var _groundDefence = $('#groundDefence').val();
		var _attackRange = $('#attackRange').val();
		var _moveRange = $('#moveRange').val();

/*
		var _parentStructure = $('#parentStructure').val();
		if ($('#canFly').is(':checked')){
			var _canFly = '1';
		}else
			var _canFly = '0';

		if ($('#canDrive').is(':checked')){
			var _canDrive = '1';
		}else
			var _canDrive = '0';
*/
		if ($('#hasSuperPower').is(':checked')){
			var _hasSuperPower = '1';
		}else
			var _hasSuperPower = '0';
		//alert ("Unit Name: " + _unitDesc + "Unit Health: " + _unitHealth + ", Weak Curse Mod: " + _weakCurseMod + ", Strong Curse Mod: " + _strongCurseMod + ", Weak Buff Mod: " + _weakBuffMod + ", Strong Buff Mod: " + _strongBuffMod + ", Parent Structure: " + _parentStructure + ", Can Fly: " + _canFly + ", Can Drive:" + _canDrive + ", Super Power: " + _hasSuperPower);
		
		//Ajax post to save to database
		$.post('ajax/editUnitSelect.php',{
				task : 'saveUnit',
				unitDesc : _unitDesc,
				unitHealth : _unitHealth,
				weakCurseMod : _weakCurseMod,
				strongCurseMod : _strongCurseMod,
				weakBuffMod : _weakBuffMod,
				strongBuffMod : _strongBuffMod,
				airAttack : _airAttack,
				airDefence : _airDefence,
				groundAttack : _groundAttack,
				groundDefence : _groundDefence,
				attackRange : _attackRange,
				moveRange : _moveRange,
/*				parentStructure : _parentStructure,
				canFly : _canFly,
				canDrive : _canDrive,
*/
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

	}

});
