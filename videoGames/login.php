<?php
include_once "./layout/header.php";
require_once "./model/UserRepository.php";

if (isset($_POST["login"]) && isset($_POST["username"]) && isset($_POST["password"])) {
    $user = getUser($_POST["username"], $_POST["password"]);
    if ($user == null) {
        echo "Bad Credentials...";
    } else {
        $_SESSION["logged"] = true;
        header("Location: index.php");
        exit;
    }
}

if (isset($_POST["register"]) && isset($_POST["username"]) && isset($_POST["password"])) {
    createUser($_POST["username"], $_POST["password"]);
}
?>

<div>Login</div>
<form method="post">
    <input type="text" name="username" required>
    <input type="password" name="password" required>
    <input type="submit" name="login" value="Se connecter">
</form>

<div>Registration</div>
<form method="post">
    <input type="text" name="username" required>
    <input type="password" name="password" required>
    <input type="submit" name="register" value="S'inscrire">
</form>

<?php
include_once "./layout/footer.php";
