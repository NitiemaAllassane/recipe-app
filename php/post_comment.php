<?php
session_start();
require_once(__DIR__ . '/../utils/functions.php');

include_once(__DIR__ . '/../config/mysql.php');
include_once(__DIR__ . '/../config/databaseconnect.php');

$postData = $_POST;

if (
    !isset($postData['comment']) ||
    !isset($postData['recipe_id']) ||
    empty($postData['comment']) ||
    !is_numeric($postData['recipe_id'])
) {
    $errorMessage = "DESOLE, le commentaire n'a pu etre ajouter. Verifier si le champs n'est pas vide.";
    echo $errorMessage;
    return;
}

$insertComment = "INSERT INTO comments (user_id, recipe_id, comment) VALUE (:user_id, :recipe_id, :comment)";
$insertionStatement = $pdo_connexion->prepare($insertComment);
$insertionStatement->execute([
    'user_id' => $_SESSION['LOGGED_USER']['id'],
    'recipe_id' => $postData['recipe_id'],
    'comment' => htmlspecialchars($postData['comment']),
]);

redirectToUrl("../pages/recipe_read.php?id={$postData['recipe_id']}");
?>