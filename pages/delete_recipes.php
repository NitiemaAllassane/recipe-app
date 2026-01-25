<?php
session_start();

$getData = $_GET;

if (!isset($getData['id']) && !is_numeric($getData['id'])) {
    $errorMessage = "DESOLéS, nous ne pouvons pas supprimer la recette";
    echo $errorMessage;
    return;
}


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
    <title>RecipeApp - Delete recipe</title>
</head>
<body class="d-flex flex-column min-vh-100">

    <?php require_once(__DIR__ . '/../components/header.php'); ?>

    <main>
        <div class="container">
            <h1>
                Etes vous sur de vouloir supprimer la recette ?
            </h1>
            

            <form action="../php/post_delete.php" method="post">
                <div class="mb-3">
                    <input 
                        type="hidden" 
                        name="id"
                        value="<?php echo $getData['id'] ?>"
                    >
                </div>
                <button type="submit" class="btn btn-danger">Supprimer la recette</button>
            </form>
        </div>
    </main>

    <?php require_once(__DIR__ . '/../components/footer.php'); ?>
    
</body>
</html>