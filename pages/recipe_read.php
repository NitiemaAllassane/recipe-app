<?php
session_start();
include_once(__DIR__ . '/../config/mysql.php');
include_once(__DIR__ . '/../config/databaseconnect.php');

$getData = $_GET;

if (!isset($getData['id']) || !is_numeric($getData['id'])) {
    $errorMessage = "Desolé, vous ne pouvez pas voir les detail de cette recette";
    echo $errorMessage;
    return;
}

$selectQuery = "SELECT * FROM recipes WHERE recipe_id = :id";
$queryPrepare = $pdo_connexion->prepare($selectQuery);
$queryPrepare->execute([
    'id' => $getData['id'],
]);

$recipe = $queryPrepare->fetch(PDO::FETCH_ASSOC);

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
    <title>RecipeApp - Details</title>
</head>
<body class="d-flex flex-column min-vh-100">

    <?php require_once(__DIR__ . '/../components/header.php'); ?>

    <main>
        <div class="container">
            <h1>Details de la recette</h1>
            <h2>Titre: <?php echo $recipe['title'] ?></h2>
            <p>
                <b>Description:</b>
                <?php echo $recipe['recipe'] ?>
            </p>
            <em>Auteur: <?php echo $recipe['author'] ?></em>
        </div>
    </main>

    <?php require_once(__DIR__ . '/../components/footer.php'); ?>
    
</body>
</html>