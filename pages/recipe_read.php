<?php
session_start();
require_once(__DIR__ . '/../utils/functions.php');
require_once(__DIR__ . '/../utils/datas.php');
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

// Recuperer les commentaire liés a une recettes
$commentRequest = "SELECT 
c.comment,
u.full_name
FROM comments c
INNER JOIN users u
ON c.user_id = u.user_id
WHERE c.recipe_id = :id
";

$prepareComments = $pdo_connexion->prepare($commentRequest);
$prepareComments->execute([
    'id' => $getData['id']
]);

$comments = $prepareComments->fetchAll(PDO::FETCH_ASSOC);

// Selectionner les utilisateurs qui ont commenté

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
            <section class="detail-section">
                <h1>Details de la recette</h1>
                <article>
                    <h2>Titre: <?php echo $recipe['title'] ?></h2>
                    <p>
                        <b>Description:</b>
                        <?php echo htmlspecialchars($recipe['recipe']) ?>
                    </p>
                    <em>Auteur: <?php echo displayAuthor($recipe['author'], $users) ?></em>
                </article>
            </section>
            <section class="comments-section">
                <?php  if (empty($comments)): ?>
                    <p class="empy-comment">Aucun commentaire pour le moments</p>
                <?php else: ?>
                    <?php foreach($comments as $comment):  ?>
                        <article class="comment">
                            <p>
                                <?php echo $comment['comment']  ?>
                            </p>
                            <i><?php echo $comment['full_name']  ?></i>
                        </article>
                    <?php endforeach;  ?>
                <?php endif;  ?>
            </section>
            <?php if (isset($_SESSION['LOGGED_USER'])): ?>
                <section class="addComments">
                    <form action="../php/post_comment.php" method="post">
                        <div class="mb-3">
                            <input 
                                type="hidden" 
                                name="recipe_id"
                                value="<?php echo $recipe['recipe_id'] ?>"
                            >
                        </div>
                        <div class="mb-3">
                            <label for="comment" class="form-label">Ajouter un commentaire</label>
                            <textarea 
                                class="form-control"
                                id="comment" 
                                name="comment"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Soumettre le commentaire</button>
                    </form>
                </section>
            <?php endif; ?>
        </div>
    </main>

    <?php require_once(__DIR__ . '/../components/footer.php'); ?>
    
</body>
</html>