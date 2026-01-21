<?php

// Une fonction pour verifier si la recette est valide
function  isValideRecipe(array $recipe): bool {
    if (array_key_exists('is_enabled', $recipe)) {
        $isEnabled = $recipe['is_enabled'];
    } else {
        $isEnabled = false;
    }

    return $isEnabled;
}

// UNe fonction pour obtenir toutes les recette valide
function getRecipes(array $recipes): array {
    $valideRecipes = [];

    foreach ($recipes as $recipe) {
        if (isValideRecipe($recipe)) {
            $valideRecipes[] = $recipe;
        }
    }

    return $valideRecipes;
}

// UNe fonction pour afficher le nom complet de l'utilisateur a partir de son email
function displayAuthor(string $authorEmail, array $users): string {
    foreach ($users as $user) {
        if ($authorEmail === $user['email']) {
            return $user['full_name'] . '(' . $user['age'] . ' ans)';
        }
    }

    return "Auteur inconnu";
}

?>