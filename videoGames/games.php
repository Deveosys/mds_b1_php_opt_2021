<?php
include_once "./layout/header.php";
require_once "./model/Game.php";
require_once "./utils/authenticationCheck.php";
require_once "./model/GameRepository.php";

foreach (getAllGames() as $game) {
    include "./layout/game.php";
}

include_once "./layout/footer.php";
