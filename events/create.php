<?php
session_start();
require '../config/database.php';

if (!isset($_SESSION["user_id"])) {
    header("Location: ../auth/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST["title"];
    $description = $_POST["description"];
    $event_date = $_POST["event_date"];
    $reminder_at = $_POST["reminder_at"];

    $user_id = $_SESSION["user_id"];

    $sql = "INSERT INTO events (user_id, title, description, event_date, reminder_at)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user_id, $title, $description, $event_date, $reminder_at]);

    echo "Evento criado com sucesso!";
}
?>

<h2>Criar Evento</h2>

<form method="POST">

<label>Título</label><br>
<input type="text" name="title" required><br><br>

<label>Descrição</label><br>
<textarea name="description"></textarea><br><br>

<label>Data do evento</label><br>
<input type="datetime-local" name="event_date" required><br><br>

<label>Quando deseja ser avisado?</label><br>
<input type="datetime-local" name="reminder_at"><br><br>

<button type="submit">Salvar Evento</button>

</form>