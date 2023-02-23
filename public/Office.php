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
            $office['state']= $record['state'];
            $office['phone']= $record['phone'];

            $output['offices'][] = $office;
        }

        return $output;
    }
    public function findById(int $id): array
    {
        $pdo = $this->database->getConnection();
        $stmt = $pdo->query("SELECT * FROM offices WHERE officeCode = {$id}");
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
                `officeCode`,
                `city`,
                `phone`,
                `addressLine1`,
                `addressLine2`,
                `state`,
                `country`,
                `postalCode`,
                `territory`
                
              )
            VALUES
              (
               {$userData['officeCode']},
                
                '{$userData['city']}',
                '{$userData['phone']}',
                '{$userData['addressLine1']}',
                '{$userData['addressLine2']}',
                '{$userData['state']}',
                '{$userData['country']}',
                '{$userData['postalCode']}'
                '{$userData['territory']}'
                
                
              );
INSERT_SQL;
        $pdo->exec($sql);
    }
}