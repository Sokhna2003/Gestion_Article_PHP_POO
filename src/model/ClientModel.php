<?php
namespace App\Model;

use App\Core\Model;

class ClientModel extends Model {
    protected string $table = "clients";
    protected string $primaire = "id_client";

    
    public function save(array $data): int {
        $sql = "INSERT INTO {$this->table}(nom, prenom, email) VALUES(:nom, :prenom, :email)";
        return $this->executeUpdate($sql, $data);
    }
}
