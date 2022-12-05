<?php

require ('../boot.php');

checkAuth();

$pdo = connectDB();

$deleteAllQuery = $pdo->prepare('DELETE FROM tasks WHERE id = :id');
$deleteAllQuery->execute(['id' => $_GET['id']]);

redirect();