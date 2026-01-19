<?php
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
    <?php foreach($recipes as $recipe): ?>
        <?php if (array_key_exists('is_enabled', $recipe) && $recipe['is_enabled']): ?>
            <article>
                <h2><?php echo $recipe['title']; ?></h2>
                <p><?php echo $recipe['recipe']; ?></p>
                <em><?php echo $recipe['author']; ?></em>
            </article>
        <?php endif; ?>
    <?php endforeach; ?>
    
</body>
</html>

