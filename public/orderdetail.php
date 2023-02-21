<?php
declare(strict_types = 1);
require_once 'MySQLDatabase.php';
require_once 'OrderDetails.php';
require_once 'Response.php';

$database = new MySQLDatabase();
$orderDetails = new OrderDetails($database);
$output = $orderDetails->findAll();
$response = new Response();
$response->toJson($output);