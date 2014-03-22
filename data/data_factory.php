<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 2/9/14
 * Time: 9:25 PM
 */

namespace tk\data;

require_once 'user_data.php';
require_once 'unit_data.php';
require_once 'building_data.php';


/**
 * Class DataFactory
 * Factory class for instantiating project data classes.
 * @package tk\data
 */
class DataFactory
{
    private $user_data = false;
    private $building_data = false;
    private $unit_data = false;
    private $conn = null;

    function __construct()
    {
        $this->conn = $this->db_conn();
    }

    public function user_data()
    {
        if (!$this->user_data) $this->user_data = new UserData($this->conn);
        return $this->user_data;
    }

    public function building_data()
    {
        if (!$this->building_data) $this->building_data = new BuildingData($this->conn);
        return $this->building_data;
    }

    public function unit_data()
    {
        if (!$this->unit_data) $this->unit_data = new UnitData($this->conn);
        return $this->unit_data;
    }

    private function db_conn()
    {
        $server = 'localhost';
        $user = 'root';
        $pass = 'root';
        $db = 'tk';

        $conn = null;

        try {
            $conn = mysqli_connect($server, $user, $pass, $db);
            $conn->select_db('tk');
        } catch (\mysqli_sql_exception $ex) {
        }

        return $conn;
    }

} 