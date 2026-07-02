<?php
namespace App\Core;

use PDO;

class Model {
    protected static ?PDO $pdo = null;
    protected string $table;
    protected string $primaire;

    public function __construct()
    {
        if (self::$pdo === null) {
            $dsn = "mysql:host=127.0.0.1;port=3306;dbname=ges_articles;charset=utf8";
            $user = "root"; 
            $password = ""; 

            self::$pdo = new PDO($dsn, $user, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);
        }
    }

   
    public function getAll(): array 
    {
        return self::$pdo->query("SELECT * FROM {$this->table}")->fetchAll();
    }

    
    public function executeSelect(string $sql, array $data = [], bool $one = false): array|object 
    {
        $statement = self::$pdo->prepare($sql);
        $statement->execute($data);
        if ($one) {
            $result = $statement->fetch();
            return $result ? $result : new \stdClass(); 
        }
        return $statement->fetchAll();
    }

    
    public function executeUpdate(string $sql, array $data): int 
    {
        $statement = self::$pdo->prepare($sql);
        $statement->execute($data);
        return $statement->rowCount();
    }
}
