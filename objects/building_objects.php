<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 2/9/14
 * Time: 8:50 PM
 */

namespace tk\objects;

require_once 'base_objects.php';


/**
 * Class Building
 * Business object for describing a building.
 * @package tk_objects
 */
class Building extends JsonObject
{
    public $id = 0;
    public $name = '';
    public $health = 0;
    public $can_parent = false;
    public $pop_provided = 0;

    /**
     * @param bool $json
     * Allows for inflation of the object from a JSON string.
     */
    function __construct($json = false)
    {
        // chaining the parent constructor for inflation.
        parent::__construct($json);
    }

}