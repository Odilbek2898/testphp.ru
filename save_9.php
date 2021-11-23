<?php
    $text = $_POST['text'];

    $pdo = new PDO("mysql:host=localhost;dbname=marlin_tasks;", "root","root");
    $sql = "INSERT INTO text_db (text) VALUES (:text)";
    $statement = $pdo->prepare($sql);
    $statement->execute(['text' => $text]);

    header("Location: /index9.php");
?>