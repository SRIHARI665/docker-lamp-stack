<?php
declare(strict_types=1);

use Exceptions\utils\MySQLDatabase;

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
    public function findById(int $id): array
    {
        $pdo = $this->database->getConnection();
        $stmt = $pdo->query("SELECT * FROM employees WHERE employeeNumber = {$id}");
        $record = $stmt->fetch();
        if (gettype($record) !== 'array') {
            throw new LogicException('data is not properly retrieved from DB');
        }
        $output['data'] = $record;

        return $output;
    }

    /**
     * @throws PDOException
     */
    public function insert(array $userData): void
    {
        $pdo = $this->database->getConnection();
        $sql = <<< INSERT_SQL
            INSERT INTO
              `employees` (
                `employeeNumber`,
                `lastName`,
                `firstName`,
                `extension`,
                `email`,
                `officeCode`,
                `reportsTo`,
                `jobTitle`
                
              )
            VALUES
              (
               {$userData['employeeNumber']},
                
                '{$userData['lastName']}',
                '{$userData['firstName']}',
                '{$userData['extension']}',
                '{$userData['email']}',
                '{$userData['officeCode']}',
                '{$userData['reportsTo']}',
                '{$userData['jobTitle']}'
                
              );
INSERT_SQL;
        $pdo->exec($sql);
    }
}