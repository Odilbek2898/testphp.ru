<?php
    session_start();

    $number = 1;

    $pdo = new PDO("mysql:host=localhost;dbname=marlin_tasks;", "root","root");

    $sql = "INSERT INTO button_click_db (number) VALUES (:number)";
    $statement = $pdo->prepare($sql);
    $statement->execute(['number' => $number]);

    $message = $pdo->lastInsertId();
    $_SESSION['success'] = $message;

    header("Location: /index13.php");
?>