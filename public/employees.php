<?php
declare(strict_types = 1);
require_once 'MySQLDatabase.php';
require_once 'Employee.php';
require_once 'Response.php';

$database = new MySQLDatabase();
$employee = new Employee($database);
$output = $employee->findAll();
$response = new Response();
$response->toJson($output);