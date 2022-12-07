<?php

require ('../boot.php');

checkAuth();

if (!isset($_POST['create'])) {
    flash('Error');
    redirect();
    die();
}

if (empty($_POST['description'])) {
    flash('Fill task description');
    redirect();
    die();
}

$pdo = connectDB();

$params = [
    'user_id' => $_SESSION['user_id'],
    'description' => $_POST['description'],
];

$addTaskQuery = $pdo->prepare('INSERT INTO tasks (user_id, description) VALUES (:user_id, :description)');
$addTaskQuery->execute($params);

redirect();