<?php
require_once(__DIR__ . '/utils/datas.php');
require_once(__DIR__ . '/utils/functions.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/global.css">
    <link rel="stylesheet" href="styles/headerStyle.css">
    <link rel="stylesheet" href="styles/footerStyle.css">
    <title>RecipeApp - Home</title>
</head>
<body>

    <?php require_once(__DIR__ . '/components/header.php'); ?>

    <!-- inclusion de la logique de connexion dans index.php -->
    <?php require_once(__DIR__ . '/php/login.php'); ?>


    <?php if (isset($loggedUser)): ?>
        <main>
            <div class="container">
                <h2>Site de recettes</h2>
                <div class="recipes">
                    <?php foreach(getRecipes($recipes) as $recipe): ?>
                        <article class="recipe">
                            <h3><?php echo $recipe['title']; ?></h2>
                            <p><?php echo $recipe['recipe']; ?></p>
                            <em><?php echo displayAuthor($recipe['author'], $users); ?></em>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </main>
    <?php endif; ?>

    
    <?php require_once(__DIR__ . '/components/footer.php'); ?>
</body>
</html>

