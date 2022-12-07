<?php

require ('../boot.php');

checkAuth();

$pdo = connectDB();

$findTaskQuery = $pdo->prepare('SELECT * FROM tasks WHERE id = :id');
$findTaskQuery->execute(['id' => $_GET['id']]);

if (!$findTaskQuery->rowCount()) {
    flash('Task not exist');
    redirect();
    die();
}

$task = $findTaskQuery->fetch(PDO::FETCH_ASSOC);

if ($task['user_id'] != $_SESSION['user_id']) {
    flash('No access');
    redirect();
    die();
}