<?php
$postData = $_POST;

if (isset($postData['email']) && isset($postData['password'])) {
    if (!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
        $errorMesage = "Votre email ne semple pas etre correcte";
    } else {
        foreach ($users as $user) {
            if (
                $postData['email'] === $user['email'] &&
                $postData['password'] === $user['password']
            ) {
                $loggedUser = [
                    'email' => $user['email']
                ];
            }
        }
    }

    if (!isset($loggedUser)) {
        sprintf(
            "Les informations envoyées ne permettent pas de vous identifier: (%s / %s)",
            $postData['email'],
            strip_tags($postData['password'])
        );
    }
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
    <title>RecipeApp - connexion</title>
</head>
<body>

    <div class="container">
        <?php if (!isset($loggedUser)): ?>
            <div>
                <h1>Connectez vous</h1>
                <form action="index.php" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input 
                            type="email" 
                            class="form-control" 
                            id="email" 
                            name="email" 
                            aria-describedby="email-help"
                            placeholder="something@exemple.com"
                        >
                        <p id="email-help" class="form-text">
                            Nous ne revendrons pas votre email.
                        </p>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input 
                            type="password" 
                            class="form-control" 
                            id="password" 
                            name="password" 
                            aria-describedby="password-help"
                        >
                    </div>
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
            </div>
        <?php else: ?>
            <h1>Bonjour <span style="color: blue;"><?php echo $loggedUser['email'] ?></span> et bienvenue sur le site</h1>
        <?php endif;  ?>
    </div>
    
</body>
</html>