<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 2/9/14
 * Time: 7:54 PM
 */

namespace tk\objects\web;

/**
 * Class web_response
 * A class for serializing to json when responding to a REST call.
 * @package tk_objects
 */
class WebResponse
{
    public static $OK = 'ok';
    public static $FAIL = 'fail';
    public static $NOT_FOUND = 'unknown request';

    /**
     * @param bool $status
     * Provides inflation of object from json.
     * @param bool $value
     */
    function __construct($status = false, $value = false)
    {
        if ($status) $this->$status = $status;
        else $this->status = self::$OK;
        if ($value) $this->value = $value;
        else $this->value = '';

    }

    public $status = 'ok';
    public $value = '';

}

