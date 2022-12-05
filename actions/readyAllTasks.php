<?php

require ('../boot.php');

checkAuth();

$pdo = connectDB();

$changeStatusQuery = $pdo->prepare('UPDATE tasks SET status = TRUE WHERE user_id = :user_id');
$changeStatusQuery->execute(['user_id' => $_SESSION['user_id']]);

redirect();