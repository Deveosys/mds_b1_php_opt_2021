<div>
    <div>
        <?php echo $game->getName() ?>
    </div>
    <div>
        <?php echo floor($game->getRating()) . "/100" ?>
    </div>
    <img src="<?php echo $game->getCover() ?>" alt="">
    <p>
    <?php echo $game->getSummary() ?>
    </p>

</div>