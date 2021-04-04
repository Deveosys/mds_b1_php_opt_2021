<?php

if (isset($_SESSION["logged"]) && $_SESSION["logged"] == true) {
?>
    <ul>
        <li>
            <a href="index.php">Home</a>
        </li>
        <li>
            <a href="games.php">Games</a>
        </li>
        <li>
            <a href="logout.php">Logout</a>
        </li>
    </ul>
<?php
}
