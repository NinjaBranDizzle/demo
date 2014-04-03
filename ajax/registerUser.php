<?php  
	if(isset($_POST['task']) && $_POST['task'] == 'registerUser')
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$repeatpassword = $_POST['repeatpassword'];
		require_once '../data/users.php';
		$user = new User();
		$getUser = $user->register_User($username, $password, $repeatpassword);
		echo $getUser;
	}

	if(isset($_POST['task']) && $_POST['task'] == 'saveUnit')
	{
		$unitDesc = $_POST['unitDesc'];
		$unitHealth = $_POST['unitHealth'];
		$weakCurseMod = $_POST['weakCurseMod'];
		$strongCurseMod = $_POST['strongCurseMod'];
		$weakBuffMod = $_POST['weakBuffMod'];
		$strongBuffMod = $_POST['strongBuffMod'];
		$airAttack = $_POST['airAttack'];
		$airDefence = $_POST['airDefence'];
		$groundAttack = $_POST['groundAttack'];
		$groundDefence = $_POST['groundDefence'];
		$attackRange = $_POST['attackRange'];
		$moveRange = $_POST['moveRange'];
/*
		$parentStructure = $_POST['parentStructure'];
		$canFly = $_POST['canFly'];
		$canDrive = $_POST['canDrive'];
*/
		$hasSuperPower = $_POST['hasSuperPower'];

		require_once '../data/mysql.php';
		$mysql = New Mysql();
//		$saveUnits = $mysql->saveUnitAtt($unitHealth, $weakCurseMod, $strongCurseMod, $weakBuffMod, $strongBuffMod, $parentStructure, $canFly, $canDrive, $hasSuperPower, $unitDesc);
		$saveUnits = $mysql->saveUnitAtt($unitHealth, $weakCurseMod, $strongCurseMod, $weakBuffMod, $strongBuffMod, $airAttack, $airDefence, $groundAttack, $groundDefence, $attackRange, $moveRange, $hasSuperPower, $unitDesc);
		echo $saveUnits;
	}
?>