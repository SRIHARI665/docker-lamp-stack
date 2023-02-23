<?php
declare(strict_types = 1);

use Exceptions\utils\MySQLDatabase;
use Exceptions\utils\Response;

require_once 'MySQLDatabase.php';
require_once 'Office.php';
require_once 'Response.php';

$response = new Response();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $userProvidedOfficeId = (int)$_GET['officeId'];
        $database = new MySQLDatabase();
        $offices = new Office($database);
        $output = $offices->findById($userProvidedOfficeId);
        $response->toJson($output);
    } catch (PDOException $exception) {
        $response->toJson(['status' => 'Database issue']);
    } catch (LogicException $exception) {
        $response->toJson(['status' => 'logic issue']);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $json = file_get_contents('php://input');
        $userProvidedData = (array)json_decode($json);
        $database = new MySQLDatabase();
        $offices = new Employee($database);
        $offices->insert($userProvidedData);
        $response->toJson(['status' => 'success']);
    } catch (PDOException $exception) {
        $response->toJson(['status' => 'failure']);
    }
}