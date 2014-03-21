<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 11/19/13
 * Time: 7:27 PM
 */

namespace tk\data;

/**
 * Class UnitData
 * Data access class for units in the database.
 * @package tk_data
 */
class UnitData
{
    private $conn = false;

    function __construct(mysqli $conn)
    {
        $this->conn = $conn;
    }

    /**
     * @param $unit_id
     * Retrieves a single unit from the database.
     * @return Unit
     */
    public function get_unit($unit_id)
    {
        $unit = false;
        $sql = "select UNIT_ID, UNIT_DESC, HEALTH, WEAK_CURSE_MOD, STRONG_CURSE_MOD, WEAK_BUFF_MOD, STRONG_BUFF_MOD, PARENT_STRUCTURE, CAN_FLY, CAN_DRIVE, HAS_SUPER_POWER "
            . " "
            . "from BS_UNIT"
            . " "
            . "where UNIT_ID='" . $unit_id . "'";
        try {
            $result = $this->conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                $parent_structure = $row['PARENT_STRUCTURE'];
                $description = $row['UNIT_DESC'];

                $unit = new Unit();
                $unit->can_drive = (int)$row['CAN_DRIVE'] === 1;
                $unit->can_fly = (int)$row['CAN_FLY'] === 1;
                $unit->has_super_powers = (int)$row['HAS_SUPER_POWERS'] === 1;
                $unit->description = empty($description) ? '' : $description;
                $unit->parent_building = empty($parent_structure) ? '' : $parent_structure;
                $unit->strong_buff_mod = empty($row['STRONG_BUFF_MOD']) ? 0 : (int)$row['STRONG_BUFF_MOD'];
                $unit->weak_buff_mod = empty($row['WEAK_BUFF_MOD']) ? 0 : (int)$row['WEAK_BUFF_MOD'];
                $unit->strong_curse_mod = empty($row['STRONG_CURSE_MOD']) ? 0 : (int)$row['STRONG_CURSE_MOD'];
                $unit->weak_curse_mod = empty($row['WEAK_CURSE_MOD']) ? 0 : (int)$row['WEAK_CURSE_MOD'];
                $unit->health = empty($row['HEALTH']) ? 0 : (int)$row['HEALTH'];
                $unit->id = empty($row['UNIT_ID']) ? 0 : (int)$row['UNIT_ID'];

            }

        } catch (\mysqli_sql_exception $err) {

        }


