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
];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage des listes des recettes</title>
</head>
<body>
    <h2>Listes des recettes</h2>
    <ul>
        <?php for ($line = 0; $line <= 1; $line++):  ?>
            <li>
                <?php echo "{$recipes[$line][0]} ({$recipes[$line][2]})"; ?>
            </li>
        <?php endfor;  ?>
    </ul>
</body>
</html>