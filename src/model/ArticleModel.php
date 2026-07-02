<?php
namespace App\Model;

use App\Core\Model;

class ArticleModel extends Model {
    protected string $table = "articles";
    protected string $primaire = "id_article";

    
    public function findAllAvecCategorie(): array {
        $sql = "SELECT a.*, c.nom_categorie AS categorie 
                FROM {$this->table} a 
                INNER JOIN categories c ON a.id_categorie = c.id_categorie 
                ORDER BY a.created_at DESC";
        return $this->executeSelect($sql);
    }

    
    public function save(array $data): int {
        $sql = "INSERT INTO {$this->table}(libelle, id_categorie, contenu) VALUES(:libelle, :id_categorie, :contenu)";
        return $this->executeUpdate($sql, $data);
    }
}
