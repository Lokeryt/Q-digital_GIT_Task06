<?php

require ('boot.php');

checkAuth();

require ('actions/getTasks.php');

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link type="text/css" href="styles/style.css" rel="stylesheet">
</head>
<body>
<h1>Task list</h1>
<hr>
    <div class="main">
        <div>
            <form action="actions/createTask.php" method="POST">
                <input type="text" class="input-task" placeholder="Enter text..." name="description" required>
                <input type="submit" class="add-task-button" value="Add task">
            </form>
            <br>
            <?php if (!empty($tasks)): ?>
            <div class="all-buttons-section">
                <form action="actions/deleteAllTasks.php" method="POST">
                    <input type="submit" class="all-button" value="Remove all">
                </form>
                <form action="actions/readyAllTasks.php" method="POST">
                    <input type="submit" class="all-button" value="Ready all">
                </form>
                <form action="actions/logout.php" method="POST">
                    <input type="submit" class="all-button" value="Logout">
                </form>
            </div>
            <?php endif; ?>
        </div>
        <hr>
        <?php foreach ($tasks as $task): ?>
            <div class="task-list">
                <div>
                    <div class="task-list">
                        <h3><?php echo htmlspecialchars($task['description']); ?></h3>
                        <form action="actions/changeTaskStatus.php?id=<?php echo htmlspecialchars($task['id']); ?>" method="POST">
                            <input type="submit" class="all-button" name="button"<?php if (!$task['status']): ?> value="Ready" <?php else: ?> value="Unready" <?php endif; ?>>
                        </form>
                        <form action="actions/deleteTask.php?id=<?php echo htmlspecialchars($task['id']); ?>" method="POST">
                            <input type="submit" class="all-button" name="button" value="Delete">
                        </form>
                    </div>
                </div>
                <div>
                    <?php if ($task['status']): ?>
                        <div class="status-circle green"></div>
                    <?php else: ?>
                        <div class="status-circle red"></div>
                    <?php endif; ?>
                </div>
            </div>
            <hr>
        <?php endforeach; ?>
    </div>
<?php flash(); ?>
</body>
</html>