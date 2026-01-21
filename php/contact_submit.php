<?php
$getData = $_GET;

// Verifie si les données sont presentes
if (
    !isset($getData['email']) ||
    !isset($getData['message']) ||
    !filter_var($getData['email'], FILTER_VALIDATE_EMAIL) ||
    empty($getData['message']) ||
    trim($getData['message']) === ""
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
        <?php echo $getData['email']; ?>
        <br>

        <b>Email:</b>
        <?php echo trim($getData['message']); ?>
        <br>
    </p>
</article>