<?php
session_start();
session_destroy();
require_once(__DIR__ . '/../utils/functions.php');

redirectToUrl('../index.php');
?>