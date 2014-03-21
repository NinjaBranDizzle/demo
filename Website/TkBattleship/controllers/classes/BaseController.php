<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 2/5/14
 * Time: 1:57 AM
 */

namespace tk\controllers\classes;

require_once '../../objects/web/web_objects.php';

use tk\objects\web\WebResponse;

/**
 * Class BaseController
 * @package tk\controllers
 * Base class for web controllers.  Handles request validation and the reading of JSON ( GET and POST ).
 */
class BaseController
{
    public $action;
    public $obj;
    public $obj_json;

    /**
     * Constructor.  Parses the controller action and data payload.
     */
    function __construct()
    {
        $this->action = is_null($_GET['action']) || empty($_GET['action']) ? '' : $_GET['action'];
        $this->obj_json = $this->action == 'get' ? $_GET['data'] : $this->read_post_body_json();
        $this->obj = json_decode($this->obj_json);
    }


    /**
     * Processes a web action as a controller function.
     * @return WebResponse
     */
    function process_request()
    {
        $message = new WebResponse();

        if (!$this->is_valid_action()) {
            $fail_message = new WebResponse(WebResponse::$FAIL, false);

            return $fail_message;
        }

        return $message;
    }

    /**
     * @param bool $action
     * Validates the web request as a web API action.
     * @return bool
     */
    function is_valid_action($action = false)
    {
        if (!$action) $action = $this->action;

        if (empty($action) || is_null($action))
            return false;

        return true;
    }

    /**
     * Reads the POST body for a JSON string.
     * @return string
     */
    function read_post_body_json()
    {
        $post_data = file_get_contents("php://input");
        return $post_data;
    }
} 