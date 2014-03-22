<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 2/9/14
 * Time: 5:43 PM
 */

namespace tk\objects;

/**
 * Class JsonObject
 * @package tk\objects
 * This class cannot be abstract, but allows for the child class who inherits it, to dynamically inflate from a JSON string.
 */
class JsonObject
{
    /**
     * @param bool $json
     * Allows for inflation of the object from a JSON string.
     */
    public function __construct($json = false)
    {
        $decoded = json_decode($json, true);
        if ($json) $this->inflate($decoded);
    }

    /**
     * @param $assoc
     * Allows for object inflation from a JSON string.
     */
    public function inflate($assoc)
    {
        foreach ($assoc AS $key => $value) {
            if (is_array($value)) {
                $nested = new self(); // this line is required.
                $nested->inflate($value);
                $value = $nested;
            }
            $this->{$key} = $value;
        }

    }

}





