<?php
$users = [
    [
        'full_name' => 'Nitiema Allassane',
        'email' => 'allassane.nitiema@exemple.com',
        'age' => 21,
    ],
    [
        'full_name' => 'Mathieu Nebra',
        'email' => 'mathieu.nebra@exemple.com',
        'age' => 34,
    ],
    [
        'full_name' => 'Zongo Karidjatou',
        'email' => 'zongo.kadi@exemple.com',
        'age' => 46,
    ],
];


$recipes = [
    ["Attike", "[...]", "allassane.nitiema@exemple.com", true],
    ["Foutou Banane", "[...]", "zongo.kadi@exemple.com", false],
    ["Spaguethi", "[...]", "zongo.abiba@exemple.com", false],
    ["Soupe de poulet", "[...]", "kabre.sali@exemple.com", true],
];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Affichage des listes des recettes</title>
</head>
<body>
    <h1>Appli de recettes</h1>
    <h2>Listes des recettes</h2>
    <ul>
        <?php for ($line = 0; $line <= 3; $line++):  ?>
            <li>
                <?php echo "{$recipes[$line][0]} ({$recipes[$line][2]})"; ?>
            </li>
        <?php endfor;  ?>
    </ul>
</body>
</html>