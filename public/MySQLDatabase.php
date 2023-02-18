<?php
declare(strict_types=1);

class MySQLDatabase
{
    private string $database;
    private string $host;
    private string $username;
    private string $password;
    private string $dsn;

    public function __construct(
        string $database = 'weintegral',
        string $host = 'mysql-server',
        string $username = 'root',
        string $password = 'root'
    )
    {
        $this->database = $database;
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $charset = 'utf8mb4';
        $this->dsn = "mysql:host={$this->host};dbname={$this->database};charset=$charset";
    }

    private function getDefaultPDOOptions(): array
    {
        return [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
    }

    /**
     * @throws PDOException
     */
    public function getConnection(): PDO
    {
        try {
            return new PDO($this->dsn, $this->username, $this->password, $this->getDefaultPDOOptions());
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}