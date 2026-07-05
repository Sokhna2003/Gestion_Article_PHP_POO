<?php
function isEmpty($key,$value,array &$errors,string $msg="Ce champs est obligatoire"){
     if (empty(trim($value))) {
        $errors[$key]=$msg;
     }
}

function isNumeric($value){
    return is_numeric($value);
}

function isString($value){
    return is_string($value);
}
   

function validate(array $errors):bool{
    return count($errors)==0;
}

function validDataArticle(array $data):array{
     $errors = [];
        if(empty($data["libelle"])){
            $errors["libelle"] ="Veuillez remplir le libelle";
        }
        if(empty($data["id_categorie"])){
            $errors["id_categorie"] ="Veuillez sélectionner une catégorie";
        }
        if(empty($data["contenu"])){
            $errors["contenu"] ="Le contenu de l'article ne peut pas être vide.";
        }

        return $errors;
} 

function validDataCategorie(array $data): array {
    $errors = [];
    
    isEmpty("nom_categorie", $data["nom_categorie"] ?? "", $errors, "Le nom de la catégorie est obligatoire.");
    
    return $errors;
}

function validDataClient(array $data): array {
    $errors = [];
    
    isEmpty("nom", $data["nom"] ?? "", $errors, "Le nom du client est obligatoire.");
    isEmpty("prenom", $data["prenom"] ?? "", $errors, "Le prénom du client est obligatoire.");
    isEmpty("email", $data["email"] ?? "", $errors, "L'adresse e-mail est obligatoire.");
    
    // vérification du format de l'email
    if (!empty($data["email"]) && !filter_var($data["email"], FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Le format de l'adresse e-mail n'est pas valide.";
    }
    
    return $errors;
}