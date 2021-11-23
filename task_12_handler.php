<?php
    session_start();

    $text = $_POST['text'];

    $pdo = new PDO("mysql:host=localhost;dbname=marlin_tasks;", "root","root");

    $sql = "INSERT INTO text_db (text) VALUES (:text)";
    $statement = $pdo->prepare($sql);
    $statement->execute(['text' => $text]);

    $message = $text;
    $_SESSION['success'] = $message;

    header("Location: /index12.php");
?>