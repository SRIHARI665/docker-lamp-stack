<?php
declare(strict_types = 1);
require_once 'MySQLDatabase.php';
require_once 'Office.php';
require_once 'Response.php';

$database = new MySQLDatabase();
$office = new Office($database);
$output = $office->findAll();
$response = new Response();
$response->toJson($output);
