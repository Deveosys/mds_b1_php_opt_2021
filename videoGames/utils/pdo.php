<?php
$dsn = 'mysql:dbname=top_db;host=127.0.0.1:8889;charset=utf8mb4';
$db_user = 'root';
$db_password = 'root';

$pdo = new PDO($dsn, $db_user, $db_password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
