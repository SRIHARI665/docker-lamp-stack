<?php
declare(strict_types = 1);

require_once 'utils/ObjectContainer.php';

$requestObj = ObjectContainer::request();
$isCustomerRequest = str_contains($requestObj->getRequestPath(), 'customers');
$isEmployeeRequest = str_contains($requestObj->getRequestPath(), 'employees');

if($isCustomerRequest) {
    require_once 'customers.php';
}

if($isEmployeeRequest) {
    require_once 'employees.php';
}