        return $unit;
    }

    /**
     * Gets all units from the database.
     * @return array
     */
    public function get_all_units()
    {
        $units = array();
        $sql = "select UNIT_ID, UNIT_DESC, HEALTH, WEAK_CURSE_MOD, STRONG_CURSE_MOD, WEAK_BUFF_MOD, STRONG_BUFF_MOD, PARENT_STRUCTURE, CAN_FLY, CAN_DRIVE, HAS_SUPER_POWER "
            . " "
            . "from BS_UNIT"
            . " "
            . "where 1=1";
        try {
            $result = $this->conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                $parent_structure = $row['PARENT_STRUCTURE'];
                $description = $row['UNIT_DESC'];

                $unit = new Unit();
                $unit->can_drive = (int)$row['CAN_DRIVE'] === 1;
                $unit->can_fly = (int)$row['CAN_FLY'] === 1;
                $unit->has_super_powers = (int)$row['HAS_SUPER_POWERS'] === 1;
                $unit->description = empty($description) ? '' : $description;
                $unit->parent_building = empty($parent_structure) ? '' : $parent_structure;
                $unit->strong_buff_mod = empty($row['STRONG_BUFF_MOD']) ? 0 : (int)$row['STRONG_BUFF_MOD'];
                $unit->weak_buff_mod = empty($row['WEAK_BUFF_MOD']) ? 0 : (int)$row['WEAK_BUFF_MOD'];
                $unit->strong_curse_mod = empty($row['STRONG_CURSE_MOD']) ? 0 : (int)$row['STRONG_CURSE_MOD'];
                $unit->weak_curse_mod = empty($row['WEAK_CURSE_MOD']) ? 0 : (int)$row['WEAK_CURSE_MOD'];
                $unit->health = empty($row['HEALTH']) ? 0 : (int)$row['HEALTH'];
                $unit->id = empty($row['UNIT_ID']) ? '' : $row['UNIT_ID'];

                array_push($units, $unit);

            }

        } catch (\mysqli_sql_exception $err) {

        }


        return $units;

    }

    /**
     * @param Unit $unit
     * Adds a new unit to the database.
     * @return bool
     */
    public function add_unit(Unit $unit)
    {
        $success = false;
        $can_fly = $unit->can_fly ? 1 : 0;
        $can_drive = $unit->can_drive ? 1 : 0;
        $has_super_powers = $unit->has_super_powers ? 1 : 0;
        $sql = "insert into BS_UNIT(UNIT_DESC, HEALTH, WEAK_CURSE_MOD, STRONG_CURSE_MOD, WEAK_BUFF_MOD, "
            . "STRONG_BUFF_MOD, PARENT_STRUCTURE, CAN_FLY, CAN_DRIVE, HAS_SUPER_POWER)"
            . " "
            . "values('" . $unit->description . "', " . $unit->health . ", " . $unit->weak_curse_mod . ", " . $unit->strong_curse_mod . ", " . $unit->weak_buff_mod . ", "
            . "" . $unit->strong_buff_mod . ", '" . $unit->parent_building . "', " . $can_fly . ", " . $can_drive
            . ", " . $has_super_powers . ");"
            . "select Max(UNIT_ID) from BS_UNITS";

        try {
            $row = mysql_query($sql);
            while ($field = mysql_fetch_assoc($row)) {
                $unit->id = empty($field[0]) || is_null($field[0]) ? 0 : $field[0];
                $success = $unit->id > 0;
            }

        } catch (\mysqli_sql_exception $err) {
        }

        return $success;
    }

    /**
     * @param Unit $unit
     * Update a unit in the database.
     * @return bool
     */
    public function update_unit(Unit $unit)
    {
        $success = false;
        $can_fly = $unit->can_fly ? 1 : 0;
        $can_drive = $unit->can_drive ? 1 : 0;
        $has_super_powers = $unit->has_super_powers ? 1 : 0;
        $sql = "update BS_UNIT "
            . "set UNIT_DESC='" . $unit->description . "', HEALTH=" . $unit->health . ", WEAK_CURSE_MOD=" . $unit->weak_curse_mod . ","
            . " STRONG_CURSE_MOD= " . $unit->strong_curse_mod . ", WEAK_BUFF_MOD=" . $unit->weak_buff_mod . ", "
            . "STRONG_BUFF_MOD=" . $unit->strong_buff_mod . ", PARENT_STRUCTURE='" . $unit->parent_building . "',"
            . " CAN_FLY=" . $can_fly . ", CAN_DRIVE=" . $can_drive
            . ", HAS_SUPER_POWER=" . $has_super_powers . " where UNIT_ID='" . $unit->id . "'";

        try {
            $result = $this->conn->query($sql);
            $success = $this->conn->affected_rows > 0;

        } catch (\mysqli_sql_exception $err) {
        }

        return $success;
    }

    /**
     * @param $unit_id
     * Deletes a unit from the database.  ( Actual delete ).
     * @return bool
     */
    public function remove_unit($unit_id)
    {
        $success = false;
        $sql = "delete *"
            . " "
            . "from BS_UNITS"
            . " "
            . "where UNIT_ID='" . $unit_id . "'";

        try {
            $success = mysql_num_rows(mysql_query($sql)) > 0;
        } catch (\mysqli_sql_exception $err) {

        }

        return $success;
    }

    /**
     * @param $building_id
     * Gets a list of units by parent structure.
     * @return array
     */
    public function get_units($building_id)
    {
        $units = array();
        $sql = "select UNIT_ID, UNIT_DESC, HEALTH, WEAK_CURSE_MOD, STRONG_CURSE_MOD, WEAK_BUFF_MOD, STRONG_BUFF_MOD, PARENT_STRUCTURE, CAN_FLY, CAN_DRIVE, HAS_SUPER_POWER "
            . " "
            . "from BS_UNIT"
            . " "
            . "where PARENT_STRUCTURE='" . $building_id . "'";
        try {
            $rows = mysql_query($sql);
            while ($row = mysql_fetch_assoc($rows)) {
                $parent_structure = $row['PARENT_STRUCTURE'];
                $description = $row['UNIT_DESC'];

                $unit = new Unit();
                $unit->can_drive = $row['CAN_DRIVE'] === 1;
                $unit->can_fly = $row['CAN_FLY'] === 1;
                $unit->has_super_powers = $row['HAS_SUPER_POWERS'] === 1;
                $unit->description = empty($description) || is_null($description) ? '' : $description;
                $unit->parent_building = empty($parent_structure) || is_null($parent_structure) ? '' : $parent_structure;
                $unit->strong_buff_mod = empty($row['STRONG_BUFF_MOD']) || is_null($row['STRONG_BUFF_MOD']) ? 0 : $row['STRONG_BUFF_MOD'];
                $unit->weak_buff_mod = empty($row['WEAK_BUFF_MOD']) || is_null($row['WEAK_BUFF_MOD']) ? 0 : $row['WEAK_BUFF_MOD'];
                $unit->strong_curse_mod = empty($row['STRONG_CURSE_MOD']) || is_null($row['STRONG_CURSE_MOD']) ? 0 : $row['STRONG_CURSE_MOD'];
                $unit->weak_curse_mod = empty($row['WEAK_CURSE_MOD']) || is_null($row['WEAK_CURSE_MOD']) ? 0 : $row['WEAK_CURSE_MOD'];
                $unit->health = empty($row['HEALTH']) || is_null($row['HEALTH']) ? 0 : $row['HEALTH'];
                $unit->id = empty($row['UNIT_ID']) || is_nan($row['UNIT_ID']) ? 0 : $row['UNIT_ID'];

                array_push($units, $unit);
            }

        } catch (\mysqli_sql_exception $err) {

        }


        return $units;
    }

}