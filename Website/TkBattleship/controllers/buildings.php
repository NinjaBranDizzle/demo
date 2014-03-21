<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 2/6/14
 * Time: 4:56 PM
 */

require_once('../data/DataFactory.php');
require_once('classes/BuildingController.php');

use tk\data\DataFactory;
use tk\controllers\classes\BuildingsController;
use tk\objects\web\WebResponse;

$factory = new DataFactory();
$data = $factory->building_data();
$controller = new BuildingsController($data);

$return_message = $controller->process_request();
$message_json = json_encode($return_message);

if ($return_message->status === WebResponse::$NOT_FOUND)
    http_response_code(404);

echo $message_json;

