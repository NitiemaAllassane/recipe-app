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

if ($_FILES['screenshot'] && $_FILES['screenshot']['error'] === 0) {

    if ($_FILES['screenshot']['size'] > 1000000) {
        echo "L'envoi du fichier a echoué. Error ou fichier trop volumineux";
        return;
    }

    $fileInfo = pathinfo($_FILES['screenshot']['name']);
    $extension = $fileInfo['extension'];
    $allowedExtensions = ['png', 'jpg', 'jpeg', 'gif'];

    if (!in_array($extension, $allowedExtensions)) {
        echo "L'envoi du fichier a echoué. L'extension {$extension} n'est pas autorisé";
        return;
    }

    $path = __DIR__ . '/../uploads/';
    if (!is_dir($path)) {
        echo "L'envoi du fichier a echoué. Le dossier 'upload' n'existe pas";
        return;
    }

    move_uploaded_file($_FILES['screenshot']['tmp_name'], $path . basename($_FILES['screenshot']['name']));
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