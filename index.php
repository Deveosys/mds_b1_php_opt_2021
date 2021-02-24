<?php

require_once "Character.php";

// $character1 = new Character(1, "Jérome");
// $character2 = new Character(2, "Thibault");

include "layout/header.php";

if (isset($_POST["character_create"])) {

    $characters = [];

    if (!empty($_POST["character1_name"])) {
        $character1 = new Character(1, $_POST["character1_name"]);
        $characters[] = $character1;
    } else {
        echo "First character's name is empty !";
    }

    if (!empty($_POST["character2_name"])) {
        $character2 = new Character(2, $_POST["character2_name"]);
        $characters[] = $character2;
    } else {
        echo "Second character's name is empty !";
    }
}


?>

<?php 
if (isset($characters)) {
    foreach ($characters as $character) {
        include 'layout/character.php';
    }
}
?>

<form method="post">
    <label for="chatacter_name">Character's name : </label>
    <input id="chatacter_name" name="character1_name" type="text" value="">
    <input id="chatacter_name" name="character2_name" type="text" value="">
    <input type="submit" name="character_create">
</form>

<?php
include "layout/footer.php";
