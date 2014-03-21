<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 2/5/14
 * Time: 12:35 AM
 */

session_start();

// handles all object imports.
require_once 'classes/UserController.php';
// handles all data class imports.
require_once '../data/DataFactory.php';

use tk\controllers\classes\UserController;
use tk\data\DataFactory;
use tk\objects\web\WebResponse;

$factory = new DataFactory();
$data = $factory->user_data();
$controller = new UserController($data);
$return_message = $controller->process_request();
$json = json_encode($return_message);

if ($return_message->status === WebResponse::$NOT_FOUND)
    http_response_code(404);


echo $json;



