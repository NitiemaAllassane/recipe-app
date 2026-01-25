<?php
require_once(__DIR__ . '/../utils/functions.php');

include_once(__DIR__ . '/../config/mysql.php');
include_once(__DIR__ . '/../config/databaseconnect.php');

$postData = $_POST;

if (!isset($postData['id'])) {
    $errorMessage = "Desolé, nous ne pouvons pas supprimer cette recette";
    echo $errorMessage;
    return;
}

// Suppression de l recette dans la bases de donnée
$deleteRequest = "DELETE FROM recipes WHERE recipe_id = :id";
$prepareRequest = $pdo_connexion->prepare($deleteRequest);
$prepareRequest->execute([
    'id' => $postData['id'],
]) or die(print_r($pdo_connexion->errorInfo()));

redirectToUrl('../index.php');

?>