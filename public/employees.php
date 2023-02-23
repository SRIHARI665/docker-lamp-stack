<?php
declare(strict_types = 1);
require_once 'MySQLDatabase.php';
require_once 'Employee.php';
require_once 'Response.php';

$response = new Response();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $userProvidedEmployeeId = (int)$_GET['employeeId'];
        $database = new MySQLDatabase();
        $employees = new Employee($database);
        $output = $employees->findById($userProvidedEmployeeId);
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
        $employees = new Employee($database);
        $employees->insert($userProvidedData);
        $response->toJson(['status' => 'success']);
    } catch (PDOException $exception) {
        $response->toJson(['status' => 'failure']);
    }
}