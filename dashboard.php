<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: auth/login.php");
    exit();
}

echo "<h1>Bem-vindo, " . $_SESSION["user_name"] . "</h1>";
?>

<br><br>

<a href="events/create.php">Criar novo evento</a>