<?php
session_start();
require_once(__DIR__ . '/../utils/datas.php');
require_once(__DIR__ . '/../utils/functions.php');

$postData = $_POST;

if (isset($postData['email']) && isset($postData['password'])) {
    if (!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['ERROR_MESSAGE'] = "Votre email ne semple pas etre correcte";
    } else {
        foreach ($users as $user) {
            if (
                $postData['email'] === $user['email'] &&
                $postData['password'] === $user['password']
            ) {
                $_SESSION['LOGGED_USER'] = [
                    'email' => $user['email'],
                    'full_name' => $user['full_name'],
                    'id' => $user['user_id'],
                ];
            }
        }
    }

    if (!isset($_SESSION['LOGGED_USER'])) {
        $_SESSION['ERROR_MESSAGE'] = sprintf(
            "Les informations envoyées ne permettent pas de vous identifier: (%s / %s)",
            $postData['email'],
            strip_tags($postData['password'])
        );
    }
}

redirectToUrl('../index.php');

?>