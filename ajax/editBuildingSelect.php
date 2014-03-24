<?php  
	if(isset($_POST['task']) && $_POST['task'] == 'getBuilding')
	{
		$selectedBuilding = $_POST['selectedBuilding'];
		require_once '../data/mysql.php';
		$mysql = New Mysql();
		$getBuilding = $mysql->editBuildingSelect($selectedBuilding);
		echo json_encode($getBuilding);
	}

		if(isset($_POST['task']) && $_POST['task'] == 'saveBuilding')
	{
		$buildingName = $_POST['buildingName'];
		$buildingHealth = $_POST['buildingHealth'];
		$canParent = $_POST['canParent'];
		$popProvided = $_POST['popProvided'];

		require_once '../data/mysql.php';
		$mysql = New Mysql();
		$saveBuildings = $mysql->saveBuildingAtt($buildingHealth, $canParent, $popProvided,$buildingName);
		echo $saveBuildings;
	}
?>