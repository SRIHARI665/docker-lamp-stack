<?php
declare(strict_types=1);
class Office
{
    private MySQLDatabase $database;
    public function __construct(MySQLDatabase $database)
    {
        $this->database = $database;
    }

    public function findAll(): array
    {
        $pdo = $this->database->getConnection();
        $stmt = $pdo->query('SELECT * FROM offices');
        $records = $stmt->fetchAll();

        $output['offices'] = [];
        foreach($records as $record) {
            $office = [];
            $office['officeCode']= $record['officeCode'];
            $office['city']= $record['city'];
            $office['phone']= $record['phone'];

            $output['offices'][] = $office;
        }

        return $output;
    }
}