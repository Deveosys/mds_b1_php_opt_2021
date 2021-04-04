<div>
    <a href="<?php echo "game.php?id=" . $game->getGameId() ?>">
        <img src="<?php echo $game->getCover() ?>" alt="">
        <div>
            <?php echo $game->getName() ?>
        </div>
    </a>

</div>