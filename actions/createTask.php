<?php

require ('../boot.php');

checkAuth();

$pdo = connectDB();

$params = [
    'user_id' => $_SESSION['user_id'],
    'description' => $_POST['description'],
];

$addTaskQuery = $pdo->prepare('INSERT INTO tasks (user_id, description) VALUES (:user_id, :description)');
$addTaskQuery->execute($params);

header('Location: /');