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

    public function liste(): void {
        $articles = $this->articleModel->findAllAvecCategorie();
        loadView("articles/liste",["articles"=>$articles]);
        
    }

    public function ajout(): void {
        $errors = [];
        $categories = $this->categorieModel->findAllAvecCategorie();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajout'])) {
            
            if (empty(trim($_POST['libelle'] ?? ''))) {
                $errors['libelle'] = "Le libellé de l'article est obligatoire.";
            }
            if (empty($_POST['id_categorie'] ?? '')) {
                $errors['id_categorie'] = "Veuillez sélectionner une catégorie.";
            }
            if (empty(trim($_POST['contenu'] ?? ''))) {
                $errors['contenu'] = "Le contenu de l'article ne peut pas être vide.";
            }

            // Si aucune erreur n'est détectée
            if (count($errors) === 0) {
                $data = [
                    'libelle'      => htmlspecialchars($_POST['libelle']),
                    'id_categorie' => (int)$_POST['id_categorie'],
                    'contenu'      => htmlspecialchars($_POST['contenu'])
                ];

                $this->articleModel->save($data);
                
                redirectTo("article", "liste");
            }
        }
        loadView("articles/ajout",["errors"=>$errors]);
       

        
    }
}
