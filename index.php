<?php
session_start();
require_once(__DIR__ . '/utils/datas.php');
require_once(__DIR__ . '/utils/functions.php');
require_once(__DIR__ . '/config/config.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/global.css">
    <link rel="stylesheet" href="styles/headerStyle.css">
    <link rel="stylesheet" href="styles/footerStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>RecipeApp - Home</title>
</head>
<body>

    <?php require_once(__DIR__ . '/components/header.php'); ?>

    <!-- inclusion de la logique de connexion dans index.php -->
    <?php include_once(__DIR__ . '/php/login.php'); ?>

    <main>
        <div class="container">
            <h2>Site de recettes</h2>
            <div class="recipes">
                <?php foreach(getRecipes($recipes) as $recipe): ?>
                    <article class="recipe">
                        <h3><?php echo $recipe['title']; ?></h2>
                        <p><?php echo $recipe['recipe']; ?></p>
                        <em><?php echo displayAuthor($recipe['author'], $users); ?></em>
                        <?php if (isset($_SESSION['LOGGED_USER']) && $recipe['author'] === $_SESSION['LOGGED_USER']['email']) : ?>
                            <ul class="list-group list-group-horizontal">
                                <li class="list-group-item"><a class="link-warning" href="pages/update_recipes.php?id=<?php echo($recipe['recipe_id']); ?>">Editer l'article</a></li>
                                <li class="list-group-item"><a class="link-danger" href="pages/delete_recipes.php?id=<?php echo($recipe['recipe_id']); ?>">Supprimer l'article</a></li>
                            </ul>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </main>

    
    <?php require_once(__DIR__ . '/components/footer.php'); ?>
</body>
</html>

