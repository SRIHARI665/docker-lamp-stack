<?php
declare(strict_types = 1);

$customerControllerObj = ObjectContainer::customerController();
$requestObj = ObjectContainer::request();

if ($requestObj->getRequestType() === 'GET') {
    $urlPathData = explode( '/', $requestObj->getRequestPath());
    if (!isset($urlPathData[2]))
    {
        echo $customerControllerObj->listAction();
        die;
    }
    echo $customerControllerObj->getByIdAction();
    die;
}

if ($requestObj->getRequestType() === 'POST') {
    echo $customerControllerObj->createAction();
    die;
}
