<?php
    session_start();

    $text = $_POST['text'];

    $pdo = new PDO("mysql:host=localhost;dbname=marlin_tasks;", "root","root");

    $sql = "SELECT * from text_db WHERE text=:text";
    $statement = $pdo->prepare($sql);
    $statement->execute(['text' => $text]);
    $task = $statement->fetch(PDO::FETCH_ASSOC);

    if(!empty($task)) {
        $message = "VVedenaya zapis uje yest v tablitse.";
        $_SESSION['danger'] = $message;

        header("Location: /index10.php");
        exit;
    }

    $sql = "INSERT INTO text_db (text) VALUES (:text)";
    $statement = $pdo->prepare($sql);
    $statement->execute(['text' => $text]);

    $message = "Uspeshnoye soxraneniye";
    $_SESSION['success'] = $message;

    header("Location: /index10.php");
?>