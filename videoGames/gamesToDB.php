<?php
require_once "./data/gamesArray.php";
require_once "./model/GameRepository.php";

foreach ($games as $game) {
    $game = new Game(
        $game["name"],
        $game["id"],
        $game["cover"],
        $game["summary"],
        $game["rating"]
    );
    createGame($game);
}

echo "Games added to DB";