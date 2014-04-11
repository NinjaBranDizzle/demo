<?php  
	if(isset($_POST['task']) && $_POST['task'] == 'addScore')
	{
		$url = $_POST['url'];
		$name = $_POST['name'];
		$score = $_POST['score'];
		require_once '../data/mysql.php';
		$mysql = New Mysql();
		$addScore = $mysql->addScore($name, $score, $url);
		echo $addScore;
	}

?>