<?php

$pdo = connectDB();

$query = $pdo->prepare('SELECT * FROM tasks WHERE user_id = :user_id ORDER BY id');
$query->execute(['user_id' => $_SESSION['user_id']]);

$tasks = $query->fetchAll(PDO::FETCH_ASSOC);