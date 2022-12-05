<?php

require ('../boot.php');

checkAuth();

$pdo = connectDB();

$deleteAllQuery = $pdo->prepare('DELETE FROM tasks WHERE user_id = :user_id');
$deleteAllQuery->execute(['user_id' => $_SESSION['user_id']]);

redirect();