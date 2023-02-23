<?php
declare(strict_types=1);

use Exceptions\utils\MySQLDatabase;

class OrderDetails
{
    private MySQLDatabase $database;
    public function __construct(MySQLDatabase $database)
    {
        $this->database = $database;
    }

    public function findAll(): array
    {
        $pdo = $this->database->getConnection();
        $stmt = $pdo->query('SELECT * FROM orderdetails');
        $records = $stmt->fetchAll();

        $output['orderdetail'] = [];
        foreach($records as $record) {
            $orderdetails = [];
            $orderdetails['orderNumber']= $record['orderNumber'];
            $orderdetails['productCode']= $record['productCode'];
            $orderdetails['quantityOrdered']= $record['quantityOrdered'];

            $output['employees'][] = $orderdetails;
        }

        return $output;
    }
}