<?php
declare(strict_types=1);
class Employee
{
    private MySQLDatabase $database;
    public function __construct(MySQLDatabase $database)
    {
        $this->database = $database;
    }

    public function findAll(): array
    {
        $pdo = $this->database->getConnection();
        $stmt = $pdo->query('SELECT * FROM employees');
        $records = $stmt->fetchAll();

        $output['employees'] = [];
        foreach($records as $record) {
            $employee = [];
            $employee['number']= $record['employeeNumber'];
            $employee['firstName']= $record['firstName'];
            $employee['lastName']= $record['lastName'];

            $output['employees'][] = $employee;
        }

        return $output;
    }
}