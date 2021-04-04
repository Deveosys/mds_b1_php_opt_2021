<?php
    include_once "./layout/header.php";
    require_once "./model/Game.php";
    require_once "./utils/authenticationCheck.php";
    require_once "./model/GameRepository.php";

    if (isset($_GET["id"])) {
        $game = getGameByID($_GET["id"]);
        include_once "./layout/gameDetails.php";
    }

    include_once "./layout/footer.php";
