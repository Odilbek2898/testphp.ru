<?php
    session_start();

    $email = $_POST['email'];
    $password = $_POST['password'];

    $pdo = new PDO("mysql:host=localhost;dbname=marlin_tasks;", "root","root");

    $sql = "SELECT * from registration_db WHERE email=:email";
    $statement = $pdo->prepare($sql);
    $statement->execute(['email' => $email]);
    $task = $statement->fetch(PDO::FETCH_ASSOC);

    if(!empty($task)) {
        $message = "Этот эл адрес уже занят другим пользователем.";
        $_SESSION['danger'] = $message;

        header("Location: /index11.php");
        exit;
    }

    $sql = "INSERT INTO registration_db (email, password) VALUES (:email, :password)";
    $statement = $pdo->prepare($sql);
    $statement->execute(['email' => $email, 'password' => $password]);

    $message = "Uspeshnoye soxraneniye";
    $_SESSION['success'] = $message;

    header("Location: /index11.php");
?>