<?php
require_once(__DIR__ . '/../config/config.php');
?>

<link rel="stylesheet" href="./styles/headerStyle.css">

<header>
    <div class="container">
        <nav>
            <h1>RecipeApp</h1>
            <ul>
                <li><a href="<?= BASE_URL ?>index.php">Home</a></li>
                <li><a href="<?= BASE_URL ?>pages/contact.php">Contact</a></li>
            </ul>
        </nav>
    </div>
</header>

<style>
    header {
        padding-inline: 2em;
        padding-block: 1em;
        margin-bottom: 2rem;

        h1 {
            font-size: 1.5em;
        }
        
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        ul {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1em;
            list-style: none;
        }
    }
</style>