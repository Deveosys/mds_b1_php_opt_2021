<?php
include_once "./layout/header.php";
require_once "./model/Game.php";
require_once "./utils/authenticationCheck.php";
require_once "./model/GameRepository.php";

$games = getAllGames();
for ($i = 0; $i < 5; $i++) {
    $game = $games[$i];
    include "./layout/game.php";
}

include_once "./layout/footer.php";
