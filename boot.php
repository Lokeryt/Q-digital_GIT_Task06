<?php

session_start();

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'tasklist');
define('DB_TABLE_VERSIONS', 'versions');

function connectDB()
{
    $errorMessage = 'Невозможно подключиться к серверу базы данных';
    $conn = new PDO('mysql:host=localhost;dbname=tasklist', DB_USER, DB_PASSWORD);
    if (!$conn) {
        throw new Exception($errorMessage);
    } else {
        $query = $conn->query('set names utf8');
        if (!$query)
            throw new Exception($errorMessage);
        else
            return $conn;
    }
}

function flash(string $message = null)
{
    if ($message) {
        $_SESSION['flash'] = $message;
    } else {
        if (!empty($_SESSION['flash'])) {
            ?>

            <div>
                <?=$_SESSION['flash']?>
            </div>

            <?php
        }

        unset($_SESSION['flash']);
    }
}

function isAuth() : bool
{
    return $_SESSION['user_id'] ?? false;
}

function checkAuth()
{
    if (!isAuth()) {
        flash('Not authenticated');
        redirect('index.php');
        die();
    }
}

function redirect($uri = '/')
{
    header("Location: $uri");
}
