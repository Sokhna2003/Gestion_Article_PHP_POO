<?php
namespace App\Model;

use App\Core\Model;

class CategorieModel extends Model {
    protected string $table = "categories";
    protected string $primaire = "id_categorie";

    
    public function save(string $nom): int {
        $sql = "INSERT INTO {$this->table}(nom_categorie) VALUES(:nom)";
        return $this->executeUpdate($sql, ['nom' => $nom]);
    }
}
