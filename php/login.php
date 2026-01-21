<div class="container">
    <?php if (!isset($_SESSION['LOGGED_USER'])): ?>
        <main>
            <h1>Connectez vous</h1>
            <?php if (isset($_SESSION['ERROR_MESSAGE'])):  ?>
                <p style="color: red;"><?php echo $_SESSION['ERROR_MESSAGE'];  ?></p>
            <?php endif;  ?>
            <form action="<?= BASE_URL ?>php/submit_login.php" method="post">
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
        </main>
    <?php else: ?>
        <h1>Bonjour <span style="color: blue;"><?php echo $_SESSION['LOGGED_USER']['email'] ?></span> et bienvenue sur le site</h1>
    <?php endif;  ?>
</div>