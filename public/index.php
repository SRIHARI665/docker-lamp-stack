<?php
declare(strict_types = 1);
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

//Docker will resolve this host in to its internal network address. On our host machines it is 127.0.0.1(localhost)
$host = 'mysql-server';
$db   = 'weintegral';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';

//DSN : Data Source Name
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    print_r($e->getMessage());
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$stmt = $pdo->query('SELECT * FROM customers');
$records = $stmt->fetchAll();
$output['customers'] = [];
foreach($records as $record) {
    $customer = [];
    $customer['name'] = $record['customerName'];
    $customer['number']= $record['customerNumber'];
    $customer['firstName']= $record['contactFirstName'];
    $customer['lastName']= $record['contactLastName'];

    $output['customers'][] = $customer;
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($output);
