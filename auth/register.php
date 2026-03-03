<?php
require '../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $email, $password]);

    echo "Usuário cadastrado com sucesso!";
}

?>

<form method="POST">
    <input type="text" name="name" placeholder="Nome" required><br><br>
    <input type="email"name="email" placeholder="E-mail" required><br><br>
    <input type="password" name="password" placeholder="Senha" required><br><br>
    <button type="submit">Cadastrar</button>
</form>





