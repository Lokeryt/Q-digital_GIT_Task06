<?php

require ('boot.php');

if (isAuth()) {
    header('Location: tasks.php');
    die();
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link type="text/css" href="styles/style.css" rel="stylesheet">
</head>
<body>
    <form action="actions/authorization.php" class="auth-form" method="post">
        <input type="text" class="input-task" name="login" placeholder="login" required>
        <input type="text" class="input-task" name="password" placeholder="password" required>
        <input type="submit" class="all-button" name="auth" value="Login">
    </form>
    <?php flash(); ?>
</body>
</html>