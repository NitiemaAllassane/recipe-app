<?php

$users = [
    [
        'full_name' => 'Mickaël Andrieu',
        'email' => 'mickael.andrieu@exemple.com',
        'age' => 34,
    ],
    [
        'full_name' => 'Mathieu Nebra',
        'email' => 'mathieu.nebra@exemple.com',
        'age' => 34,
    ],
    [
        'full_name' => 'Laurène Castor',
        'email' => 'laurene.castor@exemple.com',
        'age' => 28,
    ],
];


$recipes = [
    [
        'title' => 'Cassoulet',
        'recipe' => 'Etape 1 : des flageolets !',
        'author' => 'mickael.andrieu@exemple.com',
        'is_enabled' => true,
    ],
    [
        'title' => 'Couscous',
        'recipe' => 'Etape 1 : de la semoule',
        'author' => 'mickael.andrieu@exemple.com',
        'is_enabled' => false,
    ],
    [
        'title' => 'Escalope milanaise',
        'recipe' => 'Etape 1 : prenez une belle escalope',
        'author' => 'mathieu.nebra@exemple.com',
        'is_enabled' => true,
    ],
];


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
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recette de cuisine</title>
</head>
<body>

    <h1>Affichages des recettes</h1>
    <?php foreach(getRecipes($recipes) as $recipe): ?>
        <article>
            <h2><?php echo $recipe['title']; ?></h2>
            <p><?php echo $recipe['recipe']; ?></p>
            <em><?php echo displayAuthor($recipe['author'], $users); ?></em>
        </article>
    <?php endforeach; ?>
    
</body>
</html>

