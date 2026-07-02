<?php
namespace App\Controller;

use App\Model\CategorieModel;

class CategorieController {
    private CategorieModel $categorieModel;

    public function __construct() {
        $this->categorieModel = new CategorieModel();
    }

    
    public function liste(): void {
        $categories = $this->categorieModel->getAll();
        
        ob_start();
        require_once "../view/categories/index.php";
        $content = ob_get_clean();
        
        require_once "../view/layout/base.layout.php";
    }

    
    public function ajout(): void {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajout'])) {
            $nomCategorie = trim($_POST['nom_categorie'] ?? '');

            if (empty($nomCategorie)) {
                $errors['nom_categorie'] = "Le nom de la catégorie est obligatoire.";
            }

            if (count($errors) === 0) {
                try {
                    $this->categorieModel->save(htmlspecialchars($nomCategorie));
                    
                    redirectTo("categorie", "liste");
                } catch (\PDOException $e) {
                    if ($e->getCode() == 23000) {
                        $errors['nom_categorie'] = "Cette catégorie existe déjà.";
                    } else {
                        $errors['nom_categorie'] = "Une erreur est survenue lors de l'enregistrement.";
                    }
                }
            }
        }

        ob_start();
        require_once ROOT . "src/view/categories/ajout.php";
        $content = ob_get_clean();

        require_once ROOT . "src/view/layout/base.layout.php";
    }
}
