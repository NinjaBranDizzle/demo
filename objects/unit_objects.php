<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 2/9/14
 * Time: 8:49 PM
 */

namespace tk\objects;

require_once 'base_objects.php';

/**
 * Class Unit
 * @package tk\objects
 * Object for describing a unit (eg Soldier).
 */
class Unit extends JsonObject
{
    public $id = 0;
    public $description = '';
    public $health = 0;
    public $weak_curse_mod = 0;
    public $strong_curse_mod = 0;
    public $weak_buff_mod = 0;
    public $strong_buff_mod = 0;
    public $parent_building = false;
    public $can_fly = false;
    public $can_drive = false;
    public $has_super_powers = false;


    /**
     * @param bool $json
     * Can inflate this object from a JSON string.
     */
    function __constructor($json = false)
    {
        // chaining the constructor for proper behavior
        parent::__construct($json);
    }

}