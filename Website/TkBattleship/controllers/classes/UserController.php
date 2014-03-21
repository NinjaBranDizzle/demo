<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 2/9/14
 * Time: 8:17 PM
 */

namespace tk\controllers\classes;


require_once('../../data/user_data.php');

use tk\objects\users\Credentials;
use tk\objects\web\WebResponse;

/**
 * Class UserController
 * @package tk\controllers\classes
 * Controller for User actions.
 */
class UserController extends BaseController
{

    /**
     * Constructor.  Parses the controller action and data payload.
     */
    function __construct()
    {
        parent::__construct();
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
            $message = $fail_message;
        else {
            $message = new WebResponse();
            switch ($this->action) {
                case 'validate':
                    $credentials = new Credentials($this->obj_json);
                    $valid = $this->validateUser($credentials->username, $credentials->password);
                    $message = new WebResponse(WebResponse::$OK, $valid);
                    break;
                case 'register':
                    // todo: finish this;
                    break;
                case 'logout':
                    $this->log_User_Out();
                    $message = new WebResponse(WebResponse::$OK, true);
                    break;
                case 'authorized':
                    // todo: finish this;
                    break;
                default:
                    $message = $not_found_message;
                    break;
            }

        }


        return $message;
    }

    /**
     * @param $un
     * @param $pwd
     * Validates an existing user with credentials.
     * @return string
     */
    function validateUser($un, $pwd)
    {
        $mysql = New Mysql();
        $ensure_credentials = $mysql->verify_Username_and_Pass($un, md5($pwd));

        if ($ensure_credentials) {
            $_SESSION['status'] = 'authorized';
            header('location: index.php');
        } else return "Failed login, please try again";
    }

    function log_User_Out()
    {
        if (isset($_SESSION['status'])) {
            unset($_SESSION['status']);

            if (isset($_COOKIE[session_name()])) {
                setcookie(session_name(), '', time() - 10000);
                session_destroy();
            }
        }
    }

    function confirm_User()
    {
        if ($_SESSION['status'] != 'authorized') {
            header('location: login.php');
        }
    }

    function register_User($un, $pwd, $rpwd)
    {
        $mysql = New Mysql();
        $username_existance = $mysql->check_Username_Existance($un);
        if ($username_existance) {
            return "Username taken, please try again";
        } else {
            //Check for existance
            if ($un && $pwd && $rpwd) {
                //Check to see if passwords match
                if ($pwd == $rpwd) {
                    //Check string lengths
                    if (strlen($pwd) > 25 || strlen($pwd) < 6) {
                        return "Your password must be between 6 and 25 characters long";
                    } else {
                        //Encrypt password
                        $pwd = md5($pwd);
                        //Register User
                        $mysql = New Mysql();
                        $registerResponse = $mysql->register_User($un, $pwd);
                        if ($registerResponse) {
                            return "Successfully Registered!";
                        } else
                            return "Successfully Registered!<br /><a href='login.php'>Login</a>";

                    }
                } else {
                    return "Your passwords do not match";
                }
            } else {
                return "Please fill in <b>ALL</b> fields";
            }
        }
    }
}

