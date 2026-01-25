<?php
session_start();

include_once(__DIR__ . '/../config/mysql.php');
include_once(__DIR__ . '/../config/databaseconnect.php');

$postData = $_POST;

if (!isset($postData['title']) || !isset($postData['description'])) {
    $errorMessage = "Vous devez donner le titre et la description pour ajouter la recette";
    echo $errorMessage;
    return;
}

$recipeTitle = htmlspecialchars($postData['title']);
$recipeDescription = htmlspecialchars($postData['description']);

// INsertion dans la base de données
$insertQuery = "INSERT INTO recipes(title, recipe, author, is_enabled) VALUE (:title, :recipe, :author, :is_enabled)";
$insertionStatement = $pdo_connexion->prepare($insertQuery);

$insertionStatement->execute([
    'title' => $recipeTitle,
    'recipe' => $recipeDescription,
    'author' => $_SESSION['LOGGED_USER']['email'],
    'is_enabled' => 1,
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
    <title>RecipeApp - recipe create</title>
</head>
<body>

    <?php require_once(__DIR__ . '/../components/header.php'); ?>

    <main>
        <div class="container">
            <h1>Recette ajouté avec succes !</h1>

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