<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 2/10/14
 * Time: 6:28 PM
 */

namespace tk\_tests\data;

require_once('../../includes/constants.php');
require_once('../../objects/building_objects.php');
require_once('../../data/BuildingData.php');


use PHPUnit_Framework_TestCase;
use tk\data\BuildingData;
use tk\objects\Building;

/**
 * Class BuildingDataTests
 * @package tk\_tests\data
 * Unit tests for the BuildingData class.
 */
class BuildingDataTests extends PHPUnit_Framework_TestCase
{
    private $host;
    private $user;
    private $pass;
    private $db;

    private $added_building_ids;

    private $conn;
    private $data;

    /**
     * Constructor for BuildingDataTests.
     */
    function __construct()
    {
        $this->added_building_ids = array();
    }

    protected function setUp()
    {
        $this->host = DB_SERVER_TEST;
        $this->user = DB_USER_TEST;
        $this->pass = DB_PASSWORD_TEST;
        $this->db = DB_NAME_TEST;

        try {
            $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        } catch (\mysqli_sql_exception $ex) {
        } catch (\Exception $ex) {
        }

        try {
            $this->data = new BuildingData($this->conn);
        } catch (\mysqli_sql_exception $ex) {
        } catch (\Exception $ex) {
        }
    }

    protected function tearDown()
    {
        $i = 0;
        if (empty($this->data)) return;

        for ($i = 0; $i < count($this->added_building_ids); $i++) {
            $id = $this->added_building_ids[$i];
            $this->data->delete($id);
        }


    }

    public function testMysqliInstantiation()
    {
        $exception = null;
        $mysql_conn = null;

        try {
            $mysql_conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        } catch (\Exception $ex) {
            $exception = $ex;
        }

        $this->assertNull($exception, "Could not connect to MySql using TEST credentials; an exception was thrown.");
        $this->assertNotEmpty($mysql_conn, "Could not connect to MySql using TEST credentials.  No exception was thrown.");
    }

    public function testDataClassInstantiation()
    {
        $exception = null;
        $building_data = null;

        try {
            $building_data = new BuildingData($this->conn);
        } catch (\Exception $ex) {
            $exception = $ex;
        }

        $this->assertNull($exception, "Could not instantiate BuildingData class; an exception was thrown.");
        $this->assertNotEmpty($building_data, "Could not instantiate BuildingData class.  No exception was thrown.");

    }

    public function testInsertBuilding_ValidData()
    {
        $building = new Building();

        $building->name = 'insert test building';
        $building->can_parent = true;
        $building->health = 1006;
        $building->pop_provided = 22;

        $new_building_id = $this->data->add($building);

        $this->assertNotEmpty($new_building_id, "New Building Id from database was empty.");

        $new_building = $this->data->get($new_building_id);

        $this->assertEquals($new_building_id, $new_building->id);
        $this->assertEquals($building->name, $new_building->name);
        $this->assertEquals($building->pop_provided, $new_building->pop_provided);
        $this->assertEquals($building->can_parent, $new_building->can_parent);
        $this->assertEquals($building->health, $new_building->health);

    }

    public function testFetchBuilding_ValidId()
    {


    }


    /**
     * @param string $building_name
     * Adds a new building for testing.
     */
    private function addBuilding($building_name = '')
    {
        $building = new Building();
        if (!empty($building_name)) $building->name = $building_name;
        else $building->name = 'test building';

        $new_building_id = $this->data->add($building);

        // add the id to the 'added' list for cleanup.
        if (!empty($new_building_id))
            array_push($this->added_building_ids, $new_building_id);

        $new_building = $this->data->get($new_building_id);

        return $new_building;

    }

    private function removeBuilding($building_id)
    {
        $success = $this->data->delete($building_id);

        $this->assertTrue($success, "Could not delete building_id: " . $building_id . " from the database." . "\tMySQL error: " . $this->data->error_text());
    }

}
 