<?php
session_start();
include_once(__DIR__ . '/../config/mysql.php');
include_once(__DIR__ . '/../config/databaseconnect.php');

$postData = $_POST;

if (
    !isset($postData['title']) ||
    !isset($postData['description']) ||
    !isset($postData['id']) ||
    !is_numeric($postData['id'])
) {
    $errorMessage = "Vous devez remplir les champs pour modifier la recette";
    return;
}

$recipeTitle = $postData['title'];
$recipeDescription = $postData['description'];

$updateQuery = "UPDATE recipes SET title = :title, recipe = :recipe WHERE recipe_id = :recipe_id";
$prepareRequest = $pdo_connexion->prepare($updateQuery);

$prepareRequest->execute([
    'title' => $recipeTitle,
    'recipe' => $recipeDescription,
    'recipe_id' => $postData['id'],
]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/headerStyle.css">
    <link rel="stylesheet" href="../styles/footerStyle.css">
    <link rel="stylesheet" href="../styles/global.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>RecipeApp - recipe update</title>
</head>
<body>

    <?php require_once(__DIR__ . '/../components/header.php'); ?>

    <main>
        <div class="container">
            <h1>Modification effectuée !</h1>

            <article>
                <h3><?php echo $recipeTitle; ?></h3>
                <p><?php echo $recipeDescription; ?></p>
                <em><?php echo $_SESSION['LOGGED_USER']['email']; ?></em>
            </article>
        </div>
    </main>
    
    <?php require_once(__DIR__ . '/../components/footer.php'); ?>
</body>
</html>