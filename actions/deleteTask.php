<?php

require ('checkTask.php');

$deleteQuery = $pdo->prepare('DELETE FROM tasks WHERE id = :id');
$deleteQuery->execute(['id' => $_GET['id']]);

redirect();