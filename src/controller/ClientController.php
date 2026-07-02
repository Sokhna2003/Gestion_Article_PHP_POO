<?php
namespace App\Controller;

use App\Model\ClientModel;

class ClientController {
    private ClientModel $clientModel;

    public function __construct() {
        $this->clientModel = new ClientModel();
    }

    public function liste(): void {
        $clients = $this->clientModel->getAll();
        
        require_once  ROOT."src/view/clients/index.php";         

    }

    // Ajouter un client
    public function ajout(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enregistrer'])) {
            $data = [
                'nom'    => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'email'  => $_POST['email']
            ];
            
            $this->clientModel->save($data);
            redirectTo("client", "liste");
        }
        
        require_once "../view/clients/ajout.php";

    }
}
