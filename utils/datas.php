<?php
include_once(__DIR__ . '/../config/mysql.php');
include_once(__DIR__ . '/../config/databaseconnect.php');

// Les requettes pour selectionner les tous les utilisateurs et les recettes
$select_users_query = "SELECT * FROM users";
$select_recipes_query = "SELECT * FROM recipes";

// Preparations des requettes de selection des utilisateurs et des recettes
$users_query_statement = $pdo_connexion->prepare($select_users_query);
$recipes_query_statement = $pdo_connexion->prepare($select_recipes_query);

// Execution des different requette
$users_query_statement->execute();
$recipes_query_statement->execute();

// Recuparations des donnees des les variables $user (pour les utilateur) et $recipes (pour les recettes)
$users = $users_query_statement->fetchAll();
$recipes = $recipes_query_statement->fetchAll();


?>