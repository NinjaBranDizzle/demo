<?php

class Unit{

	function unitAttributes($id){
		$mysql = New Mysql();
		$unitAtt = $mysql->unit_Attributes($id);
		
		if($unitAtt){
			return '3';
		}else return '3';
	}
}
?>