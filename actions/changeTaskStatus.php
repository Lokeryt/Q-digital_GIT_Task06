<?php

require ('checkTask.php');

$status = $task['status'] ? 0 : 1;

$changeStatusQuery = $pdo->prepare("UPDATE tasks SET status = :status WHERE id = :id");
$changeStatusQuery->execute(['id' => $_GET['id'], 'status' => $status]);

redirect();