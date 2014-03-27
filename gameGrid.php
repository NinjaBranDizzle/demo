<?php

	function drawgrid()
	{
		require 'data/mysql.php';
		$mysql = New Mysql();
		$mapUnits = $mysql->loadGame();

		//global $color, $unit, $health, $weakCurse, $strongCurse, $weakBuff, $strongBuff, $airAttack, $airDefence, $groundAttack, $groundDefence, $attackRange, $moveRange, $superPower;


		foreach($mapUnits as $tempUnit){
			
			$color[$tempUnit['map_row']][$tempUnit['map_column']] = $tempUnit['color'];
			$unit[$tempUnit['map_row']][$tempUnit['map_column']] = $tempUnit['unit'];
			$health[$tempUnit['map_row']][$tempUnit['map_column']] = $tempUnit['health'];
			$weakCurse[$tempUnit['map_row']][$tempUnit['map_column']] = $tempUnit['weak_curse'];
			$strongCurse[$tempUnit['map_row']][$tempUnit['map_column']] = $tempUnit['strong_curse'];
			$weakBuff[$tempUnit['map_row']][$tempUnit['map_column']] = $tempUnit['weak_buff'];
			$strongBuff[$tempUnit['map_row']][$tempUnit['map_column']] = $tempUnit['strong_buff'];
			$airAttack[$tempUnit['map_row']][$tempUnit['map_column']] = $tempUnit['air_attack'];
			$airDefence[$tempUnit['map_row']][$tempUnit['map_column']] = $tempUnit['air_defence'];
			$groundAttack[$tempUnit['map_row']][$tempUnit['map_column']] = $tempUnit['ground_attack'];
			$groundDefence[$tempUnit['map_row']][$tempUnit['map_column']] = $tempUnit['ground_defence'];
			$attackRange[$tempUnit['map_row']][$tempUnit['map_column']] = $tempUnit['attack_range'];
			$moveRange[$tempUnit['map_row']][$tempUnit['map_column']] = $tempUnit['move_range'];
			$superPower[$tempUnit['map_row']][$tempUnit['map_column']] = $tempUnit['super_power'];
        }

		echo ('<div class="mapContainer">');
		echo ('<form name="gamedata">');

		//Loop through rows in the grid
		for ($i = 0; $i < 12; $i++)
		{
			//Loop through the columns
			for ($j = 0; $j < 18; $j++)	
			{
				echo ('<div class="cell">');

				if (!isset($color[$i][$j]))
				{
					echo ('<img class="unitPopup" src="images/units/emptyCell.gif" id="'.$i.'-'.$j.'" onclick="cellClicked('.$i.','.$j.',\'\',\'\');" />');
					echo ('<div id="'.$i.'-'.$j.'Content" class="noUnitStats"></div>');

				} else {
					echo ('<img class="unitPopup" id="'.$i.'-'.$j.'" src="images/units/'.$color[$i][$j].$unit[$i][$j].'Jitter.gif" onclick="cellClicked('.$i.','.$j.',\''.$color[$i][$j].'\',\''.$unit[$i][$j].'\','.$health[$i][$j].','.$weakCurse[$i][$j].','.$strongCurse[$i][$j].','.$weakBuff[$i][$j].','.$strongBuff[$i][$j].','.$airAttack[$i][$j].','.$airDefence[$i][$j].','.$groundAttack[$i][$j].','.$groundDefence[$i][$j].','.$attackRange[$i][$j].','.$moveRange[$i][$j].','.$superPower[$i][$j].');" />');
					echo ('<div id="'.$i.'-'.$j.'Content" class="unitStats">');
					echo ('<h4>'.$color[$i][$j].$unit[$i][$j].'</h4>');
					echo ('<p>Health: '.$health[$i][$j].'</p>');
					echo ('<p>Super Power: '.$superPower[$i][$j].'/1</p>');
					echo ('</div>');

				}

				echo("</div>");
			}
		}		
		echo('<input type="hidden" name="turn" value="Red">'); /*Initialize so Red is the starting player...for now*/
		echo('<input type="hidden" name="fromRow" value="<? if (isGoodMove) echo ($_POST[\'fromRow\']); ?>">');
		echo('<input type="hidden" name="fromCol" value="<? if (isGoodMove) echo ($_POST[\'fromCol\']); ?>">');
		echo('<input type="hidden" name="toRow" value="<? if (isGoodMove) echo ($_POST[\'toRow\']); ?>">');
		echo('<input type="hidden" name="toCol" value="<? if (isGoodMove) echo ($_POST[\'toCol\']); ?>">');
		echo('<input type="hidden" name="fromColor" value="<? if (isGoodMove) echo ($_POST[\'fromColor\']); ?>">');
		echo('<input type="hidden" name="fromUnit" value="<? if (isGoodMove) echo ($_POST[\'fromUnit\']); ?>">');
		echo('<input type="hidden" name="fromHealth">');
		echo('<input type="hidden" name="fromWeakCurse">');
		echo('<input type="hidden" name="fromStrongCurse">');
		echo('<input type="hidden" name="fromWeakBuff">');
		echo('<input type="hidden" name="fromStrongBuff">');
		echo('<input type="hidden" name="fromAirAttack">');
		echo('<input type="hidden" name="fromAirDefence">');
		echo('<input type="hidden" name="fromGroundAttack">');
		echo('<input type="hidden" name="fromGroundDefence">');
		echo('<input type="hidden" name="fromAttackRange">');
		echo('<input type="hidden" name="fromMoveRange">');
		echo('<input type="hidden" name="fromSuperPower">');

		echo("</form></div>");
	}


?>
