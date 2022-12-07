<?php

require ('../boot.php');

if (!isset($_POST['auth'])) {
    flash('Error');
    redirect();
    die();
}

if (empty($_POST['login']) || empty($_POST['password'])) {
    flash('Fill login and password');
    redirect();
    die();
}

$params = [
    'login' => $_POST['login'],
];

$pdo = connectDB();

$query = $pdo->prepare('SELECT * FROM users WHERE login = :login');
$query->execute($params);

if ($query->rowCount()) {
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if (password_verify($_POST['password'], $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
    } else {
        flash('Invalid password');
        redirect();
        die();
    }
} else {
    $params['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $addUserQuery = $pdo->prepare('INSERT INTO users (login, password) VALUES (:login, :password)');
    $addUserQuery->execute($params);

    $_SESSION['user_id'] = $pdo->lastInsertId();
}

redirect('../tasks.php');