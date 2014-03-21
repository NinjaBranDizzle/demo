<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 11/21/13
 * Time: 2:12 AM
 */

require_once('classes/UnitsController.php');
require_once('../data/DataFactory.php');

use tk\controllers\classes\UnitsController;
use tk\data\DataFactory;
use tk\objects\web\WebResponse;

$factory = new DataFactory();
$data = $factory->unit_data();
$controller = new UnitsController($data);
$return_message = $controller->process_request();
$message_json = json_encode($return_message);

if ($return_message->status === WebResponse::$NOT_FOUND)
    http_response_code(404);


echo $message_json;







