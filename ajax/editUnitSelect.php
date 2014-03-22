<?php  
	if(isset($_POST['task']) && $_POST['task'] == 'getUnit')
	{
		$selectedUnit = $_POST['selectedUnit'];
		require_once '../data/mysql.php';
		$mysql = New Mysql();
		$getUnits = $mysql->editUnitSelect($selectedUnit);
		echo json_encode($getUnits);
	}

		if(isset($_POST['task']) && $_POST['task'] == 'saveUnit')
	{
		$unitDesc = $_POST['unitDesc'];
		$unitHealth = $_POST['unitHealth'];
		$weakCurseMod = $_POST['weakCurseMod'];
		$strongCurseMod = $_POST['strongCurseMod'];
		$weakBuffMod = $_POST['weakBuffMod'];
		$strongBuffMod = $_POST['strongBuffMod'];
		$parentStructure = $_POST['parentStructure'];
		$canFly = $_POST['canFly'];
		$canDrive = $_POST['canDrive'];
		$hasSuperPower = $_POST['hasSuperPower'];

		require_once '../data/mysql.php';
		$mysql = New Mysql();
		$saveUnits = $mysql->saveUnitAtt($unitHealth, $weakCurseMod, $strongCurseMod, $weakBuffMod, $strongBuffMod, $parentStructure, $canFly, $canDrive, $hasSuperPower, $unitDesc);
		echo $saveUnits;
	}
?>