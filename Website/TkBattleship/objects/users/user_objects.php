<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 2/9/14
 * Time: 7:50 PM
 */

namespace tk\objects\users;

/**
 * Class User
 * @package tk\objects
 * Object for describing a user.
 */
class User extends JsonObject
{
    public $user_id = 0;
    public $name = '';
    public $password = '';
    public $admin = 0;
    public $locked = 0;

    function __constructor($json = false)
    {
        // chaining the parent constructor for inflation.
        parent::__construct($json);

    }
}

/**
 * Class Credentials
 * @package tk\objects
 * Object for holding user credentials.  Used for creating and authenticating users.
 */
class Credentials extends JsonObject
{
    public $username = '';
    public $password = '';
    public $salt = '';

    function __construct($json = false)
    {
        parent::__construct($json);
    }


}
