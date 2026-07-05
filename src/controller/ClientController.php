<?php
namespace App\Controller;

use App\Model\ClientModel;

class ClientController {
    private ClientModel $clientModel;

    public function __construct() {
        $this->clientModel = new ClientModel();
    }

    // Afficher la liste des clients
    public function liste(): void {
        $clients = $this->clientModel->getAll();
        
        // CORRECTION : Utilisation du helper global et ciblage de 'liste' au lieu de 'index'
        loadView("clients/liste", ["clients" => $clients]);
    }

    // Inscrire/Ajouter un client
    public function ajout(): void {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enregistrer'])) {
            // Préparation des données pour le validateur
            $data = [
                'nom'    => $_POST['nom'] ?? '',
                'prenom' => $_POST['prenom'] ?? '',
                'email'  => $_POST['email'] ?? ''
            ];
            
            $errors = validDataClient($data);

            // Si aucune erreur, on procède à l'enregistrement
            if (validate($errors)) {
                $secureData = [
                    'nom'    => htmlspecialchars($data['nom']),
                    'prenom' => htmlspecialchars($data['prenom']),
                    'email'  => htmlspecialchars($data['email'])
                ];

                try {
                    $this->clientModel->save($secureData);
                    redirectTo("client", "liste");
                } catch (\PDOException $e) {
                    if ($e->getCode() == 23000) {
                        $errors['email'] = "Cette adresse e-mail est déjà utilisée.";
                    } else {
                        $errors['nom'] = "Une erreur est survenue lors de l'enregistrement.";
                    }
                }
            }
        }
        
        loadView("clients/ajout", ["errors" => $errors]);
    }
}
