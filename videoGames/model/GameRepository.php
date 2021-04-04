<?php
require_once "./model/Game.php";

function getAllGames(): array
{
    try {
        require "./utils/pdo.php";
        $stmt = $pdo->prepare("SELECT * FROM games");
        $stmt->execute();
        $fetchedGames = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $objectGames = [];
        foreach ($fetchedGames as $game) {
            $gameObject = new Game(
                $game["name"],
                $game["game_id"],
                $game["cover"],
                $game["summary"],
                $game["rating"]
            );
            $objectGames[] = $gameObject;
        }

        return $objectGames;
    } catch (\PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    return [];
}

function getGameByID(int $id): ?Game
{
    try {
        require "./utils/pdo.php";
        $stmt = $pdo->prepare("SELECT * FROM games WHERE game_id=?");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $fetchedGame = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($fetchedGame !== false) {
            return new Game(
                $fetchedGame["name"],
                $fetchedGame["game_id"],
                $fetchedGame["cover"],
                $fetchedGame["summary"],
                $fetchedGame["rating"]
            );
        } else {
            echo "Game not found";
            return null;
        }
    } catch (\PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    return null;
}


function createGame(Game $game)
{

    $fetchedGame = getGameByID($game->getGameId());

    if ($fetchedGame == null) {
        try {
            require "./utils/pdo.php";
            $stmt = $pdo->prepare("INSERT INTO games (name, game_id, cover, summary, rating) VALUES (?, ?, ?, ?, ?)");
            $stmt->bindParam(1, $game->getName());
            $stmt->bindParam(2, $game->getGameId());
            $stmt->bindParam(3, $game->getCover());
            $stmt->bindParam(4, $game->getSummary());
            $stmt->bindParam(5, $game->getRating());
            $stmt->execute();
            echo "Game created";
            return true;
        } catch (\PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return false;
        }
    } else {
        echo "Game already exists : #" . $game->getGameId() . " - " . $game->getName() . "<br/>";
    }
}

function fetch(string $query, array $params)
{
    try {
        require "./utils/pdo.php";
        $stmt = $pdo->prepare($query);
        $stmt->execute($params);
        return $stmt->fetch();
    } catch (\PDOException $e) {
        echo "Erreur : " . $e->getMessage();
        return false;
    }
}
