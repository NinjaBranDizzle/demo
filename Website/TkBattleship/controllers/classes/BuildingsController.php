<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 2/9/14
 * Time: 8:10 PM
 */

namespace tk\controllers\classes;

require_once('BaseController.php');
require_once('../../data/BuildingData.php');

use tk\objects\web\WebResponse;
use tk\objects\Building;
use tk\data\BuildingData;

/**
 * Class BuildingsController
 * @package tk\controllers\classes
 * Buildings controller.
 */
class BuildingsController extends BaseController
{
    private $data;

    /**
     * @param BuildingData $data
     */
    function __construct(BuildingData $data)
    {
        parent::__construct();

        $this->data = $data;

    }

    /**
     * Processes a web action as a controller function.
     * @return WebResponse
     */
    function process_request()
    {
        $parent_message = parent::process_request();
        $fail_message = new WebResponse(WebResponse::$FAIL, false);
        $not_found_message = new WebResponse(WebResponse::$NOT_FOUND, 'unknown request');

        if ($parent_message->status === WebResponse::$NOT_FOUND)
            $return_message = $not_found_message;
        else {
            $return_message = new WebResponse();
            switch ($this->action) {
                case 'getAll':
                    $units = $this->get_all();
                    $return_message->value = $units;
                    break;
                case 'get':
                    $unit = $this->get($this->obj_json);
                    $return_message->value = $unit;
                    break;
                case 'add':
                    // todo: finish this.
                    break;
                case 'remove':
                    // todo: finish this.
                    break;
                default:
                    $return_message = $not_found_message;
                    break;

            }


        }

        return $return_message;
    }

    /**
     * Gets all buildings from the database.
     * @return array
     */
    function get_all()
    {
        $buildings = $this->data->get_all();

        return $buildings;
    }

    /**
     * @param $building_json
     * Gets a single building from the database.
     * @return Building
     */
    function get($building_json)
    {
        $wrapper = json_decode($building_json);
        $id = $wrapper->id;

        $building = $this->data->get($id);

        return $building;
    }

    /**
     * @param $building_json
     * Updates an existing building in the database.
     * @return bool
     */
    function update($building_json)
    {
        $building = new Building($building_json);

        $success = $this->data->update($building);

        return $success;
    }

    function add($building_json)
    {
        // todo: finish this

    }

    function remove($building_id)
    {
        // todo: finish this
    }


}