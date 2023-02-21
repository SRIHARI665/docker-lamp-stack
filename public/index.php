<?php
declare(strict_types = 1);
require_once 'MySQLDatabase.php';
require_once 'Customer.php';
require_once 'Response.php';

/**
 * C.R.U.D
 * C: Create (POST)
 * R: Read (GET)
 * U: Update (PUT, PATCH)
 * D: Delete (DELETE)
 */

/**
 * TOPICS that are covered
 *
 * PHP built in Web server
 * defining variables
 * SUPER GLOBAL Variables
 * data types in PHP
 * PDO Object
 * PDO Options
 * Error Handling
 * Debugging and Printing in PHP
 * loops in PHP
 * Namespaces
 * Request and Response Headers
 * HTTP Methods
 * HTTP Status Codes
 */
$response = new Response();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $userProvidedCustomerId = (int)$_GET['customerId'];
        $database = new MySQLDatabase();
        $customer = new Customer($database);
        $output = $customer->findById($userProvidedCustomerId);
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
        $customer = new Customer($database);
        $customer->insert($userProvidedData);
        $response->toJson(['status' => 'success']);
    } catch (PDOException $exception) {
        $response->toJson(['status' => 'failure']);
    }
}