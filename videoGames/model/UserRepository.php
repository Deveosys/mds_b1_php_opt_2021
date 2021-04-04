<?php
require_once "./model/User.php";

function getUser(string $name, string $password): ?User
{
    try {
        require_once "./utils/pdo.php";

        $stmt = $pdo->prepare("SELECT * FROM users WHERE name=? AND password=?");
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $password);
        $stmt->execute();
        $fetchedUser = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($fetchedUser !== false) {
            return new User($fetchedUser["name"]);
        } else {
            return null;
        }
    } catch (\PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    return null;
}

function createUser(string $name, string $password): bool
{
    try {
        require_once "./utils/pdo.php";
        $stmt = $pdo->prepare("INSERT INTO users (name, password) VALUES (?, ?)");
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $password);
        $stmt->execute();
        echo "User " . $name . " created";
    } catch (\PDOException $e) {
        echo 'Echec lors de la connexion : ' . $e->getMessage();
        return false;
    }
    return true;
}
