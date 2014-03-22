<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 2/9/14
 * Time: 8:17 PM
 */

namespace tk\controllers\classes;

require_once('../../data/unit_data.php');

use tk\data\UnitData;
use tk\objects\Unit;
use tk\objects\web\WebResponse;

class UnitsController extends BaseController
{
    private $data;

    function __construct(UnitData $data)
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

        if ($parent_message->status === WebResponse::$FAIL)
            $return_message = $fail_message;
        else {
            $return_message = new WebResponse();
            switch ($this->action) {
                case 'add':
                    $success = $this->add($this->obj_json);
                    $return_message->value = $success;
                    break;
                case 'update':
                    $success = $this->update($this->obj_json);
                    $return_message->value = $success;
                    break;
                case 'get':
                    $unit = $this->get($this->obj_json);
                    $return_message->value = $unit;
                    break;
                case 'getAll':
                    $units = $this->get_all();
                    $return_message->value = $units;
                    break;
                case 'remove':
                    $success = $this->remove($this->obj_json);
                    $return_message = new WebResponse(WebResponse::$OK, $success);
                    break;
                default:
                    // idk what you are talking about...
                    $return_message = $not_found_message;
                    break;
            }

        }


        return $return_message;
    }

    /**
     * @param bool $unit_json
     * Creates a new unit.
     * @return bool
     */
    function add($unit_json = false)
    {
        $success = false;
        $unit_json = empty($unit_json) ? $this->data : $unit_json;
        $unit = new Unit($unit_json);

        $success = $this->data->add_unit($unit);

        return $success;
    }

    /**
     * @param bool $unit_json
     * Updates an already existing unit.
     * @return mixed
     */
    function update($unit_json = false)
    {
        $unit_json = empty($unit_json) ? $this->obj_json : $unit_json;
        $unit = new Unit($unit_json);

        $success = $this->data->update_unit($unit);

        return $success;
    }

    function get_all()
    {
        $units = $this->data->get_all_units();

        return $units;
    }

    function get($id_json = false)
    {
        $id_json = empty($id_json) ? $this->obj_json : $id_json;
        $wrapper = json_decode($id_json);
        $id = $wrapper->id;

        $unit = $this->data->get_unit($id);

        return $unit;

    }

    function remove($id_json)
    {
        $id_json = empty($id_json) ? $this->obj_json : $id_json;
        $wrapper = json_decode($id_json);
        $id = $wrapper->id;

        $success = $this->data->remove_unit($id);

        return $success;
    }

}