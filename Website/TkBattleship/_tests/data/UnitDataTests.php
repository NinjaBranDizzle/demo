<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 2/19/14
 * Time: 10:11 PM
 */

namespace tk\_tests\data;

require_once('../../includes/constants.php');
require_once('../../objects/unit_objects.php');
require_once('../../data/UnitData.php');

use PHPUnit_Framework_TestCase;
use tk\data\UnitData;
use tk\objects\Unit;

class UnitDataTests extends PHPUnit_Framework_TestCase
{
    private $host;
    private $user;
    private $pass;
    private $db;

    private $added_unit_ids;

    private $conn;
    private $data;

    /**
     * Constructor for BuildingDataTests.
     */
    function __construct()
    {
        $this->added_unit_ids = array();
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
            $this->data = new UnitData($this->conn);
        } catch (\mysqli_sql_exception $ex) {
        } catch (\Exception $ex) {
        }
    }

    protected function tearDown()
    {
        $i = 0;
        if (empty($this->data)) return;

        for ($i = 0; $i < count($this->added_unit_ids); $i++) {
            $id = $this->added_unit_ids[$i];
            $this->data->remove_unit($id);
        }


    }

} 