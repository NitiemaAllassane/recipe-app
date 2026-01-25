<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/headerStyle.css">
    <link rel="stylesheet" href="../styles/footerStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>RecipeApp - Contact</title>
</head>
<body class="d-flex flex-column min-vh-100">

    <?php require_once(__DIR__ . '/../components/header.php'); ?>

    <main>
        <div class="container">
            <h1>Ajouter une nouvelle recette</h1>
            <form action="../php/post_recipe.php" method="post">
                <div class="mb-3">
                    <label for="title" class="form-label">Titre de la recette</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="title" 
                        name="title" 
                        aria-describedby="title-help"
                    >
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Decrivez votre recette</label>
                    <textarea 
                        class="form-control"
                        placeholder="Exprimez vous" 
                        id="description" 
                        name="description"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>
    </main>

    <?php require_once(__DIR__ . '/../components/footer.php'); ?>
    
</body>
</html>