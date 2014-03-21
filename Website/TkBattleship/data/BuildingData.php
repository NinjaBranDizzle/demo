<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 11/19/13
 * Time: 6:52 PM
 */

namespace tk\data;

use tk\objects\Building;

/**
 * Class BuildingData
 * Data access class for manipulating buildings in the database.
 * @package tk_data
 */
class BuildingData
{
    private $conn = null;

    /**
     * @param \mysqli $conn
     */
    function __construct(\mysqli $conn)
    {
        $this->conn = $conn;
    }

    /**
     * Returns the mysql error
     * @return string
     */
    public function error_text()
    {
        $error_no = $this->conn->errno;
        $error = $this->conn->error;

        return "" . $error_no . "\t" . $error;

    }

    /**
     * Gets all buildings from the database.
     * @return array
     */
    public function get_all()
    {
        $buildings = array();
        $sql = "select ID, NAME, HEALTH, CAN_PARENT, POP_PROVIDED from BUILDINGS where 1=1";
        try {
            $result = $this->conn->query($sql, MYSQLI_STORE_RESULT);

            while ($row = $result->fetch_assoc()) {
                $building = new Building();
                $building->id = empty($row['ID']) ? 0 : $row['ID'];
                $building->name = empty($row['NAME']) ? '' : $row['NAME'];
                $building->health = empty($row['HEALTH']) ? 0 : $row['HEALTH'];
                $building->pop_provided = empty($row['POP_PROVIDED']) ? 0 : $row['POP_PROVIDED'];

                array_push($buildings, $building);
            }
        } catch (\Exception $ex) {
        }

        return $buildings;
    }

    /**
     * @param $structure_id
     * Gets a building from the database.
     * @return Building
     */
    public function get($structure_id)
    {
        $building = new Building();
        $sql = str_replace("{0}", $structure_id, "select ID, NAME, HEALTH, CAN_PARENT, POP_PROVIDED from BUILDINGS where ID='{0}'");

        try {
            $result = $this->conn->query($sql, MYSQLI_STORE_RESULT);
            while ($row = $result->fetch_assoc()) {
                $building->id = empty($row['ID']) ? 0 : $row['ID'];
                $building->health = empty($row['HEALTH']) ? "" : $row['HEALTH'];
                $building->name = empty($row['NAME']) ? "" : $row['NAME'];
                $building->can_parent = empty($row['CAN_PARENT']) ? "" : $row['CAN_PARENT'];
                $building->pop_provided = empty($row['POP_PROVIDED']) ? "" : $row['POP_PROVIDED'];
            }

        } catch (\Exception $ex) {

        }

        return $building;
    }

    /**
     * @param Building $building
     * Adds a new building in the database.
     * @return int
     */
    public function add(Building $building)
    {
        $building_id = 0;
        $sql = "insert into BUILDINGS ( NAME, HEALTH, CAN_PARENT, POP_PROVIDED ) "
            . "values('{0}', {1}, {2}, {3}) ";
        $params = [
            '{0}' => $building->name,
            '{1}' => $building->health,
            '{2}' => $building->can_parent,
            '{3}' => $building->pop_provided
        ];

        $prepared = str_replace(array_keys($params), array_values($params), $sql);

        try {
            $result = $this->conn->query($prepared, MYSQLI_STORE_RESULT);
            if ($result)
                $building_id = $this->conn->insert_id;
        } catch (\mysqli_sql_exception $ex) {
        } catch (\Exception $ex) {

        }

        return $building_id;
    }

    /**
     * @param Building $building
     * Updates a building in the database.
     * @return bool
     */
    public function update(Building $building)
    {
        if (empty($building) || $building->id < 1) return false;

        $success = false;
        $sql = "update BUILDINGS "
            . " set NAME='{0}', HEALTH={1}, CAN_PARENT={2}, POP_PROVIDED={3} "
            . " where ID={4}";
        $params = [
            '{0}' => $building->name,
            '{1}' => $building->health,
            '{2}' => $building->can_parent,
            '{3}' => $building->pop_provided,
            '{4}' => $building->id
        ];

        $prepared = str_replace(array_keys($params), array_values($params), $sql);

        try {
            $this->conn->query($prepared, MYSQLI_STORE_RESULT);
            $success = $this->conn->affected_rows > 0;
        } catch (\mysqli_sql_exception $ex) {
        } catch (\Exception $ex) {

        }

        return $success;

    }

    /**
     * @param $building_id
     * Deletes a building from the database.
     * @return bool
     */
    public function delete($building_id)
    {
        if (empty($building_id)) return false;

        $success = false;
        $sql = "delete from BUILDINGS where ID={0}";
        $params = [
            "{0}" => $building_id
        ];

        $prepared = str_replace(array_keys($params), array_values($params), $sql);

        try {
            $this->conn->query($prepared);
            $success = $this->conn->affected_rows > 0;

        } catch (\Exception $ex) {

        }

        return $success;
    }


}