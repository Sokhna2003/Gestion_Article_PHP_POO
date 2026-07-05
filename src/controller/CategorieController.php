<?php
namespace App\Controller;

use App\Model\CategorieModel;

class CategorieController {
    private CategorieModel $categorieModel;

    public function __construct() {
        $this->categorieModel = new CategorieModel();
    }

    
    //  Afficher la liste des catégories
    public function liste(): void {
        $categories = $this->categorieModel->getAll();
        loadView("categories/liste", ["categories" => $categories]);
    }

    //  Ajouter une catégorie
    public function ajout(): void {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajout'])) {
            //  Préparation des données pour le validateur
            $data = [
                'nom_categorie' => $_POST['nom_categorie'] ?? ''
            ];

            $errors = validDataCategorie($data);

            // Si aucune erreur, on procède à l'enregistrement
            if (validate($errors)) {
                try {
                    $this->categorieModel->save(htmlspecialchars($data['nom_categorie']));
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

        loadView("categories/ajout", ["errors" => $errors]);
    }
}
