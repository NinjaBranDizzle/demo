<?php

	//Define constants here
	define('DB_SERVER', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASSWORD', 'root');
	define('DB_NAME','tk');
class Mysql
{
    private $conn;

    function __construct()
    {
        $this->conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or
        die('There was a problem connecting to the database.');
    }

    function verify_Username_and_Pass($un, $pwd)
    {

        $query = "SELECT * FROM BS_USERS WHERE username = ? AND password = ? LIMIT 1";

        if ($stmt = $this->conn->prepare($query)) {
            $stmt->bind_param('ss', $un, $pwd);
            $stmt->execute();

            if ($stmt->fetch()) {
                $stmt->close();
                return true;
            }
        }
    }

    function check_Username_Existance($un)
    {
        $query = "SELECT username FROM BS_USERS WHERE username = ?";
        if ($stmt = $this->conn->prepare($query)) {
            $stmt->bind_param('s', $un);
            $stmt->execute();

            if ($stmt->fetch()) {
                $stmt->close();
                return true;
            }
        }
    }

    function register_User($un, $pwd)
    {
        $query = "INSERT INTO BS_USERS (username, password) VALUES(?,?)";
        if ($stmt = $this->conn->prepare($query)) {
            $stmt->bind_param('ss', $un, $pwd);
            $stmt->execute();

            if ($stmt->fetch()) {
                $stmt->close();
                return true;
            }
        }
    }

    function units()
    {
        $query = "SELECT * FROM BS_USERS";

        if ($stmt = $this->conn->prepare($query)) {
            $stmt->execute();
            $arr = array();
            while ($row = mysql_fetch_array($stmt)) {
                $arr[] = $row;
            }
            return $stmt;

        }
    }

	function loadGame($layout)	{


		$query = "SELECT map_row, map_column, color, unit, health, weak_curse, strong_curse, weak_buff, strong_buff, air_attack, air_defence, ground_attack, ground_defence, attack_range, move_range, super_power FROM map WHERE MAP_NAME = ? ";
		if($stmt = $this->conn->prepare($query)){
            $stmt->bind_param('s', $layout);
			$stmt->execute();

	
			$meta = $stmt->result_metadata();
            while($fields = $meta->fetch_field()) {
                $result_param[] = &$row[$fields->name];
            }
         	call_user_func_array(array($stmt, 'bind_result'), $result_param);
            while ($stmt->fetch()) {
				foreach ($row as $key => $value) {
                    $c[$key] = $value;
                }
                $arr[] = $c;
            }
            $stmt->close();
			return $arr;

		}
	}


	function saveGame(){
		global $turn, $color, $unit, $health, $weakCurse, $strongCurse, $weakBuff, $strongBuff, $airAttack, $airDefence, $groundAttack, $groundDefence, $attackRange, $moveRange, $superPower;

		/*Loop through the rows*/
		for ($i = 0; $i < 12; $i++)
		{
			/*Loop through the columns*/
			for ($j = 0; $j < 18; $j++)	
			{
				//Map refreshes before saving so force a change to prove something saves. Just temporary.
				if ($i == 0 && $j == 8) {
					$color[$i][$j] = 'Blue';
					$unit[$i][$j] = 'Tank';
				}

/*				$query = "UPDATE map SET color = '".$color[$i][$j]."', unit = '".$unit[$i][$j]."', health = ".$health[$i][$j].", weak_curse = ".$weakCurse[$i][$j].", strong_curse = ".$strongCurse[$i][$j].", weak_buff = ".$weakBuff[$i][$j].", strong_buff = ".$strongBuff[$i][$j].", super_power = ".$superPower[$i][$j]." WHERE map_row = ".$i." AND map_column = ".$j;
*/
				$query = "UPDATE map SET color=?, unit=?, health=?, weak_curse=?, strong_curse=?, weak_buff=?, strong_buff=?, air_attack=?, air_defence=?, ground_attack=?, ground_defence=?, attackRange=?, moveRange=?, super_power=? WHERE map_row=? AND map_column=?";

				if($stmt = $this->conn->prepare($query)){
					$stmt->bind_param('ssiiiiiiiiiiiiii', $color[$i][$j],$unit[$i][$j],$health[$i][$j],$weakCurse[$i][$j],$strongCurse[$i][$j],$weakBuff[$i][$j],$strongBuff[$i][$j],$airAttack[$i][$j],$airDefence[$i][$j],$groundAttack[$i][$j],$groundDefence[$i][$j],$attackRange[$i][$j],$moveRange[$i][$j],$superPower[$i][$j],$i,$j);
					if ($stmt->execute())
					{
						if ($i == 0 && $j < 9) {
                            //Testing
							//echo ($i.$j.$unit[$i][$j]);
						}
						
					} else {
						/*update didn't work*/
						echo ('ouch');
						printf("Error: %s.\n", $stmt->error);
					}
					/*$stmt->close();*/
				}
			}
		}
	}

	//Load Buildings types
	function loadBuildingTypes() {
		$query = "SELECT NAME FROM BUILDINGS";
		if($stmt = $this->conn->prepare($query)){
			$stmt->execute();

			$meta = $stmt->result_metadata();
            while($fields = $meta->fetch_field()) {
                $result_param[] = &$row[$fields->name];
            }
         	call_user_func_array(array($stmt, 'bind_result'), $result_param);
            while ($stmt->fetch()) {
                foreach ($row as $key => $value) {
                    $c[$key] = $value;
                }
                $arr[] = $c;
            }
            $stmt->close();
            return $arr;

		}
	}

    //Load Scoarboard
    function loadScoreboard() {
        $query = "SELECT * FROM SCOREBOARD ORDER BY score DESC";
        if($stmt = $this->conn->prepare($query)){
            $stmt->execute();

            $meta = $stmt->result_metadata();
            while($fields = $meta->fetch_field()) {
                $result_param[] = &$row[$fields->name];
            }
            call_user_func_array(array($stmt, 'bind_result'), $result_param);
            while ($stmt->fetch()) {
                foreach ($row as $key => $value) {
                    $c[$key] = $value;
                }
                $arr[] = $c;
            }
            $stmt->close();
            return $arr;
        }
    }

    //Add new score to scoreboard
    function addScore($name, $score, $url)
    {
        $query = "INSERT INTO SCOREBOARD (name, score, url) VALUES(?,?,?)";
        if ($stmt = $this->conn->prepare($query)) {
            $stmt->bind_param('sis', $name, $score, $url);
            $stmt->execute();

            if ($stmt->fetch()) {
                $stmt->close();
                return true;
            }
        }
    }

	//Load Attributes for single Building
	function editBuildingSelect($building) {
		$query = "SELECT * FROM BUILDINGS WHERE NAME = ? ";
		if($stmt = $this->conn->prepare($query)){
			$stmt->bind_param('s', $building);
			$stmt->execute();

			$meta = $stmt->result_metadata();
            while($fields = $meta->fetch_field()) {
                $result_param[] = &$row[$fields->name];
            }
         	call_user_func_array(array($stmt, 'bind_result'), $result_param);
            while ($stmt->fetch()) {
                foreach ($row as $key => $value) {
                    $c[$key] = $value;
                }
                $arr[] = $c;
            }
            $stmt->close();
            return $arr;
		}
	}

	//Save Attributes for single building
	function saveBuildingAtt($buildingHealth, $canParent, $popProvided, $buildingName) {
		$query = "UPDATE BUILDINGS SET HEALTH=?, CAN_PARENT=?, POP_PROVIDED=? WHERE NAME=?";
		if($stmt = $this->conn->prepare($query)){
			$stmt->bind_param('iiis', $buildingHealth, $canParent, $popProvided, $buildingName);
            $stmt->execute();

			if ($stmt->errno) {
			  echo "FAILURE!!! " . $stmt->error();
			}
			else echo "Updated {$stmt->affected_rows} rows";
			$stmt->close();


		}
	}

	//Load Units for Edit Units Functionality
	function loadUnitTypes() {
		$query = "SELECT UNIT_DESC FROM BS_UNIT";
		if($stmt = $this->conn->prepare($query)){
			$stmt->execute();

			$meta = $stmt->result_metadata();
            while($fields = $meta->fetch_field()) {
                $result_param[] = &$row[$fields->name];
            }
         	call_user_func_array(array($stmt, 'bind_result'), $result_param);
            while ($stmt->fetch()) {
				foreach ($row as $key => $value) {
                    $c[$key] = $value;
//printf("Unit: %s.\n", $c[$key]);
                }
                $arr[] = $c;
            }
            $stmt->close();
			return $arr;

		}
	}

	//Load Attributes for single unit
	function editUnitSelect($unit) {
		$query = "SELECT * FROM BS_UNIT WHERE UNIT_DESC = ? ";
//		$query = "SELECT HEALTH FROM BS_UNIT WHERE UNIT_DESC = ? ";
		if($stmt = $this->conn->prepare($query)){
			$stmt->bind_param('s', $unit);
			$stmt->execute();

			$meta = $stmt->result_metadata();
            while($fields = $meta->fetch_field()) {
                $result_param[] = &$row[$fields->name];
            }
         	call_user_func_array(array($stmt, 'bind_result'), $result_param);
            while ($stmt->fetch()) {
                foreach ($row as $key => $value) {
                    $c[$key] = $value;
				}
                $arr[] = $c;
            }
            $stmt->close();
            return $arr;
		}
	}

	//Load Attributes for single unit
//	function saveUnitAtt($unitHealth, $weakCurseMod, $strongCurseMod, $weakBuffMod, $strongBuffMod, $parentStructure, $canFly, $canDrive, $hasSuperPower, $unitDesc) {
	function saveUnitAtt($unitHealth, $weakCurseMod, $strongCurseMod, $weakBuffMod, $strongBuffMod, $airAttack, $airDefence, $groundAttack, $groundDefence, $attackRange, $moveRange, $hasSuperPower, $unitDesc) {
//		$query = "UPDATE BS_UNIT SET HEALTH=?, WEAK_CURSE_MOD=?, STRONG_CURSE_MOD=?, WEAK_BUFF_MOD=?, STRONG_BUFF_MOD=?, PARENT_STRUCTURE=?, CAN_FLY=?, CAN_DRIVE=?, HAS_SUPER_POWER=? WHERE UNIT_DESC=?";
		$query = "UPDATE BS_UNIT SET HEALTH=?, WEAK_CURSE_MOD=?, STRONG_CURSE_MOD=?, WEAK_BUFF_MOD=?, STRONG_BUFF_MOD=?, AIR_ATTACK=?, AIR_DEFENCE=?, GROUND_ATTACK=?, GROUND_DEFENCE=?, ATTACK_RANGE=?, MOVE_RANGE=?, HAS_SUPER_POWER=? WHERE UNIT_DESC=?";

		if($stmt = $this->conn->prepare($query)){
//			$stmt->bind_param('iiiiisiiis', $unitHealth, $weakCurseMod, $strongCurseMod, $weakBuffMod, $strongBuffMod, $parentStructure, $canFly, $canDrive, $hasSuperPower, $unitDesc);
			$stmt->bind_param('iiiiiiiiiiiis', $unitHealth, $weakCurseMod, $strongCurseMod, $weakBuffMod, $strongBuffMod, $airAttack, $airDefence, $groundAttack, $groundDefence, $attackRange, $moveRange, $hasSuperPower, $unitDesc);
            $stmt->execute();

			if ($stmt->errno) {
			  echo "FAILURE!!! " . $stmt->error();
			}
			else echo "Updated {$stmt->affected_rows} rows";
			$stmt->close();


		}
	}
}