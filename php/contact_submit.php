<?php
$postData = $_POST;

// Verifie si les données sont presentes
if (
    !isset($postData['email']) ||
    !isset($postData['message']) ||
    !filter_var($postData['email'], FILTER_VALIDATE_EMAIL) ||
    empty($postData['message']) ||
    trim($postData['message']) === ""
) {
    echo "Il faut un EMAIL et un MESSAGE valide pour soumettre le formulaire";
    return;
}

?>

<h1>NOus avons bien reçu votre message</h1>
<article>
    <h3>Rappel de vos informations</h3>
    <p>
        <b>Email:</b>
        <?php echo trim($postData['email']); ?>
        <br>

        <b>Email:</b>
        <?php echo strip_tags(trim($postData['message'])); ?>
    </p>
</article>