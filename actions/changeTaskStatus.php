<?php

require ('../boot.php');

checkAuth();

$pdo = connectDB();

$findTaskQuery = $pdo->prepare('SELECT status FROM tasks WHERE id = :id');
$findTaskQuery->execute(['id' => $_GET['id']]);
$task = $findTaskQuery->fetch(PDO::FETCH_ASSOC);

$status = $task['status'] ? 0 : 1;

$changeStatusQuery = $pdo->prepare("UPDATE tasks SET status = :status WHERE id = :id");
$changeStatusQuery->execute(['id' => $_GET['id'], 'status' => $status]);

redirect();