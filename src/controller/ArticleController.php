<?php
namespace App\Controller;

use App\Model\ArticleModel;
use App\Model\CategorieModel;

class ArticleController {
    private ArticleModel $articleModel;
    private CategorieModel $categorieModel;

    public function __construct() {
        $this->articleModel = new ArticleModel();
        $this->categorieModel = new CategorieModel();
    }

    // Liste des articles
    public function liste(): void {
        $articles = $this->articleModel->findAllAvecCategorie();
        
        loadView("articles/liste", ["articles" => $articles]);
    }

    // Ajout d'un article
    public function ajout(): void {
        $errors = [];
        
        // Utilisation de getAll() hérité pour lister simplement les catégories (table categories)
        $categories = $this->categorieModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajout'])) {
            
            // Préparation des données pour la fonction de validation
            $data = [
                'libelle'      => $_POST['libelle'] ?? '',
                'id_categorie' => $_POST['id_categorie'] ?? '',
                'contenu'      => $_POST['contenu'] ?? ''
            ];

            // UTILISATION DE TA FONCTION DE VALIDATION GLOBALE : validator.php
            $errors = validDataArticle($data);

            // Si le tableau renvoyé par validDataArticle est vide, on valide
            if (validate($errors)) {
                $secureData = [
                    'libelle'      => htmlspecialchars($data['libelle']),
                    'id_categorie' => (int)$data['id_categorie'],
                    'contenu'      => htmlspecialchars($data['contenu'])
                ];

                $this->articleModel->save($secureData);
                redirectTo("article", "liste");
            }
        }
        
        // Envoi à la fois des erreurs ET de la liste des catégories à la vue ajout.php
        loadView("articles/ajout", [
            "errors"     => $errors,
            "categories" => $categories
        ]);
    }
}
