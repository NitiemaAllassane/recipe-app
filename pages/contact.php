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
            <h1>Contactez nous</h1>
            <form action="../php/contact_submit.php" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input 
                        type="email" 
                        class="form-control" 
                        id="email" 
                        name="email" 
                        aria-describedby="email-help"
                    >
                    <p id="email-help" class="form-text">
                        Nous ne revendrons pas votre email.
                    </p>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Votre message</label>
                    <textarea 
                        class="form-control"
                        placeholder="Exprimez vous" 
                        id="message" 
                        name="message">
                    </textarea>
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </main>

    <?php require_once(__DIR__ . '/../components/footer.php'); ?>
    
</body>
</html>