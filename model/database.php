<?php
    $dsn = 'mysql:host=localhost;dbname=cars54';
    $username = 'app_host';
    $password = 'password';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/error.php');
        exit();
    }
?>